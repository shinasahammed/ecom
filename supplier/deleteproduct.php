<?php
// Establish database connection
$conn = mysqli_connect("localhost", "root", "", "ecommerse");

// Check if the connection is successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Validate and sanitize the product ID from GET parameter
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Ensure $id is an integer

    // First, delete associated rows in the 'cart' table
    $stmt_cart = $conn->prepare("DELETE FROM cart WHERE product_id = ?");
    $stmt_cart->bind_param("i", $id);
    $stmt_cart->execute();
    $stmt_cart->close();

    // Then, delete associated rows in the 'sizes' table
    $stmt_sizes = $conn->prepare("DELETE FROM sizes WHERE product_id = ?");
    $stmt_sizes->bind_param("i", $id);
    $stmt_sizes->execute();
    $stmt_sizes->close();

    // Now delete the product from the 'products' table
    $stmt_product = $conn->prepare("DELETE FROM products WHERE pid = ?");
    $stmt_product->bind_param("i", $id);
    if ($stmt_product->execute()) {
        // Redirect to the product view page with a success message
        header("location:viewprod.php?status=success");
    } else {
        // Redirect with an error message
        header("location:viewprod.php?status=error");
    }
    $stmt_product->close();
} else {
    // Redirect with an error if ID is missing
    header("location:viewprod.php?status=missing_id");
}

// Close the database connection
$conn->close();
?>
