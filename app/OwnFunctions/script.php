<?php

function query($url, $data = array())
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_URL, $url);

    if (count($data) != 0)
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    //for debug only!
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    if (false === ($response = curl_exec($ch))){
        echo "Ошибка HTTP запроса : " . curl_error($ch);
        return null;
    } else {
        return json_decode($response, true);
    }
}
