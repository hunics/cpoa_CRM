<?php
/*
 * 
 * Péter Jámbor 2014/01/18
 * FaceBook Login TEST file
 * User Data read and Save from FaceBook
 * V.0.1 - Work in progress Version
 * 
 */

require_once("../../admin/_includes/config.php");
require_once("../../admin/_includes/conn.php");


function htmlEMdecode($fileAbsolute){
    return utf8_decode(base64_decode(file_get_contents (dirname ( __FILE__ )."/fb_/".$fileAbsolute)));
}

function getInfo($IDorAll){
    /*
     * Only for the GUI INI
     */
        $intSel = array("intestazione","intestazione","intestazione","intestazione");
        $counRow = 0; 
        $selectedCol = 2;
        global $arrow;
        /*
     * Only for the GUI END
     */     
        
    if(isset($_POST["orderBy"])){
         $orderer = "ORDER BY ".$_POST["orderBy"];
         switch ($_POST["orderBy"]) {
             case "first_name":
                 $intSel[0] = "intestazioneSelected";
                 $selectedCol = 0;
                 break;
             case "last_name":
                 $intSel[1] = "intestazioneSelected";
                 $selectedCol = 1;
                 break;
             case "last_request_server_time":
                 $intSel[2] = "intestazioneSelected";
                 $selectedCol = 2;
                 break;
             case "this_member":
                 $intSel[3] = "intestazioneSelected";
                 $selectedCol = 3;
                 break;             
         }
         
    }else{
         $orderer = " ORDER BY last_request_server_time";
         $intSel[2] ="intestazioneSelected";
    }
    if(isset($_POST["irany"]) && $_POST["irany"] == "DESC"){
         $orderer.= " ".$_POST["irany"].";";
         $arrow = "<img src='immages/".$_POST["irany"].".png' alt='OREDER DIRECTION' class='arrower'>";
    }else{
         $orderer.= " ASC;";
         $arrow = "<img src='immages/DESC.png' alt='ASC' class='arrower'>";
    }    

    /*
    * Only for the GUI INI -- TBL Header
    */ 
       echo "<tr>";
       echo "<td class='".$intSel[0]."'> Apellido </td>";
       echo "<td class='".$intSel[1]."'> Nombre </td>";
       echo "<td class='".$intSel[2]."'> Ultimo Solicitud</td>";
       echo "<td class='".$intSel[3]."'> OUR CLIENT </td>";
       echo "</tr>";  
    
    /*
    * Only for the GUI END -- TBL Header
    */     
    $idike = 1234567890;                    
    if($IDorAll == "ALL"){
        $SQLm ="SELECT *  FROM `jp_facebook_requests`".$orderer;
            $tbl = mysql_query($SQLm);
            while($row = mysql_fetch_assoc($tbl)) {
                 
                /*
                 * Only for the GUI INI
                 */  
                $columnsBG = array ("","","","");
                if ($countRow == 0){
                    $countRow=1;
                    $cellBackGround = " style='background-color:#6E6FA;' ";
                    $colSelectedBGg = " style='background-color:#E2E0DE;' ";
                }else{
                    $countRow=0;
                    $cellBackGround = " style='background-color:#FBFCE7;' ";
                    $colSelectedBGg = " style='background-color:#F8F8BC;' ";
                }
                
                    switch ($selectedCol) {
                        case 0:
                            $columnsBG[0] = $colSelectedBGg;
                            break;
                        case 1:
                            $columnsBG[1] = $colSelectedBGg;
                            break;
                          case 2:
                            $columnsBG[2] = $colSelectedBGg;
                            break;
                        case 3:
                            $columnsBG[3] = $colSelectedBGg;
                            break;                  
                    }
                    if($row{"ClientID"}==0){
                        $climg = "<label style='color:red;'>NO<label>";
                        $climg.= "<label class='linkerel' title='Ver todas las informaciones desde FB.'";
                        $climg.= " onclick='viewer(".$row{"ID"}.")'> [<u>Mas FB.info</u>]<label>";
                    }else{
                        $climg = "<img src='/prospects/clients/_imagenes/iconos/icon_modif_ch.gif' ";
                        $climg.= "onclick='openClient(".$row{"ClientID"}.")'";
                        $climg.= " title='ABRIR cliente' style='cursor:pointer;'>";
                        $climg.= "<label class='linkerel' onclick='viewer(".$row{"ID"}.")' title='Ver todas las informaciones desde FB.'";
                        $climg.= " > [<u>Mas FB.info</u>]<label>";
                    }
                
                /*
                 * Only for the GUI END
                 */
                echo "<tr".$cellBackGround.">";
                echo "<td class='td'".$columnsBG[0].">".iconv("UTF-8", "WINDOWS-1252",$row{"first_name"})."</td>";
                echo "<td class='td'".$columnsBG[1].">".iconv("UTF-8", "WINDOWS-1252",$row{"last_name"})."</td>";
                echo "<td class='td' align='center'".$columnsBG[2].">".$row{"last_request_server_time"}."</td>";
                echo "<td class='tdRight'".$columnsBG[3]."><span>".$climg."</span></td>";
                echo "</tr>";
                echo "<tr style='background:#6E6FA;; display:none;' id='".$row{"ID"}."'>";
                echo "<td  align='center' valign='middle' style='border-bottom:1px black solid;'>";
                echo "<img src='/prospects/jpDEV/FaceBook/immages/fbbg.jpg'></td>";
                echo "<td colspan='3' style='border-bottom:1px black solid;'>";
                print_r(htmlEMdecode($row{"html_Tbl"}));
                echo "</td>";
                echo "</tr>";
                $idike = $idike +1;
            }
    }
		
}
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=Windows-1252">
    <title="College Prospects OfAmerica Inc Testing Pages - FaceBook visitors View">
    <style>
        .intestazione{
            background:#446F9C;
            color:white;
            width:25%; 
            text-align:center;
        }
        .intestazioneSelected{
            background:#999966;
            color:white;
            width:25%;   
            text-align:center;  
        }        
        .table{
            border:1px #fccfcc solid;
            background-color:#f5f5f5;
            width:100;
        }
        .td{
            padding:1px;
            color: #666666;;
            height:24px;

        }
        .tdRight{
            padding:1px;
            text-align: right;
            height:24px;
        }        

        .progressbar{
            display: visible;
            border: 0px;
        }
        .arrower{
            margin-top:75px;
        }
        .linkerel{
            cursor:pointer;
            color:black;
        }
        .jpInternalTbl{
            background-color:#E2E0DE;
            color:yellow;
            width:100%;
            border:1px #B3B3D3 dotted;
        }
        .jpParentTbl{
            background-color:#6E6FA;
            width:100%;
            border:1px white solid;
        }
        td.jpParentTbl{
            background-color:red;
        }
        .tr{
            border-top: 1px black solid;
        }
        
        .gomber{
            height:30px;
            width:100px;
        }
        body,td,tr,radio,button{
            font-family: Verdana,Arial,Helvetica,sans-serif;
            font-size: 11px;
            color: #666666;
        }

    </style>
    <script type="text/javascript">
        //global scope;
        var lastOpened = false;
        function imegerel(imgO){
            alert(imgO.src);
        }
        function viewer(index){
            if(lastOpened != false){
                document.getElementById(lastOpened).style["display"] = 'none';
                if(lastOpened != index){
                    document.getElementById(index).style["display"] = '';
                } else{
                    index = false;
                }       
            }else{
                document.getElementById(index).style["display"] = '';
            }
            lastOpened=index;
        }
        
        function openClient(index){
            linkje = "http://www.cpoala.com/prospects/clients/main_NEW.php?m";
            linkje = linkje +"=13&sm=clie&form=clientes&acc=_nuevo&mod=si&jp1=clm&id=";
            linkje = linkje + index;
            window.parent.window.location.href=linkje;
        }
  
        function go(){
            document.getElementById('progressbar').style["display"]='';
            document.getElementById('fb_Viewer').submit();
        }
        function hiddeProgress(){
         
            <?php
                echo "document.fb_Viewer.irany[0].checked=false;\n";
                echo "document.fb_Viewer.irany[1].checked=true;\n";
                if(isset($_POST["irany"]) && $_POST["irany"]=="DESC"){
                    echo "document.fb_Viewer.irany[0].checked=true;\n";
                    echo "document.fb_Viewer.irany[1].checked=false;\n";
                }
                if(isset($_POST["orderBy"])) {
                     echo "document.fb_Viewer.orderBy[0].checked=false;\n";
                     echo "document.fb_Viewer.orderBy[1].checked=false;\n";
                     echo "document.fb_Viewer.orderBy[2].checked=false;\n";
                     echo "document.fb_Viewer.orderBy[3].checked=false;\n";
                
                     switch ($_POST["orderBy"]) {
                        case "last_request_server_time":
                            echo "document.fb_Viewer.orderBy[0].checked=true;\n";
                            break;
                        case "first_name":
                            echo "document.fb_Viewer.orderBy[1].checked=true;\n";
                            break;
                        case "last_name":
                            echo "document.fb_Viewer.orderBy[2].checked=true;\n";
                            break;
                        case "this_member":
                            echo "document.fb_Viewer.orderBy[3].checked=true;\n";
                            break;
                     }
                }else{
                    echo "document.fb_Viewer.orderBy[0].checked=true;\n";
                }               
            ?>
            document.getElementById('progressbar').style["display"]='none';
        }
    </script>     
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8">
    </head>    
 <html>
    <body onload="hiddeProgress()">
        <table width="100%">
            <tr>
                <td valign="top">
                    <form name="fb_Viewer" id="fb_Viewer" method="POST" action="">
                        <table style="height:60px;">
                            <tr>
                                <td>
                                    <table  width="100%">
                                        <tr>
                                            <td align="left"  height="100%" valign="middle">
                                                <span>
                                                    <input type="radio" value="last_request_server_time" name="orderBy">Ultimo Solicitud de ingresar &nbsp;
                                                    <input type="radio" value="first_name" name="orderBy">Apellido &nbsp;
                                                    <input type="radio" value="last_name" name="orderBy">Nombre &nbsp;
                                                    <input type="radio" value="this_member" name="orderBy">Nuestro client &nbsp;
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left" height="100%" valign="midle">
                                                    <input type="radio" value="DESC" name="irany">Descendente &nbsp;
                                                    <input type="radio" value="ASC" name="irany">Ascendente 
                                                </span>    
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td align="right" valign="middle" style=""width:100px;">
                                    <input class="gomber" type="button" value=" >> " onclick="go()">
                                </td>                                
                                <td align="left" valign="middle" style="width:230px;">
                                   <img src="immages/progressbar.gif" id ="progressbar" class="progressbar">
                                </td>
                            </tr>
                        </table>
                       <br>
                       <table class="table" style="width:100%;">
                          <?php getInfo("ALL");?>
                       </table>
                    </form>
                </td>
                <td valign="top">
                    <?php echo $arrow;?>
                </td>
            </tr>
        </table>
     </body>
</html>


<?php mysql_close(); ?>
