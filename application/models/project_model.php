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
    * @return an array with projects
    */
    public function getProjectForUser(){

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

        //for debug
        $_SESSION["name"] = $project["name"];
        $_SESSION["description"] = $project["description"];

        //first: insert into projects
        $sql = "INSERT INTO projects (project_name, project_description, user_id) VALUES (:project_name, :project_description, :user_id)";

        $query = $this->db->prepare($sql);
        $query->execute(array(':project_name' => $name,':project_description' => $description, ':user_id' => $_SESSION['user_id']));
        $count =  $query->rowCount();
        if ($count == 1) {
           // return true;
        } else {
            $_SESSION["feedback_negative"][] = FEEDBACK_PROJECT_CREATION_FAILED;

        }
        
        //second: insert into stages with freshly created project id
        //get project id
        //PDO::lastinsertId
        $sid = "SELECT project_id FROM projects WHERE user_id = :user_id LIMIT 1";
        $query = $this->db->prepare($sid);

        //var_dump($project);
        $query->execute(array(':user_id' => $_SESSION['user_id']));
        $count = $query->rowCount();
         if ($count == 1) {
            $result = $query->fetch();
            $_SESSION["result"] = $result;
        }else{
            $_SESSION["result"] = "negative ";
        }
        

        //insert stages into the table
        //get stage:  $desc = $project["tree"][0][0];
        foreach ($project["tree"] as $obj) {
            $stage_name = $obj[0];
            $sql = "INSERT INTO stages_projects (stage_name, project_id) VALUES (:stage_name, :project_id)";
            $query = $this->db->prepare($sql);
            $query->execute(array(':stage_name' => $stage_name,':project_id' => $result->project_id));

            //select new stage id 
            $sql = "SELECT stage_id FROM stages ORDER BY stage_id DESC WHERE user_id = :user_id LIMIT 1";

            //getting tasks for that stage and inserting them into "tasks" table
            foreach ($obj["tasks"] as $task) {

            }
        }


        
       



    	
        // default return
        return false;
    }

}

