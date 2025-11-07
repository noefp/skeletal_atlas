<?php include_once realpath("../../../../easy_gdb/header.php");?>

<?php
 $not_found_list=[];
 $gene_name_list=[];
 
foreach($dataset_file_name as $index => $expr_file){ 
    $expr_file_path= $GLOBALS["expression_path"]."/".$dataset_folder[$index]."/".$expr_file;

    if(file_exists($expr_file_path))
    {
        $tab_file = file($expr_file_path);
        $first_line = array_shift($tab_file);
        $header = explode("\t", rtrim($first_line));

     //gets each replicate value for each gene
        foreach ($tab_file as $line) {
            $columns = explode("\t", rtrim($line));
            $gene_name = $columns[0];
            array_push($gene_name_list,$gene_name);
        }
    }
}

foreach ($gids as $index => $n) {
    if($n == "")
    {   // if n value is empty
        unset($gids[$index]);
    }
    else
    {
        // if gene not found in input list
        if ( !in_array(strtolower($n), array_map("strtolower", $gene_name_list)) ) {
            array_push($not_found_list,$n);
            unset($gids[$index]);
        }
    }
}

if ($not_found_list)
{
  echo '<div class="alert alert-warning show">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close" title="Close">
  <span aria-hidden="true">&times;</span>
  </button>';
  echo ("<div style=\"text-align: center\"><strong>Genes not found: </strong><i> ");
  echo(implode($separator=" , ",$not_found_list)."</i></div></div>");

  // echo "<script type='text/javascript'>
  //       var genesNotFound = " . json_encode($not_found_list) . ";

  //       var geneListElement = document.getElementById('geneNotFoundList');
  //           var listItem = document.createElement('p');
  //           listItem.textContent = genesNotFound;
  //           geneListElement.appendChild(listItem);

  //       // show the modal with gnee lista not founds
  //       var myModal = new bootstrap.Modal(document.getElementById('genesNotFoundModal'), {
  //           keyboard: false
  //       });
  //       myModal.show();
  //   </script>";
}
?>