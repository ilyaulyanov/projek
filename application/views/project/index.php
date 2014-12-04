<div class="row">
          <div class="small-12 large-10 small-centered columns">

<script src="<?php echo URL; ?>public/js/vendor/jquery.js"></script>
        <script src="<?php echo URL; ?>public/js/foundation.min.js"></script>
    <h2 class="text-left">Project Timeline</h2>

        <?php 
        $project = $this->project;
        echo "<div class='row'>";
          echo "<div class='large-6 columns'>";
            echo "<h3 class='subheader text-left project_name'>{$project['projectName']}</h3>";
          echo "</div><div class='large-6 columns'>";
            echo "<h3 class='text-left project_desc'><small>\"{$project['projectDesc']}\"</small></h3>";
          echo "</div>";
        echo "</div>";
            $stagesArray = $project['stages'];
            echo "<div class='stages_wrapper row'>";
            $i = 0;
            foreach ($stagesArray as $stage_name => $stageArr) {
                echo "<div id='stage".$i."' class='stage-wrapper content small-12 medium-12 columns'>";
                echo "<h3 class='subheader'>$stage_name</h3>";
                foreach ($stageArr as $task) {  
                       # code...
                    echo "<div class='content'>
                    <h3><small>".$task['task_name']."</small></h3>
  <div class='small-10 medium-11 columns'>
    <div class='range-slider' data-slider='".$task['task_completion']."' data-options='step: 1;display_selector: #sliderOutput".$task['task_id']."; '>
      <span class='range-slider-handle' role='slider' tabindex='0'></span>
      <span class='range-slider-active-segment'></span>
      <input type='hidden' value='".$task['task_completion']."'/>
    </div>
    
  </div>
<div class='small-2 medium-1 columns completion'>
    <span class='completion_indicator' id='sliderOutput".$task['task_id']."'></span>%
    </div>
</div> ";

                   }   
                echo "</div>";
                $i++;
            }
            echo "</div>";
        ?>
        <div id="msg"></div>


</div>
</div>