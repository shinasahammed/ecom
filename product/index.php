<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>Flipkart Product Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"/>
  <style>
    body {
      font-family: 'Roboto', sans-serif;
    }
    .zoom {
      transition: transform 0.2s;
    }
    .zoom:hover {
      transform: scale(1.5);
    }
  </style>
</head>
<?php
$id = $_GET['id'];
$conn = mysqli_connect("localhost", "root", "", "ecommerse");

// Fetch product details
$data = mysqli_query($conn, "SELECT * FROM products WHERE pid='$id'");
$res = mysqli_fetch_array($data);

// Fetch sizes for the product
$sizes_data = mysqli_query($conn, "SELECT size FROM sizes WHERE product_id='$id'");
$sizes = [];
while ($row = mysqli_fetch_assoc($sizes_data)) {
    $sizes[] = $row['size'];
}

// Handle Add to Cart
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $size = $_POST['size'];

    $stmt = $conn->prepare("INSERT INTO cart (product_id, quantity, size) VALUES (?, ?, ?)");
    $stmt->bind_param("iis", $product_id, $quantity, $size);
    if($stmt->execute()){echo "<script>alert('Product added to cart!');</script>";}
}
?>

<body class="bg-gray-100">
  <header class="bg-pink-600 text-white p-4">
    <div class="container mx-auto flex justify-between items-center">
      <div class="text-2xl font-bold">Fit Well</div>
      <div class="flex space-x-4">
        <a class="hover:underline" href="../user.php">Home</a>
        <a class="hover:underline" href="../cart/cart.php">Cart</a>
      </div>
    </div>
  </header>
  <main class="container mx-auto p-4">
    <div class="bg-white p-6 rounded-lg shadow-lg">
      <div class="flex">
        <div class="img-card">
          <style>
            .img-card img {
              width: 100%;
              flex-shrink: 0;
              border-radius: 4px;
              height: 520px;
              object-fit: cover;
            }
            .small-Card {
              display: flex;
              justify-content: start;
              align-items: center;
              margin-top: 15px;
              gap: 12px;
            }
            .small-Card img {
              width: 104px;
              height: 104px;
              border-radius: 4px;
              cursor: pointer;
            }
            .small-Card img:active {
              border: 1px solid #17696a;
            }
            .sm-card {
              border: 2px solid darkred;
            }
          </style>
          <img src="../supplier/image/<?php echo $res['image'];?>" alt="" id="featured-image">
        </div>
        <div class="w-2/3 pl-6">
          <h1 class="text-3xl font-bold mb-2"><?php echo $res['pname']; ?></h1>
          <p class="text-lg text-gray-500 mb-4">Category: <?php echo $res['category']; ?></p>
          <p class="text-xl text-gray-700 mb-4">₹ <?php echo $res['price']; ?></p>
          <p class="text-xl text-gray-700 mb-4"><?php echo $res['details']; ?></p>
          <p class="text-xl text-gray-700 mb-4">Material: <?php echo $res['material']; ?></p>
          <style>
            .selected {
                background-color: #f59e0b; /* Change to the desired fixed color */
                color: white; /* Change text color if needed */
            }
            .size-option {
                margin-right: 10px; /* Adjust the gap size as needed */
            }
            .size-option:last-child {
                margin-right: 0;
            }
          </style>
          <div>
            <label class="block text-lg font-semibold mb-2">Select Size:</label>
            <?php foreach ($sizes as $size): ?>
                <label class="size-option border border-gray-300 px-4 py-2 rounded-lg hover:bg-gray-200 cursor-pointer">
                    <input type="radio" name="size" value="<?php echo htmlspecialchars($size); ?>" class="hidden" onclick="selectSize(this)">
                    <?php echo htmlspecialchars($size); ?>
                </label>
            <?php endforeach; ?>
          </div><br>
          <script>
            function selectSize(selectedRadio) {
                // Remove 'selected' class from all size options
                const options = document.querySelectorAll('.size-option');
                options.forEach(option => {
                    option.classList.remove('selected');
                });

                // Add 'selected' class to the currently selected option
                const label = selectedRadio.parentElement;
                label.classList.add('selected');
                document.getElementById('selected-size').value = selectedRadio.value;
            }
          </script>
          <form method="post" class="mb-4">
            <input type="hidden" name="product_id" value="<?php echo $res['pid']; ?>">
            <label for="quantity" class="block text-lg font-semibold mb-2">Quantity:</label>
            <input type="number" name="quantity" id="quantity" min="1" value="1" class="border border-gray-300 px-4 py-2 rounded-lg mb-4">
            <input type="hidden" name="size" id="selected-size">
            <button type="submit" class="bg-pink-600 text-white px-4 py-2 rounded-lg hover:bg-orange-700">Add to Cart</button>
          </form>
          <button onclick="buyNow()" class="bg-pink-600 text-white px-4 py-2 rounded-lg hover:bg-orange-700">Buy Now</button>
          <script>
            function buyNow() {
              const size = document.getElementById('selected-size').value;
              const quantity = document.getElementById('quantity').value;
              window.location.href = `../addres/addres.php?id=<?php echo $res['pid'];?>&size=${size}&quantity=${quantity}`;
            }
          </script>
        </div>
      </div>
    </div>
  </main>
  <footer class="bg-pink-600 text-white p-4 mt-8">
    <div class="container mx-auto text-center">© 2024 Fit Well. All rights reserved.</div>
  </footer>
  <script src="js/cart.js"></script>
</body>
</html>
