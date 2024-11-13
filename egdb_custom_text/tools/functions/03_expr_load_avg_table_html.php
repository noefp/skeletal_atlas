  
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

<script>
$(document).ready(function() {
  $('#avg_table').on('shown.bs.collapse', function() {
    $(".tblResults").dataTable({
      dom:'Bfrtlpi',
      "oLanguage": {
        "sSearch": "Filter by:"
        },
      buttons: [
        'copy','print', 'csv', 'excel',
          {
            extend: 'pdf',
            orientation: 'landscape',
            pageSize: 'LEGAL'
          },
         'colvis'
        ],
      "sScrollX": "100%",
        "sScrollXInner": "110%",
        "bScrollCollapse": true,
        retrieve: true, 
        "drawCallback": function( settings ) {
        $(".td-tooltip").tooltip();
      },
    });

  $(".dataTables_filter").addClass("float-right");
  $(".dataTables_info").addClass("float-left");
  $(".dataTables_paginate").addClass("float-right");

});
});
  
</script>
