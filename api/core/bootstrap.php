<?php

    define("PROJECT_ROOT_PATH", __DIR__ . "/../");
    // When starting the project, the connections to the database, models, services and controllers are imported

    // Controllers
    require_once PROJECT_ROOT_PATH . "controllers/BaseController.php";
    require_once PROJECT_ROOT_PATH . "models/BaseModel.php";
    require_once PROJECT_ROOT_PATH . "models/Company.php";

?>