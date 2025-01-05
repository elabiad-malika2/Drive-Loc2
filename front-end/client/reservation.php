<?php
session_start();
require_once '../../Back-end/controller/AfficherReservation.php';
require_once '../../Back-end/controller/afficherVoiture.php';
require_once '../../Back-end/controller/afficherAvis.php';
$id = $_SESSION['id'];
$allReservations = getReservations::afficherReservationParClient($id);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gorent - Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/x-icon" href="./assets/favicon.svg">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Epilogue:wght@100..900&display=swap" rel="stylesheet">
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
</head>

<body class="bg-gray-50 mx-12">

    <!-- Header -->
    <section class="relative mt-3 flex rounded-2xl text-white mb-6">
        <div class="container flex flex-col justify-between">
            <header class="top-0 z-50">
                <div class="container flex items-center justify-between py-4">
                    <div class="flex items-center space-x-2 text-gray-800 font-semibold">
                        <a href="./index.php">
                            <img src=".../../assets/gorent-logo.svg" width="160px">
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
                        <button class="px-6 py-2 bg-orange-600 text-white text-lg rounded-full hover:bg-[#737373]">
                            <a href="./login.php">Login</a>
                        </button>
                    </div>
                </div>
            </header>
        </div>
    </section>

    <!-- Reservations Section -->
    <section class="bg-bgcolor py-16 px-8 text-black">
        <div class="container mx-auto">
            <h2 class="text-[40px] text-center text-black font-bold mb-12">
                Your <span class="text-primary">Reservations</span>
            </h2>

            <!-- Reservation Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
                <?php
                if (count($allReservations) > 0) {
                    foreach ($allReservations as $reservation) {
                        $avis = getAvis::showAvisByIdUserRes($id, $reservation['id']);
                        $voiture = getVoiture::afficherVoitureId($reservation['id_voiture']);
                        echo "
                        <div class='bg-white rounded-lg shadow-lg p-6'>
                            <h3 class='text-xl font-bold text-primary mb-4'>Reservation Details</h3>
                            <img src='../../Back-end/controller/{$voiture['image']}' alt='{$voiture['modele']}' class='w-full h-48 object-contain rounded-md' />
                            <ul class='text-gray-700'>
                                <li><span class='font-bold'>Adresse:</span> {$reservation['lieu']}</li>
                                <li><span class='font-bold'>Date Debut:</span> {$reservation['date_debut']}</li>
                                <li><span class='font-bold'>Date Fin:</span> {$reservation['date_fin']}</li>
                                <li><span class='font-bold'>Date Reservation:</span> {$reservation['date_reservation']}</li>
                            </ul>
                            <div class='flex justify-center gap-2 mt-4'>
                                <form class='cancel-form' action='../../app/actions/updateStatus.php' method='POST'>
                                    <input type='hidden' name='res-id' value='{$reservation['id']}'>
                                    <input type='hidden' name='new-status' value='Canceled'>
                                    <input type='hidden' name='action' value='confirm'>
                                    <button type='submit' class='px-4 py-2 bg-red-500 text-white rounded-full hover:bg-red-600'>Cancel</button>
                                </form>";
                                if ($avis) {
                                        echo"
                                        <button name='editAvis' onclick=\"openEditReviewModal('{$avis['id']}','{$avis['reservation_id']}','{$avis['message']}', {$avis['stars']})\" class='mt-6 bg-red-600 text-white py-2 px-4 rounded hover:bg-[#826642] transition duration-300'>
                                            Modifier Avis
                                        </button>
                                        <button name='deleteAvis' class='mt-6 bg-red-600 text-white py-2 px-4 rounded hover:bg-[#826642] transition duration-300'>
                                            <a href='../../app/actions/deleteAvis.php?id={$avis['id']}'>Delete Avis</a>
                                        </button>";
                                } else {
                                    echo "<button name='edit_reservation' onclick='openReviewModal({$reservation['id']})' class='mt-6 bg-red-600 text-white py-2 px-4 rounded hover:bg-[#826642] transition duration-300'>
                                            Ajouter Avis
                                        </button>";
                                }
                                
                                echo "</div>
                        </div>";
                    }
                } else {
                    echo "<p class='text-center w-full'>You don't have any reservation</p>";
                }
                ?>
            </div>

        </div>
    </section>
    <!-- Add avis -->
    <div id="reviewModal" class="fixed inset-0 bg-gray-900 bg-opacity-75 flex justify-center items-center hidden">
    <div class="bg-white p-8 rounded-lg w-1/3 shadow-2xl">
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Add a Review</h2>
        <form id="reviewForm" action="../../Back-end/controller/ajouterAvis.php" method="POST">
            <input type="hidden" id="reservationId" name="reservation_id" />
            
            <div class="mb-6">
                <label for="stars" class="block text-sm font-medium text-gray-600">Rating</label>
                <select id="stars" name="stars" class="w-full mt-2 border rounded-lg p-3 bg-gray-100">
                    <option value="1">1 Star</option>
                    <option value="2">2 Stars</option>
                    <option value="3">3 Stars</option>
                    <option value="4">4 Stars</option>
                    <option value="5">5 Stars</option>
                </select>
            </div>
            
            <div class="mb-6">
                <label for="message" class="block text-sm font-medium text-gray-600">Your Review</label>
                <textarea id="message" name="message" class="w-full mt-2 border rounded-lg p-3 bg-gray-100" rows="5" placeholder="Write your experience..."></textarea>
            </div>
            
            <div class="flex justify-end space-x-4">
                <button type="button" class="bg-red-600 text-white py-2 px-6 rounded-lg hover:bg-red-800" onclick="closeReviewModal()">Cancel</button>
                <button type="submit" name="submit" class="bg-blue-600 text-white py-2 px-6 rounded-lg hover:bg-blue-800">Submit</button>
            </div>
            </form>
        </div>
    </div>
    <!-- Edit Avis  -->
    <div id="reviewModalEdit" class="fixed inset-0 bg-gray-900 bg-opacity-75 flex justify-center items-center hidden">
    <div class="bg-white p-8 rounded-lg w-1/3 shadow-2xl">
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Moidifier Avis</h2>
        <form id="EditReviewForm" action="../../Back-end/controller/modifierAvis.php" method="POST">
            <input type="hidden" id="avisIdEdit" name="avisIdEdit" />
            <input type="number" id="reservation_Id" name="reservationId" />
            
            <div class="mb-6">
                <label for="starsEdit" class="block text-sm font-medium text-gray-600">Rating</label>
                <select id="starsEdit" name="starsEdit" class="w-full mt-2 border rounded-lg p-3 bg-gray-100">
                    <option value="1">1 Star</option>
                    <option value="2">2 Stars</option>
                    <option value="3">3 Stars</option>
                    <option value="4">4 Stars</option>
                    <option value="5">5 Stars</option>
                </select>
            </div>
            
            <div class="mb-6">
                <label for="messageEdit" class="block text-sm font-medium text-gray-600">Your Review</label>
                <textarea id="messageEdit" name="messageEdit" class="w-full mt-2 border rounded-lg p-3 bg-gray-100" rows="5" placeholder="Write your experience..."></textarea>
            </div>
            
            <div class="flex justify-end space-x-4">
                <button type="button" class="bg-red-600 text-white py-2 px-6 rounded-lg hover:bg-red-800" onclick="closeEditReviewModal()">Cancel</button>
                <button type="submit" name="submit" class="bg-blue-600 text-white py-2 px-6 rounded-lg hover:bg-blue-800">Modifier</button>
            </div>
            </form>
        </div>
    </div>



    <!-- footer -->
    <footer class="bg-black text-white py-10 rounded-2xl mt-6 mb-6">
        <div class="max-w-7xl mx-6 px-6 grid grid-cols-1 md:grid-cols-4 gap-8">
            <div>
                <a href="./index.php">
                    <img src="../../assets/gorent-logo.svg" width="160px">
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

<script>
     function openReviewModal(reservationId) {
    document.getElementById('reservationId').value = reservationId;
    document.getElementById('reviewModal').classList.remove('hidden');
    }

    function closeReviewModal() {
    document.getElementById('reviewModal').classList.add('hidden');
    }



    function openEditReviewModal(avisId,idR,message, stars) {

    document.getElementById('reviewModalEdit').classList.remove('hidden');

    document.getElementById('avisIdEdit').value = avisId;
    document.getElementById('reservation_Id').value = idR;
    document.getElementById('messageEdit').value = message;
    document.getElementById('starsEdit').value = stars;

}


    function closeEditReviewModal() {
        document.getElementById('reviewModalEdit').classList.add('hidden');
    }
</script>
</body>

</html>
