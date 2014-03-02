var obj;
var UserGrid_fromStep = 0;
var GRID_ROW_NUMBERS = 22;



function fillUserGrid2(){
    
    UserGrid_fromStep = parseInt(UserGrid_fromStep) + parseInt(GRID_ROW_NUMBERS);
    fillUserGrid(UserGrid_fromStep);
    
}          

function fillUserGrid(from){
    
    $.ajax({
            async:false,
            url : "ajax/get-users-basic.php",
            type: "post",
            dataType: "text", 
            data:{ from:from },
            success : function (data) {
                    var grid_obj = $.parseJSON(data); 
                    for(r=0; r<grid_obj.length;r++){
                        for(c=0; c<7;c++){
                           $("#gridCell_row_"+r+"__col_"+c).html(grid_obj[r][c]) ;
                        }
                    }
                   },
            error: function(){
                   $("#DESK").html( "MODULE LOAD ERROR" );
            }
    });    
    
}

function fillSalesRepsGrid(from){
    
    $.ajax({
            async:false,
            url : "ajax/get-salesReps-basic.php",
            type: "post",
            dataType: "text", 
            data:{ from:from },
            success : function (data) {
                    var grid_obj = $.parseJSON(data); 
                    for(r=0; r<grid_obj.length;r++){
                        for(c=0; c<7;c++){
                           $("#gridCell_row_"+r+"__col_"+c).html(grid_obj[r][c]) ;
                        }
                    }
                   },
            error: function(){
                   $("#DESK").html( "MODULE LOAD ERROR" );
            }
    });    
     
}

function fillReferralRepsGrid(from){
    
    $.ajax({
            async:false, 
            url : "ajax/get-referralReps-basic.php",
            type: "post",
            dataType: "text", 
            data:{ from:from }, 
            success : function (data) {
                    var grid_obj = $.parseJSON(data); 
                    for(r=0; r<grid_obj.length;r++){
                        for(c=0; c<7;c++){
                           $("#gridCell_row_"+r+"__col_"+c).html(grid_obj[r][c]) ;
                        }
                    }
                   },
            error: function(){
                   $("#DESK").html( "MODULE LOAD ERROR" );
            }
    });    
    
}


function firstLeftMenuOnSelect(index){
   
   var fi = 0;
   
    if(parseInt(index)>17 && parseInt(index) <26){
        fi = 1+(20 * (index-18));
        index = 18;
    }
    
    for(i=1;i<19;i++){
        if(i==index){
            $("#mi"+i).css("background-color","white");
            $("#mi"+i).css("color","black");
        }else{
            if(i==15 || i==16 || i==17 || i==18){
                $("#mi"+i).css("background-color","#E0032F");
            }else{
                $("#mi"+i).css("background-color","#F0632F");
            }
            $("#mi"+i).css("color","white");           
        }
    }  
    if(  index==15 || index==16 || index==17){
         $("#mi3").css("background-color","#E0032F");
    }    
    
    $.ajax({ 
            url : "ajax/moduleLoader.php",
            type: "post",
            dataType: "text", 
            async:true, 
            data:{ moduleItemLabel:$("#mi"+index).text(),
                   index:index,
                   fieldsIni:fi
                 },
            success : function (data) {
                    var obj = $.parseJSON(data); 
                    $("#DESK").html( obj.content2DESK );
                    /*
                     * 
                     * GRID FILLs 
                     * 
                     * 
                     */                    
                    if(index==3){
                        fillUserGrid(0);
                    }
                    if(index==1){
                        fillSalesRepsGrid(0);
                    }  
                    if(index==2){
                        fillReferralRepsGrid(0);
                    } 
                    //$(document).css("cursor","default"); 
                    /*
                     * 
                     * 
                     * 
                     */
                   },
            error: function(){
                   $("#DESK").html( "MODULE LOAD ERROR" );
            }
    }); 
    
}


function homeContent(){
    $.ajax({
            async:false, 
            url : "ajax/moduleLoader.php",
            type: "post",
            dataType: "text", 
            data:{ moduleItemLabel:"USER",
                   index:19
                 },
            success : function (data) {
                    var obj = $.parseJSON(data); 
                    $("#DESK").html( obj.content2DESK );
                    
                    $.ajax({
                            async:false, 
                            url : "ajax/getUserLog.php",
                            type: "post",
                            dataType: "text", 
                            data:{ userId:obj.userNeve
                                 },
                            success : function (data) {
                                    var logObj = $.parseJSON(data); 
                                    for (index = 0; index < logObj.logArrya.length; ++index) {
                                        $("#gridCell_row_"+index+"__col_0").html(logObj.logArrya[index][0]);
                                        $("#gridCell_row_"+index+"__col_1").html(logObj.logArrya[index][1]);
                                        $("#gridCell_row_"+index+"__col_2").html(logObj.logArrya[index][2]);
                                        $("#gridCell_row_"+index+"__col_3").html(logObj.logArrya[index][3]);
                                    }
                                   },
                            error: function(){
                                   $("#DESK").html( "MODULE LOAD ERROR" );
                            }
                    });                     
                                        
                   },
            error: function(){
                   $("#DESK").html( "MODULE LOAD ERROR" );
            }
            
            
    }); 
             
}




function loadUser(obj){
    
    $("#userNeve").remove();
    $("#passJa").remove();
    $("#lt").remove();
    $("#loginForm").remove();
    $("#userNeve").remove();
    $("#submiter").remove();    

    $("#top").css("background-color","#00B4FF");
    $("#left").css("background-color","#263138");
    $("#left").css("color","#ffffff");
    $("#top").css("color","#ffffff");
    $("#top").html(obj.topContent);
    $("#left").html(obj.leftContent);
    
    homeContent(); 
    //$("#statusBar").html(obj.userNeve + ":" +obj.userLevels.toString());
    $("#statusBar").css("background-color","#000000");
    
    
    $("#logOut").click(function(){document.location.href="/cpoa/Session_Manager/?logout=TRUE";});
    
    $("#mmi1").click(function(){
                $("#mainMenuBox_1").css("display","block");
                $("#mainMenuBox_2").css("display","none");
                $("#mainMenuBox_3").css("display","none");
            }
        );  

    
        $("#mmi2").click(function(){
                $("#mainMenuBox_1").css("display","none");
                $("#mainMenuBox_2").css("display","block");
                $("#mainMenuBox_3").css("display","none");
            }
        );

    
        $("#mmi3").click(function(){
                $("#mainMenuBox_1").css("display","none");
                $("#mainMenuBox_2").css("display","none");
                $("#mainMenuBox_3").css("display","block");
            }
        );

    // Only for Developer info    
    $("#gridCell_row_1__col_2").html(obj.userLevels.toString());
    
}



function mainLoader(){

                $.ajax({
                    async:false, 
                    url : "ajax/loginer.php",
                    type: "post",
                    dataType: "text", 
                    data:{ userNeve:$("#userNeve").val(),
                           passJa:$("#passJa").val(),
                           lt:$("#lt").val()
                         },
                    success : function (data) {
                                    var obj = $.parseJSON(data); 
                                    if(obj.userLevels[0]<1){
                                        $("#passJa").val("");
                                        $("#userNeve").val("");
                                        if(obj.userLevels[0]===-1){
                                            $("#DESK").html(obj.topContent);
                                        }else{    
                                            $("#top").html(obj.userNeve + obj.msg);
                                        }    
                                    }else{
                                        $('#statusBar').html(obj.userNeve);
                                        loadUser(obj);
                                    }
                         },
                    error: function (richiesta,stato,errori) { 
                                $("#top").html("Communication Error!:" + errori);
                         }

                });
                              
}





function mainReLoader(){
                $.ajax({
                    async:false, 
                    url : "ajax/loginer.php",
                    type: "post",
                    dataType: "text", 
                    data:{ reload:true
                          },
                    success : function (data) {
                                if(data){
                                    var obj = $.parseJSON(data); 
                                    loadUser(obj);
                                }else{
                                    alert("NO VALID LOGIN");
                                }
                              }
                         ,
                    error: function(richiesta,stato,errori) { 
                        
                                $("#top").html("Communication Error!:" + errori);
                                $("#top").html("Communication Error!");
                         }

                });
                
}



$(document).ready(function(){  
        $("#submiter").click(function(){
              mainLoader();
              if(obj){
                    alert(obj.userLevels.toString());
              }
        });   
        
        $("#faceBookLoginer").click(function(){
             $("#top").html("<h3>Option not activated</h3>");
        });
        

});

        
        
        
