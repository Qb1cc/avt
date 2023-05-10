<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// Include the database connection file
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

if (isset($_POST['lampId']) && !empty($_POST['lampId']))

	// Fetch state name base on country id
	$sql = "SELECT * FROM modification_to_product where modification_id=".$_POST['stateid']." && category_id=".$_POST['typeid'];

	if ($result->num_rows > 0) 
		foreach ($conn->query($sql) as $row2) {
							print '<option value="'.$row2['product_id'].'"></option>';
		}


?>


<?php
// Include the database connection file
include('db_config.php');
 
if (isset($_POST['countryId']) && !empty($_POST['countryId'])) {
 
 // Fetch state name base on country id
 $query = "SELECT * FROM states WHERE country_id = ".$_POST['countryId'];
 $result = $con->query($query);
 
 if ($result->num_rows > 0) {
 echo '<option value="">Select State</option>';
 while ($row = $result->fetch_assoc()) {
 echo '<option value="'.$row['id'].'">'.$row['state_name'].'</option>';
 }
 } else {
 echo '<option value="">State not available</option>';
 }
} elseif(isset($_POST['stateId']) && !empty($_POST['stateId'])) {
 
 // Fetch city name base on state id
 $query = "SELECT * FROM cities WHERE state_id = ".$_POST['stateId'];
 $result = $con->query($query);
 
 if ($result->num_rows > 0) {
 echo '<option value="">Select city</option>';
 while ($row = $result->fetch_assoc()) {
 echo '<option value="'.$row['id'].'">'.$row['city_name'].'</option>';
 }
 } else {
 echo '<option value="">City not available</option>';
 }
}
?>