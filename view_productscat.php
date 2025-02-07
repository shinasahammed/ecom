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
$conn = mysqli_connect("localhost", "root", "", "ecommerse");

if (isset($_GET['category_id'])) {
    $category_id = $_GET['category_id'];

    // Fetch category name
    $category_query = mysqli_query($conn, "SELECT categoryname FROM addcategory WHERE id = $category_id");
    $category = mysqli_fetch_assoc($category_query);

    echo "<h2>Products in Category: " . $category['categoryname'] . "</h2>";

    // Fetch products
    $product_query = mysqli_query($conn, "SELECT * FROM products WHERE category_id = $category_id");

    echo '<div class="product-container">';
    echo '<div class="container">';
    echo '<div class="product-main">';
    echo '<h2 class="title"></h2>';
    echo '<div class="product-grid">';

    if (mysqli_num_rows($product_query) > 0) {
        while ($product = mysqli_fetch_assoc($product_query)) {
            echo "<div class='showcase'>";
            echo "<div class='showcase-banner'>";
            echo "<img src='supplier/image/" . htmlspecialchars($product['image']) . "' alt='" . htmlspecialchars($product['pname']) . "' class='showcase-img' width='200'>";
            echo "</div>";
            echo "<div class='showcase-content'>";
            echo "<a href='product/index.php?id=" . $product['pid'] . "' class='showcase-category'>" . htmlspecialchars($product['pname']) . "</a>";
            echo "<p><strong>Category: " . htmlspecialchars($product['category']) . "</strong></p>"; // Display product category
            echo "<h3 class='showcase-title'>" . htmlspecialchars($product['pname']) . "</h3>";
            echo "<div class='showcase-rating'>";
            echo "<ion-icon name='star'></ion-icon>";
            echo "<ion-icon name='star'></ion-icon>";
            echo "<ion-icon name='star'></ion-icon>";
            echo "<ion-icon name='star-outline'></ion-icon>";
            echo "<ion-icon name='star-outline'></ion-icon>";
            echo "</div>";
            echo "<div class='price-box'>";
            echo "<p class='price'>₹ " . htmlspecialchars($product['price']) . "</p>";
            echo "<del>$75.00</del>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "<p>No products found in this category.</p>";
    }
    echo '</div>'; // Close the product grid
    echo '</div>'; // Close the product main
    echo '</div>'; // Close the container
    echo '</div>'; // Close the product container

} else {
    echo "<p>Category not selected.</p>";
}
?>
</body>
</html>
