<?php
$getid = $_GET['ip'];

   $url = "https://sylixapi.herokuapp.com/api/iplookup?q=$getid";
   $curl = curl_init($url);
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($curl, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json'
   ]);
   $response = curl_exec($curl);
   curl_close($curl);
   echo $response . PHP_EOL;
