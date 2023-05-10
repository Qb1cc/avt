<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// Include the database connection file
$conn = new PDO("mysql:host=localhost;dbname=avtosvett2_lamp", "avtosvett2_lamp", "Qg1KX1!YFPHW7N1L");
?>

<script type="text/javascript">
  $(document).ready(function(){
    // Country dependent ajax
    $("#country").on("change",function(){
      var countryId = $(this).val();
      $.ajax({
        url :"action.php",
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
        url :"action.php",
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
				<label for="type1">Тип освещения</label>
				<select class="form-control" id="type">
					<option value="">Выберите тип</option>
					<?php 
					$sql = "SELECT * FROM `category`";
					foreach ($conn->query($sql) as $row1) {
							echo '<option value="'.$row1['category_id'].'">'.$row1['name'].'</option>';}
							
					?>
				</select>
        <br />
				<label for="marka">Марка</label>
				<select class="form-control" id="country">
					<option value="">Выберите марку</option>
					<?php 
					$sql = "SELECT * FROM make";
					foreach ($conn->query($sql) as $row) {
							echo '<option value="'.$row['make_id'].'">'.$row['name'].'</option>';}
							
					?>
				</select>
        <br />

				<!-- State dropdown -->
				<label for="country">Модель</label>
				<select class="form-control" id="state">
				<option value="">Выберите модель</option>
				</select>
        <br />

				<!-- City dropdown -->
				<label for="country">Модификация</label>
				<select class="form-control" id="city">
				<option value="">Выберите модификацию</option>
				</select>
        <br />
        
                <!-- City dropdown -->
				<label for="country">Модификация</label>
				<select class="form-control" id="lamp">
				<option value="">Выберите модификацию</option>
				</select>
        <br />
		</form>
</body>
</html>