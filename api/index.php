<?php

    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $paths = explode( '/', $uri);
    $controller = $paths[1];

    if (isset($controller) && $controller != "") {

        require __DIR__ . "/core/bootstrap.php";

        switch ($controller) {
            case 'user':
                echo "<br>The user controller was executed.";
                break;
            case 'test':
                echo "<br>The TestController was required.";
                require_once PROJECT_ROOT_PATH . "controllers/TestController.php";
                $testController = new TestController();
                $result = $testController->verifyAction();

                if ($result) {
                    $testController->{$result}();
                } else {
                    echo "<br>The specified path does not exist";
                }

                break;
            default:
                echo "<br>The controller was not found.";
                // header("HTTP/1.1 404 Not Found");
                exit();
                break;
        }

    } else {
        echo "Aplication: Standard offers";
        echo "<br>Version: 1.0.0";
        echo "<br>Test environment: Yes";
        echo "<br>Created: Jairo Cesar Villadiego Contreras";
        echo "<br>Last updated: 2023-03-20";
    }


?>