   <!-- #####################             Replicates           ################################ -->
   <html>
   <center>
  <?php
  $replicates_data=[];
  $name_table=[];

  if($atlas=="mouse_atlas")
    { $replicates_data[0]= $data1["replicates"];$name_table[0]='Single Cell RNA-seq';
      $replicates_data[1]= $data2["replicates"];$name_table[1]='Bulk RNA-seq';
      $replicates_data[2]= $data3["replicates"];$name_table[2]='Proteomics';
    }
  else
    { $replicates_data[0]= $data1["replicates"];$name_table[0]='Single Cell RNA-seq';
      $replicates_data[1]= $data2["replicates"];$name_table[1]='Bulk RNA-seq';
    }

  $found_genes=[];

    $colors_array=["#ea5545", "#f46a9b", "#ef9b20", "#edbf33", "#ede15b", "#bdcf32", "#87bc45", "#27aeef", "#b33dc6",'#546ead',
                  '#666','#999','#ccc','#000',"#a61101", "#c89", "#ab5700", "#798b00", "#437801", "#036aab", "#d0f", "#700982", 
                    "#fe9989", "#f8aedf", "#ffdf64", "#cbff89", "#6befff", "#f77ffa",'#b66'];
    $index=0;
    $colors_array_length=count($colors_array);

  // $charts=[];
  // $titles=["Single Cell RNA-seq","Bulk RNA-seq","Proteomics"];

  echo "<div class=\"collapse_section pointer_cursor\" data-toggle=\"collapse\" data-target=\"#replicates_graph\" aria-expanded=\"true\">";
  echo"<i class=\"fas fa-sort\" style=\"color:#229dff\"></i> Replicates </div>";

  echo"<div id=\"replicates_graph\" class=\"collapse hide\">";

    foreach($replicates_data as $index => $replicate)
    {

      echo "<br><h2 style=\"text-align=center\"><b><i>$name_table[$index]</i></b></h2>";
      // $cartoons[$index]=json_decode($cartoons_data[$index],true);
      $found_genes[$index]=array_keys($replicate);
      echo"<div id=\"chart_rep_frame$index\" style=\"border:2px solid #666; padding-top:7px\">"; 
          echo "<div class=\"form-group d-inline-flex\" style=\"width: 450px\">";
          echo "<label for=\"sel1$index\" style=\"width: 150px; margin-top:7px\"><b>Select gene: </b></label>";
          echo "<select class=\"form-control sel1\" id=\"sel1$index\">";
                foreach ($found_genes[$index] as $gene) {
                  echo "<option value=\"$gene\">$gene</option>";
                }
            echo"</select>";
          echo"</div>";
          echo"<div id=\"chart_rep$index\" style=\"min-height: 565px\"></div>";
          echo"</div>";

        echo '<label style="color: black; font-size: 12px; display: show;"><b>Replicate count:</b></label>
        <div id="replicates_count" style="max-height: 100px; overflow-y: auto; padding:5px; display: block;">';
        foreach ($replicate[$found_genes[$index][0]] as $gene) {
          if($index==13)
          { echo "<span class=\"badge\" style= \"color:white; background-color: $colors_array[$index]; padding:5px; margin:10px; white-space:nowrap; display: inline-block;\">".$gene['name'].": ".count($gene['data'])."</span>";}
          else
          {echo "<span class=\"badge\" style= \"background-color: $colors_array[$index]; padding:5px; margin:10px; white-space:nowrap; display: inline-block;\">".$gene['name'].": ".count($gene['data'])."</span>";}
          if ($index<$colors_array_length-1) {$index++;} else {$index=0;}
        }
        echo "</div><hr>";
      }

  ?>

  </div>
</center>
</html>

<script type="text/javascript">
  // data for replicates graph
  var sample_array=[];
  var replicates_all_gene=[]; 
  var samples_found =[];
  var replicates_one_gene=[];


  sample_array[0] = <?php echo isset($data1) ? json_encode($data1["header"],true) : '[]'; ?>;
  replicates_all_gene[0] = <?php  echo (isset($data1) ? json_encode($data1["replicates"]) : '[]'); ?>;
  samples_found[0] = <?php echo isset($data1) ? json_encode($found_genes[0]) : '[]'; ?>;
  
  sample_array[1] = <?php echo isset($data2) ? json_encode($data2["header"],true) : '[]'; ?>;
  replicates_all_gene[1] = <?php  echo (isset($data2) ? json_encode($data2["replicates"]) : '[]'); ?>;
  samples_found[1] = <?php echo isset($data2) ? json_encode($found_genes[1]) : '[]'; ?>;

  sample_array[2] = <?php echo isset($data3) ? json_encode($data3["header"],true) : '[]'; ?>;
  replicates_all_gene[2] = <?php  echo (isset($data3) ? json_encode($data3["replicates"]) : '[]'); ?>;
  samples_found[2] = <?php echo isset($data3) ? json_encode($found_genes[2]) : '[]'; ?>;

</script>

<script  src="../functions/replicates_graph.js"></script>
<!-- <style>
  /* svg{
    height: 110% !important;
  } */

</style> -->