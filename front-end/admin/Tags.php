
<?php 
require_once '../../Back-end/controller/Blogs/Themes/afficher.php';
$allThemes = getTheme::afficherThemes();


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
                            <i class="ri-dashboard-line text-orange-600"></i>
                            <span class="text-orange-600">Dashboard</span>
                        </a>
                    </li>
                    <li class="text-orange-600">
                        <a href="reservation.php" class="flex items-center space-x-4 text-gray-600 hover:text-orange-600">
                            <i class="ri-dashboard-line "></i>
                            <span class="">Reservations</span>
                        </a>
                    </li>
                    <li class="text-orange-600">
                        <a href="avis.php" class="flex items-center space-x-4 text-gray-600 hover:text-orange-600">
                            <i class="ri-dashboard-line "></i>
                            <span class="">Avis</span>
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

            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-bold text-gray-700 mb-4">Article Tags</h2>
                <div class="flex flex-wrap gap-2 mb-4">
                    <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-sm font-medium">#technology</span>
                    <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-sm font-medium">#design</span>
                    <span class="bg-yellow-100 text-yellow-600 px-3 py-1 rounded-full text-sm font-medium">#innovation</span>
                    <span class="bg-red-100 text-red-600 px-3 py-1 rounded-full text-sm font-medium">#startup</span>
                    <span class="bg-purple-100 text-purple-600 px-3 py-1 rounded-full text-sm font-medium">#coding</span>
                    <span class="bg-pink-100 text-pink-600 px-3 py-1 rounded-full text-sm font-medium">#development</span>
                </div>
                <div class="flex w-full justify-end">
                    <button class="flex items-center justify-center bg-gradient-to-r from-blue-500 to-blue-700 text-white px-5 py-2.5 rounded-full shadow-md hover:shadow-lg transform hover:scale-105 transition-transform duration-300" onclick="openModal()">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Add Tag
                    </button>
                </div>
            </div>


            <!-- Add modal Tag -->
            <div id="addTagModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden">
                <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-sm">
                    <h2 class="text-xl font-bold text-gray-700 mb-4">Add a New Tag</h2>
                    
                    <form action="../../back-end/controller/Blogs/Tags/ajouter.php" method="POST">
                        <label for="tagName" class="block text-gray-600 font-medium mb-2">Tag Name</label>
                        <input type="text" id="tagName" name="tagName" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200" placeholder="Enter tag name">
                        
                        <div class="mt-4 flex justify-end">
                            <button type="button" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-400 mr-2" onclick="closeModal()">Cancel</button>
                            <button type="submit" name="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Add Tag</button>
                        </div>
                    </form>
                </div>
            </div>

        </section>
    </div>


<script>

function openModal() {
        document.getElementById('addTagModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('addTagModal').classList.add('hidden');
    }



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