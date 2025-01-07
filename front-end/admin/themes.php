
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

            <!-- Quik action section-->
            <div class="p-6 bg-white shadow rounded-lg">
                <h3 class="text-xl font-bold text-gray-700 mb-4">Quick Actions</h3>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">

                    <button
                        class="flex items-center justify-center p-2 text-gray-700 border border-gray-700 font-medium rounded-lg shadow hover:bg-orange-600 hover:border-none hover:text-white transition duration-200"
                        id="addThemeBtn">
                        <i class="ri-user-add-line text-2xl mr-2"></i>
                        Add New Theme
                    </button>

                    <button
                        class="flex items-center justify-center p-2  border border-gray-700 text-gray-700 font-medium rounded-lg shadow hover:bg-orange-600 hover:border-none hover:text-white transition duration-800" id="addCarBtn">
                        <i class="ri-car-line text-2xl mr-2"></i>
                        Add New Tag
                    </button>
                </div>
            </div>

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
    <div>
    <div class="container mx-auto p-6">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Dashboard Admin - Gestion des Thèmes de Blog</h2>
    
            <!-- Liste des thèmes de blog -->
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h3 class="text-xl font-bold text-gray-800 mb-4">Thèmes de Blog</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                    <!-- Thème 1 -->
                     <?php foreach ($allThemes as $theme): ?>
                        
                        <div class="bg-beige-100 p-4 rounded-lg shadow-md">
                        <h4 class="text-lg font-semibold text-black"><?php echo htmlspecialchars($theme['nom'])?></h4>
                        <img src="../../Back-end/controller/<?php echo $theme['image']; ?>" alt="Voitures de Luxe" class="w-full h-40 object-cover rounded-md mt-2">
                        <p class="text-gray-700 mt-2"><?php echo htmlspecialchars($theme['description'])?></p>
                            <!-- Bouton de modification -->
                            <div class="flex gap-4 justify-center items-center py-4">
                                <button
                                    onclick="openEditModal(<?= htmlspecialchars(json_encode($theme)) ?>)"
                                    class="px-6 py-2 bg-blue-500 text-white rounded-lg shadow-sm hover:bg-blue-400 transition duration-200"
                                >
                                    Modifier
                                </button>
                                <button name='deleteAvis' class='px-6 py-2 bg-red-500 text-white rounded-lg shadow-sm hover:bg-red-400 transition duration-200'>
                                            <a href="../../Back-end/controller/Blogs/Themes/delete.php?id=<?= $theme['id']?>">Delete</a>
                                    </button>

                            </div>
                    </div>
                     <?php endforeach ?>
                    
                    
                </div>
            </div>
        </div>

    </div>
  </div>
  </div>
        </section>
    </div>

    <!-- add new Theme modal -->
    <div id="addTheme" class="hidden fixed inset-0 bg-gray-500 bg-opacity-50 flex items-center justify-center">
        <div class="bg-white w-2/3 p-5 rounded-lg shadow-lg h-[90%] overflow-y-auto">
            <h2 class="text-2xl font-bold mb-4">Add New Theme</h2>
            <form id="themeForm" action="../../back-end/controller/Blogs/Themes/ajouter.php" method="POST" enctype="multipart/form-data">
                <div id="addFields">
                    <div class="data-form">
                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <input type="text" name="nom[]" placeholder="Nom du Thème" required class="border rounded p-2">
                            <textarea name="description[]" placeholder="Description" required class="border rounded p-2"></textarea>
                            <input type="file" name="image[]" required class="border rounded p-2">
                        </div>
                        <button type="button" class="remove-btn text-red-500">Remove</button>
                    </div>
                </div>
                <button type="button" id="addBtn" class="mt-2 bg-gray-200 p-2 rounded">Add Another Theme</button>
                <div class="mt-4">
                    <button type="submit" name="submit" class="bg-green-500 text-white px-4 py-2 rounded">Save</button>
                    <button type="button" id="closeModalBtn" class="bg-red-500 text-white px-4 py-2 rounded">Cancel</button>
                </div>
            </form>
        </div>
    </div>

    


<!-- Edit Theme modal -->
    <!-- Edit Theme modal -->
        <div id="editheme" class="hidden fixed inset-0 bg-gray-500 bg-opacity-50 flex items-center justify-center">
            <div class="bg-white w-2/3 p-5 rounded-lg shadow-lg h-[90%] overflow-y-auto">
                <h2 class="text-2xl font-bold mb-4">Edit Theme</h2>
                <form id="editForm" action="../../back-end/controller/Blogs/Themes/modifier.php" method="POST" enctype="multipart/form-data">
                    <div id="editFields">
                        <div class="data-form">
                            <div class="grid grid-cols-2 gap-4 mb-4">
                                <input id="idEdit" type="hidden" name="idEdit">
                                <input type="text" id="nomEdit" name="nomEdit" placeholder="Nom du Thème" required class="border rounded p-2">
                                <textarea id="descriptionEdit" name="descriptionEdit" placeholder="Description" required class="border rounded p-2"></textarea>
                                <input type="file" id="imageEdit" name="imageEdit" class="border rounded p-2">
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <button type="submit" name="submit" class="bg-green-500 text-white px-4 py-2 rounded">Save</button>
                        <button type="button" id="closeModalBtnEdit" class="bg-red-500 text-white px-4 py-2 rounded">Cancel</button>
                    </div>
                </form>
            </div>
        </div>


<script>
    document.addEventListener('DOMContentLoaded', () => {
    const addThemeBtn = document.getElementById('addThemeBtn');
    const addThemeModal = document.getElementById('addTheme');
    const closeModalBtn = document.getElementById('closeModalBtn');
    const addBtn = document.getElementById('addBtn');
    const addFieldsContainer = document.getElementById('addFields');

    // Ouvrir la modal
    addThemeBtn.addEventListener('click', () => {
        addThemeModal.classList.remove('hidden');
    });

    // Fermer la modal
    closeModalBtn.addEventListener('click', () => {
        addThemeModal.classList.add('hidden');
    });

    // Ajouter un nouveau champ de thème
    addBtn.addEventListener('click', () => {
        const newThemeEntry = document.createElement('div');
        newThemeEntry.classList.add('data-form', 'mb-4');
        newThemeEntry.innerHTML = `
            <div class="grid grid-cols-2 gap-4">
                <input type="text" name="nom[]" placeholder="Nom du Thème" required class="border rounded p-2">
                <textarea name="description[]" placeholder="Description" required class="border rounded p-2"></textarea>
                <input type="file" name="image[]" required class="border rounded p-2">
            </div>
            <button type="button" class="remove-btn text-red-500 mt-2">Remove</button>
        `;

        // Bouton de suppression du champ
        newThemeEntry.querySelector('.remove-btn').addEventListener('click', () => {
            newThemeEntry.remove();
        });

        addFieldsContainer.appendChild(newThemeEntry);
    });


});
function openEditModal(theme) {
    const modalEdit = document.getElementById("editheme");

    modalEdit.classList.remove("hidden");
    document.getElementById("nomEdit").value = theme.nom;
    document.getElementById("descriptionEdit").value = theme.description;
    document.getElementById("idEdit").value = theme.id;

}

// Fermer la modal d'édition
document.getElementById('closeModalBtnEdit').addEventListener('click', () => {
    document.getElementById('editheme').classList.add('hidden');
});





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