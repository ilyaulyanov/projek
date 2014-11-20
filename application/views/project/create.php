<div id="wrapper">  
<div class="content">
<?php var_dump($_SESSION["result"]); 
//print_r($_SESSION["feedback_negative"]);
echo "id:".$_SESSION['user_id'];
echo "name:".$_SESSION['name'];
echo "desc:".$_SESSION['description'];
?>

<form id="project_create_form"  name="project_create_form">     
<!-- progressbar -->
<div id="progresswrapper">
      <ul id="progressbar">
            <li class="active">Account Setup</li>
            <li>Social Profiles</li>
      </ul>
</div>
<fieldset>
            <h2 class="fs-title">Let's get started</h2>
            <h3 class="fs-subtitle">Step 1</h3>
        <input type="text" id="project_name" name="project_name" value="My Project" autofocus required />
        <textarea rows="4" id="project_description" name="project_description" placeholder="Project description" ></textarea>
            <input type="button" name="next" class="next action-button" value="Next" />
</fieldset>
<fieldset>
            <h2 class="fs-title">Stages and Tasks</h2>
            <h3 class="fs-subtitle">Step 2</h3>
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
            <input type="button" name="previous" class="previous action-button" value="Previous" />
            <input type="button" name="continue" class="project_create_continue action-button" id="project_create_continue" value="Continue" />
      </fieldset>

</form>
</form>
</div>
</div>
<!-- jQuery -->
<script src="http://thecodeplayer.com/uploads/js/jquery-1.9.1.min.js" type="text/javascript"></script>
<!-- jQuery easing plugin -->
<script src="http://thecodeplayer.com/uploads/js/jquery.easing.min.js" type="text/javascript"></script>

  <script src="http://localhost:8080/projek/public/js/form.js"></script>