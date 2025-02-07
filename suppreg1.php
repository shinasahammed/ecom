<!DOCTYPE html>
<html lang="en">
<head>
    <title>Hash Techie Official</title>
    <link rel="stylesheet" href="reg1/index.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<?php
$conn=mysqli_connect("localhost","root","","ecommerse");
if(isset($_POST['reg'])){
    $n=$_POST['name'];
    $e=$_POST['email'];
    $ph=$_POST['phno'];
    $co=$_POST['comp'];
    $p=$_POST['pword'];
    $data=mysqli_query($conn,"insert into viewsup(name,email,phno,password,company,rights)values('$n','$e','$ph','$p','$co','New Supplier')");
    echo "<script>alert ('Registration success')</script>";
}
?>
<body>
    <!-- NAVBAR CREATION -->
   <header class="header">
   
   
   </header>
    <!-- LOGIN FORM CREATION -->
    <div class="background"></div>
    <div class="container">
        <div class="item">
            <h2 class="logo"><i></i>Fit Well</h2>
            <div class="text-item">
                <h2>Welcome! <br><span>
                    To Our website
                </span></h2>
                <p>enter your data and click the button</p>
               
            </div>
        </div>
        <div class="login-section">
            <div class="form-box login">
                <form action=""method="post">
                    <h2>seller Signup</h2>
                    <div class="input-box">
                    <span class="icon"><i class='bx bxs-user'></i></span>
                        <input type="text" name="name" required>
                        <label >Enter your name</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><i class='bx bxs-envelope'></i></span>
                        <input type="email" name="email" required>
                        <label >Email</label>
                    </div>
                    <div class="input-box">
                    <span class="icon"><i class='bx bxs-user'></i></span>
                        <input type="text" name="phno" required>
                        <label >Phone number</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><i class='bx bxs-lock-alt' ></i></span>
                        <input type="password" name="pword" required>
                        <label>Password</label>
                    </div>
                   
                    <div class="input-box">
                    <span class="icon"><i class='bx bxs-user'></i></span>
                        <input type="text" name="comp" required>
                        <label >Enter your company name</label>
                    </div>
                    
                    <button class="btn"name="reg">sign up</button>
                   
                </form>
            </div>
         
        </div>
    </div>
     <!-- SIGN UP FORM CREATION -->

    <script src="index.js"></script>
</body>

</html>