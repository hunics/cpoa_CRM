<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0//EN">
<html>
    <head>
        <title>jpCRM_CPOA</title>
        <?php include_once("Config/cfg.php"); ?>
        <link rel="stylesheet" type="text/css" href="/cpoa/css/mainPage.css?$$REVISION$$">
        <link rel="stylesheet" type="text/css" href="/cpoa/css/grids.css">
        <script type="text/javascript" src="/cpoa/jQuerysrc/jquery.js"></script>
        <script type="text/javascript" src="/cpoa/js/main.js?$$REVISION$$"></script>
        <script type="text/javascript" src="/cpoa/js/sheets.js?$$REVISION$$"></script>
    </head>
    <body class='body'>
        <table class="mainTbl" cellspacing="0" cellpadding="0">
            <tr>
                <td class="top" colspan="2" id="top"></td>
            </tr>
            <tr>
                <td id="statusBar" class="statusBar" valign="middle"></td>   
                <td id="DESK" valign="top" class="main" rowspan="2"></td>
            </tr>
            <tr>
                <td id="left" valign="top" class="left"></td>
            </tr>
        </table>
        <?php include_once("View_Model/loginForm.php"); ?>
        
    </body>
</html>
