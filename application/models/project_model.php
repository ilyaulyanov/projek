<?php
/*

Project Model. Handles database manipulations(create, read, update, delete).
by Ilya Ulyanov

*/

class ProjectModel
{
	/*
	List of functions to be done:
	1. Get all projects
	2. Get projects by ID of user(returns list of projects) (currently only 1 project per user)
	3. Create a project by ID of user
	4. Delete a project by ID of user
	5. Update a project by ID of user

	*/

	public function __construct(Database $db)
    {
        $this->db = $db;
    }


    /**
    * Show all projects
    * Debug function, not so applicable for a real application
    * @return an array with projects
    */
    public function getAllProjects(){
    	$sql = "SELECT project_name, project_description, project_id FROM projects";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows
        return $query->fetchAll();

    }

    /**
    * Get user projects
    * Will be used for dashboard
    * @return a project object
    */
    public function getProjectForUser(){
        $sql = "SELECT project_name, project_description, project_id FROM projects WHERE user_id = :user_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':user_id' => $_SESSION['user_id']));

        //fetch just one because we have one project per user
        return $query->fetchAll();
    }
    /**
    * Check if user has active projects
    * Will be used for dashboard
    * @return false if user has no projects and an error if user has projects
    */
    public function checkForActiveProject(){
        //check if user has an active project
        $sql = "SELECT project_id FROM projects WHERE user_id = :user_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':user_id' => $_SESSION['user_id']));
        $count =  $query->rowCount();
        if($count >= 1){
            $reply = array('error' => true); // or $result = array('error' => false);
            echo json_encode($reply);
            return $reply;
        }else{
            return false;
        }
    }
    /**
    * Create a project
    * Gets data from a project form
    * @return boolean result(created or not)
    */
    public function create($project){

        //get project name & description from inputs
        $name = $project["name"];
        $description = $project["description"];

        //first: insert into projects
        $sql = "INSERT INTO projects (project_name, project_description, user_id) VALUES (:project_name, :project_description, :user_id)";

        $query = $this->db->prepare($sql);
        $query->execute(array(':project_name' => $name,':project_description' => $description, ':user_id' => $_SESSION['user_id']));
        $count =  $query->rowCount();
        if ($count == 1) {
           $project_id = $this->db->lastinsertId();
        } else {
            $_SESSION["feedback_negative"][] = FEEDBACK_PROJECT_CREATION_FAILED;

        }
        //insert stages into the table
        //get stage:  $desc = $project["tree"][0][0];
        foreach ($project["tree"] as $obj) {
            $stage_name = $obj["stage"];
            //insert into stages
            $sql = "INSERT INTO stages (stage_name) VALUES (:stage_name)";
            $query = $this->db->prepare($sql);
            $query->execute(array(':stage_name' => $stage_name));
            $stage_id = $this->db->lastinsertId();

            //inserting into projects_stages
            $sql = "INSERT INTO projects_stages (project_id, stage_id) VALUES (:project_id, :stage_id)";
            $query = $this->db->prepare($sql);
            $query->execute(array(':project_id' => $project_id, ':stage_id' => $stage_id));

            //getting tasks for that stage and inserting them into "tasks" table
            foreach ($obj["tasks"] as $task) {
                $task_name = $task;
                //insert into tasks
                $sql = "INSERT INTO tasks (task_name) VALUES (:task_name)";
                $query = $this->db->prepare($sql);
                $query->execute(array(':task_name' => $task_name));
                $task_id = $this->db->lastinsertId();
                //inserting into stages_tasks   
                $sql = "INSERT INTO stages_tasks (stage_id, task_id) VALUES (:stage_id, :task_id)";
                $query = $this->db->prepare($sql);
                $query->execute(array(':stage_id' => $stage_id, ':task_id' => $task_id));
            }       
            
        }
        $reply = array('error' => false, 'project' =>$project); // or $result = array('error' => false);
            echo json_encode($reply);
            exit;
        // default return
        return false;
        
    }

    /**
    * Get a project
    * Gets a project object
    * @return $project object
    */
    public function getProject(){
        $sql = "SELECT tasks.task_name as taskName,
         tasks.task_id AS taskId,
         tasks.task_completion AS taskCompletion,
         stages.stage_name AS stageName,
         stages.stage_id as StageId,
         projects.project_name AS projectName,
         projects.project_id AS projectId,
         projects.project_description AS projectDesc
        FROM tasks
         LEFT JOIN stages_tasks ON tasks.task_id = stages_tasks.task_id
         LEFT JOIN stages ON stages_tasks.stage_id = stages.stage_id
         LEFT JOIN projects_stages ON stages.stage_id = projects_stages.stage_id
         LEFT JOIN projects ON projects_stages.project_id = projects.project_id
        WHERE projects.user_id = :user_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':user_id' => $_SESSION['user_id']));
        $result = $query->fetchAll();
        $array = array();
        $stagesArray = array();
        $taskArray = array();
        foreach ($result as $res) {
            # code...
            //$stageTempArray = array('stageName'=>$res->stageName,'taskName'=>$res->taskName);
            //$array[$res->StageId][] = $stageTempArray;

            
            $taskArray['task_name'] = $res->taskName;
            $taskArray['task_completion'] = $res->taskCompletion;
            $taskArray['task_id'] = $res->taskId;
            $stagesArray[$res->stageName][] = $taskArray;
            //$stagesArray[$res->stageName][] = $res->taskCompletion;
        }
        $array['stages'] = $stagesArray;
        $array['projectId'] = $res->projectId;
        $array['projectName'] = $res->projectName;
        $array['projectDesc'] = $res->projectDesc;
        return $array;

       

       // $project[$projectId] = array("name" => $projectName);
        //return $project;
    }
}

