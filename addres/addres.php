<html>
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<?php

$conn=mysqli_connect("localhost","root","","ecommerse");
$id=$_GET['id'];
$size = isset($_GET['size']) ? $_GET['size'] : '';
$quantity = isset($_GET['quantity']) ? $_GET['quantity'] : '';
if(isset($_POST['submit'])){
    $n=$_POST['name'];
    $e=$_POST['email'];
    $ph=$_POST['phno'];
    $p=$_POST['pincode'];
    $a=$_POST['address'];
    $ct=$_POST['city'];
    $st=$_POST['state'];
    $data=mysqli_query($conn,"insert into address(name,email,phno,pincode,address,city,state)values('$n','$e','$ph','$p','$a','$ct','$st')");
        echo "<script>alert ('Sucess')</script>";
        header("location:../payment/credit-card-formvuejs/pay/pay.php?id=$id&size=$size&quantity=$quantity");
      }
      ?>
<body class="bg-blue-50">
    <div class="max-w-2xl mx-auto p-6">
        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="flex items-center mb-4">
              
                <h2 class="text-lg font-semibold text-gray-800">DELIVERY ADDRESS</h2>
            </div>
            <form method="post">
            <div class="mb-4">
               
            </div>
           
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-gray-700">Name</label>
                    <input type="text"  name="name" class="w-full border border-gray-300 rounded-md p-2" value="">
                </div>
                <div>
                    <label class="block text-gray-700">10-digit mobile number</label>
                    <input type="text"  name="phno" class="w-full border border-gray-300 rounded-md p-2" value="">
                </div>
                <div>
                    <label class="block text-gray-700">Pincode</label>
                    <input type="text" name="pincode" class="w-full border border-gray-300 rounded-md p-2" value="">
                </div>
                <div>
                    <label class="block text-gray-700">email</label>
                    <input type="text" name="email" class="w-full border border-gray-300 rounded-md p-2" value="">
                </div>
                <div class="col-span-2">
                    <label class="block text-gray-700">Address</label>
                    <textarea  name="address" class="w-full border border-gray-300 rounded-md p-2"></textarea>
                </div>
                <div>
                    <label class="block text-gray-700">City</label>
                    <input type="text" name="city" class="w-full border border-gray-300 rounded-md p-2" value="">
                </div>
                <div>
                    <label class="block text-gray-700">State</label>
                    <select  name="state" class="w-full border border-gray-300 rounded-md p-2">
                        <option>Kerala</option>
                        <option>tamil nadu</option>
                        <option>karnadaka</option>
                        <option>Andhra Pradesh</option>
                        <option>goa</option>
                        <option>telangana</option>
                        <option>maharashtra</option>
                        <option>odisha</option>
                       

                    </select>
                </div>
           
            </div>
          
            <div class="flex justify-between">
                <button name="submit" class="bg-orange-500 text-white py-2 px-4 rounded-md">SAVE AND DELIVER HERE</button>

            </div>
        </form>
        </div>
    </div>
</body>
</html>