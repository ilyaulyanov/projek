<div class="row">
          <div class="small-12 large-10 small-centered columns">
<div class="timelineIndex">

        <?php 
        $project = $this->project;
        if($this->project){
        echo "<div class='row'>";
          echo "<div class='large-6 columns'>";
            echo "<h2 class='subheader text-center project_name'>{$project['projectName']}</h2>";
          echo "</div><div class='large-6 columns'>";
            echo "<h3 class='text-center project_desc'><small>\"{$project['projectDesc']}\"</small></h3>";
          echo "</div>";
        echo "</div>";
            $stagesArray = $project['stages'];
            echo "<div class='stages_wrapper row'>";
            $i = 0;
            foreach ($stagesArray as $stage_name => $stageArr) {
              //Finding average for tasks
              $avrage = array('completion' => 0); #prevent notice  
              $i = count($stageArr["tasks"]);
              $c = 0; $f = 0;
              foreach($stageArr["tasks"] as $value)
              {$avrage['completion'] += $value['task_completion']; if($value['task_completion']==100){$f++;} $c++;}
              # UPDATE : check zero value before using division .
              $avrage['completion'] = ($avrage['completion']?floor($avrage['completion']/$i):0);   #round value



                echo "<div id='stage-{$stageArr['stage_id'][0]}' class='stage-wrapper content small-12 medium-12 columns ". ( $avrage['completion'] == 100 ? "task-complete" : "" ) ."'>";
                echo "<div class='stage-header row'>
  <div class='large-8 columns'><h3 class='subheader'>$stage_name</h3></div>
  <div class='large-4 columns stage-progress'><span class='stage-average' ><span id='display-stage-{$stageArr['stage_id'][0]}'>{$avrage['completion']}</span>% completed (<span id='display-task-done-stage-{$stageArr['stage_id'][0]}'>$f</span> / <span id='display-task-total-stage-{$stageArr['stage_id'][0]}'>$c</span>)</span><div class='progress secondary '>
  <span class='meter' style='width: {$avrage['completion']}%' id='meter-stage-{$stageArr['stage_id'][0]}'></span>
</div></div>
</div>";




                foreach ($stageArr["tasks"] as $task) {  
                    
                    echo "<div class='content row task ". ( $task['task_completion'] == 100 ? "task-complete" : "" ) ."' id='timelineContent'>

                    <h3><small>".$task['task_name']."</small></h3>
  <div class='small-10 medium-11 columns'>
    <div class='range-slider". ( $task['task_completion'] == 100 ? " task-complete" : "" ) ."'data-slider='".$task['task_completion']."' data-options='step: 1;display_selector: #sliderOutput".$task['task_id']."; '>
      <span class='range-slider-handle' role='slider' tabindex='0'></span>
      <span class='range-slider-active-segment'></span>
      <input type='hidden' value='".$task['task_completion']."'/>
    </div>
    
  </div>";
 
                  if($task['task_completion']==100){
                    echo "<div class='small-2 medium-1 columns completion'>
                    <i class='fi-check icon-task-complete'></i>
    <span class='completion_indicator' style='opacity:0;' id='sliderOutput".$task['task_id']."'></span><span class='completion_percentage' style='opacity:0;'>%</span>
    </div>
</div>";
                  }else{
                    echo "<div class='small-2 medium-1 columns completion'>
    <span class='completion_indicator' id='sliderOutput".$task['task_id']."'></span><span class='completion_percentage'>%</span>
    </div>
</div>";
                  }

                   }   
                echo "</div>";
                $i++;
            }
            echo "</div>";
        }else{
          echo '<div class="panel callout">
  Uh-oh. Looks like you don\'t have any active projects. <a href="'. URL . 'project/create/"">Create Project</a>
</div>';
        }

        ?>
        <div id="msg"></div>
        

        <div id="projectEnd" class="reveal-modal small" data-reveal>
          <div class="small-12 large-12 small-centered columns">
          <div class="panel callout">
          <!--<p class="lead">What's next?</p>-->
           
            <p class="lead">Share some Projek love on Twitter</p>
  <a class="twitter-share-button" data-count="none" data-size="large"  data-text="Just completed my project!" data-via="projekapp" data-hashtags="projek" data-url=" "
  href="https://twitter.com/share">
Tweet
</a>



</div>
<?php echo '<a href="'. URL . 'dashboard/index/">Back to my dashboard</a>'; ?>
</div>

          
          <a class="close-reveal-modal">&#215;</a>
        </div>

</div>
</div>
</div>