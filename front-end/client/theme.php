<?php
require_once '../../Back-end/controller/Blogs/Themes/afficher.php';
$allThemes = getTheme::afficherThemes();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thèmes du Blog</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <!-- Header -->
    <header class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <a href="#" class="text-2xl font-bold text-gray-900">Thèmes</a>
                <nav class="flex space-x-6">
                    <a href="#" class="text-gray-500 hover:text-orange-600">Home</a>
                    <a href="#" class="text-orange-600">Thèmes</a>
                    <a href="#" class="text-gray-500 hover:text-orange-600">Articles</a>
                </nav>
            </div>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-4 py-8">
        <!-- Grid des thèmes -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($allThemes as $theme): ?>
                <a href="a.php?idTheme=<?php echo $theme['id']; ?>" class="group cursor-pointer">
                    <div class="relative overflow-hidden rounded-xl shadow-lg">
                        <img src="../../Back-end/<?php echo htmlspecialchars($theme['image']); ?>" alt="<?php echo htmlspecialchars($theme['nom']); ?>" class="w-full h-48 object-cover transform group-hover:scale-105 transition-transform duration-300">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent">
                            <div class="absolute bottom-0 left-0 right-0 p-6">
                                <h3 class="text-xl font-bold text-white mb-2"><?php echo htmlspecialchars($theme['nom']); ?></h3>
                                <p class="text-gray-200 text-sm"><?php echo htmlspecialchars($theme['description']); ?></p>
                            </div>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>

        <!-- Articles du thème sélectionné -->
        <section class="mt-12">
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-2xl font-bold text-gray-900">Articles - Sélectionner un Thème</h2>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-500">Trier par:</span>
                    <select class="px-4 py-2 border rounded-lg text-gray-700">
                        <option>Plus récent</option>
                        <option>Plus populaire</option>
                        <option>Plus commenté</option>
                    </select>
                </div>
            </div>
        </section>
    </main>
</body>
</html>