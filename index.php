<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-HY6BS9Z7KV"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-HY6BS9Z7KV');
</script>
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
    curl_setopt($ch, CURLOPT_URL, 'https://dolarhoje.com/'); 
    curl_setopt($ch, CURLOPT_HEADER, 1); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    $data = curl_exec($ch); 
    if($salva_arq_site){
        file_put_contents("site.txt", $data);
    }
    $parsed = get_string_between($data, '<input type="text" id="nacional" value="', '"');
    curl_close($ch);
    return $parsed;
}
ob_clean();
echo dollar_hoje();
 ?>
