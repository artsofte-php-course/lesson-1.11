<?php

namespace Controller;

use Repository\ProjectRepositoryInterface;

class ProjectController {

        protected $projectRepository = null;

        public function __construct(ProjectRepositoryInterface $projectRepository) {
            $this->projectRepository = $projectRepository;
        }

        public function list() {

            $content = $this->render("list", [
                'projects' => $this->projectRepository->findAll()
            ]);

            return $content;
            
        }

        public function create() {
            $content = $this->render("create-project");
            return $content;
        }


        protected function render($templateName, $vars = []) {
            ob_start();
            extract($vars);
            include __DIR__ . DIRECTORY_SEPARATOR . "../templates/" . $templateName . ".php";           
            $content = ob_get_contents();
            ob_end_clean();

            return $content;
        }


}