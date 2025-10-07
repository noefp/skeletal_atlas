<!-- #####################             Lines             ################################ -->
<html>
<center>
  
  <div  id="banner_bars" class="collapse_section pointer_cursor banner" data-toggle="collapse" data-target="#line_chart_frame" aria-expanded="true">
    <!-- <i class="fas fa-sort" style="color:#229dff"></i> Bars -->
    <i class="fas fa-sort"></i> Bars Graph
  </div>

  <div id="line_chart_frame" class="collapse hide" style="border:2px solid #666; padding-top:7px">
    

    <div id="lines_frame">
      <button id="bars_btn" type="button" class="btn btn-primary">Bars</button>
      <button id="lines_btn" type="button" class="btn btn-danger">Lines</button>
<?php
  if($atlas=="mouse_atlas")
    { echo '<div id="chart_bar1" style="min-height: 550px;border-bottom:2px solid #666"></div><br>';
      echo '<div id="chart_bar2" style="min-height: 550px;border-bottom:2px solid #666"></div><br>';
      echo '<div id="chart_bar3" style="min-height: 550px;"></div><br>';
    }
  else
    { echo '<div id="chart_bar1" style="min-height: 550px;border-bottom:2px solid #666"></div><br>';
      echo '<div id="chart_bar2" style="min-height: 550px;"></div><br>';
    }
//---- load data --------------------------------------------------------------------------
?>
      
    </div>    
  </div>
</center>
</html>

<!-- JavaScript -->
<!-- <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>  -->


<script type="text/javascript">
  var atlas=<?php echo json_encode($atlas) ?>;
  var sample_array=[];
  var bar_series=[]; 
  var samples_found = <?php echo json_encode($gids) ?>;

  sample_array[0] = <?php echo(isset($data1) ? json_encode($data1["header"]) : '[]') . ";\n" ?>;
  bar_series[0] = <?php echo (isset($data1) ? json_encode(array_reverse($data1["heatmap"])) : '[]') . ";\n"; ?>;

  sample_array[1] = <?php echo(isset($data2) ? json_encode($data2["header"]) : '[]') . ";\n" ?>;
  bar_series[1] = <?php echo (isset($data2) ? json_encode(array_reverse($data2["heatmap"])) : '[]') . ";\n"; ?>;

  sample_array[2] = <?php echo(isset($data3) ? json_encode($data3["header"]) : '[]') . ";\n" ?>;
  bar_series[2] = <?php echo (isset($data3) ? json_encode(array_reverse($data3["heatmap"])) : '[]') . ";\n"; ?>;


</script>
<script src="../functions/apexcharts.min.js"></script>
<script src="../functions/bars_graph.js"></script>