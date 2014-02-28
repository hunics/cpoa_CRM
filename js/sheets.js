function Sheet_1(ob){
    alerter( $(ob).html() );
}
function Sheet_2(ob){
    if($(ob).html() == "Mailing - Templates"){
        loadMailTemplateEditor();
    }else{
        alerter( $(ob).html() );
    }
}
function Sheet_3(ob){
    alerter( $(ob).html() );
}

function alerter(txt){
    alert( "Module or Component for '" + txt + "' is under  development progres..." );
}

function  loadMailTemplateEditor(){
    $.ajax({
            async:true, 
            url : "ajax/get-template-editor.php",
            type: "post",
            dataType: "text", 
            data:{mode:"newDocument"},
            success : function (data) {
                    var tmp_obj = $.parseJSON(data); 
                    $("#DESK").html(tmp_obj.src);
                   },
            error: function(){
                   $("#DESK").html( "MODULE LOAD ERROR" );
            }
    });    
}