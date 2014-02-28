<?php include_once("../Config/cfg.php"); ?>
<table id='mailingBasic_grid' class='sales_rep_grid' cellspacing='0' cellpadding='0'>
<?php include ("../inc/mailingBasicGridHEAD.src.php"); ?>
<?php for($i=0;$i< GRID_ROW_NUMBERS; $i++){ ?>
    <tr id="gridRow_" class="gridRow">
        <td id="gridCell_row_<?php echo $i;?>__col_0" class="gridCellLeft_align_Left" style='width:7%;'>&nbsp;</td>
        <td id="gridCell_row_<?php echo $i;?>__col_1" class="gridCell_align_Center" style='width:53%;'>&nbsp;</td>
        <td id="gridCell_row_<?php echo $i;?>__col_2" class="gridCell_align_Center" style='width:30%;'>&nbsp;</td>
        <td id="gridCell_row_<?php echo $i;?>__col_4" class="gridCell_align_Center" style='width:10%;'>&nbsp;</td>
    </tr>  
<?php } ?>
</table>

<script type="text/javascript">
    $("table#mailingBasic_grid tr:even").css("background-color", "#f5f5f5");
    $("table#mailingBasic_grid tr:odd").css("background-color", "#E5E5E5");   
    $("table#mailingBasic_grid th").css("background-color", "black");
</script>    