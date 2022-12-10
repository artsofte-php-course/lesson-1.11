<?php 

namespace Entity;

class Task {
	
	protected $id = null;
	protected $dueDate = null;
	protected $description = null;
	
	public function __construct($desc, $dueDate = null) {
		$this->description = $desc;
		$this->dueDate = $dueDate === null ? date('now') : $dueDate;
	} 
	
	public function getDescription() {
		return  $this->description;
	}
	
	public function getDueDate() {
		return $this->dueDate;
	}

}
