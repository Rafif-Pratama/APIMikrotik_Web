<?php

$router_address = '192.168.13.1';
$router_user    = 'admin';
$router_pass    = '';
require('routeros_api.class.php');

$API        = new RouterosAPI();
$API->debug = false;

if ($API->connect($router_address, $router_user, $router_pass)) {
    

        $PING = $API->write('/ping',false);
            $API->write('=address=8.8.8.8',false); 
            $API->write('=count=3',false);
            $API->write('=interval=1');
            $ARRAY4 = $API->read(false);

            echo "<pre>". print_r($ARRAY4) ." </pre>";

}
?>