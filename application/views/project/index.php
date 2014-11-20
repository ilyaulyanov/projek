<div class="content">
            <h1 style="margin-top: 50px;">Your active project:</h1>

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
</div>