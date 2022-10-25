<?php
    function display_error($errors,$field){
        if($errors->hasError($field)){
            return $errors->getError($field);
        }else{
            return false;
        }
    }
?>