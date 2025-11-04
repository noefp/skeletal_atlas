<!-- #####################             Heatmap             ################################ -->
<html>
<center>
  
  <div id="banner_heatmap" class="collapse_section pointer_cursor banner" data-toggle="collapse" data-target="#heatmap_graph" aria-expanded="true">
    <!-- <i class="fas fa-sort" style="color:#229dff"></i> Heatmap -->
    <i class="fas fa-sort"></i> Heatmap
  </div>

  <div id="heatmap_graph" class="hide collapse">
    <div id="chart1_frame" style="border:2px solid #666; padding-top:7px">
      <button id="red_color_btn" type="button" class="btn btn-danger">Red palette</button>
      <button id="blue_color_btn" type="button" class="btn btn-primary">Blue palette</button>
      <button id="range_color_btn" type="button" class="btn " style="color:#FFF">Color palette</button>
<?php
  // if($atlas=="mouse_atlas")
  // {
    
    if(isset($data1) && !empty($data1["heatmap"]))
      {echo '<div id="chart1" style="min-height: 400px;border-bottom:2px solid #666"></div>';}
    if(isset($data2) && !empty($data2["heatmap"]))
      {echo '<div id="chart2" style="min-height: 400px;border-bottom:2px solid #666"></div>';}
    if(isset($data3) && !empty($data3["heatmap"]))
      {echo '<div id="chart3" style="min-height: 400px;border-bottom:2px solid #666"></div>';}
  // }else{
      // echo '<div id="chart1" style="min-height: 400px;border-bottom:2px solid #666"></div>
      // <div id="chart2" style="min-height: 400px;border-bottom:2px solid #666"></div>'; 
  // }
?> 
    </div>
  </div>
</center>
</html>


<!-- JavaScript -->
<!-- <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>  -->

<script type="text/javascript">
  var sample_array=[];
  var heatmap_series=[]; 
  var samples_found = <?php echo json_encode($gids) ?>;

  sample_array[0] = <?php echo(isset($data1) ? json_encode($data1["header"]) : '[]') . ";\n" ?>;
  heatmap_series[0] = <?php echo (isset($data1) ? json_encode(array_reverse($data1["heatmap"])) : '[]') . ";\n"; ?>;

  sample_array[1] = <?php echo(isset($data2) ? json_encode($data2["header"]) : '[]') . ";\n" ?>;
  heatmap_series[1] = <?php echo (isset($data2) ? json_encode(array_reverse($data2["heatmap"])) : '[]') . ";\n"; ?>;

  sample_array[2] = <?php echo(isset($data3) ? json_encode($data3["header"]) : '[]') . ";\n" ?>;
  heatmap_series[2] = <?php echo (isset($data3) ? json_encode(array_reverse($data3["heatmap"])) : '[]') . ";\n"; ?>;
</script>

<script src="../functions/heatmap_graph.js"></script>

<style>
  #range_color_btn{
/*  height: 50px;*/
  border-color: #b71005;
  background: -moz-linear-gradient(-90deg, #f0c320 0%,#f0c320 25%,#ff8800 50%,#ff7469 51%,#ff0000 100%);
  background: -webkit-linear-gradient(-90deg, #f0c320 0%,#f0c320 25%,#ff8800 50%,#ff7469 51%,#ff0000 100%);
  background: linear-gradient(90deg, #f0c320 0%,#f0c320 25%,#ff8800 50%,#ff7469 51%,#ff0000 100%);
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f0c320', endColorstr='#ff0000',GradientType=1 );
  }
</style>

