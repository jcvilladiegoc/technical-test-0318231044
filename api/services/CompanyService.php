<?php

require_once PROJECT_ROOT_PATH . "repositories/mysql/CompanyRepositoryMysql.php";

class CompanyService {

    private $repository;

    function __construct() {
        $this->repository = new CompanyRepositoryMysql();
    }

    function getAll() {
        return $this->repository->getAll();
    }

}

?>