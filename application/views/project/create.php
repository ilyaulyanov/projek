<div class="row">
  <div class="small-11 small-centered large-uncentered columns">

<form id="project_create_form"  name="project_create_form">     
<!-- progressbar-->

    <div id="firstStep">
<fieldset>
            <h2 class="fs-title">Let's get started</h2>
            <h3 class="fs-subtitle">Step 1</h3>
        <input type="text" id="project_name" name="project_name" placeholder="My Project" autofocus required />
        <textarea rows="4" id="project_description" name="project_description" placeholder="Project description" ></textarea>
            <input type="button" id="firstBtn" name="next" class="next action-button button" value="Next" />
</fieldset>
</div>
    <div id="secondStep">
<fieldset>
            <h2 class="fs-title">Stages and Tasks</h2>
            <h3 class="fs-subtitle">Step 2</h3>
            <input type="text" name="projectStage[]" class="project_stage no-pointer" value="New Stage" readonly="true" required/>
            <input type="text" name="projectTask[]" class="project_task no-pointer" value="New task" readonly="true"/>
            <div class="new_task_btn">+ task</div>
            <hr/>
            <div id="btn_stage_add">+ stage</div>
            <input type="button" id="secondBtn" name="previous" class="previous action-button button" value="Previous" />
            <input type="button" onclick="location.href='<?php echo URL; ?>project/index'" id="thirdBtn" name="continue" class="project_create_continue action-button button" id="project_create_continue" value="Continue"/>


      </fieldset>
    </div>
</form>
    <div data-alert id="project-message" class="alert-box success radius hidden">
    <a href="#" class="close">&times;</a>
    </div>
</div>
</div>