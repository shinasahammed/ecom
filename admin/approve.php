<?php
$id=$_GET['id'];
$conn=mysqli_connect("localhost","root","","ecommerse");
$data=mysqli_query($conn,"update viewsup set rights='Supplier' where id='$id'");
header("location:approvesup.php");
?>