<header>
<?php include_once realpath("../../../../easy_gdb/header.php");?>
</header>


<body>
<div>
  <a class="float-right margin-20" href="/easy_gdb/help/08_gene_expression.php" target="_blank"><i class='fa fa-info' style='font-size:20px;color:#229dff'></i> Help</a>

    <a href="/skeletal_atlas/egdb_custom_text/tools/expression/expression_input.php" class="float-left margin-20" style="text-decoration: underline;"><i class="fas fa-reply" style="color:#229dff"></i> Back to input</a>
    <br>
    <h1 class="text-center" style="color:#653f28">Multiomic Reference Atlas Results</h1>
</div>


<div class="margin-20">
<?php 

  $dataset_file_name=["sc_mouse_basic_atlas_v01.txt","00_mouse_basic_atlas_v07.txt","proteomics_tissues_atlas_v01.txt"];
  $gids = [];

  // get post data
  $gene_list = $_POST["gids"];  
  if(isset($gene_list)) {
        
    foreach (explode("\n",$gene_list) as $one_gene) {
      $one_gene = rtrim($one_gene);
      if(!in_array($one_gene,$gids)){
        array_push($gids,$one_gene); // array with the data from "expression_input.php post"
      }
    }
//--------------- end get post data -----------------------------------------------------------------    
//----- find if the grids are in the datasets files----------------------------------------------------
include realpath('../functions/01_expr_not_found.php');

//--------------- end find -----------------------------------------------------------------
   
  
//   // get data from the files dataset_file_name and Ids selection from "expression_input.php post"
include_once realpath("../functions/data_function.php");

$data1=get_data($dataset_file_name[0],$gids);
$data2=get_data($dataset_file_name[1],$gids);
$data3=get_data($dataset_file_name[2],$gids);

// create cartoons
include_once realpath("../functions/03_expr_load_cartoons_html.php");

// create data table
include_once realpath("../functions/03_expr_load_avg_table_html.php");

// create heatmap
include_once realpath("../functions/03_expr_load_heatmap_html.php");

// create lines graph
include_once realpath("../functions/03_expr_load_bars_html.php");

// Description dataset
include_once realpath('../functions/01_expr_load_dataset_description.php');
//---- end description dataset ------------------------------------------------------------
}
?>
</div>
</body>

<footer>
<?php include realpath('../../../../easy_gdb/footer.php'); ?>
</footer>

<style>

.banner {
  /* color:rgb(101, 63, 40); */
  /* background-color:#d9bf9e; */
  color:'#229dff';
}

.banner:hover {
    /* color:#229dff; */
    color:white;
    /* background-color:#d9bf9e; */
  }

  .circle {
    height: 15px;
    width: 15px;
    border-radius: 50%;
    border-style: solid;
    border-color: #ccc;
    display: inline-block;
    margin: 5px;
    margin-left: 15px;
  }  

</style>

