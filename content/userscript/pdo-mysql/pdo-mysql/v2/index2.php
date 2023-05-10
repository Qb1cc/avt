
<script src="jquery_chained.js"></script>
<?php
try {
    $conn = new PDO("mysql:host=localhost;dbname=avtosvett2_lamp", "avtosvett2_lamp", "213981aA");
}
catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}
?>

<select id="markaid" name="marka" style="float:left;">
<option value="">Марка</option>
<?php
$sql = 'SELECT * FROM make';
foreach ($conn->query($sql) as $row) {
    
echo "<option value=".mb_substr($row['make_id'], 0,7).">".$row['name']."</option>";
        } ;
?>
</select>



<select id="modelid" name="model" style="float:left;">
<option value="">Модель</option>
<?php
$sql = 'SELECT * FROM model';
foreach ($conn->query($sql) as $row) {
    
echo "<option value=".mb_substr($row['model_id'], 0,7).">".$row['name']."</option>";
        } ;
?>
</select>







<script type="text/javascript" src="http://ajax.googleapis.com/
ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
$(".country").change(function()
{
var country_id=$(this).val();
var post_id = 'id='+ country_id;

$.ajax
({
type: "POST",
url: "index.php",
data: post_id,
cache: false,
success: function(cities)
{
$(".city").html(cities);
} 
});

});
});
</script>