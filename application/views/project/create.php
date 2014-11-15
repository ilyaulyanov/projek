<div class="content">

<h1>Let's get started</h1>
<h2>Enter the name of your project and a short description</h2>
<form method="post" id="project_create_form"  name="project_create_form" action="<?php echo URL;?>project/createSave">
           
            <!-- we use htmlentities() here to prevent user input with " etc. break the HTML -->
            <input type="text" name="project_name" value="My Project" autofocus required />
            <textarea rows="4" name="project_description" placeholder="Project description" ></textarea>
            <input type="text" name="projectStage[]" class="project_stage" value="Stage 1" readonly="true" required/>
            <input type="text" name="projectTask[]" class="project_task project_stage" value="Task 1" readonly="true"/>
            <input type="text" name="projectTask[]" class="project_task project_stage" value="Task 2" readonly="true"/>
            <input type="text" name="projectStage[]" class="project_stage" value="Stage 2" readonly="true" required/>
            <input type="text" name="projectTask[]" class="project_task project_stage" value="Task 3" readonly="true"/>
            <input type="text" name="projectTask[]" class="project_task project_stage" value="Task 4" readonly="true"/>
            <input type="submit" value='Continue' />
</form>
</div>