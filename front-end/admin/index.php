
<?php 
require '../../Back-end/controller/AfficherVoiture.php';
$cars = getVoiture::afficherVoitures();

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
                        <a href="dashbord.php" class="flex items-center space-x-4 text-gray-600 hover:text-orange-600">
                            <i class="ri-dashboard-line text-orange-600"></i>
                            <span class="text-orange-600">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="../pages/clients.php"
                            class="flex items-center space-x-4 text-gray-600 hover:text-orange-600">
                            <i class="ri-group-line"></i>
                            <span>Clients</span>
                        </a>
                    </li>
                    <li>
                        <a href="../pages/cars.php"
                            class="flex items-center space-x-4 text-gray-600 hover:text-orange-600">
                            <i class="ri-car-line"></i>
                            <span>Cars</span>
                        </a>
                    </li>
                    <li>
                        <a href="../pages/contrats.php"
                            class="flex items-center space-x-4 text-gray-600 hover:text-orange-600">
                            <i class="ri-save-line"></i>
                            <span>Contrats</span>
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

            <!-- Quik action section-->
            <div class="p-6 bg-white shadow rounded-lg">
                <h3 class="text-xl font-bold text-gray-700 mb-4">Quick Actions</h3>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">

                    <button
                        class="flex items-center justify-center p-2 text-gray-700 border border-gray-700 font-medium rounded-lg shadow hover:bg-orange-600 hover:border-none hover:text-white transition duration-200"
                        id="addClientBtn">
                        <i class="ri-user-add-line text-2xl mr-2"></i>
                        Add New Catégorie
                    </button>

                    <button
                        class="flex items-center justify-center p-2  border border-gray-700 text-gray-700 font-medium rounded-lg shadow hover:bg-orange-600 hover:border-none hover:text-white transition duration-800" id="addCarBtn">
                        <i class="ri-car-line text-2xl mr-2"></i>
                        Add New Car
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
      <h2 class="text-2xl font-bold text-gray-800 mb-6">Car Listings</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Card 1 -->
        <?php foreach ($cars as $car): ?>
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <img src="../../Back-end/controller/<?php echo $car['image']; ?>" alt="Car Image" class="w-full h-40 object-contain rounded-lg mb-4">
            <h4 class="text-lg font-bold text-gray-800"><?php echo $car['marque']; ?> <?php echo $car['modele']; ?></h4>
            <p class="text-gray-600 mt-2">Year: <?php echo $car['annee']; ?></p>
            <p class="text-gray-600">Price: $<?php echo number_format($car['prix'], 2); ?></p>
            <p class="text-gray-600">Availability: <?php echo $car['disponibilite'] == 1 ? 'Available' : 'Not Available'; ?></p>
            <button class="mt-4 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 w-full" onclick="openEditModal(<?php echo $car['id']; ?>, '<?php echo $car['marque']; ?>', '<?php echo $car['modele']; ?>', '<?php echo $car['annee']; ?>', '<?php echo $car['prix']; ?>')">
            Edit
            </button>
        </div>
    <?php endforeach; ?>
        <!-- Card 2 -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
          <img src="https://via.placeholder.com/300x150" alt="Car Image" class="w-full h-40 object-cover rounded-lg mb-4">
          <h4 class="text-lg font-bold text-gray-800">Honda Civic</h4>
          <p class="text-gray-600 mt-2">Model: 2022</p>
          <p class="text-gray-600">Year: 2022</p>
          <p class="text-gray-600">Price: $22,000</p>
          <button class="mt-4 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 w-full">
            View Details
          </button>
        </div>
        <!-- Card 3 -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
          <img src="https://via.placeholder.com/300x150" alt="Car Image" class="w-full h-40 object-cover rounded-lg mb-4">
          <h4 class="text-lg font-bold text-gray-800">Ford Mustang</h4>
          <p class="text-gray-600 mt-2">Model: 2021</p>
          <p class="text-gray-600">Year: 2021</p>
          <p class="text-gray-600">Price: $35,000</p>
          <button class="mt-4 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 w-full">
            View Details
          </button>
        </div>
      </div>
    </div>
  </div>
  </div>
        </section>
    </div>

    <!-- add new Categorie modal -->
    <div id="addClient" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 ">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-2xl p-6">

            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl  font-semibold text-orange-600">Add New Categorie</h3>
                <button class="text-gray-500 hover:text-gray-700 closeAddClient"><i
                        class="ri-close-circle-line text-2xl text-orange-600"></i></button>
            </div>

            <form action="../../back-end/controller/AjouterCategorie.php" method="post">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6">

                    <div>
                        <label for="first-name" class="mb-2 block text-sm font-medium text-gray-700"> Nom Catégorie</label>
                        <input placeholder="Enter category name" type="text" id="category-name" name="nomCategorie"
                            class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring-orange-500 focus:border-orange-500"
                            required />
                    </div>

                </div>

                <div class="mt-6 flex justify-end space-x-2">
                    <button type="button"
                        class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 closeAddClient">Cancel</button>
                    <button type="submit" name="submit"
                        class="px-8 py-2 bg-orange-500 text-white rounded-md hover:bg-orange-600">Save</button>
                </div>
            </form>
        </div>
    </div>

    

   <!--ADD Modal -->
<div id="carModal" class="hidden fixed inset-0 bg-gray-500 bg-opacity-50 flex items-center justify-center">
    <div class="bg-white w-2/3 p-5 rounded-lg shadow-lg h-[90%] overflow-y-auto">
        <h2 class="text-2xl font-bold mb-4">Add New Cars</h2>
        <form id="carForm" action="../../back-end/controller/AjouterVoiture.php" method="POST" enctype="multipart/form-data">
            <div id="carFields">
                <div class="car-entry">
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <input type="text" name="marque[]" placeholder="Marque" required class="border rounded p-2">
                        <input type="text" name="modele[]" placeholder="Modèle" required class="border rounded p-2">
                        <input type="number" name="annee[]" placeholder="Année" required class="border rounded p-2">
                        <input type="number" name="prix[]" placeholder="Prix" required class="border rounded p-2">
                        <select name="disponibilite[]" required class="border rounded p-2">
                            <option value="1">Disponible</option>
                            <option value="0">Indisponible</option>
                        </select>
                        <select name="category_id[]" required class="border rounded p-2">
                            <option value="1">SUV</option>
                            <option value="2">Sedan</option>
                            <!-- Ajoutez d'autres catégories ici -->
                        </select>
                        <input type="file" name="image_path[]"  class="border rounded p-2">
                    </div>
                    <button type="button"  class="remove-btn text-red-500">Remove</button>
                </div>
            </div>
            <button type="button" id="addCarFieldBtn" class="mt-2 bg-gray-200 p-2 rounded">Add Another Car</button>
            <div class="mt-4">
                <button type="submit" name="submit" class="bg-green-500 text-white px-4 py-2 rounded">Save</button>
                <button type="button"  id="closeModalBtn" class="bg-red-500 text-white px-4 py-2 rounded">Cancel</button>
            </div>
        </form>
    </div>
</div>
<!-- Edit MODEL -->
<div id="editCarModal" class="hidden fixed inset-0 bg-gray-500 bg-opacity-50 flex items-center justify-center">
    <div class="bg-white w-2/3 p-5 rounded-lg shadow-lg h-[90%] overflow-y-auto">
        <h2 class="text-2xl font-bold mb-4">Edit Car</h2>
        <form id="editCarForm" action="../../back-end/controller/EditVoiture.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" id="carId" name="id">
            <div class="grid grid-cols-2 gap-4 mb-4">
                <input type="text" id="editMarque" name="marque" placeholder="Marque" required class="border rounded p-2">
                <input type="text" id="editModele" name="modele" placeholder="Modèle" required class="border rounded p-2">
                <input type="number" id="editAnnee" name="annee" placeholder="Année" required class="border rounded p-2">
                <input type="number" id="editPrix" name="prix" placeholder="Prix" required class="border rounded p-2">
                <select id="editDisponibilite" name="disponibilite" required class="border rounded p-2">
                    <option value="1">Disponible</option>
                    <option value="0">Indisponible</option>
                </select>
                <input type="file" name="image_path" class="border rounded p-2">
            </div>
            <div class="mt-4 flex justify-end space-x-2">
                <button type="button" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300" onclick="closeEditModal()">Cancel</button>
                <button type="submit" name="submit" class="bg-green-500 text-white px-4 py-2 rounded-md">Save</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openEditModal(carId, marque, modele, annee, prix) {
    document.getElementById("editCarModal").classList.remove("hidden");
    document.getElementById("carId").value = carId;
    document.getElementById("editMarque").value = marque;
    document.getElementById("editModele").value = modele;
    document.getElementById("editAnnee").value = annee;
    document.getElementById("editPrix").value = prix;
}

// Close the edit modal
function closeEditModal() {
    document.getElementById("editCarModal").classList.add("hidden");
}
// Modal toggling
const addCarBtn = document.getElementById("addCarBtn");
const carModal = document.getElementById("carModal");
const closeModalBtn = document.getElementById("closeModalBtn");

addCarBtn.addEventListener("click", () => carModal.classList.remove("hidden"));
closeModalBtn.addEventListener("click", () => carModal.classList.add("hidden"));

// Add new car fields
const addCarFieldBtn = document.getElementById("addCarFieldBtn");
const carFields = document.getElementById("carFields");

addCarFieldBtn.addEventListener("click", () => {
    const carEntry = document.createElement("div");
    carEntry.classList.add("car-entry");
    carEntry.innerHTML = `
        <div class="grid grid-cols-2 gap-4 mb-4">
            <input type="text" name="marque[]" placeholder="Marque" required class="border rounded p-2">
            <input type="text" name="modele[]" placeholder="Modèle" required class="border rounded p-2">
            <input type="number" name="annee[]" placeholder="Année" required class="border rounded p-2">
            <input type="number" name="prix[]" placeholder="Prix" required class="border rounded p-2">
            <select name="disponibilite[]" required class="border rounded p-2">
                <option value="1">Disponible</option>
                <option value="0">Indisponible</option>
            </select>
            <select name="category_id[]" required class="border rounded p-2">
                <option value="1">SUV</option>
                <option value="2">Sedan</option>
            </select>
            <input type="file" name="image_path[]" required class="border rounded p-2">
        </div>
        <button type="button" class="remove-btn text-red-500">Remove</button>
    `;
    carFields.appendChild(carEntry);

    // Remove entry button
    carEntry.querySelector(".remove-btn").addEventListener("click", () => carEntry.remove());
});


</script>
<!-- Add New contrat modal  -->

<div id="addContratModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
  <div class="bg-white rounded-lg shadow-lg w-full max-w-2xl p-6">

    <div class="flex justify-between items-center mb-4">
      <h3 class="text-xl  font-semibold text-orange-600">Add New Contrat</h3>
      <button class="text-gray-500 hover:text-gray-700 closeAddContrat"><i
         class="ri-close-circle-line text-2xl text-orange-600"></i></button>
    </div>

    <form action="../adminFunction/addContract.php" method="post">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">



                    <div class="col-span-2">
                        <label for="total" class="mb-2 block text-sm font-medium text-gray-700">Total</label>
                        <input placeholder="Enter total price" type="number" id="total" name="total"
                            class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring-orange-500 focus:border-orange-500"
                            required />
                    </div>
                </div>

                <div class="mt-6 flex justify-end space-x-2">
                    <button type="button"
                        class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 closeAddContrat">Cancel</button>
                    <button type="submit" name="submit"
                        class="px-8 py-2 bg-orange-500 text-white rounded-md hover:bg-orange-600">Save</button>
                </div>
            </form>
  </div>
</div>


<!-- Add New contrat modal  -->

<div id="addContratModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-2xl p-6">

            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl  font-semibold text-orange-600">Add New Contrat</h3>
                <button class="text-gray-500 hover:text-gray-700 closeAddContrat"><i
                        class="ri-close-circle-line text-2xl text-orange-600"></i></button>
            </div>

            <form action="./adminFunction/addContract.php" method="post">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="clientId" class="mb-2 block text-sm font-medium text-gray-700" >Client ID</label> 
                        <select class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring-orange-500 focus:border-orange-500" name="clientId">
                        <option value="" disabled selected >Select a Client</option>
                        
                        </select>
                    </div>

                    <div>
                        <label for="carId" class="mb-2 block text-sm font-medium text-gray-700">Car ID</label>
                        <select id="car" name="carId" class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring-orange-500 focus:border-orange-500" required>
                            <option value="" disabled selected>Select a car </option>
                            
                        </select>
                    </div>

                    <div>
                        <label for="start-date" class="mb-2 block text-sm font-medium text-gray-700">Start Date</label>
                        <input placeholder="Enter rent start date" type="date" id="startDate" name="startDate"
                            class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring-orange-500 focus:border-orange-500"
                            required />
                    </div>

                    <div>
                        <label for="end-date" class="mb-2 block text-sm font-medium text-gray-700">End Date</label>
                        <input placeholder="Enter rent end date" type="date" id="endDate" name="endDate"
                            class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring-orange-500 focus:border-orange-500"
                            required />
                    </div>

                    <div class="col-span-2">
                        <label for="total" class="mb-2 block text-sm font-medium text-gray-700">Total</label>
                        <input placeholder="Enter total price" type="number" id="total" name="total"
                            class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring-orange-500 focus:border-orange-500"
                            required />
                    </div>
                </div>

                <div class="mt-6 flex justify-end space-x-2">
                    <button type="button"
                        class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 closeAddContrat">Cancel</button>
                    <button type="submit" name="submit"
                        class="px-8 py-2 bg-orange-500 text-white rounded-md hover:bg-orange-600">Save</button>
                </div>
            </form>
        </div>
    </div>

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