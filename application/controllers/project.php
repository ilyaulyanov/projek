<?php

/*
Controller for projects page
*/

class Project extends Controller{

	/* object constructor */
	function __construct(){
		parent::__construct();
		//we don't want unauthorised users to access project page
		Auth::handleLogin();
	}
	public function index(){
		$project_model = $this->loadModel('Project');
		$this->view->projects = $project_model->getAllProjects();
		$this->view->render('project/index');
	}

	public function create(){
        $project_model = $this->loadModel('Project');
        if(!$project_model->checkForActiveProject()){
    		$this->view->render('project/create');
        }else{
        	header('location: ' . URL . 'dashboard/index');
        }
        
        //$project_model->create($_POST['project_name'],$_POST['project_description']);
        //header('location: ' . URL . 'project');
	}

	//a controller function for a page that will receive form data from /create and present it for a review before submitting it to a db
	public function review(){
		$project_model = $this->loadModel('Project');
		$this->view->newproject = $project_model->getProjectReview();
		$this->view->render('project/review');
	}

	public function createSave(){
		$project_model = $this->loadModel('Project');
		$project_model->create($_POST);
		header('location: ' . URL . 'project/index');
	}


}