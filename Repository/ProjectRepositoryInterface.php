<?php

namespace Repository;

interface ProjectRepositoryInterface {

        public function add($projectName);

        public function findById($id);
        
        public function findAll();

}