<div class="row">
          <div class="small-10 small-centered columns">
    <div class="content">
    <div class="text-center"> <?php $this->renderFeedbackMessages(); ?> </div>
    <div class="login-default-box">
        <h2 class="text-center">Welcome</h2>
        <form action="<?php echo URL; ?>login/login" method="post">
                <label>E-mail</label>
                <input type="text" name="user_name" required />
                <label>Password</label>
                <input type="password" name="user_password" required />
                <input type="checkbox" name="user_rememberme" class="remember-me-checkbox" />
                <label class="remember-me-label">Keep me logged in</label>
                <input type="submit" id="loginSubmit" class="login-submit-button button" />
        </form>
        <div class="loginText">
        <a href="<?php echo URL; ?>login/register">Register</a>
        |
        <a href="<?php echo URL; ?>login/requestpasswordreset">Forgot Password</a>
        </div>
    </div>

    <?php if (FACEBOOK_LOGIN == true) { ?>
    <div class="login-facebook-box">
        <h1>or</h1>
        <a href="<?php echo $this->facebook_login_url; ?>" class="facebook-login-button">Log in with Facebook</a>
    </div>
    <!-- echo out the system feedback (error and success messages) -->
    <?php } ?>
        </div>
    </div>
</div>