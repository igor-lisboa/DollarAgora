<?php
function get_string_between($string, $start, $end){
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}

function dollar_hoje($salva_arq_site=false){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://www.google.com.br/search?rlz=1C1HLDY_pt-BRBR735BR735&q=d%C3%B3lar&spell=1&sa=X&ved=0ahUKEwjXtPWPo6PeAhUDFpAKHZxyAX4QBQgqKAA&biw=1440&bih=789'); 
    curl_setopt($ch, CURLOPT_HEADER, 1); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    $data = curl_exec($ch); 
    if($salva_arq_site){
        file_put_contents("site.txt", $data);
    }
    $parsed = get_string_between($data, 'o = ', ' Real');
    curl_close($ch);
    return $parsed;
}

echo dollar_hoje();
 ?>