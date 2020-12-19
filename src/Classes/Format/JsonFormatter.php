<?php namespace App\Classes\Format;

use App\Interfaces\Format\Formatter;

class JsonFormatter implements Formatter {

    /**
     * Parse data in json format.
     *
     * @param array $data
     * @return false|mixed|string
     */
    public function formatData($data)
    {
        return json_encode($data);
    }
}