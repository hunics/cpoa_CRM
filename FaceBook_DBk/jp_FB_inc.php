<div id="fb-root"></div>
<script type="text/javascript">

//<![CDATA[
window.fbAsyncInit = function() {
   FB.init({
     appId      : '662369313806761', 
     channelURL : '',   
     status     : true, 
     cookie     : true, 
     oauth      : true, 
     xfbml      : false 
   });
};

function login(){
FB.getLoginStatus(function(r){
     if(r.status === 'connected'){
            window.location.href = 'jpDEV/FaceBook/fbconnect.php';
            
     }else{
        FB.login(function(response) {
                if(response.authResponse) {
                    window.location.href = 'jpDEV/FaceBook/fbconnect.php';
            } else {
              // user is not logged in handler in external script
            }
     },{scope:'email'}); 
 }
});
}
(function() {
   var e = document.createElement('script'); e.async = true;
   e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';                
   document.getElementById('fb-root').appendChild(e);
}());
//]]>
</script>
