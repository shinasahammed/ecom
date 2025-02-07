<html>
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body class="bg-gray-100 flex min-h-screen">
    <!-- Sidebar -->
    <div class="bg-white w-64 p-6 shadow-lg">
        <h2 class="text-2xl font-bold mb-6">Admin Dashboard</h2>
        <ul>
            <li class="mb-4">
                <a href="#" class="flex items-center text-gray-700 hover:text-blue-500">
                    <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
                </a>
            </li>
         
            <li class="mb-4">
                <a href="../index.php" class="flex items-center text-gray-700 hover:text-blue-500">
                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                </a>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="flex-1 p-6">
        <!-- Top Navigation -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">Dashboard</h1>
          
        </div>

        <!-- Dashboard Content -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Card 1 -->
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-xl font-bold mb-4">ADD CATEGORY</h2>
                <a href="addcatogary.php"class="text-gray-700">add.</a>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-xl font-bold mb-4">VIEW CATEGORY</h2>
                <a href="viewcategory.php"class="text-gray-700">View
            </div></a>
           
            <!-- Card 2 -->
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-xl font-bold mb-4">APPROVE SUPPLIER</h2>
                <a href="approvesup.php"class="text-gray-700">approve.</a>
            </div>
            <!-- Card 3 -->
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-xl font-bold mb-4">VIEW SUPPLIER</h2>
                <a href="viewsup.php "class="text-gray-700">view.</a>
            </div>
          
        </div>
    </div>
</body>
</html>