<?php
    include_once("../inc/noteBookSheets.inc.php");
    
    $pmiL = $_POST["moduleItemLabel"];
    $pmiI = $_POST["index"];
    if($pmiI==14){
        $decolor =" style='background-color:#E0032F;' ";
    }else{
        $decolor = "";
    }    
    $html = "<table class='menuTbl' cellspacing='0' cellpadding='0'>";
    $html.= "<tr id='menuRow' class='menuRow'>";

    $html.= "<td id='topMenu_1' class='topMenuSelectedItem' onclick='Sheet_1(this)'>";
    $html.= "<b>".$pmiL." - Home</b>";
    $html.= "</td>";
    
    $html.= "<td id='topMenu_2' class='topMenuItem' ".$decolor."onclick='Sheet_2(this)'>";
    $html.= $pmiL." - ".$tm_items[(int)$pmiI][0]."</b>";
    $html.= "</td>";   
    
    if($tm_items[(int)$pmiI][1] != false){
        $html.= "<td id='topMenu_3' class='topMenuItem'  onclick='Sheet_3(this)'>";
        $html.= $pmiL." - ".$tm_items[(int)$pmiI][1]."</b>";
        $html.= "</td>"; 
    }
    
    $html.= "<td id='topMenuMaradek' class='topMenuMaradek'></td>";
    $html.= "</tr>";
    $html.= "</table>";
    $ajax = array();
    
    $template.='http://'.$_SERVER['HTTP_HOST'];
    
    if($pmiI=="1"){
        $template.="/cpoa/templates/salesRepGrid.php";
        $html.= file_get_contents($template);
    }
    elseif($pmiI=="2"){
        $template.="/cpoa/templates/referalRepGrid.php";
        $html.= file_get_contents($template);
    }
    
    elseif($pmiI=="3"){
        $template.="/cpoa/templates/usersGrid.php";
        $html.= file_get_contents($template);
    }    
 
    elseif($pmiI=="4"){
        $template.="/cpoa/templates/clientsBasicGrid.php";
        $html.= file_get_contents($template);
    }  

    elseif($pmiI=="5"){
        $template.="/cpoa/templates/clientsProspectsBasicGrid.php";
        $html.= file_get_contents($template);
    }      

    elseif($pmiI=="6"){
        $template.="/cpoa/templates/reportsAllGrid.php";
        $html.= file_get_contents($template);
    }    
    
    elseif($pmiI=="14"){
        $template.="/cpoa/templates/mailingBasicGrid.php";
        $html.= file_get_contents($template);
    
        
    }elseif($pmiI=="15"){
        $template.="/cpoa/templates/userHomeGrid.php";
        $html.= file_get_contents($template);
    } 
    
    elseif($pmiI=="17"){
        $template.="/cpoa/templates/fastUserSearch.php";
        $html.= file_get_contents($template);
        
    }elseif($pmiI=="16"){
        $template.="/cpoa/templates/usersDataForm.php";
        $html.= file_get_contents($template);
        
    }elseif($pmiI=="19"){
        $template.="/cpoa/templates/homePage.php";
        $html.= file_get_contents($template);
    
        
    // mainSheets Ini    
    }elseif($pmiI=="18"){
        if(!isset($_POST["fieldsIni"])){
            $indexje = 1;
        }else{
            $indexje = $_POST["fieldsIni"];
        }
        $template.="/cpoa/ajax/makedForm.php?FormIni=".$indexje;
        $html.= file_get_contents($template);
    
    }else{    
        sleep(2);
    }    
    $ajax["content2DESK"] = $html;
    if($pmiI!=18){
        $ajax["content2DESK"].= "<p style='padding:10px;'>";
        $ajax["content2DESK"].= "<font color='red'>Module <b>".$pmiL."</b> (".$pmiI;
        $ajax["content2DESK"].= ")</b> Not loaded or it is not completely loaded.</font><br>Work in progress..</p>";
    }
    echo json_encode($ajax);
?>

