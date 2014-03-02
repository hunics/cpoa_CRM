<?php
@session_start();
require_once("../Config/cfg.php");


if(isset($_SESSION["userobj"]) && $_SESSION["userobj"] != false && $_POST["reload"]){
    $obj = $_SESSION["userobj"];
}else{
    
    $obj = array();
    $obj['userNeve'] = $_POST["userNeve"];

    $obj['msg']  = file_get_contents(fROOT."/inc/userNotAuthenticated.inc.php");
    $obj['userLevels'] = array(0,0,0,0,0,0,0,0,0,0,0,0,0);    
    
    
    if(isset($_POST["passJa"]) && isset($_POST["userNeve"]) && isset($_POST["lt"])){
        $user = $_POST["userNeve"];
        $pswd = $_POST["passJa"];
        $lt = $_POST["lt"];
        if(trim($user) != "" &&  trim($pswd) != "" &&  trim($lt) != ""){
            /*
             * 
             * Egyenlőre statikus és HardCoding az $slt -is!!!
             * 
             */
            if($user == "superadmin" || $user == "colaborador"){ 
                if(md5($pswd) === md5("colaborador")) {
                    $obj['userNeve'] = $user;
                    $obj['userLevels'][0] = 1;
                    $obj['topContent']  = file_get_contents(fROOT."/inc/firstAdminTopPageSrc.inc.php");
                    $obj['leftContent']  = file_get_contents(fROOT."/inc/firstLeftContentsSrc.inc.php");
                    $_SESSION["userobj"] = $obj; // a sessionManagerre megy majd át!!!
                }else{
                    $_SESSION["userobj"] = false;
                    $obj['userNeve'] = ""; 
                    $obj['userLevels'][0] = -1;
                    $obj['topContent']  = file_get_contents(fROOT."/inc/badUserNameorPassword.inc.php");
                }
            }
        }        
     }
}

/*
 * only for TMP tracing on develop time
 */
file_put_contents(fROOT."/log/OLDlastLogs.LOG",file_get_contents(fROOT."/log/lastLogs.LOG"));
file_put_contents(fROOT."/log/lastLogs.LOG",date("d-m-Y H:i:s"));
/*
 * 
 */
echo json_encode($obj);

?>
