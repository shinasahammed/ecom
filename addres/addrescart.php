<?php
// Configuration
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'ecommerse';

// Establish database connection
$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve selected cart IDs
$cart_ids = isset($_POST['cart_ids']) ? array_map('intval', $_POST['cart_ids']) : [];

if (empty($cart_ids)) {
    echo "<script>alert('No items selected for checkout.'); window.location.href='../cart/cart.php';</script>";
    exit;
}

$cart_ids_imploded = implode(',', $cart_ids); // Sanitize array to prevent SQL injection
$query = "SELECT cart.id AS cart_id, products.pname, products.price, cart.quantity 
          FROM cart 
          JOIN products ON cart.product_id = products.pid 
          WHERE cart.id IN ($cart_ids_imploded)";
$cart_items = $conn->query($query);

if (isset($_POST['submit'])) {
    $n = $_POST['name'];
    $e = $_POST['email'];
    $ph = $_POST['phno'];
    $p = $_POST['pincode'];
    $a = $_POST['address'];
    $ct = $_POST['city'];
    $st = $_POST['state'];

    // Prepare and execute address insertion query
    $insert_query = "INSERT INTO address(name, email, phno, pincode, address, city, state) 
                     VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($insert_query);
    $stmt->bind_param("sssssss", $n, $e, $ph, $p, $a, $ct, $st);
    if ($stmt->execute()) {
        echo "<script>alert('Address saved successfully!');</script>";

        // Redirect to payment with cart IDs
        header("Location: ../payment/credit-card-formvuejs/pay/paycart.php?cart_ids=" . urlencode($cart_ids_imploded));
        exit;
    } else {
        echo "<script>alert('Failed to save address. Please try again.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery Address</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body class="bg-blue-50">
    <div class="max-w-2xl mx-auto p-6">
        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="flex items-center mb-4">
                <h2 class="text-lg font-semibold text-gray-800">DELIVERY ADDRESS</h2>
            </div>
            <form method="post">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-gray-700">Name</label>
                        <input type="text" name="name" class="w-full border border-gray-300 rounded-md p-2" required>
                    </div>
                    <div>
                        <label class="block text-gray-700">10-digit mobile number</label>
                        <input type="text" name="phno" class="w-full border border-gray-300 rounded-md p-2" required>
                    </div>
                    <div>
                        <label class="block text-gray-700">Pincode</label>
                        <input type="text" name="pincode" class="w-full border border-gray-300 rounded-md p-2" required>
                    </div>
                    <div>
                        <label class="block text-gray-700">Email</label>
                        <input type="email" name="email" class="w-full border border-gray-300 rounded-md p-2" required>
                    </div>
                    <div class="col-span-2">
                        <label class="block text-gray-700">Address</label>
                        <textarea name="address" class="w-full border border-gray-300 rounded-md p-2" required></textarea>
                    </div>
                    <div>
                        <label class="block text-gray-700">City</label>
                        <input type="text" name="city" class="w-full border border-gray-300 rounded-md p-2" required>
                    </div>
                    <div>
                        <label class="block text-gray-700">State</label>
                        <select name="state" class="w-full border border-gray-300 rounded-md p-2" required>
                            <option>Kerala</option>
                            <option>Tamil Nadu</option>
                            <option>Karnataka</option>
                            <option>Andhra Pradesh</option>
                            <option>Goa</option>
                            <option>Telangana</option>
                            <option>Maharashtra</option>
                            <option>Odisha</option>
                        </select>
                    </div>
                </div>
                <div class="flex justify-between">
                    <button name="submit" class="bg-orange-500 text-white py-2 px-4 rounded-md">SAVE AND DELIVER HERE</button>
                </div>
                <?php foreach ($cart_ids as $cart_id): ?>
                    <input type="hidden" name="cart_ids[]" value="<?php echo $cart_id; ?>">
                <?php endforeach; ?>
            </form>
            <div class="mt-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Selected Products</h3>
                <ul class="list-disc pl-6">
                    <?php while ($item = $cart_items->fetch_assoc()): ?>
                        <li><?php echo $item['pname']; ?> - ₹<?php echo number_format($item['price'], 2); ?> x <?php echo $item['quantity']; ?></li>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
