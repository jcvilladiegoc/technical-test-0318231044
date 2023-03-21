<?php

echo "<br>The BaseModel was imported.";

class BaseModel {

    function toJson() {
        return json_encode($this);
    }

}

?>