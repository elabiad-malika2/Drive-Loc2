const carCardsContainer = document.getElementById('carContainer');

fetch('../../Back-end/controller/getCountV.php')
.then(response => response.json())
.then(carsNumber => {
    console.log("aaaaaa",carsNumber);
    
    const totalPages = Math.ceil(carsNumber.totalCars /2);
    console.log(totalPages);
    document.getElementById('pagesContainer').innerHTML=``;
    for(let i=1;i<=totalPages;i++)
    document.getElementById('pagesContainer').innerHTML+=`<p class="page border border-gray-900 rounded-md px-3 py-1">${i}</p>`;
    document.querySelectorAll('.page').forEach(page=>{
        
        page.addEventListener('click', function () {
            const startIndex = (parseInt(page.textContent) - 1) * 2;

            const formData = new FormData();
            formData.append('start', startIndex);

            fetch('../../Back-end/controller/getCustomV.php', {
                method: 'POST',
                body: formData,
            })
                .then((response) => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then((cars) => {
                    if (cars.error) {
                        console.error('Server error:', cars.error);
                    } else {
                        console.log('Fetched cars:', cars);
                        showCars(cars); 
                    }
                })
                .catch((err) => {
                    console.error('Error fetching cars:', err);
                });
        });

    })

})

.catch(err => console.error('Error fetching Count:', err));

function showCars(cars)
{
    carCardsContainer.innerHTML='';
     cars.forEach(car => {  

                carCardsContainer.innerHTML += `
                <div class="max-w-xs bg-white rounded-xl shadow-lg overflow-hidden">
    
                    <img class="w-full h-48 object-container" src="../../Back-end/controller/${car.image}" alt="${car.modele}">
                    
                    
                    <div class="px-6 py-4">
                        <h3 class="text-xl font-bold text-gray-900 truncate">${car.modele}</h3>
                        <p class="text-gray-500 text-sm">Marque: <span class="font-medium text-gray-700">${car.marque}</span></p>
                        <p class="text-gray-500 text-sm">Année: <span class="font-medium text-gray-700">${car.annee}</span></p>
                        <p class="text-gray-500 text-sm">Prix: <span class="font-medium text-lg text-orange-600">$${car.prix}</span></p>
                        
                        
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
        showCarsOnLoad();
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
        showCarsOnLoad();
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

// function showAllCars(){
//     document.getElementById('carContainer').innerHTML = ``


//     fetch('../../Back-end/controller/AfficherTousVoitures.php')
//     .then(response => response.json())
//     .then(cars => {
//         console.log('Filtered cars:', cars);
//         carCardsContainer.innerHTML = ''; 

       
//         showCars(cars)
//     })
//     .catch(err => console.error('Error fetching cars:', err));

// }
// showAllCars();

function showCarsOnLoad(){
    const formDatat = new FormData();
let start = 0;
formDatat.append('start', start);



fetch('../../Back-end/controller/getCustomV.php',{
        method: "post",
        body: formDatat,
    })
    .then(response => response.json())
    .then(cars => {
        showCars(cars);
    })
    .catch(err => console.error('Error fetching cars:', err));
    }
    showCarsOnLoad();

// Ouvrir la modale
function openModal(idV) {
    document.getElementById('carId').value=idV;
    document.getElementById('bookingModal').classList.remove('hidden'); // Affiche la modale
}

// Fermer la modale
document.getElementById('closeSimpleModal').addEventListener('click', () => {
    document.getElementById('bookingModal').classList.add('hidden'); // Cache la modale
});

