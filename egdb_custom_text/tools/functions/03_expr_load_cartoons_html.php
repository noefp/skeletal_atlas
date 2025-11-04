<!-- #####################             Cartoons             ################################ -->
<center>
<?php

if($atlas=="mouse_atlas"){  
  $cartoons_data=[$data1["cartoons"],$data2["cartoons"],$data3["cartoons"]];
  $jcartoons=[];
  $canvas_w = [];
  $canvas_h=[];
  $titles=["Single Cell RNA-seq","Bulk RNA-seq","Proteomics"];
  // $titles_color=['blue','green','orange'];
  $cartoons=[];

  $myCanvas=["myCanvas","myCanvas2","myCanvas3"];
  $canvas_div=["canvas_div","canvas_div1","canvas_div2"];
  $cartoon_labels=["cartoon_labels1","cartoon_labels2","cartoon_labels3"];
  $sel_cartoons=["sel_cartoons1","sel_cartoons2","sel_cartoons3"];
  $kj_image=["_kj_image","_kj_image1","_kj_image2"];
  $cartoon_load=[];
}
else{
  $cartoons_data=[$data1["cartoons"],$data2["cartoons"]];
  $jcartoons=[];
  $canvas_w = [];
  $canvas_h=[];
  $titles=["Single Cell RNA-seq","Bulk RNA-seq"];
  // $titles_color=['blue','green','orange'];
  $cartoons=[];

  $myCanvas=["myCanvas","myCanvas2"];
  $canvas_div=["canvas_div","canvas_div1"];
  $cartoon_labels=["cartoon_labels1","cartoon_labels2"];
  $sel_cartoons=["sel_cartoons1","sel_cartoons2"];
  $kj_image=["_kj_image","_kj_image1"];
  $cartoon_load=[];
}

echo '<div class="collapse_section pointer_cursor" data-toggle="collapse" data-target="#cartoons_frame" aria-expanded="true">';
echo '<i class="fas fa-sort" style="color:#229dff"></i> Expression images';
echo '</div>';

foreach($dataset_file_name as $index => $dataset )
{
    if ( file_exists("$json_files_path/tools/expression_info.json") ) {
      $annot_json_file = file_get_contents("$json_files_path/tools/expression_info.json");
      $annot_hash = json_decode($annot_json_file, true);
      
      if ($annot_hash[$dataset]["cartoons"]) {
      
        $cartoon_conf = $annot_hash[$dataset]["cartoons"];

        //echo "<p>annot_hash cartoons exists and was found!</p>";

        if (($positions['cartoons']!=0) && file_exists($json_files_path."/tools/$cartoon_conf") ) {
          
          $cartoons_json = file_get_contents($json_files_path."/tools/$cartoon_conf");
          
          // echo "<p>annot_hash cartoons_json exists and was found!</p>";
          // var_dump($cartoons_json);

        
          $jcartoons[$index] = json_decode($cartoons_json, true);
      
          $max_w = 100;
          $max_h = 100;
          $max_x = 10;
          $max_y = 10;
          
          foreach($jcartoons[$index]["cartoons"] as $img) {
            echo "<img id='".$img["img_id"]."' src='".$images_path."/expr/cartoons/".$img["image"]."' style=\"display:none\">";

            if ($img["width"] > $max_w) {
              $max_w = $img["width"];
            }
            if ($img["height"] > $max_h) {
              $max_h = $img["height"];
            }
            if ($img["x"] > $max_x) {
              $max_x = $img["x"];
            }
            if ($img["y"] > $max_y) {
              $max_y = $img["y"];
            }
          } //end foreach
          $canvas_w[$index] = $max_w + $max_x;
          $canvas_h[$index] = $max_h + $max_y;

          $cartoons[$index]=json_decode($cartoons_data[$index],true);
          $found_genes=array_keys(json_decode($cartoons_data[$index],true));

          echo '<div id="cartoons_frame" class="row collapse show" style="margin:0px; border:2px solid #666; padding-top:7px; width:100%">';
          
          // echo "<div id=\"cartoon_frame$index\" class=\"d-inline-flex\" style=\"width:100%; margin:10px;\">"; 
          echo "<div class=\"form-group d-inline-flex\" style=\"width: 450px;margin-top:-3px;\">";

          // if($index==0){
            echo "<label for=\"$sel_cartoons[$index]\" style=\"width: 150px; margin-top:7px\"><i><b>Select gene:</b></i></label>";
            echo "<select class=\"form-control\" id=\"$sel_cartoons[$index]\">";
            foreach ($found_genes as $gene) {
              echo "<option value=\"$gene\">$gene</option>";
            }
            echo "</select>";
          // }
          echo "</div>";
          // echo "<link rel=\"stylesheet\" href=\"styles.css\">";
          echo "<div class=\"color-bar\" style=\"margin:10px\" id=\"colors$index\">";  
          echo "<table id=\"color-table$index\" class=\"color\"></table>";
          // echo '<span class="circle" style=background-color:#C7FFED"></span> Lowest <1';
          // echo '<span class="circle" style="background-color:#CCFFBD"></span> >=1';
          // echo '<span class="circle" style="background-color:#FFFF5C"></span> >=2';
          // echo '<span class="circle" style="background-color:#FFC300"></span> >=10';
          // echo '<span class="circle" style="background-color:#FF5733"></span> >=50';
          // echo '<span class="circle" style="background-color:#C70039"></span> >=100';
          // echo '<span class="circle" style="background-color:#900C3F"></span> >=200';
          // echo '<span class="circle" style="background-color:#581845"></span> >=5000';
          echo "</div>"; 
          // echo '</div>';

        echo "<div style=\"margin-left:auto;margin-right: auto;\">";
          echo "<div class=\"float-left\">";
            echo "<div class=\"cartoons_canvas_frame\">";
              echo "<div id=\"$canvas_div[$index]\">";
                echo "<b><label>".$titles[$index]."</label></b>";
                  echo "<div id=\"$myCanvas[$index]\">";
                  if(isset($found_genes[0]) && isset($cartoons[$index][$found_genes[0]]) && $cartoons[$index][$found_genes[0]]){
                  echo "Your browser does not support the HTML5 canvas";
                  }else{
                    echo "Genes not found";
                  }
                  echo "</div>";
                echo "</div>";
              echo "<br>";
            echo "</div>";
          echo "</div>";
        
          echo "<div class=\"float-right\">";
    
            echo "<ul id=\"$cartoon_labels[$index]\" style=\"text-align:left\">";

            if(isset($found_genes[0]) && isset($cartoons[$index][$found_genes[0]]) && $cartoons[$index][$found_genes[0]]){
              array_push($cartoon_load,true);

              foreach ($cartoons[$index][$found_genes[0]] as $sample_name => $ave_value) {
            
                // echo "<li class=\"cartoon_values pointer_cursor\" id=\"$sample_name"."_kj_image\">".$sample_name.": ".$ave_value."</li>";
                echo "<li class=\"cartoon_values pointer_cursor\" id=\"$sample_name"."_kj_image$index\">".$sample_name.": ".$ave_value."</li>";
              } // end foreach

            }// end if
            else{
              array_push($cartoon_load,false);
            }

            echo "</ul>";
          
          echo "</div>";
        echo "</div>";

    echo '</div>';

      }//end cartoons conf
      else {
      echo "<p>cartoons.json file was not found!</p>";
    }
        
      }//end cartoons hash
    else {
      echo "<p>cartoons hash was not found!</p>";
    }
      
    } //end expression_info.json
    else {
      echo "<p>expression_info.json was not found!</p>";
    }
}
?>
</center>

<script type="text/javascript" src="../functions/kinetic-v5.1.0.min.js"></script>
<script type="text/javascript" src="../functions/cartoons_kinetic.js"></script>      
<script>
  var atlas =<?php echo json_encode($atlas) ?>;
  var canvas=[];
  var imgObj = [];
  var canvas_h = [];
  var canvas_w = [];
  var cartoon=[];
  var gene_list = [];
  var cartoons_all_genes = [];

  var img_path = <?php echo json_encode($images_path) ?>;
  var cartoon_load=<?php echo json_encode($cartoon_load)?>;
  var cartoons_count= <?php echo json_encode(count($cartoon_load))?>;


  var myCanvas=["myCanvas","myCanvas2","myCanvas3"];

  imgObj[0] = <?php echo(isset($jcartoons[0]) ? json_encode($jcartoons[0]) : '[]') . ";\n" ?>;
  canvas_h[0] = <?php echo(isset($canvas_h[0]) ? json_encode($canvas_h[0]) : '0') . ";\n" ?>; 
  canvas_w[0] = <?php echo(isset($canvas_w[0]) ? json_encode($canvas_w[0]) : '0') . ";\n" ?>;
  cartoons_all_genes[0] = <?php echo(isset($cartoons_data[0]) ? $cartoons_data[0] : '[]') . ";\n" ?>;
  gene_list[0] = <?php echo(isset($cartoons_data[0]) ? json_encode(array_keys(json_decode($cartoons_data[0], true))) : '[]') . ";\n" ?>;

  imgObj[1] = <?php echo(isset($jcartoons[1]) ? json_encode($jcartoons[1]) : '[]') . ";\n" ?>;
  canvas_h[1] = <?php echo(isset($canvas_h[1]) ? json_encode($canvas_h[1]) : '0') . ";\n" ?>; 
  canvas_w[1] = <?php echo(isset($canvas_w[1]) ? json_encode($canvas_w[1]) : '0') . ";\n" ?>;
  cartoons_all_genes[1] = <?php echo(isset($cartoons_data[1]) ? $cartoons_data[1] : '[]') . ";\n" ?>;
  gene_list[1] = <?php echo(isset($cartoons_data[1]) ? json_encode(array_keys(json_decode($cartoons_data[1], true))) : '[]') . ";\n" ?>;


  imgObj[2] = <?php echo(isset($jcartoons[2]) ? json_encode($jcartoons[2]) : '[]') . ";\n" ?>;
  canvas_h[2] = <?php echo(isset($canvas_h[2]) ? json_encode($canvas_h[2]) : '0') . ";\n" ?>; 
  canvas_w[2] = <?php echo(isset($canvas_w[2]) ? json_encode($canvas_w[2]) : '0') . ";\n" ?>;
  cartoons_all_genes[2] = <?php echo(isset($cartoons_data[2]) ? $cartoons_data[2] : '[]') . ";\n" ?>;
  gene_list[2] = <?php echo(isset($cartoons_data[2]) ? json_encode(array_keys(json_decode($cartoons_data[2], true))) : '[]') . ";\n" ?>;




// if (cartoons) {
//  for(var i=0;i<3;i++)
// console.log(cartoon_load);
var i=0; 
cartoon_load.forEach(load =>
 {
  if(load){
   canvas[i] = create_canvas(canvas_h[i],canvas_w[i],myCanvas[i]);
   draw_gene_cartoons(canvas[i],imgObj[i],cartoons_all_genes[i],gene_list[i][0],i,ranges_array[i],colors_array[i]);


     gene_expr_values = cartoons_all_genes[i][gene_list[i][0]];
    
     for (var sample in gene_expr_values){
    //    // alert(sample)
       expr_value = gene_expr_values[sample];
       sample_id=sample+"_kj_image"+i;    
       color_rgb=get_expr_color(expr_value,ranges_array[i],colors_array[i]);
    //    $(document.getElementById(sample_id)).html(sample+": "+expr_value).css('color','rgb('+color_rgb+')');
       $(document.getElementById(sample_id)).html(sample+": "+expr_value).css('text-decoration',' double underline').css('text-decoration-color','rgb('+color_rgb+')');
      }
    }
    i++;
   });
    


 // ######################################################## Cartoons gene selection

  var color_rgb;
  var obj;
  var image_id,parent;
  
    $(".cartoon_values").mouseover(function(){
      parent=$(this).parent().attr('id');
      image_id = this.id;

    if(parent=="cartoon_labels1")
    {
      obj = canvas[0].get('#'+image_id)[0];
      color_rgb =[obj.attrs.red,obj.attrs.green,obj.attrs.blue];
      obj.cache();
      obj.filters([Kinetic.Filters.RGB]);
      obj.red(150).green(150).blue(150);
      obj.draw();
    }
    
    if(parent=="cartoon_labels2")
    {
      // alert("image: "+image_id+" | "+parent);
      obj= canvas[1].get('#'+image_id)[0];
      color_rgb =[obj.attrs.red,obj.attrs.green,obj.attrs.blue];
      obj.cache();
      obj.filters([Kinetic.Filters.RGB]);
      obj.red(150).green(150).blue(150);
      obj.draw();
    }

    if(parent=="cartoon_labels3")
    {
      //  alert("image: "+image_id+" | "+parent);
      obj= canvas[2].get('#'+image_id)[0];
      color_rgb=[obj.attrs.red,obj.attrs.green,obj.attrs.blue];
      obj.cache();
      obj.filters([Kinetic.Filters.RGB]);
      obj.red(150).green(150).blue(150);
      obj.draw();
    }

    });

    $(".cartoon_values").mouseout(function(){
    
    //var obj = canvas.get('#'+image_id)[0];

    obj.cache();
    obj.filters([Kinetic.Filters.RGB]);
    obj.red(color_rgb[0]).green(color_rgb[1]).blue(color_rgb[2]); 
    obj.draw();

  });

  
  $( "#sel_cartoons1" ).change(function() {
    //alert( this.value );
    //cartoon_one_gene = cartoons_all_genes[this.value];
    
    cartoon_active_gene = $('#sel_cartoons1').val();
    
    // alert("Cartoon gene: "+cartoon_active_gene);
    // alert("genelist: "+gene_list[0].findIndex((element) => element == cartoon_active_gene))
    cartoon_gene_select_index = gene_list[0].findIndex((element) => element == cartoon_active_gene);
    
    draw_gene_cartoons(canvas[0],imgObj[0],cartoons_all_genes[0],gene_list[0][cartoon_gene_select_index],0,ranges_array[0],colors_array[0]);
    
    gene_expr_values = cartoons_all_genes[0][cartoon_active_gene];
    
    // //var html_array = ["<ul id=\"cartoon_values\" style=\"text-align:left\">"];
    // var html_array = [];
    
    for (var sample in gene_expr_values){
      // alert(sample)
      expr_value = gene_expr_values[sample];
      sample_id=sample+"_kj_image0"; 
      color_rgb=get_expr_color(expr_value,ranges_array[0],colors_array[0]);
      // $(document.getElementById(sample_id)).html(sample+": "+expr_value).css('color','rgb('+color_rgb+')');
      $(document.getElementById(sample_id)).html(sample+": "+expr_value).css('text-decoration','double underline').css('text-decoration-color','rgb('+color_rgb+')');
      // $(document.getElementById(sample_id)).html(sample+": "+expr_value);
    }
    
  });

  $( "#sel_cartoons2" ).change(function() {
    //alert( this.value );
    //cartoon_one_gene = cartoons_all_genes[this.value];
    
    cartoon_active_gene = $('#sel_cartoons2').val();
    
    // alert("Cartoon gene: "+cartoon_active_gene);
    // alert("genelist: "+gene_list[0].findIndex((element) => element == cartoon_active_gene))
    cartoon_gene_select_index = gene_list[1].findIndex((element) => element == cartoon_active_gene);
    
    draw_gene_cartoons(canvas[1],imgObj[1],cartoons_all_genes[1],gene_list[1][cartoon_gene_select_index],1,ranges_array[1],colors_array[1]);
    
    gene_expr_values = cartoons_all_genes[1][cartoon_active_gene];
    
    // //var html_array = ["<ul id=\"cartoon_values\" style=\"text-align:left\">"];
    // var html_array = [];
    
    for (var sample in gene_expr_values){
      expr_value = gene_expr_values[sample];
      sample_id=sample+"_kj_image1";    
      color_rgb=get_expr_color(expr_value,ranges_array[1],colors_array[1]);
      // $(document.getElementById(sample_id)).html(sample+": "+expr_value).css('color','rgb('+color_rgb+')');
      $(document.getElementById(sample_id)).html(sample+": "+expr_value).css('text-decoration','double underline').css('text-decoration-color','rgb('+color_rgb+')');
      // $(document.getElementById(sample_id)).html(sample+": "+expr_value);
    }
    
  });

  $( "#sel_cartoons3" ).change(function() {
    //alert( this.value );
    //cartoon_one_gene = cartoons_all_genes[this.value];
    
    cartoon_active_gene = $('#sel_cartoons3').val();
    
    // alert("Cartoon gene: "+cartoon_active_gene);
    // alert("genelist: "+gene_list[0].findIndex((element) => element == cartoon_active_gene))
    cartoon_gene_select_index = gene_list[2].findIndex((element) => element == cartoon_active_gene);
    
    draw_gene_cartoons(canvas[2],imgObj[2],cartoons_all_genes[2],gene_list[2][cartoon_gene_select_index],2,ranges_array[2],colors_array[2]);
    
    gene_expr_values = cartoons_all_genes[2][cartoon_active_gene];
    
    // //var html_array = ["<ul id=\"cartoon_values\" style=\"text-align:left\">"];
    // var html_array = [];
    
    for (var sample in gene_expr_values){
      // alert(sample)
      expr_value = gene_expr_values[sample];
      sample_id=sample+"_kj_image2";    
      color_rgb=get_expr_color(expr_value,ranges_array[2],colors_array[2]);
      // $(document.getElementById(sample_id)).html(sample+": "+expr_value).css('color','rgb('+color_rgb+')');
      $(document.getElementById(sample_id)).html(sample+": "+expr_value).css('text-decoration','double underline').css('text-decoration-color','rgb('+color_rgb+')');
      // $(document.getElementById(sample_id)).html(sample+": "+expr_value);
    }
    
  });

// </script>

<script>

// color table function
function crearFila(colors,ranges,id) {
     const tabla = document.getElementById(id);
    const fila_color = document.createElement('tr');
    colors.forEach(color => {
        const celda = document.createElement('td');
        celda.style.backgroundColor = color;
        fila_color.appendChild(celda);
    });
    const fila_range = document.createElement('tr');
    ranges.forEach(range => {
        const celda = document.createElement('th');
        celda.textContent=range;
        fila_range.appendChild(celda);
    });

    tabla.appendChild(fila_range);
    tabla.appendChild(fila_color);
}

var atlas =<?php echo json_encode($atlas) ?>;
if(atlas === "mouse_atlas"){
  crearFila(colors_array[0],ranges_text_array[0],'color-table0');
  crearFila(colors_array[1],ranges_text_array[1],'color-table1');
  crearFila(colors_array[2],ranges_text_array[2],'color-table2')
}else{
  crearFila(colors_array[0],ranges_text_array[0],'color-table0');
  crearFila(colors_array[1],ranges_text_array[1],'color-table1');
}

</script>

<style>
  .color-bar{
    width:100%;
    display:block;
    text-align: center;

  }

.color-bar table {
    /* width:80%; */
    margin-left: 30px; 
    margin-left:auto;
    margin-right: auto; 
 } 

.color-bar td, th {
    height: 20px;
    width: 100px;
    text-align: center;
}


.cartoon_values:hover{
/* font-size:18px; */
font-weight: bold;
}
</style>
