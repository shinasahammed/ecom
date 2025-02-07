<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>fitwell eCommerce Website</title>

  <!--
    - favicon
  -->
  <link rel="shortcut icon" href="homeb/images/logo/favicon.ico" type="image/x-icon">

  <!--
    - custom css link
  -->
  <link rel="stylesheet" href="homeb/css/style.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@500;700&display=swap" rel="stylesheet">
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

        <form method="post" action="search.php" class="header-search-container">


          <input type="search" name="search" class="search-field" placeholder="Enter your product name...">

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
    $conn = mysqli_connect("localhost", "root", "", "ecommerse");
    $data1 = mysqli_query($conn, "select * from addcategory");
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
              if (isset($data1)) {
                while ($res1 = mysqli_fetch_array($data1)) {
                  ?>
                  <ul class="dropdown-panel-list">

                    <li class="menu-title">
                    <a href="view_productscat.php?category_id=<?php echo $res1['id']; ?>"><?php echo $res1['categoryname']; ?></a>

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

    <!--
      - BANNER
    -->
    <div class="banner">
  <div class="container">
    <div class="slider-container has-scrollbar">
      
      <!-- Slider Item 1 -->
      <div class="slider-item">
        <img src="homeb/images/banner-1.jpg" alt="women's latest fashion sale" class="banner-img">
        <div class="banner-content">
          <p class="banner-subtitle">Trending item</p>
          <h2 class="banner-title">Women's latest fashion sale</h2>
        </div>
      </div>

      <!-- Slider Item 2 -->
      <div class="slider-item">
        <img src="homeb/images/banner-2.jpg" alt="modern sunglasses" class="banner-img">
        <div class="banner-content">
          <p class="banner-subtitle">Trending accessories</p>
          <h2 class="banner-title">Modern sunglasses</h2>
        </div>
      </div>

      <!-- Slider Item 3 -->
      <div class="slider-item">
        <img src="homeb/images/banner-3.jpg" alt="new fashion summer sale" class="banner-img">
        <div class="banner-content">
          <p class="banner-subtitle">Sale Offer</p>
          <h2 class="banner-title">New fashion summer sale</h2>
        </div>
      </div>

    </div>


  </div>
</div>

<!-- Custom Styles -->
<style>
  .welcome-note {
    background: #f8f9fa;
    padding: 20px;
    border-radius: 10px;
    text-align: center;
    margin-top: 20px;
    color: #333;
    font-family: 'Dancing Script', cursive;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  }

  .welcome-note h2 {
    font-size: 28px;
    margin-bottom: 10px;
    color: #ff6b6b;
  }

  .welcome-note p {
    font-size: 18px;
  }

  .slider-container {
    position: relative;
    overflow: hidden;
  }

  .slider-item {
    width: 100%;
    display: none;
  }

  .slider-item.active {
    display: block;
  }
</style>

<!-- Link for Google Fonts -->


<!-- JavaScript for Automatic Slider -->
<script>
  const sliderItems = document.querySelectorAll('.slider-item');
  let currentSlide = 0;

  function showSlide(index) {
    sliderItems.forEach((item, i) => {
      item.classList.toggle('active', i === index);
    });
  }

  function nextSlide() {
    currentSlide = (currentSlide + 1) % sliderItems.length;
    showSlide(currentSlide);
  }

  setInterval(nextSlide, 3000); // Change slide every 3 seconds
</script>


    <!--
    banner end
  -->



    <!--
      - first CATEGORY
    -->
    <?php
    $conn = mysqli_connect("localhost", "root", "", "ecommerse");
    $data1 = mysqli_query($conn, "select * from addcategory");
    ?>



    <!--
      - PRODUCT
    -->

    <div class="product-container">

      <div class="container">






        <div class="product-box">

          <!--
            - PRODUCT MINIMAL
          -->


          <!--
            - PRODUCT FEATURED
          -->


          <!--
            - PRODUCT GRID
          -->

          <div class="product-main">

            <h2 class="title">New Products</h2>

            <div class="product-grid">
              <?php
              if (isset($data)) {
                while ($res = mysqli_fetch_array($data)) {
                  ?>

                  <div class="showcase">
                    <a href="product/index.php?id=<?php echo $res['pid']; ?>">
                      <div class="showcase-banner">

                        <img src="supplier/image/<?php echo $res['image']; ?>" alt="Mens Winter Leathers Jackets"
                          class="showcase-img" width="300">




                      </div>

                      <div class="showcase-content">

                        <a href="product/index.php?id=<?php echo $res['pid']; ?>"
                          class="showcase-category"><?php echo $res['pname']; ?></a>

                        <a href="product/index.php?id=<?php echo $res['pid']; ?>">
                          <h3 class="showcase-title"><?php echo $res['category']; ?></h3>
                        </a>

                        <div class="showcase-rating">
                          <ion-icon name="star"></ion-icon>
                          <ion-icon name="star"></ion-icon>
                          <ion-icon name="star"></ion-icon>
                          <ion-icon name="star-outline"></ion-icon>
                          <ion-icon name="star-outline"></ion-icon>
                        </div>

                        <div class="price-box">
                          <p class="price">₹ <?php echo $res['price']; ?></p>
                          <del>$75.00</del>
                        </div>

                      </div>
                    </a>
                  </div>

                  <?php
                }
              }
              ?>

            </div>

          </div>

        </div>

      </div>

    </div>





    <!--
      - TESTIMONIALS, CTA & SERVICE
    -->

    <div>

      <div class="container">

        <div class="testimonials-box">

          <!--
            - TESTIMONIALS
          -->

          <div class="testimonial">

            <h2 class="title">testimonial</h2>

            <div class="testimonial-card">

              <img src="homeb/images/testimonial-1.jpg" alt="alan doe" class="testimonial-banner" width="80"
                height="80">

              <p class="testimonial-name">Alan Doe</p>

              <p class="testimonial-title">CEO & Founder Invision</p>

              <img src="homeb/images/icons/quotes.svg" alt="quotation" class="quotation-img" width="26">

              <p class="testimonial-desc">
                Lorem ipsum dolor sit amet consectetur Lorem ipsum
                dolor dolor sit amet.
              </p>

            </div>

          </div>



          <!--
            - CTA
          -->

          <div class="cta-container">

            <img src="homeb/images/cta-banner.jpg" alt="summer collection" class="cta-banner">

            <a  class="cta-content">

              <p class="discount">25% Discount</p>

              <h2 class="cta-title">Summer collection</h2>

              <p class="cta-text">Starting @ $10</p>

            </a>

          </div>



          <!--
            - SERVICE
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