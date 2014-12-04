<div class="row">
  <div class="small-11 small-centered large-uncentered columns">

<form id="project_create_form"  name="project_create_form">     
<!-- progressbar -->

    <div id="firstStep">
<fieldset>
            <h2 class="fs-title">Let's get started</h2>
            <h3 class="fs-subtitle">Step 1</h3>
        <input type="text" id="project_name" name="project_name" value="My Project" autofocus required />
        <textarea rows="4" id="project_description" name="project_description" placeholder="Project description" ></textarea>
            <input type="button" id="firstBtn" name="next" class="next action-button" value="Next" />
</fieldset>
</div>
    <div id="secondStep">
<fieldset>
            <h2 class="fs-title">Stages and Tasks</h2>
            <h3 class="fs-subtitle">Step 2</h3>
            <input type="text" name="projectStage[]" class="project_stage no-pointer" value="New Stage" readonly="true" required/>
            <input type="text" name="projectTask[]" class="project_task no-pointer" value="New task" readonly="true"/>
            <div class="new_task_btn">+ Add a task</div>
            <hr/>
            <div id="btn_stage_add">+ Add a stage</div>
            <input type="button" name="previous" class="previous action-button" value="Previous" />
            <input type="button" name="continue" class="project_create_continue action-button" id="project_create_continue" value="Continue"/>

      </fieldset>
      </div>
</form>

</div>
</div>