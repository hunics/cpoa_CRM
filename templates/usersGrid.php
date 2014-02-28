<?php 
    include_once("../Config/cfg.php"); 
?>
<table id='users_grid' class='sales_rep_grid' cellspacing='0' cellpadding='0'>
    <tr id="gridHead" class="gridHead">
        <th id="gridHead_col_0" class="gridHead_First_col" style='width:7%;'>#</th>
        <th id="gridHead_col_1" class="gridHead_col_1" style='width:15%;'>USERNAME</th>
        <th id="gridHead_col_2" class="gridHead_col_1" style='width:15%;'>PASSWORD</th>
        <th id="gridHead_col_3" class="gridHead_col_1" style='width:15%;'>ACCESS LEVEL</th>
        <th id="gridHead_col_4" class="gridHead_col_1" style='width:15%;'>SALES REP.</th>
        <th id="gridHead_col_5" class="gridHead_col_1" style='width:20%;'>REFERRAL REP.</th>
        <th id="gridHead_col_6" class="gridHead_Last_col" style='width:13%;'>WORKGROUP</th>
    </tr>
<?php for($i=0;$i< GRID_ROW_NUMBERS; $i++){ ?>
    <tr id="gridRow_" class="gridRow">
        <td id="gridCell_row_<?php echo $i;?>__col_0" class="gridCellLeft_align_Left" style='width:7%;'>&nbsp;</td>
        <td id="gridCell_row_<?php echo $i;?>__col_1" class="gridCell_align_Left" style='width:15%;'>&nbsp;</td>
        <td id="gridCell_row_<?php echo $i;?>__col_2" class="gridCell_align_Left" style='width:15%;'>&nbsp;</td>
        <td id="gridCell_row_<?php echo $i;?>__col_3" class="gridCell_align_Left" style='width:15%;'>&nbsp;</td>
        <td id="gridCell_row_<?php echo $i;?>__col_4" class="gridCell_align_Left" style='width:15%;'>&nbsp;</td>        
        <td id="gridCell_row_<?php echo $i;?>__col_5" class="gridCell_align_Left" style='width:20%;'>&nbsp;</td>
        <td id="gridCell_row_<?php echo $i;?>__col_6" class="gridCellRight_align_Left" style='width:13%;'>&nbsp;</td>
    </tr>  
<?php } ?>
</table>
<label id='arrowGo' class='arrowGo' onclick='fillUserGrid2()'>+++</label>

<script type="text/javascript">
    $("table#users_grid tr:even").css("background-color", "#f5f5f5");
    $("table#users_grid tr:odd").css("background-color", "#E5E5E5");   
    $("table#users_grid th").css("background-color", "black");
</script>    