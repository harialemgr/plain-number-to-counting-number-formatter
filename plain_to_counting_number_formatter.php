<?php

/** 
 * Program Written by: Milan Tarami
 * 
 * Portfolio : http://www.milantarami.com.np/
 * Facebook : https://www.facebook.com/milantarami.dev
 * Twitter : https://twitter.com/_milantarami
 * Github : https://github.com/milantarami
**/

class PlainNumberToCountingNumberFomatter 
{

    protected $decimal , $integer, $result;

    public function __construct() {

    }

    /** 
     * set a this class properties to empty 
     * @param null 
     * @return boolean
     * **/

    public function setEmptyProperties() {
        $this->decimal = '';
        $this->integer = '';
        $this->result = '';
        return true;
    }   

    /** 
    * @param number $floating_point_number
    * @return boolean 
    **/

    public function chunkDownFloationgPointNumber($floating_point_number) {
        $chunk_number_array = explode('.', $floating_point_number);
        $this->integer = $chunk_number_array[0];
        $this->decimal = $chunk_number_array[1];
        return true;
       
    }

    public function integerLengthIsLessThanThree($integer) {
        $this->result = $integer ;
        $this->result .= (!empty($this->decimal)) ? '.'.$this->decimal : '';
    }
 
    /** 
    * @param number Ex. 12234 / 45456.32 / 980876123
    * @return string Ex. 12,234 / 45,456.32 / 98,08,76,123
    **/

    public function southAsianNumberSystemFormatter($number) {
        $this->setEmptyProperties();
        $valid_number = is_numeric(trim($number)) ? true : false;
        if($valid_number) {
            /* below statement doesn't work when you pass number in string format */
            // $float_number = is_float($number) ? true : false; 
            /*  check if a number is floating point number */ 
            $float_number = preg_match('/[.]/', $number) ? true : false;
            switch ($float_number) {
                case true:
                        $this->chunkDownFloationgPointNumber($number);
                    break;

                case false:
                        $this->integer = $number;
                    break;    
            }

            $length = strlen($this->integer);
            switch ($length) {
                case ($length <= 3):
                       $this->integerLengthIsLessThanThree($this->integer);
                    break;
                
                case ($length > 3):
                    /*  getting last 3 number */
                    $last_3_number = substr($number, $length - 3, 3);
                    /* all numbers except last 3 numbers */
                    $other_numbers = substr($number, 0, strlen($this->integer) - 3);
                    //chunking down to array with 2 character in a array value
                    $reverse_number = strrev($other_numbers);
                    $chunk_array = str_split($reverse_number, 2);
                    $reverse_chunk_array = array_reverse($chunk_array);
                    $array_length = sizeof($reverse_chunk_array);
                    foreach($reverse_chunk_array as $key => $chunk) {
                        if( $key == $array_length - 1 )                   
                            $this->result .=  strrev($chunk);  
                        else 
                            $this->result .= strrev($chunk) . ',';
                    }
                    // $this->result = implode( ',', $chunks );
                    $this->result .= ',' . $last_3_number;
                    $this->result .= (!empty($this->decimal)) ? '.' . $this->decimal : ''; 
                   
                break;
            }
            return $this->result;
        } 
        else {
            return 'Not a valid number !';
        }
    }




    /** 
    * @param number Ex. 12234 / 45456.32 / 980876123
    * @return string Ex. 12,234 / 45,456.32 / 98,08,76,123
    **/

    public function internationalNumberSystemFormatter($number) {
        $this->setEmptyProperties();
        $valid_number = is_numeric(trim($number)) ? true : false;
        if($valid_number) {

            $float_number = preg_match('/[.]/', $number) ? true : false;
            switch ($float_number) {
                case true:
                        $this->chunkDownFloationgPointNumber($number);
                    break;

                case false:
                        $this->integer = $number;
                    break;    
            }

            $length = strlen($this->integer);
            switch ($length) {
                case ($length <= 3):
                        $this->integerLengthIsLessThanThree($this->integer);
                    break;
                
                    case ($length > 3):
                        
                        $reverse_number = strrev($this->integer);
                        $chunk_array = str_split($reverse_number, 3);
                        //chunking down to array with 3 character in a array value
                        $reverse_chunk_array = array_reverse($chunk_array);
                        $array_length = sizeof($reverse_chunk_array);
                        foreach($reverse_chunk_array as $key => $chunk) {
                            if( $key == $array_length - 1 )                   
                                $this->result .=  strrev($chunk);  
                            else 
                                $this->result .= strrev($chunk) . ',';
                        }
                        $this->result .= (!empty($this->decimal)) ? '.' . $this->decimal : ''; 
                    break;
            }
            return $this->result;
        } 
        else {
            return 'Not a valid number !';
        }
    }
    
    public function toPlainNumber($number) {

        if(preg_match('/[0-9.,]/', trim($number)) || preg_match('/[0-9,]/', trim($number)) || preg_match('/[0-9]/', trim($number)))
            return str_replace(',', '', $number);
        else
            return 'Not a valid Number String';
        
    }

} 

$formatterObject = new PlainNumberToCountingNumberFomatter();
echo $formatterObject->southAsianNumberSystemFormatter(92345634563.34) . "<br>";
echo $formatterObject->internationalNumberSystemFormatter(92345634563.34) . "<br>";
echo $formatterObject->toPlainNumber('92,345,634,563.34') . "<br>";




?>