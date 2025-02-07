<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FitWell eCommerce Website</title>

  <!--
    - favicon
  -->
  <link rel="shortcut icon" href="homeb/images/logo/img.png" type="image/x-icon">

  <!--
    - custom css link
  -->
  <link rel="stylesheet" href="homeb/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <!--
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

</head>
<?php
$conn=mysqli_connect("localhost","root","","ecommerse");
$data=mysqli_query($conn,"select * from products");
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


        <style>
        /* Tailwind-like Utility Styles */
        body {
            font-family: Arial, sans-serif;
        }

        .bg-gray-100 {
            background-color: #f7fafc;
        }

        .bg-blue-600 {
            background-color:hsl(353, 100%, 78%);;
        }

        .text-white {
            color: white;
        }

        .text-gray-100 {
            color: #f7fafc;
        }

        .hover\:bg-gray-100:hover {
            background-color: #f7fafc;
        }

        .shadow-md {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .p-4 {
            padding: 1rem;
        }

        .px-4 {
            padding-left: 1rem;
            padding-right: 1rem;
        }

        .py-2 {
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
        }

        .ml-2 {
            margin-left: 0.5rem;
        }

        .mr-2 {
            margin-right: 0.5rem;
        }

        .rounded {
            border-radius: 375rem;
        }

        .relative {
            position: relative;
        }

        .absolute {
            position: absolute;
        }

        .mt-2 {
            margin-top: 0.5rem;
        }

        .w-48 {
            width: 12rem;
        }

        .block {
            display: block;
        }

        .flex {
            display: flex;
        }

        .items-center {
            align-items: center;
        }

        .bg-white {
            background-color: white;
        }

        .border {
            border: 1px solid #e2e8f0;
        }

        .text-gray-700 {
            color: #4a5568;
        }

        /* Custom styles to handle dropdown visibility */
        .dropdown-menu {
            display: none;
        }

        .dropdown-menu.show {
            display: block;
        }

        /* Button styles */
        .dropdown-button {
            display: block;
            width: 100%;
            text-align: center;
            padding: 1px;
            background-color: hsl(353, 100%, 78%);;
            color: white;
            text-decoration: none;
            margin-bottom: 8px;
            border-radius: 8px;
            font-weight: bold;
        }

        .dropdown-button:hover {
            background-color: #2c5282;
        }

    </style>


        <div class="header-user-actions">

        <div class="relative">
        <button id="dropdownButton" class="flex items-center bg-blue-600 text-white px-4 py-2 rounded">
                <i class="fas fa-user mr-2"></i>
                Login
                <i class="fas fa-caret-down ml-2"></i>
            </button>
            <div id="dropdownMenu" class="dropdown-menu absolute mt-2 w-48 bg-white border rounded shadow-lg">
                <a href="login1.php" class="dropdown-button">
                    Login
                </a>
                <a href="registration1.php" class="dropdown-button">
                    Sign Up
                </a>
                <a href="suppreg1.php" class="dropdown-button">
                    Become a Seller
                </a>
                
            </div>
        </div>



        <script>
        document.addEventListener('DOMContentLoaded', function () {
            const dropdownButton = document.getElementById('dropdownButton');
            const dropdownMenu = document.getElementById('dropdownMenu');

            dropdownButton.addEventListener('click', function () {
                dropdownMenu.classList.toggle('show');
            });

            // Close the dropdown if the user clicks outside of it
            window.addEventListener('click', function (e) {
                if (!dropdownButton.contains(e.target) && !dropdownMenu.contains(e.target)) {
                    dropdownMenu.classList.remove('show');
                }
            });
        });
    </script>



        </div>

      </div>

    </div>



  <!--
    - navigation start
  -->


    <nav class="desktop-navigation-menu">

      <div class="container">

        <ul class="desktop-menu-category-list">

          <li class="menu-category">
            <a href="index.php" class="menu-title">Home</a>
          </li>


           

          <li class="menu-category">
            <a href="contactform/index.php" class="menu-title">contact us</a>


         
           
           
  





          
        </div>
          
  
    
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
<!-- Banner Section -->
<!-- Banner Section -->
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

    <!-- Welcome Note -->
    <div class="welcome-note">
      <h2>Welcome to FitWell!</h2>
      <p>At FitWell, we believe fashion should not only make you look great but feel amazing too. Discover a stunning collection of trendy and comfortable dresses for every occasion. From casual wear to elegant outfits, we’ve got styles that fit you perfectly and enhance your confidenceDiscover the best deals and latest trends at unbeatable prices.</p>
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
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@500;700&display=swap" rel="stylesheet">

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

              <img src="homeb/images/testimonial-1.jpg" alt="alan doe" class="testimonial-banner" width="80" height="80">

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

            <a href="#" class="cta-content">

              <p class="discount">25% Discount</p>

              <h2 class="cta-title">Summer collection</h2>

              <p class="cta-text">Starting @ $10</p>

              <button class="cta-btn">Shop now</button>

            </a>

          </div>



          <!--
            - SERVICE
          -->

          <div class="service">

            <h2 class="title">Our Services</h2>

            <div class="service-container">

              <a href="#" class="service-item">

                <div class="service-icon">
                  <ion-icon name="boat-outline"></ion-icon>
                </div>

                <div class="service-content">

                  <h3 class="service-title">Worldwide Delivery</h3>
                  <p class="service-desc">For Order Over $100</p>

                </div>

              </a>

              <a href="#" class="service-item">
              
                <div class="service-icon">
                  <ion-icon name="rocket-outline"></ion-icon>
                </div>
              
                <div class="service-content">
              
                  <h3 class="service-title">Next Day delivery</h3>
                  <p class="service-desc">UK Orders Only</p>
              
                </div>
              
              </a>

              <a href="#" class="service-item">
              
                <div class="service-icon">
                  <ion-icon name="call-outline"></ion-icon>
                </div>
              
                <div class="service-content">
              
                  <h3 class="service-title">Best Online Support</h3>
                  <p class="service-desc">Hours: 8AM - 11PM</p>
              
                </div>
              
              </a>

              <a href="#" class="service-item">
              
                <div class="service-icon">
                  <ion-icon name="arrow-undo-outline"></ion-icon>
                </div>
              
                <div class="service-content">
              
                  <h3 class="service-title">Return Policy</h3>
                  <p class="service-desc">Easy & Free Return</p>
              
                </div>
              
              </a>

              <a href="#" class="service-item">
              
                <div class="service-icon">
                  <ion-icon name="ticket-outline"></ion-icon>
                </div>
              
                <div class="service-content">
              
                  <h3 class="service-title">30% money back</h3>
                  <p class="service-desc">For Order Over $100</p>
              
                </div>
              
              </a>

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
            <h2 class="nav-title">Popular Categories</h2>
          </li>

          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Fashion</a>
          </li>

          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Electronic</a>
          </li>

          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Cosmetic</a>
          </li>

          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Health</a>
          </li>

          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Watches</a>
          </li>

        </ul>

        <ul class="footer-nav-list">
        
          <li class="footer-nav-item">
            <h2 class="nav-title">Products</h2>
          </li>
        
          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Prices drop</a>
          </li>
        
          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">New products</a>
          </li>
        
          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Best sales</a>
          </li>
        
          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Contact us</a>
          </li>
        
          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Sitemap</a>
          </li>
        
        </ul>

        <ul class="footer-nav-list">
        
          <li class="footer-nav-item">
            <h2 class="nav-title">Our Company</h2>
          </li>
        
          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Delivery</a>
          </li>
        
          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Legal Notice</a>
          </li>
        
          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Terms and conditions</a>
          </li>
        
          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">About us</a>
          </li>
        
          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Secure payment</a>
          </li>
        
        </ul>

        <ul class="footer-nav-list">
        
          <li class="footer-nav-item">
            <h2 class="nav-title">Services</h2>
          </li>
        
          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Prices drop</a>
          </li>
        
          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">New products</a>
          </li>
        
          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Best sales</a>
          </li>
        
          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Contact us</a>
          </li>
        
          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Sitemap</a>
          </li>
        
        </ul>

        <ul class="footer-nav-list">

          <li class="footer-nav-item">
            <h2 class="nav-title">Contact</h2>
          </li>

          <li class="footer-nav-item flex">
            <div class="icon-box">
              <ion-icon name="location-outline"></ion-icon>
            </div>

            <address class="content">
              419 State 414 Rte
              Beaver Dams, New York(NY), 14812, USA
            </address>
          </li>

          <li class="footer-nav-item flex">
            <div class="icon-box">
              <ion-icon name="call-outline"></ion-icon>
            </div>

            <a href="tel:+607936-8058" class="footer-nav-link">(607) 936-8058</a>
          </li>

          <li class="footer-nav-item flex">
            <div class="icon-box">
              <ion-icon name="mail-outline"></ion-icon>
            </div>

            <a href="mailto:example@gmail.com" class="footer-nav-link">example@gmail.com</a>
          </li>

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


















    
   