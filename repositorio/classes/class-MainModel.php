<?php

class MainModel {
 
    function ToObject($rs) {
        $obj = $this;        
        foreach ($rs as $key => $value) {
            $obj->{$key} = $value;
        }
        return $obj;
    } 
    
}
