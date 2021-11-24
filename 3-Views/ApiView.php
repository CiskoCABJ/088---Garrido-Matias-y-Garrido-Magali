<?php

class ApiView {

    function response($data, $status){
        header("Content-Type: application/json");
        header("HTTP/1.1" . $status . " " . $this->_requestStatus($status));
        echo json_encode($data);
    }

    function _requestStatus($code){
        $status = array(
            200 => "OK",
            204 => "No Content", 
            400 => "Bad Request", 
            404 => "Not Fount",
            500 => "Internal Server Error",
            511 => "Network Authentication Required"
        );

        if(isset($status[$code])){
            return  $code;
        }else return  500;
         
    }
}