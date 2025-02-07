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
  <link rel="shortcut icon" href="homeb/images/logo/favicon.ico" type="image/x-icon">

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
    
          </button>
        </input>
      </form>

    </div>

  </div>




  
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




<?php
// search_results.php

// Database connection
$conn = mysqli_connect("localhost", "root", "", "ecommerse");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if search term is provided
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
    $searchTerm = mysqli_real_escape_string($conn, $_POST['search']);

    // Query to search for products based on the search term
    $sql = "SELECT * FROM products WHERE pname LIKE '%$searchTerm%' OR details LIKE '%$searchTerm%'  OR category LIKE '%$searchTerm%'";
    $result = mysqli_query($conn, $sql);



    // Start the product grid
    echo '<div class="product-container">';
    echo '<div class="container">';
    echo '<div class="product-main">';
    echo '<h2 class="title">Search Results</h2>';
    echo '<div class="product-grid">';

    // Display the results if any are found
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='showcase'>";
            echo "<div class='showcase-banner'>";
            echo "<img src='supplier/image/" . htmlspecialchars($row['image']) . "' alt='" . htmlspecialchars($row['pname']) . "' class='showcase-img' width='200'>";
            echo "</div>";
            echo "<div class='showcase-content'>";
            echo "<a href='product/index.php?id=" . $row['pid'] . "' class='showcase-category'>" . htmlspecialchars($row['pname']) . "</a>";
            echo "<p><strong>Category: " . htmlspecialchars($row['category']) . "</strong></p>"; // Display product category
            echo "<h3 class='showcase-title'>" . htmlspecialchars($row['category']) . "</h3>";
            echo "<div class='showcase-rating'>";
            echo "<ion-icon name='star'></ion-icon>";
            echo "<ion-icon name='star'></ion-icon>";
            echo "<ion-icon name='star'></ion-icon>";
            echo "<ion-icon name='star-outline'></ion-icon>";
            echo "<ion-icon name='star-outline'></ion-icon>";
            echo "</div>";
            echo "<div class='price-box'>";
            echo "<p class='price'>₹ " . htmlspecialchars($row['price']) . "</p>";
            echo "<del>$75.00</del>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "<p>No results found.</p>";
    }

    echo '</div>'; // Close the product grid
    echo '</div>'; // Close the product main
    echo '</div>'; // Close the container
    echo '</div>'; // Close the product container
} else {
    echo "Invalid search request.";
}

mysqli_close($conn);
?>





</body>
</html>