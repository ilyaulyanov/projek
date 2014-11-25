    <h2 class="text-center">Dashboard</h2>
<div class="row">
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
    <div class="small-8 large-4 columns">
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
          <div class="small-10 small-centered columns">
    <!-- echo out the system feedback (error and success messages) -->
    <?php $this->renderFeedbackMessages(); ?>
	<table>
    <?php
        if ($this->projects) {
            foreach($this->projects as $key => $value) {
                echo '<tr>';
                echo '<td>' . htmlentities($value->project_name) . '</td>';
                echo '<td><a href="'. URL . '/project' . $value->project_id.'">Edit</a></td>';
                echo '<td><a href="'. URL . '/project' . $value->project_id.'">Delete</a></td>';
                echo '</tr>';
            }
        } else {
            echo 'No projects yet. <a href="'. URL . 'project/create/"">Create Project</a>';
        }
    ?>
    </table>
</div>
</div>
</div>