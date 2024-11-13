   <!-- #####################             Replicates           ################################ -->
   <html>
   <center>
  <?php
  $replicates_data=[$data1["replicates"],$data2["replicates"],$data3["replicates"]];
  $found_genes=[];
  $name_table=['Single Cell RNA-seq','Bulk RNA-seq','Proteomics'];

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
          echo"<div id=\"chart_rep$index\" style=\"min-height: 365px\"></div>";
          echo"</div>";
      }

  ?>

  </div>
</center>
</html>

<script type="text/javascript">
  var sample_array=[];
  var replicates_all_gene=[]; 
  var samples_found =[];
  var replicates_one_gene=[];

  sample_array[0] = <?php echo json_encode($data1["header"]) ?>;
  replicates_all_gene[0] = <?php  echo json_encode($data1["replicates"]); ?>;
  samples_found[0] = <?php echo json_encode($found_genes[0]) ?>;
  

  sample_array[1] = <?php echo json_encode($data2["header"],true) ?>;
  replicates_all_gene[1] = <?php  echo json_encode($data2["replicates"]); ?>;
  samples_found[1] = <?php echo json_encode($found_genes[1]) ?>;



  sample_array[2] = <?php echo json_encode($data3["header"],true) ?>;
  replicates_all_gene[2] = <?php  echo json_encode($data3["replicates"]); ?>;
  samples_found[2] = <?php echo json_encode($found_genes[2]) ?>;



</script>

<script  src="../functions/replicates_graph.js"></script>