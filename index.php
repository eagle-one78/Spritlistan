<!--
*******************************************************************************************************
*   @DESC: index.php
*   @Author: Sam Almendwi
*   @Copyright: This program/code is only for use and learn not for sale or modify by others than me.
* 
*   This is the first main page before the user login and:      
*   -Gets the content of the information for unregistrated users
*   -Displays the Facebook login and registration.
*   -Displays a Google map with the current user location and the nearest Systembolagets shops.
*******************************************************************************************************
-->


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US"
      xmlns:fb="https://www.facebook.com/2008/fbml"> 

    <head>
        <title>My Facebook Login Page</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script type="text/javascript" src="scripts/jquery_mini1-7-1.js"></script>
        <script type="text/javascript" src="scripts/google_locations.js"></script>
    </head>
    <body>
        
        <script>
            window.fbAsyncInit = function() {
                FB.init({
                    appId      : '235481749878187', // App ID
                    status     : true, // check login status
                    cookie     : true, // enable cookies to allow the server to access the session
                    xfbml      : true  // parse XFBML
                });
                FB.Event.subscribe('auth.login', function () {
                    window.location = "http://localhost/projects/project_mashup/login.php";
                });
            };
            

            // Load the SDK Asynchronously
            (function(d){
                var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
                js = d.createElement('script'); js.id = id; js.async = true;
                js.src = "//connect.facebook.net/en_US/all.js";
                d.getElementsByTagName('head')[0].appendChild(js);
            }(document));
            
            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = "//connect.facebook.net/sv_SE/all.js#xfbml=1&appId=235481749878187";
                fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));
        </script>
        <div id="fb-root"></div>

        
        <div id="container">
            <div id="header">
                <div id="fb-root"></div>
                <div class="fb-registration" data-perms="user_events, friends_events,read_stream" data-fields="[
                    {'name':'name'},
                    {'name':'email'},
                    {'name':'favorite_car',
                    'description':'What is your favorite car?',
                    'type':'text'}]" 
                    data-redirect-uri="http://localhost/projects/project_mashup/login.php">

                </div>
                <div class="fb-login-button" data-show-faces="true" data-width="200" data-max-rows="30" data-scope="user_events, user_likes, friends_likes, friends_events,read_stream"></div>
<!--                <div class="fb-login-button"show-faces="true" width="200" height="45" max-rows="30" data-scope="user_events, friends_events, read_stream">Login with Facebook</div>-->
<!--                <fb:login-button show-faces="true" width="200" height="45" data-scope="user_events, user_likes, friends_likes, friends_events,read_stream">Login with Facebook </fb:login-button>-->
            </div>
            <div id="content">
                <div id="map_canvas"></div>               
            </div>
            <div id="footer">
                
            </div>
        </div>
    </body>
</html>
