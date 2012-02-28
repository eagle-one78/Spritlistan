<!--
*******************************************************************************************************
*   @DESC: login.php
*   @Author: Sam Almendwi
*   @Copyright: This program/code is only for use and learn not for sale or modify by others than me.
* 
*   This is the page after the user logs in and:      
*   -Gets the content of the information for registrated users
*   -Gets the information of the available events from display_events.php and displays them
*   -Displays the spritlista.
    -Displays a Google map with the current user location and the nearest Systembolagets shops.
*******************************************************************************************************
-->


<!DOCTYPE html>

<html>
    <head>
        <title>My Facebook Login Page</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link type="text/css" rel="stylesheet" href="styling/login_style.css"/>
        <script type="text/javascript" src="scripts/jquery_mini1-7-1.js"></script>
        <script type="text/javascript" src="scripts/google_locations.js"></script>
    </head>
    <body>
        <div id="container">
            <div id="header">
                <div id="fb-root"></div>                
            </div>
            <div id="content">
                <div id="map_canvas"></div> 
                <?php            
                    include ('./core/display_events.php');
                    display_events();
                ?>     
            </div>
            <div id="footer">
                
            </div>
        </div>
    </body>
</html>