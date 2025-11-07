<header>
<?php include_once realpath("../../../../easy_gdb/header.php");?>
</header>

<body>
<div>
  <a class="float-right margin-20" href="/easy_gdb/help/08_gene_expression.php" target="_blank"><i class='fa fa-info' style='font-size:20px;color:#229dff'></i> Help</a>

    <a onClick="history.back()" class="float-left margin-20 pointer_cursor"><i class="fas fa-reply" style="color:#229dff"></i> Back to input</a>
    <br>
    <h1 class="text-center" style="color:#653f28">Multiomic Reference Atlas Results</h1>
</div>


<br><div id="loader_main" class="loader"></div>
<div id="expression_output" class="margin-20" style="display:none" >

  <!-- This message would be displayed when the information in the Json "expression_colors" arrays does not match the size -->
<!-- <div id="color_default" class="alert alert-info" style="display:none"><strong>Info:</strong> The default palette has been selected because the size of the attributes
"expression_colors" in <i>"expression_info.json"</i> do not match !!!</div> -->

<?php 
 $atlas=$_POST['atlas'];

 if($atlas =="mouse_atlas"){
  $dataset_file_name=["sc_mouse_basic_atlas_v01.txt","00_mouse_basic_atlas_v07.txt","proteomics_tissues_atlas_v01.txt"];
  $dataset_folder=["01_Mouse_single_cell_RNAseq","02_Mouse_Bulk_RNAseq","05_mouse_proteomics"]; 
 }else{
  $dataset_file_name=["sc_human_basic_atlas_v01.txt","00_human_basic_atlas_v02.txt"];
  $dataset_folder=["04_Human_single_cell_RNAseq","03_Human_Bulk_RNAseq"];
 }
  
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

if($atlas =="mouse_atlas"){
  $data1=get_data($dataset_folder[0],$dataset_file_name[0],$gids,"table1");
  $data2=get_data($dataset_folder[1],$dataset_file_name[1],$gids,"table2");
  $data3=get_data($dataset_folder[2],$dataset_file_name[2],$gids,"table3");
}else{
  $data1=get_data($dataset_folder[0],$dataset_file_name[0],$gids,"table1");
  $data2=get_data($dataset_folder[1],$dataset_file_name[1],$gids,"table2");
}

// var_dump($data1);
// load expressions colors and ranges
include_once realpath("../functions/01_expr_colors_range.php");

// create cartoons
include_once realpath("../functions/03_expr_load_cartoons_html.php");

// create lines graph
include_once realpath("../functions/03_expr_load_bars_html.php");

// create heatmap
include_once realpath("../functions/03_expr_load_heatmap_html.php");

// create replicates graph
include_once realpath("../functions/03_expr_load_replicates_html.php");

// create data table
include_once realpath("../functions/03_expr_load_avg_table_html.php");


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

<script>
  $(document).ready(function() {
    
    $("#loader_main").hide();
    $("#expression_output").show();
  })
</script>