<?php

namespace Repository;
use Entity\Project;

class InMemoryProjectRepository  implements ProjectRepositoryInterface, \Countable {

    protected $projects = [];


    public function __construct($projects = [])
    {
        foreach ($projects as $projectName) {
           $this->add($projectName);
        }
    }

    public function add($projectName) {
        $project = new Project($projectName);
        $this->projects[$project->getId()] = $project;
    }

    public function findById($id) {
        return $this->projects[$id];
    }

    public function findAll() {
        return $this->projects;
    }

    public function count() {
        return (int) count($this->projects);
    }

}