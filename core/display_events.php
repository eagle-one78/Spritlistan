<?php

/*********************************************************************************************************
 *      @DESC: display_events.php
 *      @Author: Sam Almendwi
 *      @Copyright: This program/code is only for use and learn not for sale or modify by others than me.
 * 
 *      Gets events information from Facebook.com
 *      and prints them out
 *********************************************************************************************************
 */

    function display_events() {
        include 'src/facebook.php';

        $app_id = '235481749878187';
        $secret = '37cf1bf8ce3c75fec6da4774be6cd27b';

        $config = array();
        $config['appId'] = $app_id;
        $config['secret'] = $secret;
        $config['fileUpload'] = false; // optional                

        $facebook = new Facebook($config);

        $user = $facebook->getUser(); //user id

        $fql = "SELECT eid,name,pic_square,host,start_time,end_time,location,description FROM event WHERE eid 
        IN(SELECT eid FROM event_member WHERE uid= " . $user . ")AND end_time >= " . mktime() . " ORDER BY start_time ASC"; //hämta fler alternativ från event_member för att få se mer funktioner
        
        

        $ret_obj = $facebook->api(array(
            'method' => 'fql.query',
            'query' => $fql,
                ));


        foreach ($ret_obj as $key) {     
            $facebook_url = 'https://www.facebook.com/events?eid=' . $key['eid'];
            $start_time = date('M j, Y \a\t g:i A', $key['start_time']);
            $end_time = date('M j, Y \a\t g:i A', $key['end_time']);

            $events_div =  '<div class="event">'. $image_div = '<a href="' . $facebook_url . '"><img src="' . $key['pic_square'] . '" target="_blank"/></a>';
            $span_div = '<span>
            <a href="' . $facebook_url . '" target="_blank"><h2>' . $key['name'] . '</h2></a>
            <p class="time">Start tid: ' . $start_time . '</p>
            <p class="time">Slut tid: ' . $end_time . '</p>                
            <p class="location">Plats: ' . $key['location'] . '</p>
            <p class="host">Host: ' . $key['host'] . '</p>';
 //     En query för att få ut event members men inte klar än...           
//            $member_query = "SELECT uid, name, pic_square FROM user WHERE uid IN(SELECT uid FROM event_memeber WHERE eid =". $key['eid'] ."ORDER BY name DESC";
//            print_r($member_query);
//            foreach ($member_query as $keys) {
//                '<p class="user">Memebers: ' . $keys['uid'] . '</p>';         
//            }
            ' 
            
            <p class="description">Beskrivning: ' . $key['description'] . '</p>                
            </span>';
            '</div>'; 
            echo $events_div;            
            echo $span_div;
        }
    }

?>
