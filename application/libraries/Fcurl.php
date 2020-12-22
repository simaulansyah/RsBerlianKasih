<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Fcurl{
    
   public function urlGet($index)
    {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $index);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    curl_close($curl);
    $result = json_decode($result, true);
    return $result['data'];
    }

    public function urlSet($url, $data)
    {
        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        curl_setopt($ch, CURLINFO_HEADER_OUT, true);
        $output = curl_exec($ch); 
        curl_close($ch);      
        return $output;
    }


}