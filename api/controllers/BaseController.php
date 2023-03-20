<?php

    echo "The BaseController was imported.";

    abstract class BaseController {

        function __construct() {
            echo "<br>The construct function was called from BaseController.";
        }

        protected $actionMapping = [
            "create" => "POST",
            "read" => "GET",
            "update" => "PUT",
            "delete" => "DELETE"
        ];

        abstract function create();
        abstract function read();
        abstract function update();
        abstract function delete();

        public function __call($name, $arguments) {
            throw new Exception("HTTP/1.1 404 Not Found'", 404);
        }

        protected function getUriSegments() {
            $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
            $uri = explode( '/', $uri );
            return $uri;
        }

        protected function getQueryParams() {
            parse_str($_SERVER['QUERY_STRING'], $query);
            return $query;
        }

        protected function getMethod() {
            return $_SERVER["REQUEST_METHOD"];
        }

        function getActionByMethod(string $method) {
            switch ($method) {
                case 'POST':
                    return 'create';
                    break;
                case 'GET':
                    return 'read';
                    break;
                case 'PUT':
                    return 'update';
                    break;
                case 'DELETE':
                    return 'delete';
                    break;
                default:
                    return null;
                    break;
            }
        }

        function verifyAction() {

            echo "<br> The verifyAction function was called.";

            $method = $this->getMethod();
            $queryParams = $this->getQueryParams();
            $action = $queryParams['action'];
            $next = false;

            echo "<br> method: $method";
            echo "<br> queryParams: ";
            var_dump($queryParams);

            if (isset($action)) {
                echo "<br>The action if exist.";
                $actionMethod = $this->actionMapping[$action];
                echo "<br>action method: $actionMethod";
                if (isset($actionMethod) && $actionMethod == $method) {
                    $next = true;
                }
            } else {
                echo "<br>The action not found.";
                $action = $this->getActionByMethod($method);
                $next = true;
            }

            echo "<br> action: $action";

            return $next ? $action : null;

        }

    }

    // $a = new BaseController();
    // $a->verifyAction();

?>