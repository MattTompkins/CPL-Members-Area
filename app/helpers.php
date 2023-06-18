<?php

if (!function_exists('formatDate')) {
    function formatDate($date)
    {
        return \Carbon\Carbon::parse($date)->format('d M Y');
    }
}

if (!function_exists('pre_r')) {
    function pre_r($data)
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }
}