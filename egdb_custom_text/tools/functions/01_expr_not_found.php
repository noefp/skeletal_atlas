<?php include_once realpath("../../../../easy_gdb/header.php");?>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>


<!-- Modal -->
<div class="modal fade" id="genesNotFoundModal" tabindex="-1" aria-labelledby="genesNotFoundLabel" aria-hidden="true" data-bs-backdrop="static">
  <div class="modal-dialog">
  <!-- <div class="modal-dialog modal-sm"> -->
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title w-100 text-center" id="genesNotFoundLabel" style="color: orange">⚠️ <b>Warning</b></h1>
      </div>
      <div class="modal-body">
        <!-- Aquí se mostrará la lista de genes no encontrados -->
        <i><b><p class="text-center" id="geneNotFoundList">
          <!-- Los elementos de la lista se insertarán dinámicamente -->
        </p></b></i>
        <p class="text-center" style="color:orange"><b>NOT FOUND !!</b></p>
      </div>
      <div class="modal-footer">
         <!-- Botón "Return" a la izquierda -->
         <a href="expression_input.php" class="btn btn-secondary">Return</a>
        <!-- Botón "Continue" a la derecha -->
        <a class="btn btn-primary" data-bs-dismiss="modal">Continue</a>
      </div>
    </div>
  </div>
</div>



<?php
 $not_found_list=[];
 $gene_name_list=[];
 
foreach($dataset_file_name as $expr_file){ 
    $expr_file_path= $GLOBALS["expression_basic_atlas_path"]."/".$expr_file;

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
echo ("<div class=\"alert alert-danger\"><strong>WARNING:</strong><i> ");
echo(implode($separator=" , ",$not_found_list)."</i> NOT FOUND !!!"."</div>");

echo "<script type='text/javascript'>
        var genesNotFound = " . json_encode($not_found_list) . ";

        var geneListElement = document.getElementById('geneNotFoundList');
            var listItem = document.createElement('p');
            listItem.textContent = genesNotFound;
            geneListElement.appendChild(listItem);

        // show the modal with gnee lista not founds
        var myModal = new bootstrap.Modal(document.getElementById('genesNotFoundModal'), {
            keyboard: false
        });
        myModal.show();
    </script>";
}
?>