<!-- In this file the welocome page is created where you can select the worck tools -->
<html>
  <div class="cover_img">
    <h1 id="welcome_h1"><img src='<?php echo "$images_path/db_logo_large.png";?>' alt="Mouse_Logo" style="height:200px;"> Welcome to the Skeletal Atlas</h1>
  </div>

  <div id="box" class="width900">
    <div class="row">
      <div class="select">
        <a href="/easy_gdb/tools/expression/comparator_input.php" class="d-flex zoom-img">
          <img src="<?php echo $images_path.'/tools/exp_comparator.png'?>" alt="expression viewer" width="250px" height="250px" class="solid alignnone size-medium wp-image-3011 rounded-circle image">
        </a>
        <div class="text">
          <strong>Expression Comparator</strong>
        </div>
      </div>
      <div class="select">
        <a href="/skeletal_atlas/egdb_custom_text/tools/expression/expression_input.php" class="d-flex zoom-img">
          <img src="<?php echo $images_path.'/tools/multi_reference.png'?>" alt="reference" width="350px" height="350px" class="solid alignnone size-medium wp-image-3011 rounded-circle image" >
        </a>
        <div class="text">
          <strong>Multiomics Reference Atlas</strong>
        </div>
      </div>
      <div class="select">
        <a href="/easy_gdb/tools/expression/expression_input.php" class="d-flex zoom-img">
          <img src="<?php echo $images_path.'/tools/exp_expre_viewer.png'?>" alt="Comparator" width="250px" height="250px" class="solid alignnone size-medium wp-image-3011 rounded-circle image">
        </a>  
        <div class="text">
          <strong>Experiment Expression Viewer</strong>
        </div>
      </div>
    </div>
  </div>
</html>


<!-- Style css -->
<style>      
  #welcome_h1 {
    text-align:center;
    margin:auto;
    margin-bottom: 30px;
    padding-top:10px;
    color:rgb(101, 63, 40);
    font-size:48px;
    /*text-shadow: 0px 0px 40px rgb(115, 109, 107);*/   
  }

  .select {
    margin:auto;
    /*margin:flex;*/
  }

  .image {
    background-color:#fff;
/*    background-image: linear-gradient(#ffffff,#ffffff);*/
  }
  .text {
    text-align:center;
    font-size:20px;
  }

  .page_container {
/*    background-image: linear-gradient(#d9bf9e,#ffffff);*/
    background-image: linear-gradient(#f9dfbe,#ffffff);
  }
  
  
</style>
