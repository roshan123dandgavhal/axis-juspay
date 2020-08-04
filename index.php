<?php

$customer_id = 'guest_user_101';
$customer_email = 'customer@mail.com';
$amount = '1.00';
# Create a "unique" order id.
$order_id = 'Ord_My_12345678'; //.rand();

$return_url = "http://lbmserver:84/roshan_test/AXIS/custom/response.php";

$array = array('customer_id' => $customer_id , 'customer_email' => $customer_email , 
                         'amount' => $amount , 'order_id' => $order_id, 'return_url' => $return_url );


$mg_api='2D243A59D784386A41897A6CF221A6';
$curl_post_url = "https://axisbank.juspay.in/orders";
$ch = curl_init();
curl_setopt ($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt ($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, false);
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($ch, CURLOPT_VERBOSE, 0);
curl_setopt ($ch, CURLOPT_HEADER, 1);
curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 10);
curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt ($ch, CURLOPT_USERPWD, $mg_api . ":");
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($ch, CURLOPT_POST, true);
curl_setopt ($ch, CURLOPT_HEADER, false);
curl_setopt ($ch, CURLOPT_CUSTOMREQUEST, $method);
curl_setopt ($ch, CURLOPT_URL, $curl_post_url);
curl_setopt ($ch, CURLOPT_POSTFIELDS, $array);
curl_setopt ($ch, CURLOPT_TIMEOUT, 0);
$result = curl_exec($ch);
curl_close($ch);
$someArray = json_decode($result, true); 
//print_r($someArray);
$weburl=$someArray['payment_links']['web'];
header('Location:'.$weburl);
?>

