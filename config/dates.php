<?php
$currenttimestamp = date("Y-m-d H:i:s"); 

function timestampToDate($format, $date,$addDays = 0){
    //$format = 'd/m/Y';
    if($addDays != 0)
    {
        $date = date($format,strtotime("+".$addDays." days",$date));
    }
    else{
        $date = date($format,strtotime($date));
    }
    return $date;
    //date('d/m/Y',strtotime("+14 days",$order->deliveredon));
}

function dateToTimestamp($date,$addDays = 0){

    if($addDays != 0)
    {
        $date = date('Y-m-d 00:00:00',strtotime("+".$addDays." days",$date));
    }
    else{
        
        $date = date('Y-m-d 00:00:00',strtotime($date));
    }
    return $date;
}

function timestampToTime($date,$addDays = 0){
    if($addDays != 0)
    {
        $date = strtotime("+".$addDays." days",$date);
    }
    else{
        $date = strtotime($date);
    }
    return $date;
}