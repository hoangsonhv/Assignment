<?php
if (!function_exists("formatDate")){
    function formatDate($data){
        if ($data instanceof \Carbon\Carbon){
            return $data->format("d/m/Y");
        }
    }
}
if (!function_exists("formatDateTime")){
    function formatDateTime($data){

    }
}

