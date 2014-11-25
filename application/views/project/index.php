<script src="<?php echo URL; ?>public/js/vendor/jquery.js"></script>
        <script src="<?php echo URL; ?>public/js/foundation.min.js"></script>
<div class="content" >
    <h1 style="margin-top: 50px;">Project Timeline</h1>

        <?php 
        $project = $this->project;
            echo "<h2 class='subheader'>{$project['projectName']}</h2>";
            echo "<h3><small>{$project['projectDesc']}</small></h3>";

            $stagesArray = $project['stages'];
            print_r($stagesArray);
            echo "<div class='stages_wrapper'>";
            $i = 0;
            foreach ($stagesArray as $stage_name => $stageArr) {
                echo "<div id='stage".$i."' class='content'>";
                echo "<h3 class='subheader'>$stage_name</h3>";
                foreach ($stageArr as $task) {
                       # code...
                    echo "<h3><small>".$task."</small></h3>";
                    echo "<div class='row'>
  <div class='small-10 medium-11 columns'>
    <div class='range-slider' data-slider>
      <span class='range-slider-handle' role='slider' tabindex='0'></span>
      <span class='range-slider-active-segment'></span>
    </div>
  </div>

</div> ";

                   }   
                echo "</div>";
                $i++;
            }
            echo "</div>";
        ?>
        <div id="msg"></div>

        <div class='row'>
          <div class='small-10 medium-11 columns'>
            <div class='range-slider' data-slider>
              <span class='range-slider-handle' role='slider' tabindex='0'></span>
              <span class='range-slider-active-segment'></span>
            </div>
          </div>

        </div> 

</div>

