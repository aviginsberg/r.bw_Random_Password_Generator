<?php
/**
 * User: aviginsberg
 * IDE: PhpStorm.
 * Date: 11/15/16
 */
$pwlen = $_GET['len'];

if(!isset($pwlen))
    $pwlen = 15;




function randpw($len){
    $nums = str_split('0123456789');
    $lowers = str_split('abcdefghijklmnopqrstuvwxyz');
    $uppers = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ');
    $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $chars = $chars.$chars.$chars.$chars;
    $charsarr = str_split($chars);

    shuffle($charsarr);
    $randpass = substr(implode("",$charsarr),0,$len);
    if($len>3){
        $checkpass = str_split($randpass);
        if(count(array_intersect($nums,$checkpass))<1 || count(array_intersect($lowers,$checkpass))<1 || count(array_intersect($uppers,$checkpass))<1){
            return randpw($len);
        }
    }

    return $randpass;
}


echo randpw($pwlen);

?>