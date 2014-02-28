<?php include_once("../Config/cfg.php"); ?>
<table id='sales_rep_grid' class='sales_rep_grid' cellspacing='0' cellpadding='0'>
    <tr id="gridHead" class="gridHead">
        <th id="gridHead_col_0" class="gridHead_First_col">S. Rep.ID</th>
        <th id="gridHead_col_1" class="gridHead_col_1">LAST NAME</th>
        <th id="gridHead_col_2" class="gridHead_col_2">FIRST NAME</th>
        <th id="gridHead_col_3" class="gridHead_Last_col">WORKGROUP</th>
    </tr>
<?php for($i=0;$i< GRID_ROW_NUMBERS; $i++){ ?>
    <tr id="gridRow_" class="gridRow">
        <td id="gridCell_row_<?php echo $i;?>__col_0" class="gridCellLeft_align_Left">&nbsp;</td>
        <td id="gridCell_row_<?php echo $i;?>__col_1" class="gridCell_align_Left">&nbsp;</td>
        <td id="gridCell_row_<?php echo $i;?>__col_2" class="gridCell_align_Left">&nbsp;</td>
        <td id="gridCell_row_<?php echo $i;?>__col_3" class="gridCellRight_align_Left">&nbsp;</td>
    </tr>  
<?php } ?>
</table>

<script type="text/javascript">
    $("table#sales_rep_grid tr:even").css("background-color", "#f5f5f5");
    $("table#sales_rep_grid tr:odd").css("background-color", "#E5E5E5");   
    $("table#sales_rep_grid th").css("background-color", "black");
</script>    