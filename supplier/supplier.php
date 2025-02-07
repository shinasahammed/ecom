<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>
   Supplier Panel
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&amp;display=swap" rel="stylesheet"/>
  <style>
   @keyframes fadeIn {
    from {
     opacity: 0;
    }
    to {
     opacity: 1;
    }
   }
   .fade-in {
    animation: fadeIn 1s ease-in-out;
   }
  </style>
 </head>


 <?php
        $conn = mysqli_connect("localhost", "root", "", "ecommerse");

        $productCountQuery = mysqli_query($conn, "SELECT COUNT(*) as product_count FROM products");
        $productCountResult = mysqli_fetch_assoc($productCountQuery);
        $productCount = $productCountResult['product_count'];

        $orderCountQuery = mysqli_query($conn, "SELECT COUNT(*) as order_count FROM orders");
        $orderCountResult = mysqli_fetch_assoc($orderCountQuery);
        $orderCount = $orderCountResult['order_count'];

        $newOrderCountQuery = mysqli_query($conn, "SELECT COUNT(*) as new_order_count FROM orders WHERE status = 'Pending'");
        $newOrderCountResult = mysqli_fetch_assoc($newOrderCountQuery);
        $newOrderCount = $newOrderCountResult['new_order_count'];

        $messageCountQuery = mysqli_query($conn, "SELECT COUNT(*) as message_count FROM messages");
        $messageCountResult = mysqli_fetch_assoc($messageCountQuery);
        $messageCount = $messageCountResult['message_count'];

        $recentOrdersQuery = mysqli_query($conn, "SELECT * FROM orders ORDER BY order_id DESC LIMIT 5");
        ?>


 <body class="font-roboto bg-gray-100 fade-in">
  <div class="min-h-screen flex flex-col">
   <!-- Header -->
   <header class="bg-pink-600 text-white p-4 flex justify-between items-center fade-in">
    <div class="flex items-center">
     <h1 class="text-xl font-bold">
      Supplier Panel
     </h1>
    </div>
    <nav class="space-x-4">
     <a class="hover:underline" href="supplier.php">
      Dashboard
     </a>
     <a class="hover:underline" href="vieworders.php">
      Orders
     </a>
     <a class="hover:underline" href="viewprod.php">
      Products
     </a>
     <a class="hover:underline" href="profile/profile.php">
      Profile
     </a>
     <a class="hover:underline" href="../login1.php">
      Logout
     </a>
    </nav>
   </header>
   <!-- Main Content -->
   <div class="flex flex-1 fade-in">
    <!-- Sidebar -->
    <aside class="bg-white w-64 p-4 hidden md:block fade-in">
     <ul class="space-y-4">
      <li>
       <a class="flex items-center space-x-2 text-gray-700 hover:text-pink-600" href="supplier.php">
        <i class="fas fa-tachometer-alt">
        </i>
        <span>
         Dashboard
        </span>
       </a>
      </li>
      <li>
       <a class="flex items-center space-x-2 text-gray-700 hover:text-pink-600" href="vieworders.php">
        <i class="fas fa-box">
        </i>
        <span>
         Orders
        </span>
       </a>
      </li>
      <li>
       <a class="flex items-center space-x-2 text-gray-700 hover:text-pink-600" href="viewprod.php">
        <i class="fas fa-cube">
        </i>
        <span>
         Products
        </span>
       </a>
      </li>
      <li>
       <a class="flex items-center space-x-2 text-gray-700 hover:text-pink-600" href="addproduct.php">
        <i class="fas fa-plus-circle">
        </i>
        <span>
         Add Products
        </span>
       </a>
      </li>
      <li>
       <a class="flex items-center space-x-2 text-gray-700 hover:text-pink-600" href="neworders.php">
        <i class="fas fa-clock">
        </i>
        <span>
         Pending Orders
        </span>
       </a>
      </li>
      <li>
       <a class="flex items-center space-x-2 text-gray-700 hover:text-pink-600" href="messages.php">
        <i class="fas fa-envelope">
        </i>
        <span>
         Messages
        </span>
       </a>
      </li>
      <li>
       <a class="flex items-center space-x-2 text-gray-700 hover:text-pink-600" href="profile/profile.php">
        <i class="fas fa-user">
        </i>
        <span>
         Profile
        </span>
       </a>
      </li>
      <li>
       <a class="flex items-center space-x-2 text-gray-700 hover:text-pink-600" href="../login1.php">
        <i class="fas fa-sign-out-alt">
        </i>
        <span>
         Logout
        </span>
       </a>
      </li>
     </ul>
    </aside>
    <!-- Main Section -->
    <main class="flex-1 p-4 fade-in">
     <h2 class="text-2xl font-bold mb-4">
      Dashboard
     </h2>
     <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
      <!-- Card 1 -->
      <div class="bg-white p-4 rounded-lg shadow fade-in">
       <div class="flex items-center">
        <img alt="Icon representing total products with a cube" class="h-12 w-12 mr-4" height="50" src="https://storage.googleapis.com/a1aa/image/IeY4droEd5WMGKlUesQpFST5hWe44WOJZ2fAIxjfQlR4YxJgC.jpg" width="50"/>
        <div>
         <h3 class="text-lg font-semibold">
          View Product
         </h3>
         <p class="text-gray-600">
         <?php echo $productCount; ?>
         </p>
        </div>
       </div>
      </div>
      <!-- Card 2 -->
      <div class="bg-white p-4 rounded-lg shadow fade-in">
       <div class="flex items-center">
        <img alt="Icon representing total products with a shopping bag" class="h-12 w-12 mr-4" height="50" src="https://storage.googleapis.com/a1aa/image/2k3V5MpspCbLEtoowlmiB2vBvkdXfsuAsca1SCppeDMFPOBUA.jpg" width="50"/>
        <div>
         <h3 class="text-lg font-semibold">
          View Orders
         </h3>
         <p class="text-gray-600">
         <?php echo $orderCount; ?>
         </p>
        </div>
       </div>
      </div>
      <!-- Card 3 -->
      <div class="bg-white p-4 rounded-lg shadow fade-in">
       <div class="flex items-center">
        <img alt="Icon representing pending orders with a clock" class="h-12 w-12 mr-4" height="50" src="https://storage.googleapis.com/a1aa/image/KVpvYediRDQRICLlBhPoU5sOtMcxz4mTT3eLfsqSecLSs4EQB.jpg" width="50"/>
        <div>
         <h3 class="text-lg font-semibold">
          Pending Orders
         </h3>
         <p class="text-gray-600">
         <?php echo $newOrderCount; ?>
         </p>
        </div>
       </div>
      </div>
      <!-- Card 4 -->
      <div class="bg-white p-4 rounded-lg shadow fade-in">
       <div class="flex items-center">
        <img alt="Icon representing messages with a mail envelope" class="h-12 w-12 mr-4" height="50" src="https://storage.googleapis.com/a1aa/image/2k3V5MpspCbLEtoowlmiB2vBvkdXfsuAsca1SCppeDMFPOBUA.jpg" width="50"/>
        <div>
         <h3 class="text-lg font-semibold">
          Messages
         </h3>
         <p class="text-gray-600">
         <?php echo $messageCount; ?>
         </p>
        </div>
       </div>
      </div>
     </div>
     <!-- Recent Orders Table -->
  <!-- Recent Orders Table -->
<div class="mt-8 fade-in">
  <h2 class="text-2xl font-bold mb-4">
    Recent Orders
  </h2>
  <div class="bg-white rounded-lg shadow overflow-x-auto">
    <table class="min-w-full bg-white">
      <thead>
        <tr>
          <th class="py-2 px-4 border-b text-left">
            Order ID
          </th>
          <th class="py-2 px-4 border-b text-left">
            Product
          </th>
          <th class="py-2 px-4 border-b text-left">
            Quantity
          </th>
          <th class="py-2 px-4 border-b text-left">
            Size
          </th>
          <th class="py-2 px-4 border-b text-left">
            Status
          </th>
        </tr>
      </thead>
      <tbody>
        <?php
        if (mysqli_num_rows($recentOrdersQuery) > 0) {
          while ($row = mysqli_fetch_assoc($recentOrdersQuery)) {
        ?>
            <tr class="hover:bg-gray-100">
              <td class="py-2 px-4 border-b"><?php echo $row['order_id']; ?></td>
              <td class="py-2 px-4 border-b"><?php echo $row['product_name']; ?></td>
              <td class="py-2 px-4 border-b"><?php echo $row['quantity']; ?></td>
              <td class="py-2 px-4 border-b"><?php echo $row['size']; ?></td>
              <td class="py-2 px-4 border-b text-<?php echo $row['status'] == 'Shipped' ? 'green' : ($row['status'] == 'Pending' ? 'yellow' : 'gray'); ?>-600"><?php echo $row['status']; ?></td>
            </tr>
        <?php
          }
        } else {
        ?>
          <tr>
            <td colspan="5" class="py-2 px-4 border-b text-center">No recent orders found</td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>
</div>
</main>
</div>
   <!-- Footer -->
   <footer class="bg-pink-600 text-white p-4 text-center fade-in">
  
   </footer>
  </div>
 </body>
</html>

