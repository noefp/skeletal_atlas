  <!-- ############################################################### Load ranges an colors expressions -->

<?php
$colors_array=[];
$ranges_text_array=[];
$ranges_array=[];
$expression_colors=false;
$expression_info_json = false;



  if(!isset($colors) || !isset($ranges_text) || !isset($ranges) || empty($colors) || empty($ranges_text) || empty($ranges) || (count($colors) != count($ranges_text)) ||  (count($ranges_text) != count($ranges)))
  {
    // Default colours and ranges of expression
    $colors = ["#eceff1","#b3e5fc","#80cbc4","#ffee58","#ffb74d","#ff8f00","#ff4f00","#cc0000","#D72C79","#801C5A","#6D3917"];
    $ranges_text =["<1",">=1",">=2",">=5",">=10",">=50",">=100",">=200",">=500",">=1000",">=5000"];
    $ranges=[[0,0.99],[1,1.99],[2,4.99],[5,9.99],[10,49.99],[50,99.99],[100,199.99],[200,499.99],[500,999.99],[1000,4999.99],[5000,50000]];
  }

  if ( file_exists($GLOBALS['json_files_path']."/tools/expression_info.json")) {
    $annot_json_file = file_get_contents($GLOBALS['json_files_path']."/tools/expression_info.json");
    $annot_hash = json_decode($annot_json_file, true);
    $expression_info_json = true;
  }

  foreach($dataset_file_name as $dataset_name_ori){  

    // foreach($dataset_file_name as $dataset_name_ori){
      $annot_hash_color=isset($annot_hash[$dataset_name_ori]['expression_colors']) ? $annot_hash[$dataset_name_ori]['expression_colors'] : false;
      if($annot_hash_color)
      {
        if(count(array_diff(['colors','ranges_txt','ranges'],array_keys($annot_hash_color))) === 0)
          {
            if((count($annot_hash_color['colors'])||count($annot_hash_color['ranges_txt'])||count($annot_hash_color['ranges_txt'])) !=0 ) // if json variables aren`t empty 
            {
              if((count($annot_hash_color['colors']) == count($annot_hash_color['ranges_txt'])) && (count($annot_hash_color['ranges_txt']) == count($annot_hash_color['ranges'])))
              {
                $expression_colors=true;
              }
            }
          }
      }
     

    if (!$expression_colors)
    {array_push($colors_array,$colors);
      array_push($ranges_text_array,$ranges_text);
      array_push($ranges_array,$ranges);
    }else{
        array_push($colors_array,$annot_hash_color['colors']);
        array_push($ranges_text_array,$annot_hash_color['ranges_txt']);
        array_push($ranges_array,$annot_hash_color['ranges']);
        $expression_colors=false;
    }
  }

?>

<script type='text/javascript'>
   // get JSON values
    const colors_array= <?php echo json_encode($colors_array)?>;
    const ranges_text_array =<?php echo json_encode($ranges_text_array)?>;
    const ranges_array =<?php echo json_encode($ranges_array)?>;
</script>