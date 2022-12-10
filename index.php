<?php

use Controller\ProjectController;
use Repository\Database\ProjectRepository as DatabaseProjectRepository;
use Repository\ProjectRepository;

include_once 'config.php';

spl_autoload_register(function($className) {
    
    $path = __DIR__ . DIRECTORY_SEPARATOR . 
                    str_replace("\\", DIRECTORY_SEPARATOR, $className) . ".php";
    require_once $path;
});



$pdo = new PDO($dsn, $username, $password);

$projectRepository = new DatabaseProjectRepository(
    $pdo
);


$controller = new ProjectController($projectRepository);


if ($_SERVER["REQUEST_URI"] === "/create") {
    $content =  $controller->create($_POST);
} else {
    $content =  $controller->list();
}

echo $content;



