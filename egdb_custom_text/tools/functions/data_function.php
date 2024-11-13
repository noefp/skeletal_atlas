<head>
<?php include ("$tools_path/functions/02_expr_load_links.php");?>
</head>

<?php

ini_set('memory_limit', '256M'); // set memory limit php

// $scatter_one_gene = [];
$scatter_one_sample =[];
$scatter_all_genes = [];
$replicates_all_genes = [];

// $table_code_array = [];

function get_data($expr_file,$gids)
{        
    // echo $expr_file;
    $name_file =str_replace(".txt","",$expr_file);
    
    $expr_file_path= $GLOBALS["expression_basic_atlas_path"]."/".$expr_file;

    if(file_exists("$expr_file_path") && isset($gids))
    {
        $tab_file = file("$expr_file_path");
        // var_dump($tab_file);
        $first_line = array_shift($tab_file);
        $header = explode("\t", rtrim($first_line));
        
        $columns = [];
        $replicates = [];
        $replicates_all=[];
        $found_genes=[];
        $scatter_all_genes=[];


        //gets each replicate value for each gene
        foreach ($tab_file as $line) {
            $columns = explode("\t", rtrim($line));
            $gene_name = $columns[0];

            // if gene found in input list
            if ( in_array(strtolower($gene_name), array_map("strtolower", $gids)) ) {
                array_push($found_genes,$gene_name);

                foreach ($columns as $col_count => $col) {
                    $sample_name = $header[$col_count];
                    if ($col_count != 0) {
                        if ($replicates[$sample_name]) {
                            array_push($replicates[$sample_name], $col);
                        } else {
                            $replicates[$sample_name] = [];
                            array_push($replicates[$sample_name], $col);
                    }
                    }
                } // end column foreach
                $replicates_all[$gene_name]=$replicates;
                $replicates = [];
            }
        }
//------------------------------------------------End gets each replicate value for each gene-------------------------------------------------------------------------------------------------------------------------------
        $table_code_array = [];
        $heatmap_one_gene = [];
        $heatmap_series = [];
        $cartoons_all_genes = [];
    
        // create header table with sample names       
        if($found_genes)
        { 
            array_push($table_code_array,"<div style=\"margin: auto; overflow: auto;\"><table class=\"tblResults inline-box table table-striped table-bordered\">");
            $header_content = [];
            array_push($table_code_array, "<thead><tr><th style=\"text-align:center\">"."ID"."</th>");

            $sample_names =array_keys($replicates_all[$found_genes[0]]);

            foreach ($sample_names as $r_key ) {
                // echo "<th>$r_key</th>";
                array_push($header_content,$r_key);
                array_push($table_code_array,"<th style=text-align:center>$r_key</th>");
                //echo "<p>".$r_key."</p>";
            }
            array_push($table_code_array,"</tr></thead><tbody>");
            //array_push($table_code_array,"</tbody></table></div>");
            //return $table_code_array;

// ------------------------------------------------------- End create the header table------------------------------------------------------------------------------------------------------------------------
// ---------------------------------------------------------Get average data table-------------------------------------------------------------------------------------------------------------
         $scatter_pos = 1;
             // set the ensembl links and ID names into column ID 

            foreach(array_keys($replicates_all) as $ID)
            {
                array_push($table_code_array,"<tr>");
                $link=load_links_dataset_names($expr_file,$ID);
                array_push($table_code_array,"<td style=\"text-align:center\">$link</td>");
                //echo "<p>".var_dump($replicates_all[$ID])."</p>";

        // print expression average values $r_key is like "Sample1" and $r_value is like [4.4,2.3,8.1]
                foreach ($replicates_all[$ID] as $r_key => $r_value) {
                $average = 0;
                $zero_values = array_count_values($r_value)['0'];
                $empty_values = count($r_value) - (count(array_filter($r_value)) + $zero_values);
                
            //    echo "array size: ".count($r_value)."<br>";
            //    echo "empty_values: $empty_values<br>";
            //    echo "zero_values: $zero_values<br>";
            
                if (count($r_value) == $zero_values) {
                    $average = 0;
                }
                else if(count($r_value) == $empty_values-$zero_values) {
                    $average = null;
                }
                else if($empty_values) {
                    $a_sum = array_sum($r_value);
                    $a_reps = count($r_value) - $empty_values;
            
                    $average = sprintf("%1\$.2f",$a_sum/$a_reps);
                }
                else {
                
                    $a_sum = array_sum($r_value);
                    $a_reps = count($r_value);
            
                    $average = sprintf("%1\$.2f",$a_sum/$a_reps);
                }
            
                array_push($table_code_array,"<td style=text-align:center>$average</td>");

//------------------------------------- end average data table ----------------------------------------------------------------------------------------
//--------------------------------------save heatmap data-------------------------------------------------------------------------------------------
                $heatmap_one_gene["name"] = $ID;
                
                if ($heatmap_one_gene["data"]) {
                    array_push($heatmap_one_gene["data"], $average);
                } else {
                    $heatmap_one_gene["data"] = [];
                    array_push($heatmap_one_gene["data"], $average);
                }

                //save cartoons data
                //echo "<p>gene_name:[".$ID."] r_key:[".$r_key."] average:[".$average."]</p>";
              //echo("<p>Antes: ".$cartoons_all_genes[$ID]."</p>");

                if ($cartoons_all_genes[$ID]) {
                    $cartoons_all_genes[$ID][$r_key]=$average;;
                } else {
                    $cartoons_all_genes[$ID] = [];
                    $cartoons_all_genes[$ID][$r_key]=$average;
                } // end save cartoons data


                //----------------------save scatter data-------------------------------------------------------------------------------------
        //   //save replicates
          foreach ($r_value as $one_rep) {
            $one_replicate_pair = [$scatter_pos, $one_rep];
            
        //     //save samples and add replicates
            $scatter_one_sample["name"] = $r_key;
            if ($scatter_one_sample["data"]) {
              array_push($scatter_one_sample["data"], $one_replicate_pair );
            } else {
              $scatter_one_sample["data"] = [];
              array_push($scatter_one_sample["data"], $one_replicate_pair );
            }
            
          
          $scatter_pos++;
        }
          
         //   //save gene and add samples with replicates
          if ($scatter_all_genes[$ID]) {
            array_push($scatter_all_genes[$ID],$scatter_one_sample);
          } else {
            $scatter_all_genes[$ID] = [];
            array_push($scatter_all_genes[$ID], $scatter_one_sample );
          }
                    
          $scatter_one_sample = [];
                
        }
        // ----- end scartter data -----------------------------------------------------    

                array_push($heatmap_series, $heatmap_one_gene);
                $heatmap_one_gene = [];
//---------------------- end save heatmap data ---------------------------------------------------------------------------------

                array_push($table_code_array,"</tr>");
// -------------------- end data table-------------------------------------------------------------------------------------------



           
    } //end foreach;

    //echo("<p> Final: ".json_encode($cartoons_all_genes)."</p>");
//   //     array_push($table_code_array,"</tr>");
        
//   //     array_push($heatmap_series, $heatmap_one_gene);
      
      
      
//   //     $replicates = [];
//   //     $heatmap_one_gene = [];
//   //     // $scatter_one_gene = [];
    //   $scatter_one_sample = [];
//   //   } // end if gene in input list
    
    
        // } // each line, each gene foreach
        array_push($table_code_array,"</tbody></table></div><br>");
     } // end table


        $array_all[]=[];
        $array_all["table"]=$table_code_array;
        $array_all["header"]=$header_content;
        $array_all["heatmap"]=$heatmap_series;
        $array_all["cartoons"]=json_encode($cartoons_all_genes);
        $array_all["replicates"]= $scatter_all_genes;
        //  print_r($array_all["replicates"]);

        return $array_all;
    }
    else{
        return (Array)("File: <b>".$expr_file."</b> not found");
    }
}
?>





