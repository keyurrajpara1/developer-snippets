<?php
if (!function_exists('_pre')) {
    function _pre($array, $exit = 1){
        echo '<pre>';
        print_r($array);
        echo '</pre>';
        if ($exit == 1) {
            exit();
        }
    }
}
?>