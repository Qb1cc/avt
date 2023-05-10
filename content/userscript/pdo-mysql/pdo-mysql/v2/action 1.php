<?php
// Include the database connection file
$conn = new PDO("mysql:host=localhost;dbname=avtosvett2_lamp", "avtosvett2_lamp", "213981aA");

if (isset($_POST['countryId']) && !empty($_POST['countryId'])) {

	// Fetch state name base on country id
	$sql = "SELECT * FROM model WHERE make_id = ".$_POST['countryId'];

	if ($result->num_rows > 0) 
		echo '<option value="">Select State</option>'; 
		foreach ($conn->query($sql) as $row) {
							echo '<option value="'.$row['model_id'].'">'.$row['name'].'</option>';
		}
} elseif(isset($_POST['typeId']) && !empty($_POST['typeId'])) {

	// Fetch city name base on state id
	$sql1 = "SELECT * FROM modification WHERE model_id = ".$_POST['stateId'];

		echo '<option value="">Select city</option>'; 
		foreach ($conn->query($sql1) as $row1) {
							echo '<option value="'.$row1['modification_id'].'">'.$row1['name'].'</option>';
		}
	} else {
		echo '<option value="">Модификация не найдена</option>'; 
	} 
	
?>