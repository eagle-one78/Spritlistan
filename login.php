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
        <script type="text/javascript" src="scripts/jquery_mini1-7-1.js"></script>
        <script type="text/javascript" src="scripts/google_locations.js"></script>
    </head>
    <body>
        <div id="map_canvas"></div>  
        <div id="fb-root"></div>

        <?php            
            include ('./core/display_events.php');
            display_events();
        ?>
    </body>
</html>