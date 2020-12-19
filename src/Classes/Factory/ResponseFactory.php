<?php namespace App\Classes\Factory;

use App\Classes\Format\JsonFormatter;
use App\Classes\Format\XmlFormatter;
use Exception;

class ResponseFactory {

    public static function createResponse($type) {

        if ($type === 'CSM') {
            return new JsonFormatter();
        } else if ($type === 'CSMB'){
            return new XmlFormatter();
        }

        return new Exception('False response type');
    }
}