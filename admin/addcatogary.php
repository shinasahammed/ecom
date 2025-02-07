<html>
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<?php
$conn=mysqli_connect("localhost","root","","ecommerse");
if(isset($_POST['submit'])){
    $n=$_POST['name'];
   
    $data=mysqli_query($conn,"insert into addcategory(categoryname)values('$n')");
    if($n>0)
    echo "<script>alert ('category added.') ; </script>";
}
?>
<body class="bg-gray-100 flex min-h-screen">
    <!-- Sidebar -->
    

        <!-- Dashboard Content -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Card 1 -->
            <style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
<body>


<div>
  <form method="post" >
    <label for="fname">ADD CATEGORY</label>
    <input type="text" id="fname" name="name" placeholder="category..">


  
    <input type="submit" name="submit" value="Submit">
  </form>
</div>
          
     
</body>
</html>












