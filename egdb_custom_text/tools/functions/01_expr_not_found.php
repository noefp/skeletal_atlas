<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
 $not_found_list=[];
 $gene_name_list=[];
  
foreach($dataset_file_name as $expr_file){ 
    $expr_file_path= $expression_basic_atlas_path."/".$expr_file;


    if(file_exists("$expr_file_path"))
    {
        $tab_file = file("$expr_file_path");
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
?>
<script>
Swal.fire({
  title: "<b>Warning</b>",
  text: "",
  html: `<?php echo("<b><i>".implode($separator=" , ",$not_found_list)."</i>"."\n <center style=\"color:red\">NOT FOUND</center></b>");?>`,
  icon: "warning"
});
</script>
<?php
}
?>