<div class="content">

<h1>Let's get started</h1>
<h2>Enter the name of your project and a short description</h2>
<form id="project_create_form"  name="project_create_form">
           
            <!-- we use htmlentities() here to prevent user input with " etc. break the HTML -->
            <input type="text" id="project_name" name="project_name" value="My Project" autofocus required />
            <textarea rows="4" id="project_description" name="project_description" placeholder="Project description" >Check out our project!</textarea>
            <input type="text" name="projectStage[]" class="project_stage" value="Stage 1" readonly="true" required/>
            <div id="fsaf">fsaf</div>
            <input type="text" name="projectTask[]" class="project_task" value="Task 1" readonly="true"/>
            <input type="text" name="projectTask[]" class="project_task" value="Task 2" readonly="true"/>
            <div id="fsaf">fsaf</div>
            <input type="text" name="projectStage[]" class="project_stage" value="Stage 2" readonly="true" required/>
            <input type="text" name="projectTask[]" class="project_task" value="Task 3" readonly="true"/>
            <div id="fsaf">fsaf</div>
            <input type="text" name="projectTask[]" class="project_task" value="Task 4" readonly="true"/>
            <div id="fsaf">fsaf</div>
            <input type="submit" id="project_create_continue" value='Continue' />
</form>
</div>