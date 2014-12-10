<div class="uploadavatar">
<div class="row">
          <div class="small-10 small-centered columns">
<div class="content">
    <h2 class="text-center">Upload an avatar</h2>

    <!-- echo out the system feedback (error and success messages) -->
    <?php $this->renderFeedbackMessages(); ?>

    <form action="<?php echo URL; ?>login/uploadavatar_action" method="post" enctype="multipart/form-data">
        <p class="text-center" id="avatarDescription">Select an avatar image from your hard-disk (will be scaled to 44x44 px):</p>
        <input type="file" id="fileChosen" name="avatar_file" required />
        <!-- max size 5 MB (as many people directly upload high res pictures from their digital cameras) -->
        <input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
        <p class ="text-center"><a href="http://127.0.0.1:8080/projek/dashboard/index">Go Back To Dashboard</a></p>
        <p><!-- --></p>
        <input class="uploadImg button" name="submit" type="submit" value="Upload image" />
    </form>
</div>
</div>
</div>
</div>