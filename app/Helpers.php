<?php

/**
 * generate authentication code
 * @return string
 */
function generate_verification_code(){
    $str   = '012345678912abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $token = str_shuffle($str);
    return $token;
}
