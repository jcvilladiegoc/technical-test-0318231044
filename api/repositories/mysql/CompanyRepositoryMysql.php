<?php

require_once PROJECT_ROOT_PATH . "repositories/CompanyRepository.php";
require_once PROJECT_ROOT_PATH . "repositories/mysql/DriverConnection.php";

class CompanyRepositoryMysql extends CompanyRepository {

    use DriverConnection;

    function __construct() {
        $this->getConnection();
    }

    function getAll() {

        $result = $this->select("SELECT * FROM company ORDER BY id ASC", []);
        $data = [];

        foreach($result as $key => $value) {
            $row = new Company();
            $row->id = $value['id'];
            $row->name = $value['name'];
            array_push($data, $row);
        }

        return $data;

    }

}

?>