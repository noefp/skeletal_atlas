 <?php
 
$files = $_POST["expr_file"];
$file_path = $_POST["expr_file_path"];

$file_array = array();

foreach($files as $file)
{
  $expr_file_path=$file_path."/".$file;


  if ( file_exists($expr_file_path) ) {
    $tab_file = file($expr_file_path);
    $first_line = array_shift($tab_file);

    //gets each replicate value for each gene
    foreach ($tab_file as $line) {
      $columns = explode("\t", rtrim($line));
      $gene_name = $columns[0];

      array_push($file_array,$gene_name);
    }
  }
}  

  //echo var_dump($file_array);
  echo json_encode($file_array);
?> 
