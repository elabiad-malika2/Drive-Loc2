<?php
session_start();
if (isset($_SESSION['id'])) {
    $user=$_SESSION['id'];
    var_dump($user);
}
require_once('../../Back-end/controller/AfficherCategorie.php');
$allCategories = getCategorie::afficherCategorie();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gorent - Home </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/x-icon" href="./assets/favicon.svg">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Epilogue:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    
</head>

<style>
    div#scrollable {
        border: 5px red solid;
        width: 150px;
        height: 200px;
        overflow-y: scroll;
    }

    ::-webkit-scrollbar {
        width: 10px;
    }

    ::-webkit-scrollbar-track {
        background: white;
    }

    ::-webkit-scrollbar-thumb {
        background: lightgray;
        border-radius: 10px;
    }

    div:hover::-webkit-scrollbar-thumb {
        background: #737373;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: #f65519;
    }
</style>

<body class="bg-gray-50 mx-12">

    <!-- Header -->
    <section class="relative mt-3 flex  rounded-2xl text-white mb-6">
        <div class="container flex flex-col justify-between">
            <header class=" top-0 z-50">
                <div class="container flex items-center justify-between py-4">

                    <div class="flex items-center space-x-2 text-gray-800 font-semibold">
                        <a href="./index.php">
                            <img src="./assets/gorent-logo.svg" width="160px">
                        </a>
                    </div>

                    <div>
                        <ul class="text-black flex flex-row gap-6 text-[18px] font-semibold font-epilogue">
                            <li class="text-orange-600"><a href="">Home</a></li>
                            <li class="hover:text-orange-600"><a href="./client/listings.php">Listings</a></li>
                            <li class="hover:text-orange-600"><a href="./client/bookings.php">Bookings</a></li>
                            <li class="hover:text-orange-600"><a href="./about.php">About</a></li>
                            <li class="hover:text-orange-600"><a href="./contact.php">Contact</a></li>
                        </ul>
                    </div>

                    <div class="hidden md:flex items-center space-x-4">
                        <button
                            class="px-6 py-2 bg-orange-600 text-white text-lg rounded-full hover:bg-[#737373] hover:text-white">
                            <a href="./login.php">Login</a>
                        </button>
                    </div>

                </div>
            </header>

        </div>
    </section>


    <!-- Hero section -->

    <section
        class="relative bg-cover bg-center bg-[url('/assets/hero-bg.jpg')] h-[96vh] rounded-2xl flex justify-center items-center">
        <div class="absolute inset-0 bg-black/50 rounded-2xl"></div>

        <div class="relative text-center text-white max-w-3xl px-4">
            <p class="text-orange-500 font-semibold uppercase tracking-wide mb-2">
                <i class="ri-sparkling-2-fill"></i> Welcome To Go Rent
            </p>

            <h1 class="text-4xl md:text-5xl font-bold leading-snug mb-6">
                Looking to save more on your rental car?
            </h1>

            <p class="text-lg text-white/80 mb-8">
                Whether you’re planning a weekend getaway, a business trip, or just need a reliable ride for the day, we
                offer a wide range of vehicles to suit your needs.
            </p>

            <div class="flex justify-center space-x-4">
                <a href="#book" class="bg-orange-500 hover:bg-orange-600 text-white font-medium px-6 py-3 rounded-full">
                    Book A Rental
                </a>
                <a href="#learn-more"
                    class="bg-white text-black font-medium px-6 py-3 rounded-full flex items-center space-x-2">
                    <span>Learn More</span>
                    <i class="ri-arrow-right-up-line"></i>
                </a>
            </div>
        </div>
    </section>

    <section>

        <div class="py-16">
            <div class="flex justify-between">
            <h2 class="text-center text-4xl font-bold text-gray-800 mb-10">
                Explore Our Car Rentals
            </h2>
            <div class="w-full sm:w-1/3 md:w-1/4">
                <input  type="text" id="carSearch" placeholder="Search for cars..." class="w-full p-2 border rounded-md shadow-sm" />
            </div>
            <div class="w-full sm:w-1/3 md:w-1/4">
                <select id="categorieFilter" onchange="filtrerVoitures(<?php echo $cat['id'] ?>)" class="w-full p-2 border rounded-md shadow-sm">
                    <option value="">Select Category</option>
                    <?php 
                        foreach($allCategories as $cat)
                        echo "<option value='".$cat['id']."'>".$cat['nom']."</option>"
                    ?>
                </select>
            </div>
            </div>
            <div id="carContainer" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 max-w-7xl mx-auto">




            </div>
            <!-- Modale de réservation -->
            <div id="bookingModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
                <div class="bg-white rounded-lg p-6 w-96">
                    <h2 class="text-xl font-bold mb-4">Réserver une voiture</h2>
                    <form id="bookingForm" action="../../Back-end/controller/AjouterReservation.php" method="POST">
                        <input type="hidden" id="carId" name="voitureId">
                        <div class="mb-4">
                            <label for="date_debut" class="block text-sm font-medium text-gray-700">Date de début</label>
                            <input type="date" id="date_debut" name="date_debut" class="w-full border rounded-md p-2">
                        </div>
                        <div class="mb-4">
                            <label for="date_fin" class="block text-sm font-medium text-gray-700">Date de fin</label>
                            <input type="date" id="date_fin" name="date_fin" class="w-full border rounded-md p-2">
                        </div>
                        <div class="mb-4">
                            <label for="lieu" class="block text-sm font-medium text-gray-700">Lieu</label>
                            <input type="text" id="lieu" name="lieu" class="w-full border rounded-md p-2">
                        </div>
                        <div class="flex justify-end space-x-2">
                            <button type="button" id="closeSimpleModal" class="bg-gray-400 text-white px-4 py-2 rounded-md">Annuler</button>
                            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md">Réserver</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>


    <!-- testimonails -->

    <div class="bg-gray-50 py-16">
        <div class="max-w-7xl mx-auto text-center">
            <p class="text-orange-600 font-semibold text-sm mb-2">Testimonials</p>
            <h2 class="text-4xl font-bold text-gray-900 mb-8">
                What our customers are saying about us
            </h2>
        </div>

        <div class="max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 px-6">

            <div class="p-6 bg-white shadow-md rounded-lg">
                <div class="flex items-center mb-4">
                    <div class="flex text-orange-500">
                        <i class="ri-star-fill text-xl"></i>
                        <i class="ri-star-fill text-xl"></i>
                        <i class="ri-star-fill text-xl"></i>
                        <i class="ri-star-fill text-xl"></i>
                        <i class="ri-star-line text-xl"></i>
                    </div>
                </div>
                <p class="text-gray-600 mb-6">
                    "Renting a car from Gorent was a great decision. The process was seamless, and the car was
                    clean and reliable. I'll definitely use their service again!"
                </p>
                <div class="flex items-center">
                    <img class="w-12 h-12 rounded-full mr-4"
                        src="https://demo.awaikenthemes.com/novaride/wp-content/uploads/2024/08/author-1.jpg">
                    <div>
                        <p class="font-semibold text-gray-900">Alice White</p>
                        <p class="text-sm text-gray-500">Project Manager</p>
                    </div>
                </div>
            </div>

            <div class="p-6 bg-white shadow-md rounded-lg">
                <div class="flex items-center mb-4">
                    <div class="flex text-orange-500">
                        <i class="ri-star-fill text-xl"></i>
                        <i class="ri-star-fill text-xl"></i>
                        <i class="ri-star-fill text-xl"></i>
                        <i class="ri-star-fill text-xl"></i>
                        <i class="ri-star-fill text-xl"></i>
                    </div>
                </div>
                <p class="text-gray-600 mb-6">
                    "Gorent provided excellent service. The car was ready on time, and the rates were very
                    competitive. Highly recommend them for anyone needing a rental."
                </p>
                <div class="flex items-center">
                    <img class="w-12 h-12 rounded-full mr-4"
                        src="https://demo.awaikenthemes.com/novaride/wp-content/uploads/2024/08/author-4.jpg">
                    <div>
                        <p class="font-semibold text-gray-900">Floyd Miles</p>
                        <p class="text-sm text-gray-500">Business Consultant</p>
                    </div>
                </div>
            </div>


            <div class="p-6 bg-white shadow-md rounded-lg">
                <div class="flex items-center mb-4">
                    <div class="flex text-orange-500">
                        <i class="ri-star-fill text-xl"></i>
                        <i class="ri-star-fill text-xl"></i>
                        <i class="ri-star-fill text-xl"></i>
                        <i class="ri-star-fill text-xl"></i>
                        <i class="ri-star-line text-xl"></i>
                    </div>
                </div>
                <p class="text-gray-600 mb-6">
                    "The car I rented was in perfect condition, and the staff was incredibly helpful. Go rent
                    exceeded my expectations. I will use them again in the future!"
                </p>
                <div class="flex items-center">
                    <img class="w-12 h-12 rounded-full mr-4"
                        src="https://demo.awaikenthemes.com/novaride/wp-content/uploads/2024/08/author-2.jpg">
                    <div>
                        <p class="font-semibold text-gray-900">Annette Black</p>
                        <p class="text-sm text-gray-500">Marketing Specialist</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- footer -->
    <footer class="bg-black text-white py-10 rounded-2xl mt-6 mb-6">
        <div class="max-w-7xl mx-6 px-6 grid grid-cols-1 md:grid-cols-4 gap-8">
            <div>
                <a href="./index.php">
                    <img src="./assets/gorent-logo.svg" width="160px">
                </a>
                <p class="mt-4 text-white">
                    Experience the ease and convenience of renting a car with Go rent.
                </p>
            </div>

            <div class="md:ml-36">
                <h2 class="text-lg font-semibold">Legal Policy</h2>
                <ul class="mt-4 space-y-2">
                    <li><a href="#" class="hover:text-orange-500">Term & Condition</a></li>
                    <li><a href="#" class="hover:text-orange-500">Privacy Policy</a></li>
                    <li><a href="#" class="hover:text-orange-500">Legal Notice</a></li>
                    <li><a href="#" class="hover:text-orange-500">Accessibility</a></li>
                </ul>
            </div>

            <div class="md:ml-24">
                <h2 class="text-lg font-semibold">Quick Links</h2>
                <ul class="mt-4 space-y-2">
                    <li><a href="#" class="hover:text-orange-500">Home</a></li>
                    <li><a href="#" class="hover:text-orange-500">About Us</a></li>
                    <li><a href="#" class="hover:text-orange-500">Car Type</a></li>
                    <li><a href="#" class="hover:text-orange-500">Service</a></li>
                </ul>
            </div>


            <div>
                <h2 class="text-lg font-semibold">Subscribe To The Newsletters</h2>
                <form class="mt-4 flex">
                    <input type="email" placeholder="Email..."
                        class="flex-1 px-4 py-2 rounded-l-lg bg-gray-800 text-white focus:outline-none" />
                    <button type="submit" class="bg-orange-500 px-4 py-2 rounded-r-lg hover:bg-orange-600">
                        <i class="ri-send-plane-fill text-white text-xl"></i>
                    </button>
                </form>
            </div>
        </div>


        <div class="border-t border-gray-700 mt-10 pt-6 text-center flex flex-row justify-between items-center mx-12">
            <p class="text-sm text-white">&copy; 2024 Gorent. All rights reserved.</p>
            <div class="flex justify-center space-x-4 mt-4">
                <a href="#" class="hover:text-orange-500">
                    <i class="ri-youtube-fill text-2xl"></i>
                </a>
                <a href="#" class="hover:text-orange-500">
                    <i class="ri-facebook-fill text-2xl"></i>
                </a>
                <a href="#" class="hover:text-orange-500">
                    <i class="ri-twitter-fill text-2xl"></i>
                </a>
                <a href="#" class="hover:text-orange-500">
                    <i class="ri-instagram-fill text-2xl"></i>
                </a>
                <a href="#" class="hover:text-orange-500">
                    <i class="ri-linkedin-fill text-2xl"></i>
                </a>
            </div>
        </div>
    </footer>

    <script src="voitures.js"></script>

</body>

</html>