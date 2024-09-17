
  <!-- ############################################################### DATASET TITLE AND DESCRIPTION -->


<html>
<div class="collapse_section pointer_cursor banner" data-toggle="collapse" data-target="#information" aria-expanded="true">
  <!-- <i class="fas fa-sort" style="color:#229dff"></i> Information -->
  <i class="fas fa-sort"></i> Information
</div>

<div id="information" class="collapse hide" style="text-align: center">
<?php
$array_info=[];
$description=[];
  if ( file_exists("$expression_path/expression_info.json") ) {
    $annot_json_file = file_get_contents("$expression_path/expression_info.json");
    $annot_hash = json_decode($annot_json_file, true);
    foreach($dataset_file_name as $name){  
      if ($annot_hash[$name]["description"]) {
        $desc_file = $annot_hash[$name]["description"];

        if ( file_exists("$custom_text_path/expr_datasets/$desc_file") ) {
          array_push($array_info,$name);
          array_push($description,$desc_file);

        }
        else {
          echo "<h1 id=\"dataset_title\" class=\"text-center\">$name not found</h1>";
        }
      }  
    }
      
    foreach ($array_info as $index=>$info) {
      echo "<a class=margin-20 d-inline-flex pointer_cursor href=/easy_gdb/custom_view.php?file_name=../expr_datasets/$description[$index] target=_blank><i class='fa fa-info' style='font-size:20px;color:#229dff'></i> $description[$index]</a>";
    }
  } 
?>
</div> <!--  END information dataset -->
</html>