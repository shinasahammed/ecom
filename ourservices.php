<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Anon - eCommerce Website</title>

  <!--
    - favicon
  -->
  <link rel="shortcut icon" href="homeb/images/logo/" type="image/x-icon">

  <!--
    - custom css link
  -->
  <link rel="stylesheet" href="homeb/css/style.css">

  <!--
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

</head>
<?php
session_start();
$email = $_SESSION['email'];
$conn = mysqli_connect("localhost", "root", "", "ecommerse");
$orderCountQuery = mysqli_query($conn, "SELECT COUNT(*) as order_count FROM orders WHERE email='$email'");
$orderCountResult = mysqli_fetch_assoc($orderCountQuery);
$orderCount = $orderCountResult['order_count'];
$data = mysqli_query($conn, "select * from products");
?>
<body>


  <div class="overlay" data-overlay></div>


  <!--
    - HEADER
  -->

  <header>

    <div class="header-main">

      <div class="container">

        <a href="#" class="header-logo">
          <img src="homeb/images/logo/img.png" alt="Anon's logo" width="180" height="100">
        </a>

        <form method="post"  action="search.php" class="header-search-container">
        
          
          <input type="search" name="search"  class="search-field" placeholder="Enter your product name...">

            <button class="search-btn" type="submit">
            <ion-icon name="search-outline"></ion-icon>
            </button>
          </input>
        </form>

        <div class="header-user-actions">


        <button class="action-btn"><a href="cart/cart.php">
              <ion-icon name="cart-outline"></ion-icon>
            </a>
          </button>

          <button class="action-btn"><a href="myorder/vieworders.php">
              <ion-icon name="bag-handle-outline"></ion-icon>
              <span class="count"><?php echo $orderCount; ?></span></a>
          </button>

          <button class="action-btn"><a href="profile/profile.php">
              <ion-icon name="person-outline"></ion-icon>
            </a>
          </button>

        </div>

      </div>

    </div>



  <!--
    - navigation start
  -->



  <?php
  $conn=mysqli_connect("localhost","root","","ecommerse");
  $data1=mysqli_query($conn,"select * from addcategory");
  ?>
    <nav class="desktop-navigation-menu">

      <div class="container">

        <ul class="desktop-menu-category-list">

          <li class="menu-category">
            <a href="user.php" class="menu-title">Home</a>
          </li>

          <li class="menu-category">
            <a href="#" class="menu-title">Categories</a>

            <div class="dropdown-panel">
            <?php
            if(isset($data1)){
              while($res1=mysqli_fetch_array($data1)){
                ?>
              <ul class="dropdown-panel-list">

                <li class="menu-title">
                  <a href="#"><?php echo $res1['categoryname'];?></a>
                </li>

               

              </ul>

              <?php
          }
        }
        ?>
             

            </div>
          </li>
           



          <li class="menu-category">
            <a href="testimonial.php" class="menu-title">testimonial</a>

           

          <li class="menu-category">
            <a href="contactform/index.php" class="menu-title">contact us</a>


          <li class="menu-category">
            <a href="ourservices.php" class="menu-title">our services</a>

         

    
    </nav>


  </header>

  <!--
    - navigation end
  -->




  <!--
    - MAIN
  -->

  <main>
  <style>
  
  .service{
   
    position: relative;
    gap: 100px;
    top: -2px;
    left: 40%;
  }
 
  
  </style>

 


    <!--
      - TESTIMONIALS, CTA & SERVICE
    -->

 
    <div class="service">

<h2 class="title">Our Services</h2>
<div class="service-container">

  <div class="service-item">

    <div class="service-icon">
      <ion-icon name="boat-outline"></ion-icon>
    </div>

    <div class="service-content">

      <h3 class="service-title">free Delivery</h3>
      <p class="service-desc">For Order Over ₹499 </p>

    </div>

  </div>

  <div class="service-item">

    <div class="service-icon">
      <ion-icon name="rocket-outline"></ion-icon>
    </div>

    <div class="service-content">

      <h3 class="service-title">fast delivery</h3>
      <p class="service-desc">all over the india</p>

    </div>

  </div>

  <div class="service-item">

    <div class="service-icon">
      <ion-icon name="call-outline"></ion-icon>
    </div>

    <div class="service-content">

      <h3 class="service-title">Best Online Support</h3>
      <p class="service-desc">Hours: 8AM - 11PM</p>

    </div>

  </div>

  <div class="service-item">

    <div class="service-icon">
      <ion-icon name="arrow-undo-outline"></ion-icon>
    </div>

    <div class="service-content">

      <h3 class="service-title">order cancellation</h3>
      <p class="service-desc"></p>

    </div>

  </div>

  <div class="service-item">

    <div class="service-icon">
      <ion-icon name="ticket-outline"></ion-icon>
    </div>

    <div class="service-content">

      <h3 class="service-title">secure payment</h3>
      <p class="service-desc"></p>

    </div>

  </div>

</div>

</div>

</div>

</div>

</div>

</div>


    <!--
      - BLOG
    -->


  </main>





  <!--
    - FOOTER
  -->

  <footer>

    <div class="footer-category">



    </div>

    <div class="footer-nav">

      <div class="container">

      <ul class="footer-nav-list">
      <li class="footer-nav-item">
        <h2 class="nav-title">Products</h2>
      </li>

      <li class="footer-nav-item">
        <span class="footer-nav-link">Good quality</span>
      </li>

      <li class="footer-nav-item">
        <span class="footer-nav-link">Best price</span>
      </li>

      <li class="footer-nav-item">
        <span class="footer-nav-link">Imported</span>
      </li>

      <li class="footer-nav-item">
        <span class="footer-nav-link">Trendy items</span>
      </li>

      <li class="footer-nav-item">
        <span class="footer-nav-link">Unique</span>
      </li>

      </ul>

      <ul class="footer-nav-list">

      <li class="footer-nav-item">
        <h2 class="nav-title">services</h2>
      </li>

      <li class="footer-nav-item">
        <span class="footer-nav-link">Free Delivery</span>
      </li>

      <li class="footer-nav-item">
        <span class="footer-nav-link">Fast delivery</span>
      </li>

      <li class="footer-nav-item">
        <span class="footer-nav-link">Best online support</span>
      </li>

      <li class="footer-nav-item">
        <span class="footer-nav-link">Order cancelation</span>
      </li>

      <li class="footer-nav-item">
        <span class="footer-nav-link">Secure payment</span>
      </li>

      </ul>

      <ul class="footer-nav-list">

      <li class="footer-nav-item">
        <h2 class="nav-title">address</h2>
      </li>

      <li class="footer-nav-item">
        <span class="footer-nav-link">fitwell </span>
      </li>

      <li class="footer-nav-item">
        <span class="footer-nav-link">Erumely</span>
      </li>

      <li class="footer-nav-item">
        <span class="footer-nav-link">Kottayam,Kerala</span>
      </li>

      <li class="footer-nav-item">
        <span class="footer-nav-link">Phno:-0744161191</span>
      </li>

      <li class="footer-nav-item">
        <span class="footer-nav-link">email:-fitwell@gmail.com</span>
      </li>

            </ul>

        </ul>

        <ul class="footer-nav-list">


        </ul>



      </div>

    </div>


    </div>

  </footer>






  <!--
    - custom js link
  -->
  <script src="homeb/js/script.js"></script>

  <!--
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>