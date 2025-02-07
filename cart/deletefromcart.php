<?php
$conn = mysqli_connect("localhost", "root", "", "ecommerse");

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];
    $cart_id = $_POST['cart_id'] ?? null;

    if ($action === 'remove' && $cart_id) {
        $remove_query = "DELETE FROM cart WHERE id = ?";
        $stmt = mysqli_prepare($conn, $remove_query);
        mysqli_stmt_bind_param($stmt, 'i', $cart_id);
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            echo "<script>alert('Item removed from cart successfully.'); window.location.href='cart.php';</script>";
        } else {
            echo "<script>alert('Failed to remove item from cart. Please try again.'); window.location.href='cart.php';</script>";
        }
    }
}
?>
