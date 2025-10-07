  
<html>
<div class="collapse_section pointer_cursor banner" data-toggle="collapse" data-target="#avg_table" aria-expanded="true">
  <!-- <i class="fas fa-sort" style="color:#229dff"></i> Average Values Table -->
  <i class="fas fa-sort"></i> Average Values Table
</div>
<div id="avg_table" class="collapse hide">
<?php  
  echo "<div class=\"loader\"></div>";
  echo "<div id=\"tables_div\" style=\"display:none\">";
  if(isset($data1))
    {echo "<b><i><h3 style=\"text-align:center;margin-top:20px;\">"."Single Cell RNA-seq"."</h3></i></b>";
    if ($data1["table"] != null) echo implode($data1["table"])."<hr>";
    else echo "<p class=\"alert alert-secondary\" style=\"text-align:center;\">"."Not results"."</p>"."<hr>";}
  if(isset($data2))  
    {echo "<b><i><h3 style=\"text-align:center; margin-top:20px;\">"."Bulk RNA-seq"."</h3></i></b>";
    if ($data2["table"] != null) echo implode($data2["table"])."<hr>";
    else echo "<p class=\"alert alert-secondary\" style=\"text-align:center;\">"."Not results"."</p>"."<hr>";}
  if(isset($data3))  
    {echo "<b><i><h3 style=\"text-align:center; margin-top:20px;\">"."Proteomics"."</h3></i></b>";
    if ($data3["table"] != null) echo implode($data3["table"])."<hr>";
    else echo "<p class=\"alert alert-secondary\" style=\"text-align:center;\">"."Not results"."</p>"."<hr>";}
    // echo "<b><i><h3 style=\"text-align:center;margin-top:20px;\">"."Proteomics"."</h3></i></b>";
    // if ($data4["table"] != null) echo implode($data4["table"])."<hr>";
    // else echo "<p class=\"alert alert-secondary\" style=\"text-align:center;\">"."Not results"."</p>"."<hr>";
    echo "</div>";
    ?>
</div>
<!-- data_table_frame end -->
</html>

<style>
   table.dataTable td,th  {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis; 
  }
  
    .td-tooltip {
      cursor: pointer;
    }
</style>

<script src="../functions/datatable.js"></script>
<script>
$(document).ready(function() {
  var table_id = ["#table1","#table2","#table3"];

  $('#avg_table').on('shown.bs.collapse', function() {

    $(".loader").hide();
    $("#tables_div").show();

  for(var i = 0; i < table_id.length; i++) {
    
    datatable(table_id[i],i);
  }
  //   $(table_id[i]).dataTable({
  //     dom:'Bfrtlpi',

  //     "oLanguage": {
  //       "sSearch": "Filter by:"
  //       },
  //     buttons: [
  //       'copy','print', 'csv', 'excel',
  //         {
  //           extend: 'pdf',
  //           orientation: 'landscape',
  //           pageSize: 'LEGAL'
  //         },
  //        'colvis'
  //       ],
  //     "sScrollX": "100%",
  //       "sScrollXInner": "110%",
  //       "bScrollCollapse": true,
  //       retrieve: true, 
  //       "drawCallback": function( settings ) {
  //       $(".td-tooltip").tooltip();
  //     },
  //   });

  // $(".dataTables_filter").addClass("float-right");
  // $(".dataTables_info").addClass("float-left");
  // $(".dataTables_paginate").addClass("float-right");
});

});
  
</script>
