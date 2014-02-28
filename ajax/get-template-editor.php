<?php
     
    $hmtml = "<table class='menuTbl' cellspacing='0' cellpadding='0'>";
    $hmtml.= "<tr id='menuRow' class='menuRow'>";
    
    $hmtml.= "<td id='topMenu_1' class='topMenuItem' onclick='window.parent.firstLeftMenuOnSelect(14)'>";
    $hmtml.= "Mailing - Home";
    $hmtml.= "</td>";
    
    $hmtml.= "<td id='topMenu_2' class='topMenuSelectedItem' onclick='Sheet_2(this)'>";
    $hmtml.= "Mailing - Templates";
    $hmtml.= "</td>";   
    
    $hmtml.= "<td id='topMenu_3' class='topMenuItem'  onclick='Sheet_3(this)'>";
    $hmtml.= "Mailing - SEND MAIL";
    $hmtml.= "</td>"; 

    
    $hmtml.= "<td id='topMenuMaradek' class='topMenuMaradek'></td>";
    $hmtml.= "</tr>";
    $hmtml.= "<tr>";
    $hmtml.= "<td colspan='4' style='padding:5px; background-color:white;'>";
    $hmtml.= "<iframe id='ifr1' src='/cpoa/tinymce/Editor.php' class='ifr1' scrolling='no'></iframe>";
    $hmtml.= "</td>";
    $hmtml.= "</tr>";
    $hmtml.= "</table>";
    
    $src = array();
    $src["src"] = $hmtml;
    
    echo json_encode($src);

?>


