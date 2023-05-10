            <?php
$number = $_POST['btn btn-primary'];
$array = array(
    'id'    =>  $number
);      

$ch = curl_init('http://192.168.0.110/Remotes/avt1');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($array, '', '&'));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HEADER, false);
$html = curl_exec($ch);
curl_close($ch);    
    echo $html;

?>