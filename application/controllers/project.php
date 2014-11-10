<?php

/*
Controller for projects page
*/

class Project extends Controller{

	/* object constructor */
	public function __construct(){
		parent::__construct();
		//we don't want unauthorised users to access project page
		Auth::handleLogin();
	}

	public function create(){
		$project_model = $this->loadModel('Project');
		$this->view->render('project/create');
	}
	public function createReview(){
		$project_model = $this->loadModel('Project');
		$this->view->render('project/create/review');
	}


}