<?php namespace App\Interfaces\Format;

interface Formatter {

    /**
     * Return data in appropriate format.
     *
     * @param array $data
     * @return mixed
     */
    public function formatData($data);


    /**
     * Add header to response.
     *
     * @return mixed
     */
    public function addHeader();
}