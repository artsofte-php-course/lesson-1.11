<?php 

namespace Repository\Database;

use Entity\Project;
use Repository\ProjectRepositoryInterface;

class ProjectRepository implements ProjectRepositoryInterface {

    /** \PDO $connection */
    protected $connection = null;

    public function __construct(\PDO $pdo)
    {
        $this->connection = $pdo;
    }

    public function findAll() {

        $result = [];

        $statement = $this->connection->query("SELECT * FROM projects");
        
        while ($row = $statement->fetch(\PDO::FETCH_ASSOC)) {
            $result[] = new Project($row['id'], $row['name']);
        }

        return $result;
    }

    public function add($projectName) {
        $statement = $this->connection
            ->prepare("INSERT INTO projects (name) VALUES (:name)");

        $statement->execute([
            'name' => $projectName
        ]);    

        
    }

    public function findById($id) {

    }
    
    
}