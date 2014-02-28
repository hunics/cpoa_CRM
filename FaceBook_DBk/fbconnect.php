<?php
/*
 * 
 * Péter Jámbor 2014/01/14 - 18
 * jp.software.peticom@gmail.com
 * info@jp-software-solutions.com
 * http://www.jp-software-solutions.com
 * 
 * FaceBook Login interface Main Module
 * for College Prospects of America Inc. 
 * V.0.1 - Release Version
 * 
 * REQUIRE jp_DEV_01.php !
 * 
 * 
 * 
 * ------------------------------------------------
 * on this component for js. and 
 * server side-POST protocol compatibility 
 * using js-redirect (No Header-Location!)
 * ------------------------------------------------
 * 
 */

require_once('jp_DEV_01.php');
require_once 'facebook.php'; 
$facebook = new Facebook(array(
        'appId'  => '662369313806761',    
        'secret' => '995f73ae63130df8e1ca3e837faad2ca', 
));




function returner(){
		echo "Load...";
		echo "<script type='text/javascript'>";
		echo "document.location.href='http://www.mycpoa.com/prospects/login_NEW.php';";
		echo "</script>";
		mysql_close();
		exit;
	}




$user = $facebook->getUser();


if ($user) { 
    try {
        $user_profile = $facebook->api('/me');  
        }
         catch(Exception $e){
			 //die($e->getMessage());
			 returner();
	}
}
$fbObj = new jpFaceBook;
$userDats = $fbObj->get_User_From_FB($user_profile);

if($userDats != "NULL"){
	while ($row = mysql_fetch_array($userDats)) {
		echo "Load...";
		
		echo "<form name='formulario' action='http://www.mycpoa.com/prospects/login.php' method='POST'>";
		echo "<input type='hidden' name='aceptar' value='Login'>";
		echo "<input type='hidden' name='user' value='".$row{'Username'}."'>";
		echo "<input type='hidden' name='password' value='".$row{'Pwd'}."'>";
		echo "</form>";
		echo "<script type='text/javascript'>";
		echo "document.formulario.submit();";
		echo "</script>";
		mysql_close();
		exit;

	}
}else{
	returner();
}
?>
