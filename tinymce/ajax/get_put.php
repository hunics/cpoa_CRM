<?php
	$responds =  "<h3>Sent Contents (with AJAX by POST method) :</h3>";
	$responds.=  "<pre>";
	$responds.=  $_POST["ta"];
	$responds.=  "</pre>";
	file_put_contents("../textEditorOutput.txt",$_POST["ta"]);
	$responder = array();
	$responder["text"] = $responds;
	echo json_encode($responder);
?>
