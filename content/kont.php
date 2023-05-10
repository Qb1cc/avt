<?php
/**
 * Страничный скрипт для отображения заказа покупателю
*/
defined('_ASTEXE_') or die('No access');

//Для работы с пользователем
require_once($_SERVER["DOCUMENT_ROOT"]."/content/users/dp_user.php");
$user_id = DP_User::getUserId();
if(isset($_GET['product'])){
    echo '<option value=0 selected>Выберите марку</option>';
    $res = mysqli_query($link, 'SELECT * FROM '.db_prefix.'marka '.(empty($_GET['product']) ? '' : 'WHERE product=' . intval($_GET['product'])).' ORDER by name');
    while(($row = mysqli_fetch_array($res)))
        echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>\n";
    exit;

}elseif(isset($_GET['marka'])){
    $res =  mysqli_query($link, 'SELECT * FROM '.db_prefix.'model WHERE marka='.intval($_GET['marka']).' ORDER by name');
    echo '<option value=0 selected>Выберите модель</option>';
    while(($row = mysqli_fetch_array($res)))
        echo "\n<option value=\"" . $row['id'] . "\"" . ' data-from=' . $row['year_from']. ' data-to=' . $row['year_to']. ">" . $row['name'] . "</option>";
    exit;

}elseif(isset($_GET['model'])){
    $id_model=intval($_GET['model']);
    $res =  mysqli_query($link, 'SELECT * FROM '.db_prefix.'model WHERE id='.$id_model.' LIMIT 1');
    if(!($row = mysqli_fetch_array($res)))die;
    $model=$row['name'];
    $id_marka=intval($row['marka']);
    $res = mysqli_query($link,'SELECT * FROM '.db_prefix.'marka WHERE id='.$id_marka.' LIMIT 1');
    if(!($row = mysqli_fetch_array($res)))die;
    $marka=$row['name'];
    $product=intval($row['product']);

    echo "
<div style='border: #C5D3DC 1px solid; padding: 10px; width: 97%;'>
производитель=<b>".($product==1?' импортное ТС':'отечественное ТС')."</b>
<br/>марка=<b>".$marka."</b>
<br/>модель=<b>".$model."</b>
</div>";
    mysqli_close($link);
    exit;
}

?<!DOCTYPE HTML>
<html><head>
    <title>Выбор марка->модель автомобиля с использованием Ajax</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head><body>

<h1>Выбор марка->модель автомобиля с использованием Ajax</h1>
<p>Имеются два селекта: марка и модель и переключатель: иностранное или отечественное авто.
    При выборе значения переключателя подгружается список марок автомобилей, при выборе марки подгружается список моделей,
    а при выборе модели можно ввести дополнительно год выпуска и/или загрузить некоторую информацию об этом автомобиле.</p>

<table border="0" cellspacing="0" cellpadding="5" align="center">
    <tr>
        <td width="250">Производитель транспортного средства (ТС)
        <td>
            <label><input type="radio" value="1" name="product"
                          onClick="fetch('?product='+this.value)
                          .then(function(e){e.text().then(function(e) {document.getElementById('marka').innerHTML=e;})})"> Иностранное ТС</label><br>
            <label><input type="radio" value="2" name="product"
                          onClick="fetch('?product='+this.value)
                          .then(function(e){e.text().then(function(e) {document.getElementById('marka').innerHTML=e;})})"> Отечественное ТС</label><br>
        <td width="250"> 

    <tr>
        <td colspan="3" class="blank">
    <tr>
        <td id="markat">Марка ТС
        <td><select style="WIDTH: 200px; height:21px" name="marka" id="marka" onLoad='this.focus=false;'
                    onChange="document.getElementById('model').disabled=false;
                    fetch('?marka='+this.options[this.selectedIndex].value)
                    .then(function(e){e.text().then(function(e){document.getElementById('model').innerHTML=e;})})">
                <option value=0 selected>Выберите марку</option>
                <?
                $res = mysqli_query($link, 'SELECT * FROM '.db_prefix.'marka WHERE product=1 ORDER by name');
                while(($row = mysqli_fetch_assoc($res)))
                    echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>\n";
                ?>
            </select>
    <tr>
        <td colspan="3" class="blank">
    <tr>
        <td id="modelt">Модель ТС
        <td><select style="WIDTH: 200px; height:21px" name="model" id="model" disabled="disabled"
                    onChange="var o=this.options[this.selectedIndex];
    if(o.getAttribute('data-from')>0){
        var obj=document.getElementById('expl');
        while (obj.options.length > 0)obj.options.remove(0);
        for(var j=0,i=o.getAttribute('data-from');i<=o.getAttribute('data-to');i++){
            obj.options[j++]=new Option(i,i);
        }
    }
    ">
                <option value selected disabled="disabled">Выберите модель</option>
            </select>
    <tr>
        <td colspan="3" class="blank">
    <tr>
        <td id="explt">Год выпуска ТС
        <td><select style="WIDTH: 200px; height:21px" name="expl" id="expl" onChange="document.getElementById('info').innerHTML=
        'производитель=<b>'+(document.getElementsByName('product')[0].checked?' Иностранное ТС':'Отечественное ТС')+'</b>'+
        '\n<br>марка=<b>'+document.getElementById('marka').options[document.getElementById('marka').selectedIndex].text+'</b>'+
        '\n<br>модель=<b>'+document.getElementById('model').options[document.getElementById('model').selectedIndex].text+'</b>'+
        '\n<br>год выпуска=<b>'+this.value+'</b>'
        ">
                <option value selected>Выберите значение</option>
                <?php for($i=0;$i<=15;$i++) echo "<option value='".$i."'>".(intval(date("Y"))-$i)."</option>\n";
                ?>
            </select>

</table>

<div id="info"></div>
</body></html>
?>