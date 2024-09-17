<html>
<div class="collapse_section pointer_cursor banner" data-toggle="collapse" data-target="#avg_table" aria-expanded="true">
  <!-- <i class="fas fa-sort" style="color:#229dff"></i> Average Values Table -->
  <i class="fas fa-sort"></i> Average Values Table
</div>
<div id="avg_table" class="collapse hide">
  <?php  
    echo "<b><i><h2 style=\"text-align:center;\">"."Single Cell RNA-seq"."</h2></i></b>";
    echo implode($data1["table"]);
    echo "<b><i><h2 style=\"text-align:center;\">"."Bulk RNA-seq"."</h2></i></b>";
    echo implode($data2["table"]);
    echo "<b><i><h2 style=\"text-align:center;\">"."Proteomics"."</h2></i></b>";
    echo implode($data3["table"]);
    ?>
</div>
<!-- data_table_frame end -->
</html>
