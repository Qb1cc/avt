<?php
// Include the database connection file
$conn = new PDO("mysql:host=localhost;dbname=avtosvett2_lamp", "avtosvett2_lamp", "Qg1KX1!YFPHW7N1L");
$conn1 = new PDO("mysql:host=localhost;dbname=avtosvett2_lamp", "avtosvett2_lamp", "Qg1KX1!YFPHW7N1L");

if (isset($_POST['countryId']) && !empty($_POST['countryId'])) {

	// Fetch state name base on country id
	$sql = "SELECT * FROM model WHERE make_id = ".$_POST['countryId'];
echo '<option value="">Выберите модель</option>';
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
	} 
	

if(isset($_POST['typeIdd']) && isset($_POST['stateIdd']))  {
	// Fetch city name base on state id
	$sql3 = "SELECT product.name, product.articul, product.product_id
FROM product join modification_to_product ON modification_to_product.product_id = product.product_id
join category ON category.category_id = modification_to_product.category_id
WHERE modification_id = ".$_POST['stateIdd']." AND modification_to_product.category_id = ".$_POST['typeIdd'];
        echo '<table class="table_sort" style>
  <thead>
    <tr>
    <th scope="col">Фото</th>
    <th scope="col">Наименование</th>
    <th scope="col">Артикул</th>
    <th scope="col">Цена</th>
    </tr>
  </thead>';
		foreach ($conn1->query($sql3) as $row3) {
		echo '
		
		<tbody>
			<tr class="odd" id="var">
			<td><img class="scale" src="lamp/images/'.$row3['product_id'].'_0.jpg" style="
    max-width: 35% ;"  ></td>
			<td>'.$row3['name'].'</a></td>
			<td>'.$row3['articul'].'</a></td>
			<td><a href="https://avtosvet-vrn.ru/parts/all/'.$row3['articul'].'"> Узнать цену</a></td>
		</tr>
			</tbody></table>';
		}
	}


?>