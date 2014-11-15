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
    public function create($project_name, $project_description, $project_stage, $project_task){


    	$project_name = strip_tags($project_name);
    	$project_description = strip_tags($project_description);
    	print_r($project_task);
    	//first: insert into projects
    	$sql = "INSERT INTO projects (project_name, project_description, user_id) VALUES (:project_name, :project_description, :user_id)";
        $query = $this->db->prepare($sql);
        $query->execute(array(':project_name' => $project_name,':project_description' => $project_description, ':user_id' => $_SESSION['user_id']));
		$count =  $query->rowCount();
        if ($count == 1) {
            return true;
        } else {
            $_SESSION["feedback_negative"][] = FEEDBACK_PROJECT_CREATION_FAILED;
        }
        // default return
        return false;
    	//second: get that fresh project id and insert it into users_projects
    }

}

