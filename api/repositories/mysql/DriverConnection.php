<?php

require_once PROJECT_ROOT_PATH . "core/config.php";

trait DriverConnection {

    protected $connection = null;

    public function getConnection() {
        try {

            echo "<br>DB_HOST: " . DB_HOST;
            echo "<br>DB_PORT: " . DB_PORT;
            echo "<br>DB_USERNAME: " . DB_USERNAME;
            echo "<br>DB_PASSWORD: " . DB_PASSWORD;
            echo "<br>DB_DATABASE_NAME: " . DB_DATABASE_NAME;

            $this->connection = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE_NAME);

            if (mysqli_connect_errno()) {
                throw new Exception("Could not connect to database.");
            }

        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function select($query = "" , $params = []) {

        try {
            $stmt = $this->executeStatement($query, $params);
            $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
            $stmt->close();
            return $result;
        } catch(Exception $e) {
            throw New Exception( $e->getMessage() );
        }

        return false;

    }

    private function executeStatement($query = "" , $params = []) {
        try {
            $stmt = $this->connection->prepare($query);
            if($stmt === false) {
                throw New Exception("Unable to do prepared statement: " . $query);
            }
            if( $params ) {
                $stmt->bind_param($params[0], $params[1]);
            }
            $stmt->execute();
            return $stmt;
        } catch(Exception $e) {
            throw New Exception( $e->getMessage() );
        }
    }

}

?>