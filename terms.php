<?php

define('YOUR_APP_ID', 'YOUR_APP_ID');

//uses the PHP SDK.  Download from https://github.com/facebook/php-sdk
require 'src/facebook.php';

$facebook = new Facebook(array(
  'appId'  => '235481749878187',
  'secret' => '37cf1bf8ce3c75fec6da4774be6cd27b',
));

$userId = $facebook->getUser();

?>

<html>
  <body>
    <?php if ($userId) { 
      $userInfo = $facebook->api('/' + $userId); ?>
      Welcome <?= $userInfo['name'] ?>
    <?php } else { ?>
    <div id="fb-root"></div>
    <fb:login-button></fb:login-button>
    <?php } ?>
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          appId      : '<?= YOUR_APP_ID ?>',
          status     : true, 
          cookie     : true,
          xfbml      : true,
          oauth      : true
        });

        FB.Event.subscribe('auth.login', function(response) {
          window.location.reload();
        });
      };

      (function(d){
         var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
         js = d.createElement('script'); js.id = id; js.async = true;
         js.src = "//connect.facebook.net/en_US/all.js";
         d.getElementsByTagName('head')[0].appendChild(js);
       }(document));
    </script>
  </body>
</html>
