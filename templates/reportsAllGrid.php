<?php include_once("../Config/cfg.php"); ?>
<table id='reportsAll_grid' class='sales_rep_grid' cellspacing='0' cellpadding='0'>
    <tr id="gridHead" class="gridHead">
        <th id="gridHead_col_0" class="gridHead_First_col" style='width:15%;'>Last Contact D.</th>
        <th id="gridHead_col_1" class="gridHead_col_1" style='width:15%;'>Last Name</th>
        <th id="gridHead_col_2" class="gridHead_col_1" style='width:15%;'>First Name</th>
        <th id="gridHead_col_3" class="gridHead_col_1" style='width:15%;'>CPOA Email</th>
        <th id="gridHead_col_4" class="gridHead_col_1" style='width:5%;'>Country</th>
        <th id="gridHead_col_5" class="gridHead_col_1" style='width:15%;'>Deporte</th>
        <th id="gridHead_col_6" class="gridHead_col_1" style='width:10%;'>Grad. Year</th>
        <th id="gridHead_col_6" class="gridHead_Last_col" style='width:10%;'>Service</th>        
    </tr>
<?php for($i=0;$i< GRID_ROW_NUMBERS; $i++){ ?>
    <tr id="gridRow_" class="gridRow">
        <td id="gridCell_row_<?php echo $i;?>__col_0" class="gridCellLeft_align_Left" style='width:15%;'>&nbsp;</td>
        <td id="gridCell_row_<?php echo $i;?>__col_1" class="gridCell_align_Center" style='width:15%;'>&nbsp;</td>
        <td id="gridCell_row_<?php echo $i;?>__col_2" class="gridCell_align_Center" style='width:15%;'>&nbsp;</td>
        <td id="gridCell_row_<?php echo $i;?>__col_4" class="gridCell_align_Center" style='width:15%;'>&nbsp;</td>
        <td id="gridCell_row_<?php echo $i;?>__col_5" class="gridCell_align_Center" style='width:5%;'>&nbsp;</td>        
        <td id="gridCell_row_<?php echo $i;?>__col_7" class="gridCell_align_Center" style='width:15%;'>&nbsp;</td>
        <td id="gridCell_row_<?php echo $i;?>__col_7" class="gridCell_align_Center" style='width:10%;'>&nbsp;</td>
        <td id="gridCell_row_<?php echo $i;?>__col_7" class="gridCellRight_align_Left" style='width:10%;'>&nbsp;</td>
    </tr>  
<?php } ?>
</table>

<script type="text/javascript">
    $("table#reportsAll_grid tr:even").css("background-color", "#f5f5f5");
    $("table#reportsAll_grid tr:odd").css("background-color", "#E5E5E5");   
    $("table#reportsAll_grid th").css("background-color", "black");
</script>    