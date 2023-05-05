
  <div class="row" style='margin-left:0px; margin-right:0px; ?>'>
      
      <div class="container-fluid" style="padding:0px;">
        
        <div class="cover_img">
          <h1 id="welcome_h1"><img src='<?php echo "$images_path/db_logo_large.png";?>' alt="DB_Logo" style="height:200px;"> Welcome to the Skeletal Atlas</h1>
          <div id="button_div">
            <a id="start_button" href="/easy_gdb/tools/expression/expression_input.php" class="btn btn-info">Start</a>
          </div>
        </div>
      
     </div>

  </div>


<!-- Construction Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Warning!</h4>
      </div>

      <!-- Modal body -->
      <div class="modal-body" style="text-align: center;">
         <img src='<?php echo "$images_path/warning.png";?>' />
<br>
<br>
        This site is under construction!
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<script>
$("#myModal").modal();
</script>



<style>

  #welcome_h1 {
    text-align:center;
    margin:auto;
    margin-bottom: 30px;
    padding-top:200px;
    color:#fff;
    font-size:58px;
    text-shadow: 0px 0px 45px #333;
  }
  
  #button_div {
    margin: 0;
    position: absolute;
    left: 50%;
    /*margin-top: 30px;*/
    margin-left: -75px;
  }
  
  #start_button {
    font-size:42px; 
    line-height:0.9; 
    width: 150px;
  }

.cover_img {
  background-repeat: no-repeat;
  background-attachment: fixed;  
  background-size: cover;
  height: 700px;
}

.page_container {
  background-image: <?php echo "url($images_path/welcome_page.jpg)" ?>;
  background-repeat: no-repeat;
  background-attachment: fixed;  
  background-size: cover;
}

#index_container {
  max-width:100% !important;
}

#gdb_footer {
  margin-top:0px !important;
}

</style>

