<?php

namespace Entity;

class Project extends BaseProject {
	
	protected $tasks = [];
	
	
	public function __construct($id, $name) {
		
		$this->id = $id;
		$this->name = $name;

	}
	
	public function setName($name) {
		$this->name = $name;
	}
	
	public function getId() {
		return $this->id;
	}
	
	public function getName() {
		return $this->name;
	}	
	
	public function addTask($name, $dueDate = null) {
		$this->tasks[] = new Task ($name, $dueDate);
	}
	

			
}


