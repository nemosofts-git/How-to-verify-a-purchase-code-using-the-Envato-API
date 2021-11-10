<?php

function verify_envato_purchase_code($product_code){
        $url = "https://api.envato.com/v3/market/author/sale?code=" . $product_code;
        $curl = curl_init($url);
        $personal_token = "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx";
        $header = array();
        $header[] = 'Authorization: Bearer ' . $personal_token;
        $header[] = 'User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10.11; rv:41.0) Gecko/20100101 Firefox/41.0';
        $header[] = 'timeout: 20';
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        $envatoRes = curl_exec($curl);
        curl_close($curl);
        $envatoRes = json_decode($envatoRes);
        return $envatoRes;
}

$envato_buyer= verify_envato_purchase_code("xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx");

$item_id = $envato_buyer->item->id;
$license_type = $envato_buyer->license;
$buyer_name = $envato_buyer->buyer;