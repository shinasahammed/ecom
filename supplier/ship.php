<?php
   $id=$_GET['id'];
	$conn=mysqli_connect("localhost","root","","ecommerse");
	$query=mysqli_query($conn,"update orders set status='Shipped' where order_id='$id'");
    header("location:neworders.php");
	?>	