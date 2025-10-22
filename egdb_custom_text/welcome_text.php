<!-- In this file the welocome page is created where you can select the worck tools -->
<html>
  <div class="cover_img">
    <h1 id="welcome_h1"><img src='<?php echo "$images_path/db_logo_large.png";?>' alt="Mouse_Logo" style="height:200px;"> Welcome to the Skeletal Atlas</h1>
  </div>

  <div id="box" class="width900">
     <div class="row">

    <div class="select">
      <form action="/skeletal_atlas/egdb_custom_text/tools/expression/expression_input.php" method="get">
      <button style="all:unset;cursor:pointer;" type="submit">
        <a  class="d-flex zoom-img">
          <img src="<?php echo $images_path.'/tools/Human1.png'?>" alt="Comparator" width="280px" height="280px" class="solid alignnone size-medium wp-image-3011 rounded-circle image">
        </a></button>
        <input name="atlas" value="human_atlas" style="display: none;">
        <div class="text">
          <strong>Human Reference Atlas</strong>
        </div>
      </form>
      </div>

    <div class="select"> 
      <a href="/easy_gdb/tools/expression/expression_input.php" class="d-flex zoom-img">
        <img src="<?php echo $images_path.'/tools/multi_reference.png'?>" alt="expression viewer" width="280px" height="280px" class="solid alignnone size-medium wp-image-3011 rounded-circle image">
      </a>
      <div class="text">
        <strong>Experiment Expression Viewer</strong>
      </div>
    </div>

    <div class="select">
      <form action="/skeletal_atlas/egdb_custom_text/tools/expression/expression_input.php" method="get">
      <button style="all:unset;cursor:pointer;" type="submit">
        <a  class="d-flex zoom-img">
          <img src="<?php echo $images_path.'/tools/Mouse1.png'?>" alt="reference" width="280px" height="280px" class="solid alignnone size-medium wp-image-3011 rounded-circle image" >
        </a></button>
        <input  name="atlas" value="mouse_atlas" style="display: none;">
        <div class="text">
          <strong> Mouse Reference Atlas</strong>
        </div>
      </form>
      </div>      

    </div>
  </div>
</html>


<!-- Style css -->
<style> 
#box{
  min-height: 50dvh !important;
}     
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
    /* background-color:white; */
    background:linear-gradient(#ffebd1ff,#ffffff);
    /* backdrop-filter: blur(6px); */
/*    background-image: linear-gradient(#ffffff,#ffffff);*/
  }
  .text {
    text-align:center;
    font-size:20px;
    backdrop-filter: blur(1px);
  }

  .page_container {
/*    background-image: linear-gradient(#d9bf9e,#ffffff);*/
    /* background: linear-gradient(#f9dfbe,#ffffff); */
    /* background-image: url("<?php //echo $images_path; ?>/fondo.png");
     /* Ajustes recomendados */
    /* background-repeat: no-repeat;   evita que se repita */
    /* background-size: center;       ajusta la imagen al contenedor */
      /* background-position: center;    centrada */ 

    background: 
    /* linear-gradient(to bottom, #ffebd1ff 0%, rgba(255,255,255,0) 20%, rgba(255,255,255,0) 80%, rgba(255,255,255,1) 100%), */
    url("<?php echo $images_path; ?>/fondo.png") no-repeat center center,
    linear-gradient(#f9dfbe,#ffffff);
  
    background-size: cover;
  }

#gdb_footer{
  margin-top: 0px !important;
}
  
</style>
