<?php
include_once("../Config/cfg.php");
$logArrayJSONobject = array();
$logArrayJSONobject["logArrya"] = array();
$logArrayJSONobject["logArrya"][] = array(1,"UseName","colaborador","True");
/*
 * Ezt meg szinkronizalni kell a $userPermissos -valtozoval, (AMI a 
 * SESSION_MANAGER modulba magy maj at) hogy
 * az AJAX-bol is tudjam majd kezelni
 */
$logArrayJSONobject["logArrya"][] = array(2,"UserLevel","----","toControllerModule");
/*
 * 
 * 
 */
$i = 3;
foreach($userPermissos as $key=>$value){
    $vu = $value;
    if($vu == false){
        $vu = "<font color='red'><i>FALSE</i></font>";
    }
    if($vu === true){
        $vu = "TRUE";
    }
    $logArrayJSONobject["logArrya"][] = array($i,$key,$vu,"readOnly");
    $i++;
}
echo json_encode($logArrayJSONobject);
exit;
?>

