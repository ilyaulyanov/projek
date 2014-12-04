<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Projek</title>
    <meta name="description" content="">
    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1">
    <!-- CSS -->
    <!--<link rel="stylesheet" href="<?php echo URL; ?>public/css/reset.css" />-->
    <!--<link rel="stylesheet" href="<?php echo URL; ?>public/css/style.css" />-->
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/normalize.css" />
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/foundation.css" />
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/foundation-icons.css" />
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/app.css" />
    <script src="<?php echo URL; ?>/public/js/vendor/modernizr.js"></script>
    <!-- in case you wonder: That's the cool-kids-protocol-free way to load jQuery -->
   <!-- <script type="text/javascript" src="//code.jquery.com/jquery-2.1.1.min.js"></script>-->
    
</head>
<body>


  <!--  <img src="<?php echo URL; ?>public/img/nav-but.png" id="nav-but" />-->
<div class="off-canvas-wrap" data-offcanvas>
  <div class="inner-wrap">
<!--    <div class="debug-helper-box">
        DEBUG HELPER: you are in the view: <?php echo $filename; ?>
    </div>

    <div class='title-box'>
        <a href="<?php echo URL; ?>">Projek (very Alpha version)</a>
    </div>-->
<div class="contain-to-grid sticky">
  <nav class="top-bar" data-topbar role="navigation" data-options="sticky_on: large">
    <a class="left-off-canvas-toggle" href="#" ><img src="<?php echo URL; ?>public/img/menu.png" id="menuIcon"></a>
  </nav>
</div>

    

    <!-- Off Canvas Menu -->
    <aside class="left-off-canvas-menu">
        <!-- whatever you want goes here -->
        <ul>
            <?php if (Session::get('user_logged_in') == true):?>
                    <?php if (Session::get('user_logged_in') == true):?>
            <li <?php if ($this->checkForActiveController($filename, "dashboard")) { echo ' class="active" '; } ?> >
                <a href="<?php echo URL; ?>dashboard/index">Dashboard</a>
            </li>
            <?php endif; ?>
            <?php if (Session::get('user_logged_in') == true):?>
            <li <?php if ($this->checkForActiveController($filename, "project")) { echo ' class="active" '; } ?> >
                <a href="<?php echo URL; ?>project/index">My Projects</a>
            </li>
            <?php endif; ?>
            <?php if (Session::get('user_logged_in') == true):?>
                <li <?php if ($this->checkForActiveController($filename, "login")) { echo ' class="active" '; } ?> >
                    <a href="<?php echo URL; ?>login/showprofile">My Account</a>
                    <ul class="sub-menu">
                        <li <?php if ($this->checkForActiveController($filename, "login")) { echo ' class="active" '; } ?> >
                            <a href="<?php echo URL; ?>login/uploadavatar">Upload an avatar</a>
                        </li>
                        <li <?php if ($this->checkForActiveController($filename, "login")) { echo ' class="active" '; } ?> >
                            <a href="<?php echo URL; ?>login/editusername">Edit my profile</a>
                        </li>
                        <li <?php if ($this->checkForActiveController($filename, "login")) { echo ' class="active" '; } ?> >
                            <a href="<?php echo URL; ?>login/edituseremail">Edit my email</a>
                        </li>
                        <li <?php if ($this->checkForActiveController($filename, "login")) { echo ' class="active" '; } ?> >
                            <a href="<?php echo URL; ?>login/logout">Logout</a>
                        </li>
                    </ul>
                </li>
            <?php endif; ?>
        <?php endif; ?>
            <?php if (Session::get('user_logged_in') == false):?>
                <li <?php if ($this->checkForActiveControllerAndAction($filename, "login/index")) { echo ' class="active" '; } ?> >
                    <a href="<?php echo URL; ?>login/index">Login</a>
                </li>
                <li <?php if ($this->checkForActiveControllerAndAction($filename, "login/register")) { echo ' class="active" '; } ?> >
                    <a href="<?php echo URL; ?>login/register">Register</a>
                </li>
            <?php endif; ?>
        </ul>
    </aside>
  <!-- close the off-canvas menu -->


<!--
    <div class="header">
        <div class="header_left_box">
        <ul id="menu">-->
            <!--
            <li <?php if ($this->checkForActiveController($filename, "index")) { echo ' class="active" '; } ?> >
                <a href="<?php echo URL; ?>index/index">Index</a>
            </li>
            
            <li <?php if ($this->checkForActiveController($filename, "help")) { echo ' class="active" '; } ?> >
                <a href="<?php echo URL; ?>help/index">Help</a>
            </li>
            <li <?php if ($this->checkForActiveController($filename, "overview")) { echo ' class="active" '; } ?> >
                <a href="<?php echo URL; ?>overview/index">Overview</a>
            </li>
            <?php if (Session::get('user_logged_in') == true):?>
            <li <?php if ($this->checkForActiveController($filename, "dashboard")) { echo ' class="active" '; } ?> >
                <a href="<?php echo URL; ?>dashboard/index">Dashboard</a>
            </li>
            <?php endif; ?>
            <?php if (Session::get('user_logged_in') == true):?>
            <li <?php if ($this->checkForActiveController($filename, "project")) { echo ' class="active" '; } ?> >
                <a href="<?php echo URL; ?>project/index">My Projects</a>
            </li>
            <?php endif; ?>

            <?php if (Session::get('user_logged_in') == true):?>
                <li <?php if ($this->checkForActiveController($filename, "login")) { echo ' class="active" '; } ?> >
                    <a href="<?php echo URL; ?>login/showprofile">My Account</a>
                    <ul class="sub-menu">
                        <li <?php if ($this->checkForActiveController($filename, "login")) { echo ' class="active" '; } ?> >
                            <a href="<?php echo URL; ?>login/uploadavatar">Upload an avatar</a>
                        </li>
                        <li <?php if ($this->checkForActiveController($filename, "login")) { echo ' class="active" '; } ?> >
                            <a href="<?php echo URL; ?>login/editusername">Edit my profile</a>
                        </li>
                        <li <?php if ($this->checkForActiveController($filename, "login")) { echo ' class="active" '; } ?> >
                            <a href="<?php echo URL; ?>login/edituseremail">Edit my email</a>
                        </li>
                        <li <?php if ($this->checkForActiveController($filename, "login")) { echo ' class="active" '; } ?> >
                            <a href="<?php echo URL; ?>login/logout">Logout</a>
                        </li>
                    </ul>
                </li>
            <?php endif; ?>
-->
            <!-- for not logged in users
            <?php if (Session::get('user_logged_in') == false):?>
                <li <?php if ($this->checkForActiveControllerAndAction($filename, "login/index")) { echo ' class="active" '; } ?> >
                    <a href="<?php echo URL; ?>login/index">Login</a>
                </li>
                <li <?php if ($this->checkForActiveControllerAndAction($filename, "login/register")) { echo ' class="active" '; } ?> >
                    <a href="<?php echo URL; ?>login/register">Register</a>
                </li>
            <?php endif; ?>
        </ul>
        </div>

        <?php if (Session::get('user_logged_in') == true): ?>
            <div class="header_right_box">
                <div class="namebox">
                    Hello <?php echo Session::get('user_name'); ?> !
                </div>
                <div class="avatar">
                    <?php if (USE_GRAVATAR) { ?>
                        <img src='<?php echo Session::get('user_gravatar_image_url'); ?>'
                             style='width:<?php echo AVATAR_SIZE; ?>px; height:<?php echo AVATAR_SIZE; ?>px;' />
                    <?php } else { ?>
                        <img src='<?php echo Session::get('user_avatar_file'); ?>'
                             style='width:<?php echo AVATAR_SIZE; ?>px; height:<?php echo AVATAR_SIZE; ?>px;' />
                    <?php } ?>
                </div>
            </div>
        <?php endif; ?>

        <div class="clear-both"></div>
    </div>-->
