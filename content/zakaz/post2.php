<?php
$number = $_POST['number'];
$number2 = '#';
$number3 = $number2.=$number;
$array = array(
    'id'    =>  $number3
);      
$ch = curl_init('http://192.168.0.110/Remotes/avt1');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($array, '', '&'));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HEADER, false);
$html = curl_exec($ch);
curl_close($ch);
$json = $html;
$array = json_decode($json, true);

?>
<table>
<thead>
    <tr border='1'>
        <th>Артикул</th>
        <th>Кол-во,шт</th>
        <th>Цена</th>
        <th>Статус</th>
    </tr>
    <?php
    foreach($array as $result){
        ?>
</thead>    
<tbody>
        <tr>
            <td><?php echo $result['naimenovanie']; ?></td>
            <td><?php echo $result['ordered']; ?></td>
            <td><?php echo $result['summa']; ?></td>
            <td><?php echo $result['status_']; ?></td>
        </tr>
<?php   
}
?>
</tbody>
</table>