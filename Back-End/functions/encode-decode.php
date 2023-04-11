<?php 

const decode = 0;
const encode = 1;

function encode_decode(string $text, $mode)
{
    if($mode) //Encode
    {
        $temp = [];
        $encoded = '';
        for ($i=0; $i<strlen($text); $i++) {
            $temp[] = (string) ord($text[$i]);
        }
        foreach ($temp as $char) {
            if(strlen($char) == 1)
                $encoded .= '00' . $char;
            elseif(strlen($char) == 2)
                $encoded .= '0' . $char;
            elseif(strlen($char) == 3)
                $encoded .= $char;
        }
        return $encoded;
    }
    else //Decode
    {
        $decoded = '';
        for ($i=0 ; $i < strlen($text) ; $i+=3) {
            $char = (int) ($text[$i] . $text[$i+1] . $text[$i+2]);
            $decoded .= chr($char);
        }
        return $decoded;
    }
}