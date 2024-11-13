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
$annotations_path = "$root_path/annotations";
$annotation_links_path = "$root_path/$egdb_files_folder/annotations";
$tools_path="$custom_text_path/tools";
$expression_path = "$root_path/expression_data/skeletal_atlas";
$private_expression_path = "$root_path/private_expression_data/skeletal_atlas";
$expression_basic_atlas_path = "$root_path/expression_data/skeletal_basic_atlas";

// Custom css file
//$custom_css = 1;
$custom_css_path = "$egdb_files_folder/css/skeletal_atlas.css";

// Select 1 to store annotations in files or 0 to store annotations in a relational database
$file_database = 1;

// header
$dbTitle = "SkeletalAtlas";
$header_img = "welcome_page1.jpg";
$db_logo = "db_logo.png";

// Toolbar
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

// Expression Atlas
$expr_menu = 1;
$expr_cartoons = 1;

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


// Index
$rm_citation = 1;

// About
$ab_citation = 1;
$ab_labs = 0;

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

// BLAST
$blast_example=">protein_or_DNA
ATGAGTTGTGGGGAGGGATTTATGTCACCACAAATAGAGACTAAAGGAAGTGTTGGATTC
AAAGCGGGTGTTAAAGAGTACAAATTGATTTATTATACTCCTGAATACGAAACCAAAGAT
ACCGATATCTTGGTAACATTTCGAGTAACTCCTCAACCTGGAGTTTCGCCTGTAGAAGCA";

?>

