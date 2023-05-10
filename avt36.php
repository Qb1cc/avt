<?php
$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL,'http://www.anydomain.com/anyapi.php?a=parameters');
$content = curl_exec($ch);
echo $content;
?>