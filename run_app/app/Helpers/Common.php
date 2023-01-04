<?php

function showDateTime1($carbon, $format = "d F Y, l"){
    return $carbon -> translatedFormat($format);
}

function showDateTime2($carbon, $format = "Y-m-d"){
    return $carbon -> translatedFormat($format);
}
