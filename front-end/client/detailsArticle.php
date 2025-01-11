<?php
require_once('../../Back-end/controller/Blogs/Commantaire/afficher.php');
require_once('../../Back-end/Model/Commentaire.php');

session_start();
$user=$_SESSION['id'];
$commantaire=afficherCommentaire::affichersCommentaireArticle();



?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article - Location de voitures électriques</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <!-- Header -->
    <header class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <a href="#" class="text-gray-500 hover:text-orange-600 flex items-center space-x-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    <span>Retour aux articles</span>
                </a>
            </div>
        </div>
    </header>

    <main class="max-w-4xl mx-auto px-4 py-8">
        <!-- Article Content -->
        <article class="bg-white rounded-xl shadow-lg overflow-hidden mb-8">
            <img src="../../Back-end/controller/uploads/touareg.png" alt="Article cover" class="w-full h-80 object-cover">
            
            <div class="p-8">
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center space-x-4">
                        <img src="" alt="Author" class="w-12 h-12  rounded-full">
                        <div>
                            <h3 class="font-semibold text-gray-900">Marie Dupont</h3>
                            <p class="text-sm text-gray-500">Publié il y a 2 heures</p>
                        </div>
                    </div>
                    <div class="flex space-x-3">
                        <button class="p-2 text-red-500 hover:bg-red-50 rounded-full">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                            </svg>
                        </button>
                        <button class="p-2 text-yellow-500 hover:bg-yellow-50 rounded-full">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <h1 class="text-3xl font-bold text-gray-900 mb-4">Location de voitures électriques</h1>
                
                <div class="flex flex-wrap gap-2 mb-6">
                    <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm">#électrique</span>
                    <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm">#écologie</span>
                </div>

                <p class="text-gray-700 leading-relaxed mb-6">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </p>
            </div>
        </article>

        <!-- Comments Section -->
        <section class="bg-white rounded-xl shadow-lg p-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Commentaires (12)</h2>

            <!-- Add Comment Form -->
            
            <form class="mb-8" action="../../Back-end/controller/Blogs/Commantaire/Ajouter.php" method="POST">
                <div class="flex items-start space-x-4">
                    <img src="/api/placeholder/40/40" alt="Your avatar" class="w-10 h-10 rounded-full">
                    <div class="flex-grow">
                        <textarea rows="3" name="commantaire" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500" placeholder="Ajouter un commentaire..."></textarea>
                        <div class="mt-3 flex justify-end">
                            <button type="submit" class="px-6 py-2 bg-orange-600 text-white rounded-lg hover:bg-orange-700">
                                Commenter
                            </button>
                        </div>
                    </div>
                </div>
            </form>

            <!-- Comments List -->
            <div class="space-y-6">
                <?php if (!empty($commantaire)): ?>
                    <?php foreach ($commantaire as $comment): ?>
                        <div class="flex space-x-4">
                            <img src="/api/placeholder/40/40" alt="Commenter" class="w-10 h-10 rounded-full">
                            <div class="flex-grow">
                                <div class="bg-gray-50 p-4 rounded-lg">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <h4 class="font-semibold text-gray-900"><?php echo htmlspecialchars($comment['nom']); ?></h4>
                                            <p class="text-sm text-gray-500"></p>
                                        </div>
                                        <?php if ($comment['id_client'] === $user) :?>
                                            <div class="flex items-center space-x-2">
                                                <a href="?edit_id=<?php echo $comment['id']; ?>" class="text-gray-400 hover:text-blue-500">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                    </svg>
                                                </a>
                                                <a href="../../Back-end/controller/Blogs/Commantaire/Supprimer.php?delete_id=<?php echo $comment['id']; ?>" class="text-gray-400 hover:text-blue-500">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                    </svg>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <p class="mt-2 text-gray-700">
                                        <?php echo htmlspecialchars($comment['Commantaire']); ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-gray-500">Aucun commentaire pour le moment.</p>
                <?php endif; ?>
            </div>
            <?php if (isset($_GET['edit_id'])): ?>                
                <form action="../../Back-end/controller/Blogs/Commantaire/Modifier.php" method="POST">
                    <input type="hidden" name="edit_id" value="<?php echo htmlspecialchars($_GET['edit_id']); ?>">
                    <div class="flex items-start space-x-4">
                        <img src="/api/placeholder/40/40" alt="Your avatar" class="w-10 h-10 rounded-full">
                        <div class="flex-grow">
                            <textarea rows="3" name="commantaire" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500"></textarea>
                            <div class="mt-3 flex justify-end">
                                <button type="submit" class="px-6 py-2 bg-orange-600 text-white rounded-lg hover:bg-orange-700">
                                    Mettre à jour
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            <?php endif; ?>



            <!-- Load More Comments -->
            <div class="mt-8 text-center">
                <button class="text-orange-600 hover:text-orange-700 font-medium">
                    Voir plus de commentaires
                </button>
            </div>
        </section>
    </main>
</body>
</html>