<?php 
include_once("../View_Model/form_Model.php"); 
include_once("../Logic_Model/formItems_1.php"); 
?>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<link href="/cpoa/css/forms.css?$$REVISION$$" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/cpoa/jQuerysrc/jquery.js"></script>
<table>
    <tr>
        <td valign="top">
            <?php  
                $romN = (int)$_GET["FormIni"];
                if($romN<1){
                    $romN = 1;
                }
                $fromTo = $romN." - ".(string)($romN +19);
                $sheetTitle = " Clients/ Prospects (Sheet Items #".$fromTo.")";
                $modul = new form($sheetTitle,"TableFieldsIDs");
                $modul->submiter = true;
                $modul->fieldIDNumber = 0;
                
                ob_start();
                    echo $modul->tblIni;
                    for($fieldsIni = $_GET["FormIni"]-1;$fieldsIni< $_GET["FormIni"]+19; $fieldsIni++){
                        if($fieldsIni==count($fields)){
                            break;
                        }
                        echo $modul->rowGenerator($fields[$fieldsIni]);
                    }
                    echo $modul->formFotter();
                $htmlI = ob_get_contents();
                ob_end_clean();
                echo $htmlI;

            ?>        
        </td>
        <td valign="top" align="right">
            <h3>Work in Progress...</h3>
                <label>Direct Item Access:</label>
                <select id="itemAcces" class="selectFields" onchange="javascript:alert('Work in progress');">
                    <?php
                    for($i=0;$i<count($fields); $i++) {
                        $item = trim(key($fields[$i]));
                        if(strlen($item)> 25){
                            $item = substr($item,0,25);
                        }
                        echo "<option value=".$i.">". $item ."</option>";
                    }
                    ?>
                </select>
            </br>
            </br>
            <?php 
                if($romN == 1){
                    $linkerel = "linkerel3";
                } else{
                    $linkerel = "linkerel2";
                }
            ?>
            <li class="<?php echo $linkerel;?>" onclick="firstLeftMenuOnSelect(18)">Go to Sheet #1</li>
            <?php 
                if($romN == 21){
                    $linkerel = "linkerel3";
                } else{
                    $linkerel = "linkerel2";
                }
            ?>
            <li class="<?php echo $linkerel;?>" onclick="firstLeftMenuOnSelect(19)">Go to Sheet #2</li>
            <?php 
                if($romN == 41){
                    $linkerel = "linkerel3";
                } else{
                    $linkerel = "linkerel2";
                }
            ?>
            <li class="<?php echo $linkerel;?>" onclick="firstLeftMenuOnSelect(20)">Go to Sheet #3</li>
            <?php 
                if($romN == 61){
                    $linkerel = "linkerel3";
                } else{
                    $linkerel = "linkerel2";
                }
            ?>
            <li class="<?php echo $linkerel;?>" onclick="firstLeftMenuOnSelect(21)">Go to Sheet #4</li>
            <?php 
                if($romN == 81){
                    $linkerel = "linkerel3";
                } else{
                    $linkerel = "linkerel2";
                }
            ?>
            <li class="<?php echo $linkerel;?>" onclick="firstLeftMenuOnSelect(22)">Go to Sheet #5</li>
            <?php 
                if($romN == 101){
                    $linkerel = "linkerel3";
                } else{
                    $linkerel = "linkerel2";
                }
            ?>
            <li class="<?php echo $linkerel;?>" onclick="firstLeftMenuOnSelect(23)">Go to Sheet #6</li>
            <?php 
                if($romN == 121){
                    $linkerel = "linkerel3";
                } else{
                    $linkerel = "linkerel2";
                }
            ?>
            <li class="<?php echo $linkerel;?>" onclick="firstLeftMenuOnSelect(24)">Go to Sheet #7</li> 
            <?php 
                if($romN == 141){
                    $linkerel = "linkerel3";
                } else{
                    $linkerel = "linkerel2";
                }
            ?>
            <li class="<?php echo $linkerel;?>" onclick="firstLeftMenuOnSelect(25)">Go to Sheet #8</li>
        </td>        
    </tr>
</table>

