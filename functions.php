<?php


function encrypt($text)
{
    return openssl_encrypt($text, "AES-128-ECB", "48213795846");
}

function decrypt($text)
{
    return openssl_decrypt($text, "AES-128-ECB", "48213795846");
}


?>