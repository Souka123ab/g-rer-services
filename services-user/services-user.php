<?php
session_start();
require_once '/xampp/htdocs/PFE/include/conexion.php';

// Redirection si l'utilisateur n'est pas connecté
if (!isset($_SESSION['user_id'])) {
    header("Location: /PFE/auth/seconnecter.php");
    exit;
}

// Affichage des messages
if (isset($_SESSION['service_ajoute'])) {
    echo "<p style='color: green;'>Service \"" . htmlspecialchars($_SESSION['service_ajoute']['titre']) . "\" ajouté le " . htmlspecialchars($_SESSION['service_ajoute']['date']) . ".</p>";
    unset($_SESSION['service_ajoute']);
}
if (isset($_SESSION['service_modifie'])) {
    echo "<p style='color: green;'>Service \"" . htmlspecialchars($_SESSION['service_modifie']['titre']) . "\" modifié le " . htmlspecialchars($_SESSION['service_modifie']['date']) . ".</p>";
    unset($_SESSION['service_modifie']);
}
if (isset($_SESSION['service_supprime'])) {
    echo "<p style='color: green;'>Service \"" . htmlspecialchars($_SESSION['service_supprime']['titre']) . "\" supprimé le " . htmlspecialchars($_SESSION['service_supprime']['date']) . ".</p>";
    unset($_SESSION['service_supprime']);
}

// Récupération des catégories
$category_map = [];
try {
    $stmt = $pdo->query("SELECT id_categorie, nom FROM categorie");
    $category_map = $stmt->fetchAll(PDO::FETCH_KEY_PAIR);
} catch (PDOException $e) {
    echo "<p style='color: red;'>Erreur lors de la récupération des catégories : " . htmlspecialchars($e->getMessage()) . "</p>";
    exit;
}

// Récupération des services
$services = [];
try {
    $stmt = $pdo->query("SELECT id_service, titre, prix, user_id, id_categorie, image, telephone, date, discription FROM service ORDER BY date DESC");
    $services = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "<p style='color: red;'>Erreur lors de la récupération des services : " . htmlspecialchars($e->getMessage()) . "</p>";
    exit;
}

// Vérifier si des services existent
if (empty($services)) {
    echo "<p>Aucun service trouvé.</p>";
} else {
    // Regrouper les services par catégorie
    $services_by_category = [];
    foreach ($services as $service) {
        $cat_name = isset($category_map[$service['id_categorie']]) ? $category_map[$service['id_categorie']] : 'Autres';
        $services_by_category[$cat_name][] = $service;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Services</title>
    <link rel="stylesheet" href="service-user.css">
    <link rel="stylesheet" href="/PFE/include/nav.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .btn-edit, .btn-delete, .btn-favorite, .btn-demander, .btn-detail {
            padding: 8px 12px;
            margin: 5px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 0.9em;
            transition: background-color 0.3s;
        }
        .btn-edit {
            background-color: #4a90e2;
            color: white;
        }
        .btn-edit:hover {
            background-color: #357abd;
        }
        .btn-delete {
            background-color: #e91e63;
            color: white;
        }
        .btn-delete:hover {
            background-color: #c1134e;
        }
        .btn-favorite {
            background-color: #D54286;
            color: white;
        }
        .btn-favorite:hover {
            background-color: #C1356D;
        }
        .btn-demander {
            background-color: #D54286;
            color: white;
        }
        .btn-demander:hover {
            background-color: #C1356D;
        }
        .btn-detail {
            background-color: #2196F3;
            color: white;
        }
        .btn-detail:hover {
            background-color: #1976D2;
        }
        .service-card {
            text-decoration: none;
            color: inherit;
            display: block;
        }
        .service-card:hover {
            background-color: #f5f5f5;
        }
        .actions {
            pointer-events: auto;
        }
        .service-card * {
            pointer-events: none;
        }
        .service-card .actions * {
            pointer-events: auto;
        }
        .category-item {
            cursor: pointer;
        }
        .category-item:hover {
            opacity: 0.8;
        }
        .category-icon.blue { background-color: #4a90e2; }
        .category-icon.green { background-color: #4caf50; }
        .category-icon.orange { background-color: #ff9800; }
        .category-icon.pink { background-color: #e91e63; }
        .category-icon.purple { background-color: #9c27b0; }
        .category-icon.gray { background-color: #666; }
    </style>
</head>
<body>
    <?php require_once '../include/nav.php'; ?>

    <section class="search-section">
        <div class="container">
            <div class="search-bar">
                <div class="search-input">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Rechercher un service (ex: Plombier, Jardinage)" id="search-keyword">
                </div>
                <button class="btn btn-search"><i class="fas fa-search"></i> Rechercher</button>
                <button class="btn btn-filter"><i class="fas fa-sliders-h"></i></button>
            </div>
        </div>
    </section>

    <section class="categories-section">
        <div class="container">
            <h2>Catégories populaires</h2>
            <div class="categories-grid">
                <?php
                $popular_categories = [
                    'Plomberie' => ['icon' => 'fa-wrench', 'color' => 'blue'],
                    'Jardinage' => ['icon' => 'fa-seedling', 'color' => 'green'],
                    'Mécanique' => ['icon' => 'fa-cog', 'color' => 'orange'],
                    'Ménage' => ['icon' => 'fa-broom', 'color' => 'pink'],
                    'Electricité' => ['icon' => 'fa-bolt', 'color' => 'purple']
                ];
                foreach ($popular_categories as $cat => $style) {
                    echo '<div class="category-item" data-category="' . htmlspecialchars(strtolower($cat)) . '">';
                    echo '<div class="category-icon ' . $style['color'] . '"><i class="fas ' . $style['icon'] . '"></i></div>';
                    echo '<span>' . htmlspecialchars($cat) . '</span>';
                    echo '</div>';
                }
                ?>
                <div class="category-item" data-category="all"><div class="category-icon gray"><i class="fas fa-ellipsis-h"></i></div><span>Voir tout</span></div>
            </div>
        </div>
    </section>

    <main class="main-content">
        <div class="container">
            <?php
            if (!empty($services_by_category)) {
                $category_styles = [
                    'Plomberie' => ['color' => '#4a90e2', 'icon' => 'fa-wrench'],
                    'Jardinage' => ['color' => '#4caf50', 'icon' => 'fa-seedling'],
                    'Mécanique' => ['color' => '#ff9800', 'icon' => 'fa-cog'],
                    'Ménage' => ['color' => '#e91e63', 'icon' => 'fa-broom'],
                    'Electricité' => ['color' => '#9c27b0', 'icon' => 'fa-bolt'],
                    'Autres' => ['color' => '#4a90e2', 'icon' => 'fa-wrench']
                ];

                foreach ($services_by_category as $cat_name => $cat_services) {
                    $style = $category_styles[$cat_name] ?? ['color' => '#4a90e2', 'icon' => 'fa-wrench'];
                    $cat_id = array_search($cat_name, $category_map) ?: 0;
                    echo '<section class="service-section" data-category="' . htmlspecialchars(strtolower($cat_name)) . '">';
                    echo '<div class="section-header">';
                    echo '<h3><i class="fas ' . $style['icon'] . '" style="color: ' . $style['color'] . ';"></i> Mes annonces de ' . htmlspecialchars($cat_name) . '</h3>';
                    echo '</div><div class="services-grid">';

                    foreach ($cat_services as $service) {
                        $service_date = $service['date'] ? date('d/m/Y H:i:s', strtotime($service['date'])) : 'Date non disponible';
                        try {
                            $stmt_user = $pdo->prepare("SELECT nom FROM _user WHERE user_id = ?");
                            $stmt_user->execute([$service['user_id']]);
                            $provider_name = $stmt_user->fetchColumn() ?: 'Prestataire';
                        } catch (PDOException $e) {
                            $provider_name = 'Prestataire';
                        }
                        $params = http_build_query([
                            'category' => $cat_name,
                            'image' => $service['image'] ?: '/placeholder.svg',
                            'provider_avatar' => '/placeholder.svg',
                            'provider_name' => $provider_name,
                            'rating' => '4.8',
                            'price' => $service['prix'],
                            'phone' => $service['telephone'],
                            'discription' => $service['discription'] ?: 'Aucune description',
                            'id_service' => $service['id_service'],
                            'id_categorie' => $service['id_categorie']
                        ]);
                        echo '<div class="service-card">';
                        echo '<div class="service-box" data-title="' . htmlspecialchars(strtolower($service['titre'])) . '">';

                        echo '<div class="service-image">';
                        echo '<img src="' . htmlspecialchars($service['image'] ?: '/placeholder.svg') . '" alt="Image service">';
                        echo '</div>';

                        echo '<div class="service-content"><div class="provider-info">';
                        echo '<img src="/placeholder.svg" alt="Provider" class="provider-avatar">';
                        echo '<div><h4>' . htmlspecialchars($provider_name) . '</h4><div class="rating"><span class="stars">★★★★★</span><span class="rating-count">4.8</span></div></div>';
                        echo '</div>';

                        echo '<span class="price">' . htmlspecialchars($service['prix']) . ' DH</span>';
                        echo '<div class="service-footer"><div class="actions">';

                        if ($service['user_id'] == $_SESSION['user_id']) {
                            echo '<a href="/PFE/services-user/modifier.php?id_service=' . $service['id_service'] . '" class="btn-edit"><i class="fas fa-pen"></i> Modifier</a>';
                            echo '<button class="btn-delete" onclick="if(confirm(\'Êtes-vous sûr de vouloir supprimer ce service ?\')){window.location.href=\'/PFE/services-user/supprimer.php?id_service=' . $service['id_service'] . '\';}"><i class="fas fa-trash"></i> Supprimer</button>';
                        } else {
                            echo '<button class="btn-favorite" data-href="/PFE/favourite/favourite.php?id_service=' . $service['id_service'] . '"><i class="fas fa-heart"></i> Favori</button>';
                            echo '<a href="demander.php?service_name=' . urlencode($cat_name) . '&id_categorie=' . $service['id_categorie'] . '&phone=' . urlencode($service['telephone']) . '&id_service=' . $service['id_service'] . '" class="btn-demander"><i class="fas fa-paper-plane"></i> Demander</a>';
                        }

                        echo '<a href="detail.php?' . $params . '" class="btn-detail">Détail</a>';

                        echo '<div class="service-date">' . htmlspecialchars($service_date) . '</div>';
                        echo '</div></div>'; // service-footer + actions
                        echo '</div></div>'; // service-content + service-box
                        echo '</div>'; // service-card
                    }
                    echo '</div></section>';
                }
            }
            ?>
        </div>
    </main>

    <?php require_once '../include/footer.html'; ?>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const keywordInput = document.getElementById('search-keyword');
        const searchButton = document.querySelector('.btn-search');
        const serviceBoxes = document.querySelectorAll('.service-box');
        const categoryItems = document.querySelectorAll('.category-item');
        const serviceSections = document.querySelectorAll('.service-section');

        function normalize(str) {
            return str.trim().toLowerCase();
        }

        function filterServices() {
            const keyword = normalize(keywordInput.value);

            serviceBoxes.forEach(box => {
                const title = box.dataset.title;
                const matchesKeyword = !keyword || title.includes(keyword);

                if (matchesKeyword) {
                    box.style.display = 'block';
                } else {
                    box.style.display = 'none';
                }
            });
        }

        function filterByCategory(category) {
            serviceSections.forEach(section => {
                const sectionCategory = section.dataset.category;
                if (category === 'all' || sectionCategory === category) {
                    section.style.display = 'block';
                } else {
                    section.style.display = 'none';
                }
            });

            // Réinitialiser la recherche par mot-clé
            keywordInput.value = '';
            filterServices(); // Appliquer le filtrage pour afficher tous les services visibles
        }

        // Filtrage par mot-clé au clic sur le bouton de recherche
        searchButton.addEventListener('click', filterServices);

        // Filtrage par catégorie au clic sur une catégorie
        categoryItems.forEach(item => {
            item.addEventListener('click', () => {
                const category = item.dataset.category;
                filterByCategory(category);
            });
        });

        // Prevent action buttons from triggering the service card link
        document.querySelectorAll('.btn-edit, .btn-delete, .btn-favorite, .btn-demander, .btn-detail').forEach(button => {
            button.addEventListener('click', (event) => {
                event.stopPropagation();
                const href = button.getAttribute('data-href') || button.getAttribute('href');
                if (href) {
                    window.location.href = href;
                }
            });
        });
    });
    </script>
</body>
</html>