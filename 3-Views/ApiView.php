<?php

class ApiView {



    function response($data, $status){
        header("Content-Type: application/json");
        header("HTTP/1.1" . $status . " " . $this->_requestStatus($status));
        echo json_encode($data);
    }

    function _requestStatus($code){
        $status = array(
            200=> "OK",
            404 => "Not Fount",
            500 => "Internal Server Error"
        );

        return (isset($status[$code]))? $status[$code] : $status[500];
    }
}