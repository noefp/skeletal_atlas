<?php include_once realpath("../../../../easy_gdb/header.php");?>

<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class ="page_container">
  <div>
    <a class="float-right margin-20" href="/easy_gdb/help/08_gene_expression.php" target="_blank"><i class='fa fa-info' style='font-size:20px;color:#229dff'></i> Help</a>
  </div>
  <br>
  <h3 class="text-center" style="color:#653f28">Mouse Basic Atlas</h3>

  <div class="form margin-20">
    <form id="get_expression_form" action="expression_output.php" method="post">       
      <div class="form-group">
        <div class="row">
          <div class="col-sm-6 col-md-6 col-lg-6">
    
           <div class="form-group">
            <label for="autocomplete_gene">Find your gene/metabolite by name:</label>
      
            <div class="input-group mb-3">
              <input id="autocomplete_gene" type="text" class="form-control form-control-lg" placeholder="gene/metabolite name">
              <div class="input-group-append">
                <button id="add_gene_btn" class="btn btn-success"><i class="fas fa-angle-double-right" style="font-size:28px;color:white"></i></button>
              </div>
            </div>      
          </div>    
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6">
          <!-- <a class="float-right" href="/easy_gdb/tools/expression/expression_menu.php" target="_blank" ><i style='font-size:20px;color:#229dff' ></i> Dataset information</a> -->
          <label for="InputGenes">Paste a list of gene IDs</label>
          <textarea class="form-control" id="InputGenes" rows="8" name="gids">
          </textarea>
          <br>    
        </div>
      </div>      
      <button class="button btn btn-info float-right" id="btnSend" type="submit" form="get_expression_form" formmethod="post">Get Expression</button>      
    </form>
    <br>
    <br>
  </div>
</div>

<footer>
<?php include realpath('../../../../easy_gdb/footer.php'); ?>
</footer>

<style>
  
  .ui-autocomplete {
    max-height: 160px;
    overflow-y: auto;
    /* prevent horizontal scrollbar */
    overflow-x: hidden;
  }

  * html .ui-autocomplete {
    height: 160px;
  }
  </style>


<script>
  $(document).ready(function () {
    
    //call PHP file ajax_get_names_array.php to get the gene list to autocomplete from the selected dataset file
    function ajax_call(expr_file,expr_file_path) {
      jQuery.ajax({
        type: "POST",
        url: 'ajax_get_names_array.php',
        data: {'expr_file': expr_file, 'expr_file_path': expr_file_path},

        success: function (names_array) {
          var names = JSON.parse(names_array);
          
          $( "#autocomplete_gene" ).autocomplete({
            source: function(request, response) {
              var results = $.ui.autocomplete.filter(names, request.term);
              response(results.slice(0, 15));
              if(results == "")
              {$('#autocomplete_gene').css("background-color",'#f17c7c')}
              else {$('#autocomplete_gene').css("background-color", "white")}
            }
          });
        }
      });
    }; // end ajax_call function
    
    
    $('#add_gene_btn').click(function () {
      var selected_gene = $('#autocomplete_gene').val();
      // alert("selected_gene: "+selected_gene);
      event.preventDefault(); // cancel submission default behavior

      var box_val = $('#InputGenes').val();

      if ( box_val ) {
        $('#InputGenes').val(box_val+"\n"+selected_gene);
        //alert("full");
      }
      else {
        $('#InputGenes').val(selected_gene);
        //alert("empty");
      }
      
    });
  
    
    $('#get_expression_form').submit(function () {
      var gene_lookup_input = $('#InputGenes').val();
      var gene_count = (gene_lookup_input.match(/.+\n?/g)||[]).length
      
      if (gene_count == 0) {
          //alert("No genes were included in the analysis. Gene count: "+gene_count+". Please, add some gene IDs to the input list box.");
          Swal.fire({
                  title: "<b>ERROR</b>",
                  html: `No genes were included in the analysis.<br>
                  Please, add some gene IDs to the input list box`,
                  icon: "error"
                });
          return false;
      }
      //check input genes from gene lookup before sending form
      var max_input = "<?php echo $max_expression_input ?>";
      
      if (!max_input) {
        max_input = 15;
      }
      
      if (gene_count > max_input) {
          alert("A maximum of "+max_input+" sequences can be provided as input, your input has: "+gene_count);
          return false;
      }

      return true;
    });

    $("#InputGenes").val(["Col1a1","Col2a1","Matn3","Prg4","Cdh5","Dmp1"].join("\n"));

  // call ajax_call function to get the gene list to autocomplete

var autocomplete_files=["00_mouse_basic_atlas_v07.txt","proteomics_tissues_atlas_v01.txt","sc_mouse_basic_atlas_v01.txt"];
  //var autocomplete_file= "/var/www/html/expression_data/skeletal_atlas/01mouse_basic_atlas/00_mouse_basic_atlas_v07.txt";
  
  expr_file_path = "<?php echo $expression_basic_atlas_path; ?>";
  
  
  ajax_call(autocomplete_files,expr_file_path);
  });
</script>

<style>
.page_container {
    background-image: linear-gradient(#d9bf9e,#ffffff);
  }
</style>