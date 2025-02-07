<?php
$conn = mysqli_connect("localhost", "root", "", "ecommerse");

// Fetch Cart Items
$cart_query = "SELECT cart.id AS cart_id, products.pid, products.pname, products.price, products.image, cart.quantity, cart.size 
               FROM cart 
               JOIN products ON cart.product_id = products.pid";
$cart_items = mysqli_query($conn, $cart_query);

// Handle Empty Cart
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['empty_cart'])) {
    $empty_cart_query = "DELETE FROM cart";
    mysqli_query($conn, $empty_cart_query);
    echo "<script>alert('Cart emptied successfully.'); window.location.href='cart.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
<header class="bg-gradient-to-r from-pink-500 to-purple-600 text-white p-6 shadow-lg">
    <div class="container mx-auto flex justify-between items-center">
        <div class="text-3xl font-bold">Fit Well</div>
        <div class="flex space-x-6">
            <a class="hover:underline" href="../user.php">Home</a>
        </div>
    </div>
</header>
<main class="container mx-auto p-8">
    <h1 class="text-4xl font-bold mb-6 text-center">Shopping Cart</h1>
    <div class="bg-white rounded-lg shadow-lg p-8">
        <?php if ($cart_items->num_rows > 0): ?>
            <form method="post" action="../addres/addrescart.php">
                <table class="w-full">
                    <thead>
                    <tr class="bg-gray-200">
                        <th class="px-6 py-3 text-left">Product</th>
                        <th class="px-6 py-3 text-left">Price</th>
                        <th class="px-6 py-3 text-left">Quantity</th>
                        <th class="px-6 py-3 text-left">Size</th>
                        <th class="px-6 py-3 text-left">Subtotal</th>
                        <th class="px-6 py-3 text-left">Remove</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $total = 0;
                        while ($item = $cart_items->fetch_assoc()): 
                            $subtotal = $item['price'] * $item['quantity'];
                            $total += $subtotal;
                        ?>
                        <tr class="border-t hover:bg-gray-100">
                            <td class="px-4 py-4 flex items-center">
                                <img src="../supplier/image/<?php echo $item['image']; ?>" alt="" class="w-20 h-20 rounded-lg mr-4">
                                <span><?php echo $item['pname']; ?></span>
                            </td>
                            <td class="px-4 py-4">₹<?php echo number_format($item['price'], 2); ?></td>
                            <td class="px-4 py-4"><?php echo $item['quantity']; ?></td>
                            <td class="px-4 py-4"><?php echo $item['size']; ?></td>
                            <td class="px-4 py-4">₹<?php echo number_format($subtotal, 2); ?></td>
                            <td class="px-4 py-4">
                                <form method="post" action="deletefromcart.php" class="inline">
                                    <input type="hidden" name="cart_id" value="<?php echo $item['cart_id']; ?>">
                                    <button type="submit" name="action" value="remove" class="text-red-600 hover:underline">Remove</button>
                                </form>
                            </td>
                        </tr>
                        <input type="hidden" name="cart_ids[]" value="<?php echo $item['cart_id']; ?>">
                        <?php endwhile; ?>
                    </tbody>
                </table>
                <div class="mt-8 text-right">
                    <h3 class="text-3xl font-bold">Total: ₹<?php echo number_format($total, 2); ?></h3>
                    <button type="submit" class="mt-4 bg-green-600 text-white px-8 py-3 rounded-lg shadow hover:bg-green-700 transition duration-300">Proceed to Checkout</button>
                </div>
            </form>
            <form method="post" class="mt-4">
                <button type="submit" name="empty_cart" class="bg-red-600 text-white px-8 py-3 rounded-lg shadow hover:bg-red-700 transition duration-300">Empty Cart</button>
            </form>
        <?php else: ?>
            <p class="text-center text-gray-600">Your cart is empty.</p>
        <?php endif; ?>
    </div>
</main>
<footer class="bg-gradient-to-r from-pink-500 to-purple-600 text-white p-4 mt-8">
    <div class="container mx-auto text-center">© 2024 Fit Well. All rights reserved.</div>
</footer>
</body>
</html>