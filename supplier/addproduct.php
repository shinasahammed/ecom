<html>
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<?php
session_start();
$email=$_SESSION['email'];
$conn=mysqli_connect("localhost","root","","ecommerse");

$query=mysqli_query($conn,"SELECT * FROM addcategory");




// Check if the form has been submitted
if (isset($_POST['submit'])) {
    // Get the uploaded file details
    $filename = basename($_FILES["uploadfile"]["name"]);
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "./image/" . $filename;

    // Get the other form inputs
    $n = $_POST['pname'];
    $c = $_POST['category'];  // category name selected from dropdown
    $d = $_POST['details'];
    $s = $_POST['stock'];
    $p = $_POST['price'];
    $sizes = $_POST['size'];  // Get the selected sizes
    $material = $_POST['material'];

    // Validate the form inputs
    if (empty($n) || empty($c) || empty($d) || empty($s) || empty($p) || empty($sizes) || empty($material)) {
        echo "<script>alert('Please fill in all fields.');</script>";
    } else {
        // Check if the file is uploaded successfully
        if (move_uploaded_file($tempname, $folder)) {
            // Fetch the category ID based on category name
            $category_query = mysqli_query($conn, "SELECT id FROM addcategory WHERE categoryname = '$c'");

            // Check if the query was successful and category was found
            if ($category_query) {
                $category = mysqli_fetch_assoc($category_query);

                // Check if the category exists
                if ($category) {
                    $category_id = $category['id'];

                    // Insert the product with the category_id instead of category name
                    $data = mysqli_query($conn, "INSERT INTO products (pname, image, category_id, category, details, stock, price, supplier, material) VALUES ('$n', '$filename', '$category_id', '$c', '$d', '$s', '$p', '$email', '$material')");

                    // Insert the selected sizes into the sizes table
                    $product_id = mysqli_insert_id($conn);
                    foreach ($sizes as $size) {
                        $sizeQuery = "INSERT INTO sizes (product_id, size) VALUES ('$product_id', '$size')";
                        if (mysqli_query($conn, $sizeQuery)) {
                            echo "Size added successfully.";
                        } else {
                            echo "Error: " . mysqli_error($conn);
                        }
                    }

                    if ($data) {
                        echo "<script>alert('Product added.');</script>";
                    } else {
                        echo "<script>alert('Failed to add product.');</script>";
                    }
                } else {
                    echo "<script>alert('Category not found.');</script>";
                }
            } else {
                echo "<script>alert('Failed to fetch category.');</script>";
            }
        } else {
            echo "<script>alert('Failed to upload image.');</script>";
        }
    }
}
?>



<!-- Dashboard Content -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <!-- Card 1 -->
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

    <div>
        <form method="post" enctype="multipart/form-data">
            <label for="fname">ADD PRODUCT</label>
            <input type="text" id="fname" name="pname" placeholder="product name">
            <input type="file" id="fname" name="uploadfile" placeholder="Image">
            <select name="category" id="fname">
                <option>SELECT</option>
                <?php
                if (isset($query)) {
                    while ($res = mysqli_fetch_array($query)) {
                        ?>
                        <option value="<?php echo $res['categoryname']; ?>"><?php echo $res['categoryname']; ?></option>
                        <?php
                    }
                }
                ?>
            </select>
            <input type="text" id="fname" name="details" placeholder="details">
            <input type="text" id="fname" name="stock" placeholder="Stock">
            <input type="text" id="fname" name="price" placeholder="Price">
            <label for="size">Select Sizes:</label><br>

            <input type="checkbox" id="small" name="size[]" value="Small">
            <label for="small">Small</label><br>
            <input type="checkbox" id="large" name="size[]" value="Large">
            <label for="large">Large</label><br>
            <input type="checkbox" id="m" name="size[]" value="M">
            <label for="m">M</label><br>
            <input type="checkbox" id="xl" name="size[]" value="XL">
            <label for="xl">XL</label><br>
            <input type="checkbox" id="xxl" name="size[]" value="XXL">
            <label for="xxl">XXL</label><br>
            <input type="checkbox" id="xxxl" name="size[]" value="XXXL">
            <label for="xxxl">XXXL</label><br>
            <input type="text" id="fname" name="material" placeholder="material">
            <input type="submit" name="submit" value="Submit">
        </form>
    </div>
</div>

</body>
</html>
