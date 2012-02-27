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


<?php
require 'src/facebook.php';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US"
      xmlns:fb="https://www.facebook.com/2008/fbml"> 

    <head>
        <title>My Facebook Login Page</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script type="text/javascript" src="jquery_mini1-7-1.js"></script>
        <script type="text/javascript" src="scripts/google_locations.js"></script>
    </head>
    <body>
        <div id="map_canvas"></div>
        <div id="fb-root"></div>
        <script>
            window.fbAsyncInit = function() {
                FB.init({
                    appId      : '235481749878187', // App ID
                    status     : true, // check login status
                    cookie     : true, // enable cookies to allow the server to access the session
                    xfbml      : true  // parse XFBML
                });
            };

            // Load the SDK Asynchronously
            (function(d){
                var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
                js = d.createElement('script'); js.id = id; js.async = true;
                js.src = "//connect.facebook.net/en_US/all.js";
                d.getElementsByTagName('head')[0].appendChild(js);
            }(document));
        </script>

        <div class="fb-registration" perms="user_events, user_likes, friends_likes, friends_events,read_stream" data-fields="[
             {'name':'name'},
             {'name':'email'},
             {'name':'favorite_car',
             'description':'What is your favorite car?',
             'type':'text'}]" 
             data-redirect-uri="http://localhost/projects/project_mashup/login.php">

        </div>
        <!--    <fb:login-button show-faces="true" width="200" height="45" perms="user_events, user_likes, friends_likes, friends_events,read_stream"> Login with Facebook </fb:login-button> -->

    </body>
</html>
