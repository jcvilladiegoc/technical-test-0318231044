<?php

echo "<br> The TestController was imported.";

class TestController extends BaseController {

    function __construct() {
        parent::__construct();
        echo "<br> The construct function was called from TestController.";
        $this->actionMapping['count'] = 'GET';
    }

    function create() {
        echo "<br> The create function was called in TestController";
    }

    function read() {
        echo "<br> The read function was called in TestController";
    }

    function update() {
        echo "<br> The update function was called in TestController";
    }

    function delete() {
        echo "<br> The delete function was called in TestController";
    }

    function count() {
        echo "<br> The count function was called in TestController";
    }

}

// $b = new TestController();

?>