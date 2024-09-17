
<?php
    function load_links_dataset_names($name_file,$ID)
 {
     if ( file_exists($GLOBALS["expression_path"]."/expression_info.json")) {
         $annot_json_file = file_get_contents($GLOBALS["expression_path"]."/expression_info.json");
         $annot_hash = json_decode($annot_json_file, true);
         $annot_link =$annot_hash[$name_file]["link"];
         $query_id=str_replace("query_id",$ID,$annot_link);
         return "<a href=\"$query_id\" target=\"_blank\">".$ID."</a>";}
    else {
       return "file not gound";
    }
  }
?>
