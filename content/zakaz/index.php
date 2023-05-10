<!DOCTYPE html>
<html>
<link media="print" rel="stylesheet" href="/css/print.css">
<style>
        table {
            border:px solid #b3adad;
            border-collapse:collapse;
            padding:5px;
            display: inline-table;
            border: groove;

        }
        table tr {
            border:1px solid #b3adad;
            padding:5px;
            background: #f0f0f0;
            color: #313030;
        }
        table td {
            border:1px solid #b3adad;
            text-align:center;
            padding:5px;
            background: #ffffff;
            color: #313030;
        }
    </style>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Автосвет - проверка статуса заказа</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alatsi&amp;display=swap">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand bg-light navigation-clean">

        <div class="container"><a class="navbar-brand" href="index.php" style="font-family: Lato, sans-serif;">Avtosvet</a>
             <div class="container">
                    <div class="container font-monospace text-uppercase text-end"><strong class="js-insertCurrentDate" data-format="5">
                        <?php
// установка часового пояса по умолчанию.
date_default_timezone_set('Europe/Moscow');
// выведет примерно следующее: Monday
echo date("d.m.y");
?>
                    </strong></div>
                </div><button class="navbar-toggler" data-bs-toggle="collapse"></button></div>
    </nav>
    <header class="text-center text-white masthead" style="background:url('assets/img/bg-masthead.jpg')no-repeat center center;background-size:cover;">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-9 mx-auto position-relative">
                    <h1 class="mb-5">Онлайн проверка статуса заказа</h1>
                </div>
                <div class="col-md-10 col-lg-8 col-xl-7 mx-auto position-relative">

<div class="form-action playcholder">
<form action="index.php" method="post">
<input type="text" name="number" placeholder="Введите номер заказа">
</div>
                </div>
            </div>
        </div>
    </header>
    <section class="text-center bg-light features-icons" style="text-align: center;">
        <div class="container">
            <div class="row" style="text-align: center;">
                <?php
$numb = $_POST['number'];
$numb2 = '#';
$numb3 = $numb2.=$numb;
$array1 = array(
    'id'    =>  $numb3
);      
$ch1 = curl_init('http://192.168.0.110/Remotes/avt');
curl_setopt($ch1, CURLOPT_POST, 1);
curl_setopt($ch1, CURLOPT_POSTFIELDS, http_build_query($array1, '', '&'));
curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch1, CURLOPT_HEADER, false);
$html1 = curl_exec($ch1);
curl_close($ch1);
$json1 = $html1;
$array1 = json_decode($json1);

?>

<table>
<?php foreach($array1 as $val1) : ?>
<tr><th>Дата заказа</th><th>Сумма заказа</th><th>Статус</th></tr>
<tr>
<td><?php echo $val1->data_zakaza;?></td>
<td><?php echo $val1->summa;?></td>
<td><?php echo $val1->status_zakaza;;?></td>
<?php endforeach; ?>
</tr>
</table>
            </div>
                
        <div class="row" style="text-align: center;">
                 <?php
if(empty($array1)){
    echo "";
}
else

    include_once 'post2.php';
    
    ?>
            </div>

                <?php
$numb = $_POST['number'];
$numb2 = '#';
$numb3 = $numb2.=$numb;
$array1 = array(
    'id'    =>  $numb3
);      
$ch1 = curl_init('http://192.168.0.110/Remotes/avt');
curl_setopt($ch1, CURLOPT_POST, 1);
curl_setopt($ch1, CURLOPT_POSTFIELDS, http_build_query($array1, '', '&'));
curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch1, CURLOPT_HEADER, false);
$html1 = curl_exec($ch1);
curl_close($ch1);
$json1 = $html1;
$array1 = json_decode($json1);

?>




<!-- Получаем данные JSON в переменную Number, форматируем для правильного запроса, полученные данные отправляем на сервер-->      
    <?php
if(empty($array1)){
    echo "";
}
else

    include_once 'post2.php';
    
    ?>
<!-- конец блока -->

<!-- Рисуем таблицу товаров из полученных данных JSON -->

<!-- конец блока -->
        </div>
    </section>
    <footer class="bg-light footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 text-center text-lg-start my-auto h-100">
                    <ul class="list-inline mb-2">
                        <li class="list-inline-item"><a href="#">Главная</a></li>
                    </ul>
                    <p class="text-muted small mb-4 mb-lg-0">© Автосвет 2022</p>
                </div>
                <div class="col-lg-6 text-center text-lg-end my-auto h-100"></div>
            </div>
        </div>
    </footer>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
