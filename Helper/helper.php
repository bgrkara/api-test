<?php

class Helper{
    // Error Checking
    static function controlVariable($value){
        if (isset($_POST[$value])){
            return strip_tags($_POST{$value});
        }else{
            return '';
        }
    }

    static function controlIntegerVariable($value){
        if (isset($_POST[$value])){
            return strip_tags(intval($_POST{$value}));
        }else{
            return '';
        }
    }
}