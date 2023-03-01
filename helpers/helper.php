<?php

function getMinMaxVal(array $array, string $col, string $type= 'max')
{
    $val = $array[array_key_first($array)];

    foreach ($array as $arr) {
        $valIsMinMax = ($type === 'max' && (abs($val[$col]) < abs($arr[$col]))) || ($type === 'min' && (abs($val[$col]) > abs($arr[$col])));
        if ($valIsMinMax){
            $val = $arr;
            // continue;
        }

        // 123
        //123
    }
    return $val;
}

function getPostData()
{
    return $_POST;
}
