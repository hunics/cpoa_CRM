<?php

require_once("../Logic_Model/getUsersFromLoginTBL2json.php");
require_once("../Config/cfg.php");

ob_start();

    $user = new getUsers();
    
    $from = $_POST["from"];
    $to = $from + GRID_ROW_NUMBERS;
    /*
     * 
     * DIRECTION and ORDER Key To Do !!!!
     * 
     */
    $jsonObj = $user->get($from, $to);
    
$output = ob_get_contents();
ob_end_clean();

echo json_encode($jsonObj);

