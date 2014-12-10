<div class="editemail">
<div class="row">
          <div class="small-10 small-centered columns">
<div class="content">
    <h2 class="text-center">Change your Email</h2>

    <!-- echo out the system feedback (error and success messages) -->
    <?php $this->renderFeedbackMessages(); ?>

    <form action="<?php echo URL; ?>login/edituseremail_action" method="post">
        <label>Enter New Email:</label>
        <input type="text" name="user_email" required />
        <p class ="text-center"><a href="http://127.0.0.1:8080/projek/dashboard/index">Go Back To Dashboard</a></p>
        <p><!-- --></p>
        <input class="emailbtn button" type="submit" value="Submit" />
    </form>
</div>
</div>
</div>
</div>