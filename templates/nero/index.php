<?php

// Include the database connection file
$conn = new PDO("mysql:host=localhost;dbname=avtosvett2_lamp", "avtosvett2_lamp", "213981aA");
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
				<label for="country">Country</label>
				<select class="form-control" id="country">
					<option value="">Select Country</option>
					<?php 
					$sql = "SELECT * FROM make";
					foreach ($conn->query($sql) as $row) {
							echo '<option value="'.$row['make_id'].'">'.$row['name'].'</option>';}
							
					?>
				</select>
        <br />

				<!-- State dropdown -->
				<label for="country">State</label>
				<select class="form-control" id="state">
					<option value="">Select State</option>
				</select>
        <br />

				<!-- City dropdown -->
				<label for="country">City</label>
				<select class="form-control" id="city">
					<option value="">Select City</option>
				</select>
		</form>

<script type="text/javascript">
    $(document).ready(function(){
      // Country dependent ajax
      $("#country").on("change",function(){
        var countryId = $(this).val();
        $.ajax({
          url :"index.php",
          type:"POST",
          cache:false,
          data:{countryId:countryId},
          success:function(data){
            $("#state").html(data);
            $('#city').html('<option value="">Select city</option>');
          }
        });			
      });

      // state dependent ajax
      $("#state").on("change", function(){
        var stateId = $(this).val();
        $.ajax({
          url :"index.php",
          type:"POST",
          cache:false,
          data:{stateId:stateId},
          success:function(data){
            $("#city").html(data);
          }
        });
      });
    });
  </script>

</body>
</html>
<?php
// Include the database connection file

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