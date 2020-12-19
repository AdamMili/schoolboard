<?php namespace App\Classes\Format;

use App\Interfaces\Format\Formatter;
use SimpleXMLElement;

class XmlFormatter implements Formatter {

    /**
     * Parse data in XML format.
     *
     * @param array $data
     * @return mixed
     */
    public function formatData($data)
    {
        $xmlData = new SimpleXMLElement('<?xml version="1.0"?><data></data>');

        $this->convertToXML($data, $xmlData);

        return $xmlData->asXML();
    }

    /**
     * Convert array to XML.
     *
     * @param array $data
     * @param SimpleXMLElement $xmlData
     */
    private function convertToXML($data, $xmlData)
    {
        foreach( $data as $key => $value ) {
            if( is_array($value) ) {
                if( is_numeric($key) ){
                    $key = 'item'.$key;
                }

                $subNode = $xmlData->addChild($key);
                $this->convertToXML($value, $subNode);
            } else {
                $xmlData->addChild("$key", htmlspecialchars("$value"));
            }
        }
    }
}