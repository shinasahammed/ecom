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
  $conn=mysqli_connect("localhost","root","","ecommerse");
  $data=mysqli_query($conn,"select * from viewsup where rights='Supplier'");
  ?>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">VIEW SUPPLIER</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="table-wrap">
						<table class="table">
						  <thead class="thead-dark">
						    <tr>
						      <th>name</th>
						      <th>email</th>
						      <th>ph no</th>
						      <th>company</th>
						    </tr>
						  </thead>
						  <?php
                if(isset($data)){
                  while($res=mysqli_fetch_array($data)){

                    ?>
                
              <tr>
						      <th><?php echo $res['name'];?></th>
						      <th><?php echo $res['email'];?></th>
						      <th><?php echo $res['phno'];?></th>
						      <th><?php echo $res['company'];?></th>
							  

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










