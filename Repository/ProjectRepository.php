<?php

namespace Repository;

use Entity\Project;
use Repository\ProjectRepositoryInterface;

class ProjectRepository implements ProjectRepositoryInterface {

    static $INDEX = 1;
	const FIRST_INDEX = 1;

    protected $filename = '';
    protected $projects = [];


    public function __construct($filename)
    {
        $this->filename = $filename;

        $fileObject = new \SplFileObject($this->filename, "r");
        $fileObject->setFlags(\SplFileObject::READ_CSV);
        $fileObject->setCsvControl(",", "\"");

        foreach ($fileObject as $project) {
            list($id, $name) = $project; 
            $this->projects[$id] = new Project($id, $name);

            self::$INDEX = max(self::$INDEX, $id);
        }

        self::$INDEX++;
    }

    public static function getCurrentIndex() {
		return self::$INDEX;
	}

    public function add($projectName)
    {
        $id = self::$INDEX;
        $this->projects[$id] = new Project($id, $projectName);
        
        self::$INDEX++;
    }

    public function findAll()
    {
        return $this->projects;
    }

    public function findById($id)
    {
        return isset($this->projects[$id]) ? $this->projects[$id] : null;   
    }

    public function __destruct()
    {
        $fileObject = new \SplFileObject($this->filename, "w+");

        foreach ($this->projects as $project) {

            $projectArray = [
                $project->getId(), 
                $project->getName()
            ];

            $fileObject->fputcsv($projectArray, ",", "\"");
        }
    }

}