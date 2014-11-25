<div class="content">
    <h1>Dashboard</h1>
    <div>
        Your username: <?php echo Session::get('user_name'); ?>
    </div>
    <div>
        Your email: <?php echo Session::get('user_email'); ?>
    </div>
    <div>
        Your avatar image:
        <?php // if usage of gravatar is activated show gravatar image, else show local avatar ?>
        <?php if (USE_GRAVATAR) { ?>
            Your gravatar pic (on gravatar.com): <img src='<?php echo Session::get('user_gravatar_image_url'); ?>' />
        <?php } else { ?>
            Your avatar pic (saved on local server): <img src='<?php echo Session::get('user_avatar_file'); ?>' />
        <?php } ?>
    </div>
    <!-- echo out the system feedback (error and success messages) -->
    <?php $this->renderFeedbackMessages(); ?>
	<table>
    <?php
        if ($this->projects) {
            foreach($this->projects as $key => $value) {
                echo '<tr>';
                echo '<td>' . htmlentities($value->project_name) . '</td>';
                echo '<td><a href="'. URL . 'project/edit/' . $value->project_id.'">Edit</a></td>';
                echo '<td><a href="'. URL . 'project/delete/' . $value->project_id.'">Delete</a></td>';
                echo '</tr>';
            }
        } else {
            echo 'No projects yet. <a href="'. URL . 'project/create/"">Create some!</a>';
        }
    ?>
    </table>
    <h2> Items to have on the dashboard page: user profile pic, name, links to change name / pic, current project[done] </h2>
</div>
