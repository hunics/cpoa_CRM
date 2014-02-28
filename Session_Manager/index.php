<?php
@session_start();
if(isset($_GET["logout"]) && $_GET["logout"]=="TRUE"){
    session_destroy();
    session_write_close();
    header("location: /cpoa/");
    exit;
}

echo "Call not Authorized!";
?>


