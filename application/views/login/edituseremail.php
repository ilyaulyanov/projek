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
        <input class="emailbtn button" type="submit" value="Submit" />
        <p class ="text-center"><?php echo '<a href="'.URL.'dashboard/index">Go Back To Dashboard</a>'; ?></p>
    </form>
</div>
</div>
</div>
</div>