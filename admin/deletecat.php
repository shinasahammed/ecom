<?php
$conn=mysqli_connect("localhost","root","","ecommerse"); // Ensure database connection is included

$category_id = $_GET['id']; // Assuming the category ID is passed via GET

// Check for related products
$checkProducts = $conn->query("SELECT * FROM products WHERE category_id = $category_id");

if ($checkProducts->num_rows > 0) {
    // Handle the case where related products exist
    echo "<script>alert('Cannot delete this category as it has associated products.');</script>";
} else {
    // Proceed to delete the category
    $deleteCategory = $conn->query("DELETE FROM addcategory WHERE id = $category_id");
    if ($deleteCategory) {
        echo "<script>alert('Category deleted successfully.');</script>";
    } else {
        echo "<script>alert('Error deleting category: " . $conn->error . "');</script>";
    }
}

$conn->close();
?>





