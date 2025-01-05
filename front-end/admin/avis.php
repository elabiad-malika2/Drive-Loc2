
<?php 
require '../../Back-end/controller/AfficherAvis.php';

$avis = getAvis::showAllAvis();

?>

<html>

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

    <!-- main container -->
    <div class="flex flex-col lg:flex-row min-h-screen ">
        <!-- Sidebar -->
        <aside class="w-full lg:w-64 bg-white border-r" id="sidebar">
            <div class="p-6 border-b flex flex-row justify-between items-center">
                <img src="../assets/gorent-logo.svg">
            </div>
            <nav class="p-6">
                <ul class="space-y-6">
                    <li class="text-orange-600">
                        <a href="index.php" class="flex items-center space-x-4 text-gray-600 hover:text-orange-600">
                            <i class="ri-dashboard-line"></i>
                            <span class="text-orange-600">Dashboard</span>
                        </a>
                    </li>
                    <li class="text-orange-600">
                        <a href="reservation.php" class="flex items-center space-x-4 text-gray-600 hover:text-orange-600">
                            <i class="ri-dashboard-line "></i>
                            <span class="text-orange-600">Reservations</span>
                        </a>
                    </li>
                    <li class="text-orange-600">
                        <a href="avis.php" class="flex items-center space-x-4 text-gray-600 hover:text-orange-600">
                            <i class="ri-dashboard-line text-orange-600"></i>
                            <span class="text-orange-600">Avis</span>
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

        <section class="flex-1 p-4 md:p-6 space-y-6">
            <!-- Header -->
            <header
                class="flex flex-col md:flex-row items-start md:items-center justify-between space-y-4 md:space-y-0">
                <i class="ri-sidebar-fold-line text-2xl mt-2 text-orange-600 hover:text-gray-700 transition"
                    id="sidebarIcon"></i>
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

    <!-- Car Listings Section -->
    <div class="flex w-full flex-wrap gap-4 justify-around bg-gray-100 p-4 rounded-md">
    <?php foreach ($avis as $review): ?>
        <div class="w-full sm:w-1/3 md:w-1/4 bg-white rounded-lg shadow-md p-4">
            <div class="flex flex-col items-start">

                <div class="flex mb-2">
                    <?php for ($i = 0; $i < 5; $i++): ?>
                        <span class="text-yellow-500">
                            <?= $i < $review['stars'] ? '★' : '☆'; ?>
                        </span>
                    <?php endfor; ?>
                </div>

                <p class="text-gray-700 mb-4">
                    <?= htmlspecialchars($review['message'], ENT_QUOTES, 'UTF-8'); ?>
                </p>

               
            </div>
        </div>
    <?php endforeach; ?>
</div>
  </div>
  </div>
        </section>
    </div>

    <!-- add new Categorie modal -->


    

   <!--ADD Modal -->

<!-- Edit MODEL -->


<script>

const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: '# Number Of Car',
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