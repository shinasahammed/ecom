<html>
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<?php
session_start();
$email = $_SESSION['email'];
$conn = mysqli_connect("localhost", "root", "", "ecommerse");

$id = $_GET['id'] ?? null;
$query = mysqli_query($conn, "SELECT * FROM addcategory");

// Fetch product details if editing
if ($id) {
    $stmt = $conn->prepare("SELECT * FROM products WHERE pid = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();
    $stmt->close();
}

// Handle form submission
if (isset($_POST['submit'])) {
    $filename = basename($_FILES["uploadfile"]["name"]);
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "./image/" . $filename;

    $n = htmlspecialchars($_POST['pname']);
    $c = htmlspecialchars($_POST['category']);
    $d = htmlspecialchars($_POST['details']);
    $s = (int)$_POST['stock'];
    $p = (int)$_POST['price'];
    $sizes = $_POST['size'] ?? [];
    $material = htmlspecialchars($_POST['material']);

    // Validate inputs
    if (empty($n) || empty($c) || empty($d) || empty($s) || empty($p) || empty($sizes) || empty($material)) {
        echo "<script>alert('Please fill in all fields.');</script>";
    } else {
        if ($filename) {
            move_uploaded_file($tempname, $folder);
        } else {
            $filename = $product['image'] ?? '';
        }

        $category_query = mysqli_query($conn, "SELECT id FROM addcategory WHERE categoryname = '$c'");
        if ($category_query) {
            $category = mysqli_fetch_assoc($category_query);
            if ($category) {
                $category_id = $category['id'];

                if ($id) {
                    // Update product
                    $update_stmt = $conn->prepare("UPDATE products SET pname = ?, image = ?, category_id = ?, category = ?, details = ?, stock = ?, price = ?, supplier = ?, material = ? WHERE pid = ?");
                    $update_stmt->bind_param("ssisssissi", $n, $filename, $category_id, $c, $d, $s, $p, $email, $material, $id);

                    if ($update_stmt->execute()) {
                        mysqli_query($conn, "DELETE FROM sizes WHERE product_id = '$id'");
                        foreach ($sizes as $size) {
                            mysqli_query($conn, "INSERT INTO sizes (product_id, size) VALUES ('$id', '$size')");
                        }
                        echo "<script>alert('Product updated successfully.');</script>";
                    } else {
                        echo "<script>alert('Failed to update product.');</script>";
                    }

                    $update_stmt->close();
                }
            } else {
                echo "<script>alert('Category not found.');</script>";
            }
        } else {
            echo "<script>alert('Failed to fetch category.');</script>";
        }
    }
}
?>
 <style>
        input[type=text], select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type=submit] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        div {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
        }
    </style>
<!-- Form Section -->
<body class="bg-gray-100 flex min-h-screen">
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <div>
        <form method="post" enctype="multipart/form-data">
            <label for="fname">EDIT PRODUCT</label>
            <input type="text" id="fname" name="pname" value="<?php echo $product['pname'] ?? ''; ?>" placeholder="Product Name">
            <input type="file" id="fname" name="uploadfile" placeholder="Image">
            <select name="category" id="fname">
                <option>SELECT</option>
                <?php
                if (isset($query)) {
                    while ($res = mysqli_fetch_array($query)) {
                        $selected = ($product['category'] ?? '') == $res['categoryname'] ? 'selected' : '';
                        echo "<option value='{$res['categoryname']}' $selected>{$res['categoryname']}</option>";
                    }
                }
                ?>
            </select>
            <input type="text" id="fname" name="details" value="<?php echo $product['details'] ?? ''; ?>" placeholder="Details">
            <input type="text" id="fname" name="stock" value="<?php echo $product['stock'] ?? ''; ?>" placeholder="Stock">
            <input type="text" id="fname" name="price" value="<?php echo $product['price'] ?? ''; ?>" placeholder="Price">
            <label for="size">Select Sizes:</label><br>
            <?php
            $sizes = mysqli_query($conn, "SELECT size FROM sizes WHERE product_id = '$id'");
            $selected_sizes = array_column(mysqli_fetch_all($sizes, MYSQLI_ASSOC), 'size');
            $all_sizes = ["Small", "Large", "M", "XL", "XXL", "XXXL"];

            foreach ($all_sizes as $size) {
                $checked = in_array($size, $selected_sizes) ? 'checked' : '';
                echo "<input type='checkbox' name='size[]' value='$size' $checked><label for='$size'>$size</label><br>";
            }
            ?>
            <input type="text" id="fname" name="material" value="<?php echo $product['material'] ?? ''; ?>" placeholder="Material">
            <input type="submit" name="submit" value="Submit">
        </form>
    </div>
</div>
</body>
</html>
