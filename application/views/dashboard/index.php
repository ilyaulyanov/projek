<?php Auth::handleLogin();

 ?>
<div class="row dash">
    <div class="content">
    <div class="small-4 large-4 columns">
            <div class="avatarImg">
        <?php // if usage of gravatar is activated show gravatar image, else show local avatar ?>
        <?php if (USE_GRAVATAR) { ?>
            <img src='<?php echo Session::get('user_gravatar_image_url'); ?>' />
        <?php } else { ?>
            <img src='<?php echo Session::get('user_avatar_file'); ?>' />
        <?php } ?>
            <div class="editAvatar text-center">
            <a href="<?php echo URL; ?>login/uploadavatar">Edit Avatar</a>
            </div>
    </div>
    </div>
    <div class="small-8 large-8 columns">
            <div class="usernameDashboard text-left">
            <?php echo Session::get('user_name'); ?>
            </div>
            <div class="editProfileText">
            <a href="<?php echo URL; ?>login/editusername">Edit Username</a>
            |
            <a href="<?php echo URL; ?>login/edituseremail">Edit Email</a>
            </div>
    </div>

</div>
</div>
<div class="row">
    <div class="editProfileDashboard">
          <div class="small-10 large-8 small-centered columns">
    <!-- echo out the system feedback (error and success messages) -->
    <?php $this->renderFeedbackMessages(); ?>
    <?php
    if($this->projects){
        foreach($this->projects as $key => $value) {

                echo '<a href="'. URL . 'project/index" class="large secondary button split proj_button">' . htmlentities($value->project_name) . '<span data-dropdown="drop"></span></a><br>
<ul id="drop" class="f-dropdown" data-dropdown-content>
  <li><a href="'. URL . 'project/index">View</a></li>
  <li><a href="'. URL . 'project/delete/' . $value->project_id.'">Delete</a></li>
</ul>';
            }
         
    }else{
        echo '<div class="panel callout">
  Uh-oh. Looks like you don\'t have any active projects. <a href="'. URL . 'project/create/"">Create Project</a>
</div>';
    }
        
    ?>
    </div>
</div>
</div>