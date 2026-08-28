<br>
<div class="width900">
  <div class="row">
    <div class="col-12">

      <!-- Data Submission -->
      <h1 class="text-center">Data Submission <i class="fa fa-envelope" style="color:#555"></i></h1>
      <br>
      <div id="tool-container" class="form margin-20" style="margin:auto; max-width:900px">

        <!-- Instructions -->
        <div id="color_default\" class="alert alert-primary" role="alert" style="display:block;margin:0px">
          <div class="card-body" style="padding:0px;text-align:center">
            Please, <a>contact us</a> if you would like to submit a expression dataset to the Skeletal Atlas.
            <br>
            Check out <a href='<?php echo "$images_path/expression_data.png";?>' target="_blank">this example</a> for additional information about the  expression data format.
          </div>
        </div>
        <br>

        <!-- List -->
        <div class="form-group">
          <label for="message"><strong>Message</strong></label>
          <textarea class="form-control" id="message" name="message" rows="6" required placeholder="Describe your dataset, organism, methods, accession IDs, and any relevant notes."></textarea>
        </div>
        <div class="text-center">
          <button type="button" class="btn btn-info" onclick="contt()">
            Submit <i class="fa fa-paper-plane"></i>
          </button>
        </div>
      </div>
    </div>
  </div>
</div>


<script>
  function contt() {
    var msg = document.getElementById("message").value.trim();
    var addr = "duran" + '>' + "uma_es";
    addr = addr.replace(/_/g, ".");
    addr = addr.replace(">", "@");

    window.location.href = 'mailto:ij' + addr + '?subject=SkeletalAtlas Data Submission' + '&body=' + encodeURIComponent(msg);
  }
</script>


<style>
  #contact_link {
    color: #007bff;
    cursor: pointer;
  }
</style>