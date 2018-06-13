<?php
    if($_SERVER['REQUEST_METHOD']=="post"){
        session_unset();
        session_destroy();
    }
?>