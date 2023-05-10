<?php
// Include the database connection file
$conn = new PDO("mysql:host=localhost;dbname=avtosvett2_lamp", "avtosvett2_lamp", "Qg1KX1!YFPHW7N1L");

if (isset($_POST['countryId']) && !empty($_POST['countryId'])) {

  // Fetch state name base on country id
  $sql = "SELECT * FROM model WHERE make_id = ".$_POST['countryId'];

  if ($result->num_rows > 0) 
    echo '<option value="">Выберите марку</option>'; 
    foreach ($conn->query($sql) as $row) {
              echo '<option value="'.$row['model_id'].'">'.$row['name'].'</option>';
    }
} elseif(isset($_POST['stateId']) && !empty($_POST['stateId'])) {
  // Fetch city name base on state id
  $sql1 = "SELECT * FROM modification WHERE model_id = ".$_POST['stateId'];

    echo '<option value="">Выберите модификацию</option>'; 
    foreach ($conn->query($sql1) as $row1) {
              echo '<option value="'.$row1['modification_id'].'">'.$row1['name'].'</option>';
    }
  } else {
    echo '<option value="">Модификация не найдена</option>'; 
  } 



  if ($result->num_rows > 0) 
    echo '<option value="">Выберите марку</option>'; 
    foreach ($conn->query($sql2) as $row2) {
              echo '<option value="'.$row2['articul'].'">'.$row2['name'].'</option>';}