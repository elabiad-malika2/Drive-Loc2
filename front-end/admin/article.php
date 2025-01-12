<?php
    require_once('../../Back-end/controller/Blogs/Articles/afficher.php');
    $articles=afficherArticle::afficherArticleStatus();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Go Rent - Car Rental</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="./assets/gorent.svg">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="../scripts/script.js" defer></script>
</head>

<body class="bg-gray-50 text-gray-700">

    <!-- Main container -->
    <div class="flex flex-col lg:flex-row min-h-screen">
        <!-- Sidebar -->
        <aside class="w-full lg:w-64 bg-white border-r" id="sidebar">
            <div class="p-6 border-b flex flex-row justify-between items-center">
                <img src="../assets/gorent-logo.svg" alt="Go Rent Logo">
            </div>
            <nav class="p-6">
                <ul class="space-y-6">
                    <li>
                        <a href="index.php" class="flex items-center space-x-4 text-gray-600 hover:text-orange-600">
                            <i class="ri-dashboard-line"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="reservation.php" class="flex items-center space-x-4 text-gray-600 hover:text-orange-600">
                            <i class="ri-dashboard-line"></i>
                            <span>Reservations</span>
                        </a>
                    </li>
                    <li>
                        <a href="avis.php" class="flex items-center space-x-4 text-gray-600 hover:text-orange-600">
                            <i class="ri-dashboard-line"></i>
                            <span>Avis</span>
                        </a>
                    </li>
                </ul>
                <hr class="my-6">
                <ul class="space-y-6">
                    <li>
                        <a href="#" class="flex items-center space-x-4 text-gray-600 hover:text-orange-600">
                            <i class="ri-exchange-dollar-line"></i>
                            <span>Transactions</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center space-x-4 text-gray-600 hover:text-orange-600">
                            <i class="ri-bar-chart-box-line"></i>
                            <span>Statistiques</span>
                        </a>
                    </li>
                </ul>
                <hr class="my-6">
                <ul class="space-y-6">
                    <li>
                        <a href="../logout.php" class="flex items-center space-x-4 text-red-600 hover:text-orange-600">
                            <i class="ri-logout-box-line"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main content -->
        <section class="flex-1 p-4 md:p-6 space-y-6">
            <!-- Header -->
            <header class="flex flex-col md:flex-row items-start md:items-center justify-between space-y-4 md:space-y-0">
                <i class="ri-sidebar-fold-line text-2xl mt-2 text-orange-600 hover:text-gray-700 transition" id="sidebarIcon"></i>
                <h2 class="text-2xl font-bold">Welcome Admin</h2>
                <div class="flex items-center space-x-4">
                    <button class="text-gray-500 hover:text-gray-700">
                        <i class="ri-notification-line text-xl"></i>
                    </button>
                    <img src="../assets/gorent-avatar.svg" alt="User" class="w-10 h-10 rounded-full">
                </div>
            </header>

            <!-- Statistics & Listings -->
            <div class="bg-gray-100 min-h-screen p-6">
                <div class="container mx-auto space-y-10">
                    <!-- Stats Section -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div class="bg-white p-6 rounded-lg shadow flex justify-between items-center">
                            <div>
                                <h4 class="text-gray-600 font-semibold">Revenue Summary</h4>
                                <p class="text-sm text-green-500 mt-2">+4.5% from last month</p>
                            </div>
                            <i class="ri-line-chart-line text-3xl text-orange-600"></i>
                        </div>
                        <div class="bg-white p-6 rounded-lg shadow flex justify-between items-center">
                            <div>
                                <h4 class="text-gray-600 font-semibold">Contracts</h4>
                                <p class="text-sm text-green-500 mt-2">+7.2% from last month</p>
                            </div>
                            <i class="ri-wallet-line text-3xl text-orange-600"></i>
                        </div>
                        <div class="bg-white p-6 rounded-lg shadow flex justify-between items-center">
                            <div>
                                <h4 class="text-gray-600 font-semibold">Clients</h4>
                                <p class="text-sm text-red-500 mt-2">-1.2% from last month</p>
                            </div>
                            <i class="ri-group-3-line text-3xl text-orange-600"></i>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-100 p-6">
                <div class="container mx-auto space-y-10">
                    <div class="grid grid-cols-3     gap-6">
                        <?php foreach ($articles as $article): ?>
                            <div class="bg-white p-6 rounded-lg shadow">
                                <!-- Display Article Image -->
                                <img src="../../Back-end/<?= htmlspecialchars($article['image']); ?>" alt="<?= htmlspecialchars($article['titre']); ?>" class="w-full h-64 object-cover rounded-lg">
                                <h3 class="text-xl font-semibold mt-4"><?= htmlspecialchars($article['titre']); ?></h3>
                                <p class="text-sm text-gray-500"><?= htmlspecialchars($article['description']); ?></p>

                                <div class="mt-4">
                                    <!-- Display Tags -->
                                    <?php 
                                    $tags = explode(", ", $article['tags']); // Assuming tags are stored as comma-separated values
                                    foreach ($tags as $tag):
                                    ?>
                                        <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-sm font-medium mr-2">
                                            #<?= htmlspecialchars($tag); ?>
                                        </span>
                                    <?php endforeach; ?>
                                </div>

                                <div class="mt-4">
                                    <!-- Accept and Refuse buttons -->
                                    <button class="bg-green-500 text-white px-4 py-2 rounded mr-2">Accept</button>
                                    <button class="bg-red-500 text-white px-4 py-2 rounded">Refuse</button>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            </div>
            
        </section>
    </div>

    <script>
        // Define labels and data for the chart
        const labels = ['January', 'February', 'March', 'April', 'May', 'June'];
        const data = [10, 20, 30, 40, 50, 60];

        // Initialize Chart.js
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: '# Number Of Cars',
                    data: data,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });
    </script>

</body>

</html>
