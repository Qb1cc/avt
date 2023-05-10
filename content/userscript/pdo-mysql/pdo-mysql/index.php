<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// Include the database connection file
$conn = new PDO("mysql:host=localhost;dbname=avtosvett2_lamp", "avtosvett2_lamp", "Qg1KX1!YFPHW7N1L");

?>
    <h1>Страница находится в разработке, при возниковении ошибок обратитесь в чат к менеджеру.</h1>
      <style>
   .scale {
    transition: 1s;
    /* Время эффекта */
   }
   .scale:focus {
    transform: scale(1.2);
    position: absolute;
   }
  </style>
</div>

		<form action="" method="post">
			<div class="col-md-4">

				<!-- Country dropdown -->
				<label for="country">Марка</label>
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
				<label for="state">Модель</label>
				<select class="form-control" id="state">
				<option value="">Выбор модели</option>
				</select>
        <br />
				<!-- City dropdown -->
				<label for="city">Модификация</label>
				<select class="form-control" id="city">
				<option value="">Выбор модификации</option>
				</select>
        <br />
				<label for="type">Тип освещения</label>
				<select class="form-control" id="type">
				<option value="">Выбор типа освещения</option>
				<?php 
				$sql = "SELECT * FROM `category`";
				foreach ($conn->query($sql) as $row) {
				echo '<option value="'.$row['category_id'].'">'.$row['name'].'</option>';}
				
				?>
        		</select>
        		<br/>
        		</div>
        		<div>
        		<table class="table table-striped table-bordered table-sm" id="var" style="
    width: -webkit-fill-available;
">
     <tr>

     </tr>
</table>
        		</div>
<script>

   $(document).ready(function(){
        $("#type").on("change", function(){
        var stateIdd = $("#city").val();
        var typeIdd = $("#type").val();
        $.ajax({
            url :"action.php",
            type:"POST",
            cache:true,
            data:{stateIdd:stateIdd,typeIdd:typeIdd},
            success:function(data){
            $("#var").html(data);
          }
        });
      });
    // Country dependent ajax
    $("#country").on("change",function(){
      var countryId = $(this).val();
      $.ajax({
        url :"action.php",
        type:"POST",
        cache:true,
        data:{countryId:countryId},
        success:function(data){
          $("#state").html(data);
        }
      });
    });
  });
      // state dependent ajax
      $("#state").on("change", function(){
        var stateId = $(this).val();
        $.ajax({
          url :"action.php",
          type:"POST",
          cache:true,
          data:{stateId:stateId},
          success:function(data){
            $("#city").html(data);
          }
        });
      });
      

</script>
</body>
</html>