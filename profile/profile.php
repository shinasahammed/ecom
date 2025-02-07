<!doctype html>
<html lang="en">
  <head>
  	<title>edit profile</title>
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
$query=mysqli_query($conn,"select * from registration where email='$email'");
$res=mysqli_fetch_array($query);
if(isset($_POST['edit'])){
	$n=$_POST['name'];
	$e=$_POST['email'];
	$password=$_POST['password'];
	$r=mysqli_query(mysql: $conn,query:"update  registration set name='$n',email='$e',password='$password'where email='$email'");
	$query=mysqli_query($conn,"select * from  registration where email='$email'");
	$res=mysqli_fetch_array($query);
  echo"<script>alert('updated succesfully');</script>";
}
?>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">USER PROFILE</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-lg-10">
					<div class="wrapper img" style="background-image: url(images/img.jpeg);">
						<div class="row">
							<div class="col-md-9 col-lg-7">
								<div class="contact-wrap w-100 p-md-5 p-4">
									<h3 class="mb-4">EDIT PROFILE</h3>
									<div id="form-message-warning" class="mb-4"></div> 
				      		<div id="form-message-success" class="mb-4">
				            Your message was sent, thank you!
				      		</div>
									<form method="POST"  class="contactForm">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="label" for="name">Full Name</label>
													<input type="text" class="form-control" name="name" value="<?php echo $res['name'];?>" id="name" placeholder="Name">
												</div>
											</div>
											<div class="col-md-6"> 
												<div class="form-group">
													<label class="label" for="email">Email Address</label>
													<input type="email" class="form-control" name="email" id="email" value="<?php echo $res['email'];?>" placeholder="Email" readonly>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label class="label" for="subject">Password</label>
													<input type="password" class="form-control" name="password" id="subject" value="<?php echo $res['password'];?>" placeholder="Password">
												</div>
											</div>
											
											<div class="col-md-12">
												<div class="form-group">
													<input type="submit" value="Edit" name="edit" class="btn btn-primary">
													<div class="submitting"></div>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.validate.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>

