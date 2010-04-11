<?php

class OpenStruct {
    private $_data = array();
    
    function __set($name, $value) {
        $this->_data[$name] = $value;
    }
    
    function __get($name) {
        $obj = $this->_data[$name];
        if (!$obj) $obj = FALSE;
        return $obj;
    }
    
    function as_ary() {
        return $this->_data;
    }
}

?>