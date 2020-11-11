<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "registration";
$conn = mysqli_connect($host, $user, $pass, $db);
if(isset($_POST['user_submit'])){
	$user_customer = $_POST['user_customer'];
	$user_style = $_POST['user_style'];
	$user_color = $_POST['user_color'];
	$user_order_qty = $_POST['user_order_qty'];
	$user_knit_qty = $_POST['user_knit_qty'];
	$user_date = $_POST['user_date'];
if(!empty($user_customer) && !empty($user_style) && !empty($user_color) && !empty($user_order_qty) && !empty($user_knit_qty) && !empty($user_date)){
$insert_query = "INSERT INTO production_report(db_customer, db_style, db_color, db_order_qty, db_knit_qty, db_date) VALUES ('$user_customer','$user_style','$user_color','$user_order_qty','$user_knit_qty','$user_date')";
$save_data = mysqli_query($conn, $insert_query);
if($save_data){
	echo "data updated";
}else{
	echo "data not updated";
}
}}else{
	echo "Please fill the required fields" . '<br>';
}
//Data Show
$read_query = mysqli_query($conn, "SELECT * FROM production_report");
$read_fetch = mysqli_fetch_all($read_query, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Update your Production Report Daily</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
	</head>
	<body>
			
		<div class="col-md-12">
			<div class="col-md-5">
				<form action="" method="post">
					<h1 class="tex-center border-primary text-lg-center panel-danger text-success">Production Report</h1>
					<div class="form-group">
						<label for="">Customer Name</label>
						<input type="text" class="form-control" name="user_customer" Placeholder="Enter Cumtomer Name">
					</div>
					<div class="form-group">
						<label for="">Style Name</label>
						<input type="text" class="form-control" name="user_style" Placeholder="Enter Style Name">
					</div>
					<div class="form-group">
						<label for="">Color Name</label>
						<input type="text" class="form-control" name="user_color" Placeholder="Enter Color Name">
					</div>
					<div class="form-group">
						<label for="">Order QTY</label>
						<input type="number" class="form-control" name="user_order_qty" Placeholder="Enter Order QTY">
					</div>
					<div class="form-group">
						<label for="">Knit QTY</label>
						<input type="number" class="form-control" name="user_knit_qty" Placeholder="How Much Knitted?">
					</div>
					<div class="form-group">
						<label for="">Production Date</label>
						<?php
						$date = date("Y-m-d");
						echo "<input type='date' class='form-control' name='user_date' value='$date' required>";
						?>
					</div>
					<div class="form-group">
						<input type="Submit" class="btn btn-success btn-block btn-lg" name="user_submit" value="Save Data">
					</div>
				</form>
			</div>
			<div class="col-md-5 float-left">
				<h1 class="text-justify text-success text-lg-center">Show Production Data</h1>
				<table class="table">
					<tr>
						<th>ID</th>
						<th>Customer</th>
						<th>Style</th>
						<th>Color</th>
						<th>Order QTY</th>
						<th>Knit QTY</th>
						<th>Production Date</th>
					</tr>
					<?php
					foreach($read_fetch as $single){

						$id = $single['id'];
						$db_customer = $single['db_customer'];
						$db_style = $single['db_style'];
						$db_color = $single['db_color'];
						$db_order_qty = $single['db_order_qty'];
						$db_knit_qty = $single['db_knit_qty'];
						$db_date = $single['db_date'];
						echo 	
						"<tr>
							<td>$id</td>
							<td>$db_customer</td>
							<td>$db_style</td>
							<td>$db_color</td>
							<td>$db_order_qty</td>
							<td>$db_knit_qty</td>
							<td>$db_date</td>
					</tr>";

					}
						
				
					?>
				</table>
			</div>
		</div>

		<hr>

		
		<link rel="stylesheet" href="js/bootstrap.min.js">
	</body>
</html>