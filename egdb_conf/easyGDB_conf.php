<?php
// File paths
$root_path = "/var/www/html"; //use absolute path
$egdb_files_folder = "skeletal_atlas";
$easy_gdb_path = "$root_path/easy_gdb";
$blast_dbs_path = "$root_path/blast_dbs";
$downloads_path = "downloads";
$lookup_path = "$root_path/lookup"; //from root 
$images_path = "/$egdb_files_folder/egdb_images";
$custom_text_path = "$root_path/$egdb_files_folder/egdb_custom_text";
$species_path = "$root_path/$egdb_files_folder/egdb_species";
$lab_path = "$root_path/$egdb_files_folder/egdb_labs";
$annotations_path = "$root_path/skeletal_atlas/annotations";
$annotation_links_path = "$root_path/$egdb_files_folder/annotations";
$tools_path="$custom_text_path/tools";
$expression_path = "$root_path/expression_data/skeletal_atlas";
$private_expression_path = "$root_path/private_expression_data/skeletal_atlas";
$expression_basic_atlas_path = "$root_path/expression_data/skeletal_basic_atlas";
$json_files_path = "$root_path/$egdb_files_folder/json_files";
$coexpression_path = "$root_path/coexpression_data";

// Custom css file
//$custom_css = 1;
$custom_css_path = "$egdb_files_folder/css/skeletal_atlas.css";

// Select 1 to store annotations in files or 0 to store annotations in a relational database
$file_database = 1;

// header
$dbTitle = "SkeletalAtlas";
$header_img = "";
$db_logo = "db_logo.png";
$warning_debug = 0; // 1 to save all errors and warnings logs. 0 to not save warnings logs but save errors logs

// Toolbar
$tb_rm_home = 0;

$tb_about = 0;
$tb_downloads = 0;
$tb_species = 0;
$tb_search_box = 0;
$tb_tools = 0;
$tb_search = 0;
$tb_blast = 0;
$tb_jbrowse = 0;
$tb_seq_ext = 0;
$tb_annot_ext = 0;
$tb_gene_expr = 0;
$tb_lookup = 0;
$tb_more = 0;
$tb_custom = 1;
$tb_rm_home= 1;

$tb_help = 0;
$tb_private = 0;
$tb_passport = 0;


// Expression Atlas
$expr_menu = 1;
// $expr_cartoons = 1;

// Expression tools order: 0 for not shown, >=1 to setup the order
$positions=[  
  'description' => 1,
  'cartoons' => 2,
  'lines' => 3,
  'cards' => 4,
  'heatmap' => 5,
  'replicates' => 6,
  'table' => 7
];

$colors = ["#eceff1","#b3e5fc","#80cbc4","#ffee58","#ffb74d","#ff8f00","#ff4f00","#cc0000","#D72C79","#801C5A","#6D3917"];
$ranges_text =["<1",">=1",">=2",">=5",">=10",">=50",">=100",">=200",">=500",">=1000",">=5000"];
$ranges=[[0,0.99],[1,1.99],[2,4.99],[5,9.99],[10,49.99],[50,99.99],[100,199.99],[200,499.99],[500,999.99],[1000,4999.99],[5000,50000]];

// Index
$rm_citation = 1;

// About
$ab_citation = 0;
$ab_labs = 1;

//Gene examples
$gene_sample = "";
$input_gene_list="0610005C13Rik
0610007P14Rik
0610009B22Rik
0610009L18Rik
0610009O20Rik";


// Tools
$max_lookup_input = 10000;
$max_extract_seq_input = 10000;
$max_blast_input = 20;
$max_expression_input=20;



// BLAST
$blast_example=">protein_or_DNA
ATGAGTTGTGGGGAGGGATTTATGTCACCACAAATAGAGACTAAAGGAAGTGTTGGATTC
AAAGCGGGTGTTAAAGAGTACAAATTGATTTATTATACTCCTGAATACGAAACCAAAGAT
ACCGATATCTTGGTAACATTTCGAGTAACTCCTCAACCTGGAGTTTCGCCTGTAGAAGCA";

?>

