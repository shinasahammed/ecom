<!doctype html>
<html lang="en">
  <head>
  	<title>View Orders</title>
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
	$query=mysqli_query($conn,"SELECT * FROM orders WHERE email='$email'");

	if(isset($_POST['cancel_order'])) {
		$order_id = $_POST['order_id'];
		$update_query = mysqli_query($conn, "UPDATE orders SET status='Cancelled' WHERE order_id='$order_id' AND email='$email'");
		if($update_query) {
			echo "<script>alert('Order cancelled successfully payment will be refunded in 3 Days');</script>";
			echo "<script>window.location.href='vieworders.php';</script>";
		} else {
			echo "<script>alert('Failed to cancel order');</script>";
		}
	}
	?>	
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">VIEW ORDERS</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="table-wrap">
						<table class="table">
						  <thead class="thead-dark">
						    <tr>
						      <th>Order ID</th>
						      <th>Product Name</th>
						      <th>Price</th>
							  <th>quantity</th>
						      <th>User</th>
						      <th>Email</th>
                              <th>Status</th>
                              <th>Action</th>
                            </tr>
						  </thead>
						  <tbody>
						 <?php
						 if(isset($query)){
							while($row=mysqli_fetch_array($query)){
						 ?>
						  <tr>
						      <td><?php echo $row['order_id'];?></td>
						      <td><?php echo $row['product_name'];?></td>
						      <td><?php echo $row['price'];?></td>
						      <td><?php echo $row['quantity'];?></td>
							  <td><?php echo $row['name'];?></td>
						      <td><?php echo $row['email'];?></td>
                              <td><?php echo $row['status'];?></td>
                              <td>
                              	<?php if($row['status'] != 'Cancelled') { ?>
                              	<form method="POST" action="">
                              		<input type="hidden" name="order_id" value="<?php echo $row['order_id']; ?>">
                              		<button type="submit" name="cancel_order" class="btn btn-danger">Cancel</button>
                              	</form>
                              	<?php } else { echo 'Cancelled'; } ?>
                              </td>
                            </tr>
							<?php
							}
						}
						?>
						</tbody>
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

