<!DOCTYPE html>
<html lang="en">
<head>
    <title>Hash Techie Official</title>
    <link rel="stylesheet" href="login1/index.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<?php
session_start();
$conn=mysqli_connect("localhost","root","","ecommerse");
if(isset($_POST['login'])){
    $e=$_POST['email'];
    $p=$_POST['pword'];
    $data=mysqli_query($conn,"select * from registration where email='$e' and password='$p'");
    $res=mysqli_fetch_array($data);
    $data1=mysqli_query($conn,"select * from viewsup where email='$e' and password='$p'");
    $res1=mysqli_fetch_array($data1);
    if(!empty($res[0])){
      if($res['rights']=='admin'){
        header("location:admin/admin.php");
      }elseif ($res['rights']=='user') {
        $_SESSION['email']=$e;
        header("location:user.php");
      }else {
        echo "<script>alert ('Invalid email or password')</script>";
      }
    }elseif(!empty($res1[0])){
      if($res1['rights']=='New Supplier'){
        echo "<script>alert ('Kindly wait for the approval from the admin')</script>";
      }elseif ($res1['rights']=='Supplier') {
        $_SESSION['email']=$e;
        header("location:supplier/supplier.php");
      }else {
        echo "<script>alert ('Invalid email or password')</script>";
      }
    }else{
      echo "<script>alert ('Invalid email or password')</script>";
    }
}
?>
<body>
    <!-- NAVBAR CREATION -->
 
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
                <form action="" method="post" >
                    <h2>Sign In</h2>
                    <div class="input-box">
                        <span class="icon"><i class='bx bxs-envelope'></i></span>
                        <input type="email" name="email" required>
                        <label >Email</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><i class='bx bxs-lock-alt' ></i></span>
                        <input type="password" name="pword" required>
                        <label>Password</label>
                    </div>
                    
                    <button class="btn" name="login">sign In</button>
                    <div class="create-account">
                        <p>Create A New Account? <a href="registration1.php" class="register-link">Sign Up</a></p>
                    </div>
                </form>
            </div>
           
        </div>
    </div>
     <!-- SIGN UP FORM CREATION -->

    <script src="login1/index.js"></script>
</body>

</html>