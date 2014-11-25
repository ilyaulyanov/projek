<div class="row">
          <div class="small-10 small-centered columns">
<div class="content">
        <div class="register-box">
    <h2 class="text-center">Reset Password</h2>

    <!-- echo out the system feedback (error and success messages) -->
    <?php $this->renderFeedbackMessages(); ?>

    <!-- request password reset form box -->
    <form method="post" action="<?php echo URL; ?>login/requestpasswordreset_action" name="password_reset_form">
        <p>
            Enter your email and you'll get a mail with instructions:
        </p>
        <input id="password_reset_input_username" class="password_reset_input" type="email" name="user_name" required />
        <input type="submit" id="request-password-button" class="button" name="request_password_reset" value="Reset my password" />
    </form>
        </div>
</div>
</div>
</div>