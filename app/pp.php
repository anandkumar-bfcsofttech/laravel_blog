<?php
if(!function_exists('p')) {
    function pp($data)
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }
}