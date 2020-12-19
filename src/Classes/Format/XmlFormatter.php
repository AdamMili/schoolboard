<?php namespace App\Classes\Format;

use App\Interfaces\Format\Formatter;
use SimpleXMLElement;
use Spatie\ArrayToXml\ArrayToXml;

class XmlFormatter implements Formatter {

    /**
     * Parse data in XML format.
     *
     * @param array $data
     * @return mixed
     */
    public function formatData($data)
    {
        $gradeXml = [];
        foreach ($data['student']['grades'] as $grade) {
            $gradeXml['grade'][] = $grade;
        }

        $data['student']['grades'] = $gradeXml;

        return ArrayToXml::convert($data, 'student_info');
    }

    public function addHeader()
    {
        header('Content-Type: text/xml; charset=utf-8');
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