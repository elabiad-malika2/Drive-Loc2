<?php
require_once('../../Back-end/controller/Blogs/Tags/afficher.php');
require_once('../../Back-end/controller/Blogs/Articles/search.php');
require_once('../../Back-end/controller/Blogs/Articles/afficher.php');
require_once('../../Back-end/Model/Commentaire.php');
session_start();
$user=$_SESSION['id'];
$_SESSION['page']=5;
$tags=afficherTag::afficherTousTag();

    
    $theme=$_GET["idTheme"];
    $articles=afficherArticle::afficherArticleThemes($theme,$_SESSION['page'],0);
    $total=$articles[0]["totalArticle"];
    $totalPage=ceil($total/$_SESSION['page']);
    if(isset($_GET['page']))
    {
        $page = $_GET['page'];
        $parPage = $_SESSION['page'];
        $start = ($page-1) * $parPage;
        $articles=afficherArticle::afficherArticleThemes($theme,$parPage,$start);
        $total=$articles[0]["totalArticle"];
        $totalPage=ceil($total/$parPage);

    }
    if(isset($_GET['items']))
    {
        $_SESSION['page'] = $_GET['items'];
        $parPage = $_GET['items'];
        $articles=afficherArticle::afficherArticleThemes($theme,$parPage,0);
        $total=$articles[0]["totalArticle"];
        $totalPage=ceil($total/$parPage);
    }
    if (isset($_GET['search'])) {
            $titre=$_GET["search"];
            echo $titre;
            $idTheme=$_GET["idTheme"];
            $articles=search::searchArticle($titre,$idTheme);
    }


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Moderne</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet" />
</head>
<style>
    .card-hover {
        transition: transform 0.3s ease-in-out;
    }
    .card-hover:hover {
        transform: translateY(-5px);
    }
    .custom-scrollbar::-webkit-scrollbar {
        width: 6px;
    }
    .custom-scrollbar::-webkit-scrollbar-track {
        background: #f1f1f1;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: #fd3c4f;
        border-radius: 10px;
    }
</style>
<body class="bg-gray-50">
    <!-- Header avec navigation -->
    <header class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <img src="/api/placeholder/40/40" alt="Logo" class="h-8 w-auto">
                </div>
                <nav class="flex space-x-8">
                    <a href="#" class="text-orange-600 font-medium">Home</a>
                    <a href="#" class="text-gray-500 hover:text-orange-600 font-medium">Listings</a>
                    <a href="#" class="text-gray-500 hover:text-orange-600 font-medium">Bookings</a>
                </nav>
                <div>
                    <button class="bg-orange-600 text-white px-6 py-2 rounded-full hover:bg-orange-700 transition-colors">
                        Login
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Section principale -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- En-tête avec bouton d'ajout -->
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Articles récents</h1>
            <form id="select" method="GET" action="">
                <select class="px-4 py-2 border rounded-lg text-gray-700" name="items" onchange="this.form.submit()">
                    <option value="">Afficher par :</option>
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                </select>
                <input type="hidden" name="idTheme" value="<?php echo $theme?>">
            </form>

            <form method="GET" action="">
                <input type="search" onchange="this.form.submit()" name="search" placeholder="Rechercher..." class="px-4 py-2 border rounded-lg text-gray-700">
                <input type="hidden" name="idTheme" value="<?php echo $theme?>">
            </form>


            <button onclick="toggleModal()" class="flex items-center space-x-2 bg-orange-600 text-white px-6 py-3 rounded-full hover:bg-orange-700 transition-colors shadow-lg">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                <span>Nouvel article</span>
            </button>
        </div>

        <!-- Grille d'articles -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach ($articles as $art) : ?>
                <?php if ($art["status"]=='Accepted') : ?>
                    <div  class="block bg-white rounded-xl shadow-lg overflow-hidden card-hover">
                        <div class="relative">
                            <img src="../../Back-end/<? $art['image']; ?>" alt="Article" class="w-full h-48 object-cover">
                            <div class="absolute top-4 right-4 flex space-x-2">
                                <button class="p-2 bg-white rounded-full shadow-md hover:bg-gray-100">
                                    <svg class="w-5 h-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"></path>
                                    </svg>
                                </button>
                                <button class="p-2 bg-white rounded-full shadow-md hover:bg-gray-100">
                                    <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center mb-4">
                                <img src="" alt="Avatar" class="w-10 h-10 rounded-full">
                                <div class="ml-3">
                                    <p class="font-semibold text-gray-900">Marie Dupont</p>
                                    <p class="text-sm text-gray-500">Il y a 2 heures</p>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-3"><?= htmlspecialchars($art['titre']); ?></h3>
                            <p class="text-gray-600 mb-4"><?= htmlspecialchars($art['description']); ?></p>
                            <div class="flex flex-wrap gap-2 mb-4">
                                <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm">#électrique</span>
                                <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm">#écologie</span>
                            </div>
                            <div class="flex items-center justify-between pt-4 border-t">
                                <div class="flex items-center space-x-4">
                                    <button class="flex items-center text-gray-500 hover:text-orange-600">
                                            <a href="detailsArticle.php?idArticle=<?php echo $art['id']; ?>" >
                                                <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                                </svg>
                                            </a>
                                            <span>24</span>
                                    </button>
                                    
                                    <button class="flex items-center text-gray-500 hover:text-orange-600">
                                        <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                                        </svg>
                                        <span>Partager</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif;?>
            <?php endforeach; ?>
        </div>
        
        <div class="mt-12 gap-2 flex justify-center ">
                <?php
                    for($i = 1;$i<=$totalPage;$i++)
                    {
                        echo "    <a href=a.php?idTheme=$theme&page=$i class='px-4 py-2 rounded-lg bg-gray-100 hover:bg-orange-600 text-black'>$i</a>";
                    }
                ?>
        </div>

    </main>

    <!-- Modal d'ajout d'article -->
    <div id="modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white rounded-xl p-6 w-full max-w-lg mx-4">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold text-gray-900">Créer un nouvel article</h2>
            <button onclick="toggleModal()" class="text-gray-500 hover:text-gray-700">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <form action="../../Back-end/controller/Blogs/Articles/Ajouter.php" method="POST"  enctype="multipart/form-data" class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Image de couverture</label>
                <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center">
                    <input type="file" name="image"  class="hidden" id="cover-image">
                    <label for="cover-image" class="cursor-pointer">
                        <svg class="mx-auto h-10 w-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 48 48">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12m32-12l-3-3m0 0l-3 3m3-3v12"></path>
                        </svg>
                        <p class="mt-1 text-sm text-gray-600">Cliquez pour ajouter une image</p>
                    </label>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Titre</label>
                <input type="text" name="titre" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500" placeholder="Titre de votre article">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Contenu</label>
                <textarea rows="4" name="description" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500" placeholder="Contenu de votre article"></textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Tags</label>
                <input type="text" id="tag-input" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500" placeholder="Ajouter des tags (séparés par des virgules)">
                <input type="hidden"  id="selected-tag-ids" name="selected_tag_ids">
                <div id="suggested-tags" class="mt-2 flex flex-wrap gap-2"></div>
                <div id="selected-tags" class="mt-2 flex flex-wrap gap-2"></div>
            </div>


            <div class="flex justify-end space-x-3">
                <button type="button" onclick="toggleModal()" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">
                    Annuler
                </button>
                <button type="submit" class="px-4 py-2 bg-orange-600 text-white rounded-lg hover:bg-orange-700">
                    Publier
                </button>
            </div>
        </form>
    </div>
</div>


    <script>
        function toggleModal() {
            const modal = document.getElementById('modal');
            modal.classList.toggle('hidden');
        }
        const tags = <?= json_encode($tags); ?>; 

    const tagInput = document.getElementById('tag-input');
    const suggestedTags = document.getElementById('suggested-tags');
    const selectedTags = document.getElementById('selected-tags');
    const selected = new Set();

    tagInput.addEventListener('input', updateSuggestedTags);

    function updateSuggestedTags() {
        const input = tagInput.value.toLowerCase();
        suggestedTags.innerHTML = '';

        tags.filter(tag => typeof tag.nom === 'string' && tag.nom.toLowerCase().includes(input) && !selected.has(tag.id))
            .forEach(tag => {
                const tagElement = document.createElement('div');
                tagElement.textContent = tag.nom;
                tagElement.className = 'suggested-tag cursor-pointer bg-gray-100 hover:bg-gray-200 text-gray-800 px-3 py-1 rounded-full';
                tagElement.addEventListener('click', () => addTag(tag));
                suggestedTags.appendChild(tagElement);
            });
    }

    function addTag(tag) {
        if (selected.has(tag.id)) return;
        selected.add(tag.id);
        renderSelectedTags();
        updateSuggestedTags();
    }

    function removeTag(tagId) {
        selected.delete(tagId);
        renderSelectedTags();
        updateSuggestedTags();
    }

    function renderSelectedTags() {
        selectedTags.innerHTML = '';
        tags.filter(tag => selected.has(tag.id)).forEach(tag => {
            const tagElement = document.createElement('div');
            tagElement.textContent = tag.nom;
            tagElement.className = 'selected-tag bg-orange-100 text-orange-800 px-3 py-1 rounded-full cursor-pointer';
            tagElement.addEventListener('click', () => removeTag(tag.id));
            selectedTags.appendChild(tagElement);
        });
    }
    const selectedTagIdsInput = document.getElementById('selected-tag-ids');

    function updateHiddenInput() {
        selectedTagIdsInput.value = Array.from(selected).join(',');
    }

    function addTag(tag) {
        if (selected.has(tag.id)) return;
        selected.add(tag.id);
        renderSelectedTags();
        updateSuggestedTags();
        updateHiddenInput(); 

    }

    function removeTag(tagId) {
        selected.delete(tagId);
        renderSelectedTags();
        updateSuggestedTags();
        updateHiddenInput(); 

    }
    </script>
</body>
</html>