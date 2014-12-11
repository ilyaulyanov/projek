<div class="editusername">
<div class="row">
          <div class="small-10 small-centered columns">
<div class="content">
    <h2 class="text-center">Change your profile</h2>

    <!-- echo out the system feedback (error and success messages) -->
    <?php $this->renderFeedbackMessages(); ?>

    <form action="<?php echo URL; ?>login/editusername_action" method="post">
        <label>Enter New Username:</label>
        <input type="text" name="user_name" required />
        <p class ="text-center"><a href="http://127.0.0.1:8080/projek/dashboard/index">Go Back To Dashboard</a></p>
        <p><!-- --></p>
        <input class="usernamebtn button" type="submit" value="Submit" />
    </form>
</div>
</div>
</div>
</div>