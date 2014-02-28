<?php include_once("../Config/cfg.php"); ?>
<html>
	<head>
		<title>TEMPLATES AND MAIL EDITOR</title>
                <script type="text/javascript" src="/cpoa/js/browserDetector.js"></script>
                <link rel="stylesheet" type="text/css" href="/cpoa/css/mainPage.css?$$REVISION$$">
		<script src="/cpoa/jQuerysrc/jquery.js" type="text/javascript"></script>
		<script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>
                
		<script type="text/javascript">
			tinymce.init({
				selector: "textarea",
				toolbar: "undo redo | styleselect | bold italic | link image |ltr | rtl | forecolor | backcolor",		
				convert_urls: false,
				relative_urls: false,
				plugins: "link  visualblocks  directionality textcolor ",
				mode : "textareas",
				height: 370,
				resize: false
			});
			
			$(document).ready(function(){

                                $("#goFormSubmit").click(function(){
                                          $("#form").submit();
                                });   

                                $("#goFormByAjax").click(function(){

                                        $("#ReturnViaAjax").html("Load...");									

                                        var  Editor = tinyMCE.get('content');
                                        $.ajax({
                                            async:false,
                                            url : "ajax/get_put.php",
                                                    type: "post",
                                                    dataType: "text", 
                                                    data:{ ta: Editor.getContent()},
                                                    success : function (data) {
                                                                    var resp_obj = $.parseJSON(data); 
                                                                    $("#ReturnViaAjax").html(resp_obj.text) ;
                                                                    },
                                                    error: function(){
                                                       $("#ReturnViaAjax").html("RESPONDER ERROR" );
                                                    }
                                        });    						  

                                });

			});

			function loadWithAjax() {
                            var Editor = tinyMCE.get('content');

                                $.ajax({
                                    async:true,
                                    url : "/cpoa/tinymce/ajax/getContent.php",
                                            dataType: "text", 
                                            success : function (data) {
                                                        var resp_obj = $.parseJSON(data);
                                                        Editor.setContent(resp_obj.text) ;
                                                    },
                                            error: function(){
                                               $("#ReturnViaAjax").html("RESPONDER ERROR" );
                                            }
                                }); 								
			}			
			
			
		</script>
	</head>
	<body class="body" style="background-color:white;">

		<form method="post" id="form">
                    <span>
                        <textarea name="content" id = "content"></textarea>
                        <input type="button" value=" GO " class="gomb" id="goFormByAjax" disabled>
                        <input type="button" value="LOAD" class="gomb" id="contentLoader" onclick = "loadWithAjax()">
                        <select id="mailTemplates" class="mailTemplates">
                            <option value="null">Select a Template</option>
                        </select>
                    </span>
                </form>
		<div id="ReturnViaAjax"></div>
	</body>
</html>
