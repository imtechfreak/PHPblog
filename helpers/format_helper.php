<?php

/**
 * Date function
 * @param $date
 * @return bool|string
 */
function formatDate($date){
    return date('F ,j, Y g:i a',strtotime($date));
}

/**
 * @param $text
 * @param int $chars
 * @return string
 */
function shortText($text, $chars =150){
    $text = $text." ";
    $text = substr($text,0,$chars);
    $text = substr($text,0,strrpos($text,' '));
    return $text;
}