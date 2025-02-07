<!doctype html>
<html lang="en">
  <head>
  	<title>Table 02</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">

	</head>
	<?php
   session_start();
   $email=$_SESSION['email'];
	$conn=mysqli_connect("localhost","root","","ecommerse");
	$query=mysqli_query($conn,"select * from orders where supplier='$email' and status='Pending'");
	?>	
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">NEW ORDERS</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="table-wrap">
						<table class="table">
						  <thead class="thead-dark">
						    <tr>
						      <th>Order id</th>
						      <th>product name</th>
						      <th>Price</th>
							  <th>quantity</th>
						      <th>User</th>
						      <th>Email</th>
                              <th>Status</th>
                              <th>Action</th>
                            </tr>
						  </thead>
						 <?php
						 if(isset($query)){
							while($row=mysqli_fetch_array($query)){
						 ?>
						  <tr>
						      <th><?php echo $row['order_id'];?></th>
						      <th><?php echo $row['product_name'];?></th>
						      <th><?php echo $row['price'];?></th>
						      <th><?php echo $row['quantity'];?></th>
							  <td><?php echo $row['name'];?></td>
						      <th><?php echo $row['email'];?></th>
                              <th><?php echo $row['status'];?></th>
                              <th><a href="ship.php?id=<?php echo $row['order_id'];?>">Ship</th>
                            </tr>
							<?php
							}
						}
						?>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>

