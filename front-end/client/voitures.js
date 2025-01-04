const carCardsContainer = document.getElementById('carContainer');

function showCars(cars)
{
     cars.forEach(car => {          
                carCardsContainer.innerHTML += `
                <div class="max-w-xs bg-white rounded-xl shadow-lg overflow-hidden">
    <!-- Image de la voiture -->
    <img class="w-full h-48 object-container" src="../../Back-end/controller/${car.image}" alt="${car.modele}">
    
    <!-- Détails de la voiture -->
    <div class="px-6 py-4">
        <h3 class="text-xl font-bold text-gray-900 truncate">${car.modele}</h3>
        <p class="text-gray-500 text-sm">Marque: <span class="font-medium text-gray-700">${car.marque}</span></p>
        <p class="text-gray-500 text-sm">Année: <span class="font-medium text-gray-700">${car.annee}</span></p>
        <p class="text-gray-500 text-sm">Prix: <span class="font-medium text-lg text-orange-600">$${car.prix}</span></p>
        
        <!-- Boutons d'action -->
        <div class="mt-4 flex space-x-2">
            <button class="w-full bg-orange-600 hover:bg-orange-500 text-white text-sm py-2 px-4 rounded-lg transition-all"  onclick="openModal(${car.id})" >
                Book Now
            </button>
        </div>
    </div>
</div>


  `;
        
    });
}
document.getElementById("categorieFilter").addEventListener('change', function(){
    const categoryId = document.getElementById("categorieFilter").value;
    console.log(categoryId);
    if(categoryId == "")
    {
        showAllCars();
    } else {
    const formDataa = new FormData();
    formDataa.append('idCategory',categoryId);
    document.getElementById('carContainer').innerHTML = ``
    fetch ('../../Back-end/controller/FiltrerCategorie.php',{
        method: "POST",
        body: formDataa,
    })
    .then(response => response.json())
    .then(cars => {
      
        console.log(cars)
        showCars(cars);
    })
    .catch((err) => {
        console.error('Error fetching cars:', err);
    });
    
   
   
}

});

document.getElementById('carSearch').addEventListener('keyup', function(){
    const valueSearch = document.getElementById('carSearch').value.trim()
    if(valueSearch == "")
    {
        showAllCars();
    }
    else {
        const formData = new FormData();
        formData.append('modele',valueSearch);
        document.getElementById('carContainer').innerHTML = ``
        fetch ('../../Back-end/controller/searchVoiture.php',{
            method: "POST",
            body: formData,
        })
        .then(response => response.json())
        .then(cars => {
            if(cars )
            {
                console.log("aaaaaaaaaa",cars);
            }
            showCars(cars)
        })

    }
})

function showAllCars(){
    document.getElementById('carContainer').innerHTML = ``


    fetch('../../Back-end/controller/AfficherTousVoitures.php')
    .then(response => response.json())
    .then(cars => {
        console.log('Filtered cars:', cars);
        carCardsContainer.innerHTML = ''; 

       
        showCars(cars)
    })
    .catch(err => console.error('Error fetching cars:', err));

}
showAllCars();

// Ouvrir la modale
function openModal(idV) {
    document.getElementById('carId').value=idV;
    document.getElementById('bookingModal').classList.remove('hidden'); // Affiche la modale
}

// Fermer la modale
document.getElementById('closeSimpleModal').addEventListener('click', () => {
    document.getElementById('bookingModal').classList.add('hidden'); // Cache la modale
});

