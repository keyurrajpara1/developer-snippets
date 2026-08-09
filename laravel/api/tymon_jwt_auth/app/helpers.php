<?php
// require_once('Helpers/DataTableHelper.php');
// require_once('Helpers/AccessControlHelper.php');
// require_once('Helpers/UtilityHelper.php');
// require_once('Helpers/DateTimeHelper.php');
// require_once('Helpers/ProjectHelper.php');
// require_once('Helpers/LanguageHelper.php');
require_once('Helpers/EmailHelper.php');
// require_once('Helpers/PermissionsHelper.php');
// require_once('Helpers/Admin/PermissionsHelper.php');
use Illuminate\Encryption\Encrypter;

if (!function_exists('include_route_files')) {

    /**
     * Loops through a folder and requires all PHP files
     * Searches sub-directories as well.
     *
     * @param $folder
     */
    function include_route_files($folder)
    {
        try {
            $rdi = new recursiveDirectoryIterator($folder);
            $it = new recursiveIteratorIterator($rdi);

            while ($it->valid()) {
                if (!$it->isDot() && $it->isFile() && $it->isReadable() && $it->current()->getExtension() === 'php') {
                    require $it->key();
                }

                $it->next();
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}

    if(!function_exists('_object_array_search')){
        function _object_array_search($array, $index, $value){
            foreach ($array as $arrayInf) {
                if ($arrayInf->{$index} == $value) {
                    return $arrayInf;
                }
            }
            return null;
        }
    }

    if (!function_exists('_set_dash')) {
        function _set_dash($str = ''){
            $str = trim($str);
            if ($str == '') {
                $str = '-';
            }
            return $str;
        }
    }

    if (!function_exists('_random_string')) {
        function _random_string($length = 8){
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@!_#^*';
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, strlen($characters) - 1)];
            }
            $randomString = str_shuffle($randomString);
            return $randomString;
        }
    }

    if (!function_exists('_random_digit')) {
        function _random_digit($length = 4){
            $characters = '0123456789';
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, strlen($characters) - 1)];
            }
            $randomString = str_shuffle($randomString);
            return $randomString;
        }
    }

    if (!function_exists('_encrypt_decrypt')) {
        function _encrypt_decrypt($type, $data){
            $from_key = "2ywk0281BYriiu@DGf6y@cBab95E^rh3";
            $cipher = "AES-256-CBC";
            $encrypterFrom = new Encrypter($from_key, $cipher);

            if($type == 'encrypt'){
                $encryptedToString = $encrypterFrom->encryptString($data);
                return $encryptedToString;
            }else if($type == 'decrypt'){
                $decryptedFromString = $encrypterFrom->decryptString($data);
                return $decryptedFromString;
            }
        }
    }

    if (!function_exists('_categoryTree')) {
        function _categoryTree($table_name, $parent_id = 0, $sub_mark = '', $selected_category='')
        {
            $category = DB::table($table_name)
                ->where('parent_cat_id', $parent_id)
                ->select('*')
                ->get();

            if(!$category->isEmpty()){
                foreach($category as $key => $value){
                    if($selected_category != ''){
                        if($selected_category == 0){
                            //
                        }else{
                            $option = '<option ';
                            if($value->id == $selected_category){
                                $option .= 'selected ';
                            }
                            $option .= 'value="'.$value->id.'">'.$sub_mark.$value->cat_name.'</option>';
                            echo $option;
                            _categoryTree($table_name, $value->id, $sub_mark.'&nbsp;&nbsp;&nbsp;', $selected_category);
                        }
                    }else{
                        echo '<option value="'.$value->id.'">'.$sub_mark.$value->cat_name.'</option>';
                        _categoryTree($table_name, $value->id, $sub_mark.'&nbsp;&nbsp;&nbsp;');
                    }
                }
            }
        }
    }

    if (!function_exists('_category_list_dash')) {
        function _category_list_dash($table_name, $parent_id = 0, $sub_mark = '', $id='', &$sub_category_array=array()){
            if($parent_id == 0){
                $category = DB::table($table_name)
                    ->where('parent_cat_id', $parent_id)
                    ->where('id', $id)
                    ->select('*')
                    ->get();
            }else{
                $category = DB::table($table_name)
                    ->where('parent_cat_id', $parent_id)
                    ->select('*')
                    ->get();
            }
            
            if(!$category->isEmpty()){
                foreach($category as $key => $value){
                    // echo $sub_mark.$value->cat_name.'<br>';
                    $tempStdClassObject = $value;
                    $tempStdClassObject->cat_name_dash = $sub_mark.$value->cat_name;
                    array_push($sub_category_array, $tempStdClassObject);
                    _category_list_dash($table_name, $value->id, $sub_mark.' - ', $id, $sub_category_array);
                }
            }
        }
    }

    
    /** site footer text */
     if (!function_exists('_pre')) {
        function _pre($data,$isExist=1){
                echo "<pre>"; print_r($data);echo "</pre>";
                if($isExist ==1){
                    exit;
                }
        }
    }
    if (!function_exists('getCurrentDate')) {
        function  getCurrentDate()
        {
            return date('Y-m-d');
        }
    }
    if (!function_exists('getCurrentDateTime')) {
        function getCurrentDateTime()
        {
            return date('Y-m-d H:i:s');
        }
    }
    if (!function_exists('getCurrentTime')) {
        function getCurrentTime()
        {
            return date('H:i:s');
        }
    }


    if (!function_exists('siteDateFormat')) {
        function siteDateFormat($date)
        {
            return date('d M Y', strtotime($date));
        }
    }
    
    if (!function_exists('siteDateTimeFormat')) {
        function siteDateTimeFormat($date)
        {
            return date('d M Y H:i', strtotime($date));
        }
    }
    
?>