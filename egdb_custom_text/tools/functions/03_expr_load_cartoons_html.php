<!-- #####################             Cartoons             ################################ -->
<center>
<?php

$cartoons_data=[$data1["cartoons"],$data2["cartoons"],$data3["cartoons"]];
$jcartoons=[];
$canvas_w = [];
$canvas_h=[];
$titles=["Single Cell RNA-seq","Bulk RNA-seq","Proteomics"];
$titles_color=['blue','green','orange'];
$cartoons=[];

$myCanvas=["myCanvas","myCanvas2","myCanvas3"];
$canvas_div=["canvas_div","canvas_div1","canvas_div2"];
$cartoon_labels=["cartoon_labels1","cartoon_labels2","cartoon_labels3"];
$sel_cartoons=["sel_cartoons1","sel_cartoons2","sel_cartoons3"];
$kj_image=["_kj_image","_kj_image1","_kj_image2"];


echo '<div class="collapse_section pointer_cursor" data-toggle="collapse" data-target="#cartoons_frame" aria-expanded="true">';
echo '<i class="fas fa-sort" style="color:#229dff"></i> Expression images';
echo '</div>';

foreach($dataset_file_name as $index => $dataset )
{
    if ( file_exists("$expression_path/expression_info.json") ) {
      $annot_json_file = file_get_contents("$expression_path/expression_info.json");
      $annot_hash = json_decode($annot_json_file, true);
      
      if ($annot_hash[$dataset]["cartoons"]) {
      
        $cartoon_conf = $annot_hash[$dataset]["cartoons"];

        //echo "<p>annot_hash cartoons exists and was found!</p>";

        if ($expr_cartoons && file_exists($expression_path."/$cartoon_conf") ) {
          
          $cartoons_json = file_get_contents($expression_path."/$cartoon_conf");
          
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
          
          echo '<div class="d-inline-flex" style="width:100%; margin:10px;">'; 
          echo "<div class=\"form-group d-inline-flex\" style=\"width: 450px;margin-top:-3px;\">";

          // if($index==0){
            echo "<label for=\"$sel_cartoons[$index]\" style=\"width: 150px; margin-top:7px\"><i><b>Select gene:</b></i></label>";
            echo "<select class=\"form-control\" style=\"font-weight: bold\" id=\"$sel_cartoons[$index]\">";
            foreach ($found_genes as $gene) {
              echo "<option value=\"$gene\">$gene</option>";
            }
            echo "</select>";
          // }
          echo "</div>";
          

          echo '<span class="circle" style=background-color:#C7FFED"></span> Lowest <1';
          echo '<span class="circle" style="background-color:#CCFFBD"></span> >=1';
          echo '<span class="circle" style="background-color:#FFFF5C"></span> >=2';
          echo '<span class="circle" style="background-color:#FFC300"></span> >=10';
          echo '<span class="circle" style="background-color:#FF5733"></span> >=50';
          echo '<span class="circle" style="background-color:#C70039"></span> >=100';
          echo '<span class="circle" style="background-color:#900C3F"></span> >=200';
          echo '<span class="circle" style="background-color:#581845"></span> >=5000';
          echo '</div>';

        echo "<div style=\"margin-left:auto;margin-right: auto;\">";
        
          echo "<div class=\"float-left\">";
            echo "<div class=\"cartoons_canvas_frame\">";
              echo "<div id=\"$canvas_div[$index]\">";
                echo "<b><label>".$titles[$index]."</label></b>";
                echo "<div id=\"$myCanvas[$index]\">";
                  echo "Your browser does not support the HTML5 canvas";
                echo "</div>";
              echo "</div>";
              echo "<br>";
            echo "</div>";
          echo "</div>";
        
            echo "<div class=\"float-right\">";
          
            echo "<ul id=\"$cartoon_labels[$index]\" style=\"text-align:left\">";

            foreach ($cartoons[$index][$found_genes[0]] as $sample_name => $ave_value) {
            
              // echo "<li class=\"cartoon_values pointer_cursor\" id=\"$sample_name"."_kj_image\">".$sample_name.": ".$ave_value."</li>";
              echo "<li class=\"cartoon_values pointer_cursor\" id=\"$sample_name"."_kj_image$index\">".$sample_name.": ".$ave_value."</li>";
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
  var canvas=[];
  var imgObj = [];
  var canvas_h = [];
  var canvas_w = [];
  var cartoon=[];
  var myCanvas=["myCanvas","myCanvas2","myCanvas3"];
  var gene_list = [];
  var cartoons_all_genes = [];

  var img_path = <?php echo json_encode($images_path) ?>;

  imgObj[0] = <?php echo json_encode($jcartoons[0]) ?>;
  canvas_h[0] = <?php echo json_encode($canvas_h[0]) ?>;
  canvas_w[0] = <?php echo json_encode($canvas_w[0]) ?>;
  cartoons_all_genes[0]= <?php echo $cartoons_data[0] ?>;
  gene_list[0]= <?php echo json_encode(array_keys(json_decode($cartoons_data[0],true))) ?>;

  imgObj[1] = <?php echo json_encode($jcartoons[1]) ?>;
  canvas_h[1] = <?php echo json_encode($canvas_h[1]) ?>;
  canvas_w[1] = <?php echo json_encode($canvas_w[1]) ?>;
  cartoons_all_genes[1]= <?php echo $cartoons_data[1] ?>;
  gene_list[1]= <?php echo json_encode(array_keys(json_decode($cartoons_data[1],true))) ?>;

  imgObj[2] = <?php echo json_encode($jcartoons[2]) ?>;
  canvas_h[2] = <?php echo json_encode($canvas_h[2]) ?>;
  canvas_w[2] = <?php echo json_encode($canvas_w[2]) ?>;
  cartoons_all_genes[2]= <?php echo $cartoons_data[2] ?>;
  gene_list[2]= <?php echo json_encode(array_keys(json_decode($cartoons_data[2],true))) ?>;
  
  // alert(cartoons_all_genes[0]);

// if (cartoons) {
 for(var i=0;i<3;i++)
 {
   canvas[i] = create_canvas(canvas_h[i],canvas_w[i],myCanvas[i]);
  draw_gene_cartoons(canvas[i],imgObj[i],cartoons_all_genes[i],gene_list[i][0],i);
 }



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
    
    draw_gene_cartoons(canvas[0],imgObj[0],cartoons_all_genes[0],gene_list[0][cartoon_gene_select_index],0);
    
    gene_expr_values = cartoons_all_genes[0][cartoon_active_gene];
    
    // //var html_array = ["<ul id=\"cartoon_values\" style=\"text-align:left\">"];
    // var html_array = [];
    
    for (var sample in gene_expr_values){
      // alert(sample)
      expr_value = gene_expr_values[sample];
      sample_id=sample+"_kj_image0";    
      $(document.getElementById(sample_id)).html(sample+": "+expr_value);
    }
    
  });

  $( "#sel_cartoons2" ).change(function() {
    //alert( this.value );
    //cartoon_one_gene = cartoons_all_genes[this.value];
    
    cartoon_active_gene = $('#sel_cartoons2').val();
    
    // alert("Cartoon gene: "+cartoon_active_gene);
    // alert("genelist: "+gene_list[0].findIndex((element) => element == cartoon_active_gene))
    cartoon_gene_select_index = gene_list[1].findIndex((element) => element == cartoon_active_gene);
    
    draw_gene_cartoons(canvas[1],imgObj[1],cartoons_all_genes[1],gene_list[1][cartoon_gene_select_index],1);
    
    gene_expr_values = cartoons_all_genes[1][cartoon_active_gene];
    
    // //var html_array = ["<ul id=\"cartoon_values\" style=\"text-align:left\">"];
    // var html_array = [];
    
    for (var sample in gene_expr_values){
      // alert(sample)
      expr_value = gene_expr_values[sample];
      sample_id=sample+"_kj_image1";    
      $(document.getElementById(sample_id)).html(sample+": "+expr_value);
    }
    
  });

  $( "#sel_cartoons3" ).change(function() {
    //alert( this.value );
    //cartoon_one_gene = cartoons_all_genes[this.value];
    
    cartoon_active_gene = $('#sel_cartoons3').val();
    
    // alert("Cartoon gene: "+cartoon_active_gene);
    // alert("genelist: "+gene_list[0].findIndex((element) => element == cartoon_active_gene))
    cartoon_gene_select_index = gene_list[2].findIndex((element) => element == cartoon_active_gene);
    
    draw_gene_cartoons(canvas[2],imgObj[2],cartoons_all_genes[2],gene_list[2][cartoon_gene_select_index],2);
    
    gene_expr_values = cartoons_all_genes[2][cartoon_active_gene];
    
    // //var html_array = ["<ul id=\"cartoon_values\" style=\"text-align:left\">"];
    // var html_array = [];
    
    for (var sample in gene_expr_values){
      // alert(sample)
      expr_value = gene_expr_values[sample];
      sample_id=sample+"_kj_image2";    
      $(document.getElementById(sample_id)).html(sample+": "+expr_value);
    }
    
  });
</script>