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
$stmt = $pdo->query("SELECT id_categorie, nom FROM categorie");
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $category_map[$row['id_categorie']] = $row['nom'];
}

// ✅ CORRECTION ICI : suppression de $$stmt
$stmt = $pdo->query("SELECT id_service, titre, prix, user_id, id_categorie, image, telephone, date FROM service ORDER BY date DESC");
$services = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (!$services) {
    echo "<p>Aucun service trouvé.</p>";
    exit;
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
        .service-date {
            font-size: 0.9em;
            color: #333;
            text-align: center;
            margin-bottom: 10px;
            padding: 5px 0;
            background-color: #f0f0f0;
            display: block;
            min-height: 20px;
        }
        .btn-edit, .btn-delete {
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
    </style>
</head>
<body>
    <?php require_once '../include/nav.php'; ?>

    <section class="search-section">
        <div class="container">
            <div class="search-bar">
                <div class="search-input">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Que recherchez-vous ?">
                </div>
                <div class="location-input">
                    <i class="fas fa-map-marker-alt"></i>
                    <input type="text" placeholder="Votre ville ou code postal">
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
                <div class="category-item"><div class="category-icon blue"><i class="fas fa-wrench"></i></div><span>Plomberie</span></div>
                <div class="category-item"><div class="category-icon green"><i class="fas fa-seedling"></i></div><span>Jardinage</span></div>
                <div class="category-item"><div class="category-icon orange"><i class="fas fa-cog"></i></div><span>Mécanique</span></div>
                <div class="category-item"><div class="category-icon pink"><i class="fas fa-broom"></i></div><span>Ménage</span></div>
                <div class="category-item"><div class="category-icon purple"><i class="fas fa-bolt"></i></div><span>Electricité</span></div>
                <div class="category-item"><div class="category-icon gray"><i class="fas fa-ellipsis-h"></i></div><span>Voir plus</span></div>
            </div>
        </div>
    </section>

    <main class="main-content">
        <div class="container">
            <?php
            // Regrouper les services par catégorie
            $services_by_category = [];
            foreach ($services as $service) {
                $cat_name = $category_map[$service['id_categorie']] ?? 'Autres';
                $services_by_category[$cat_name][] = $service;
            }

            // Styles par catégorie
            $category_styles = [
                'Plomberie' => ['color' => '#4a90e2', 'icon' => 'fa-wrench'],
                'Jardinage' => ['color' => '#4caf50', 'icon' => 'fa-seedling'],
                'Mécanique' => ['color' => '#ff9800', 'icon' => 'fa-cog'],
                'Ménage' => ['color' => '#e91e63', 'icon' => 'fa-broom'],
                'Electricité' => ['color' => '#9c27b0', 'icon' => 'fa-bolt']
            ];

            // Affichage par catégorie
            foreach ($services_by_category as $cat_name => $cat_services) {
                $style = $category_styles[$cat_name] ?? ['color' => '#4a90e2', 'icon' => 'fa-wrench'];
                echo '<section class="service-section">';
                echo '<div class="section-header">';
                echo '<h3><i class="fas ' . $style['icon'] . '" style="color: ' . $style['color'] . ';"></i> Mes annonces de ' . htmlspecialchars($cat_name) . '</h3>';
                echo '<a href="category-details.php?id_categorie=' . array_search($cat_name, $category_map) . '" class="view-more">Plus d\'annonces <i class="fas fa-arrow-right"></i></a>';
                echo '</div><div class="services-grid">';

                foreach ($cat_services as $service) {
                    // Handle date display with fallback
                    $service_date = $service['date'] ? date('d/m/Y H:i:s', strtotime($service['date'])) : 'Date non disponible';
                    echo '<a href="detail.php?category=' . urlencode($cat_name) . '&image=' . urlencode($service['image']) . '&provider_avatar=/placeholder.svg&provider_name=' . urlencode($service['titre']) . '&rating=4.8&price=' . urlencode($service['prix'] . ' DH') . '&phone=' . urlencode($service['telephone']) . '">';
                    echo '<div class="service-card">';
                    

                    echo '<div class="service-image">';
                    echo '<img src="' . htmlspecialchars($service['image']) . '" alt="Image service">';
                    echo '</div>';

                    echo '<div class="service-content"><div class="provider-info">';

                    // Nom du provider
                    $stmt_user = $pdo->prepare("SELECT nom FROM _user WHERE user_id = ?");
                    $stmt_user->execute([$service['user_id']]);
                    $provider_name = $stmt_user->fetchColumn() ?: 'Prestataire';

                    echo '<img src="/placeholder.svg" alt="Provider" class="provider-avatar">';
                    echo '<div><h4>' . htmlspecialchars($provider_name) . '</h4><div class="rating"><span class="stars">★★★★★</span><span class="rating-count">4.8</span></div></div>';
                    echo '</div>'; // provider-info

                    echo '<span class="price">' . htmlspecialchars($service['prix']) . ' DH</span>';
                    echo '<div class="service-footer"><div class="actions">';
                    echo '<button class="btn-favorite" data-href="/PFE/favourite/favourite.php">Favorite</button>';
                    echo '<button class="btn-demander" data-href="demander.php?service_name=' . urlencode($cat_name) . '&id_categorie=' . $service['id_categorie'] . '&phone=' . urlencode($service['telephone']) . '">Demander</button>';
                    echo '<div class="service-date">' . htmlspecialchars($service_date) . '</div>';

                    // Add Edit and Delete buttons for the logged-in user's services
                   // Afficher Modifier/Supprimer uniquement si l'utilisateur connecté est le propriétaire du service
if ($service['user_id'] == $_SESSION['user_id']) {
    echo '<a href="/PFE/services-user/modifier.php?id_service=' . $service['id_service'] . '" class="btn-edit">Modifier</a>';
    echo '<button class="btn-delete" onclick="if(confirm(\'Êtes-vous sûr de vouloir supprimer ce service ?\')){window.location.href=\'/PFE/supprimer-service.php?id_service=' . $service['id_service'] . '\';}">Supprimer</button>';
}


                    echo '</div></div>'; // service-footer + actions
                    echo '</div></div></a>'; // service-content + service-card + <a>
                }

                echo '</div></section>'; // services-grid + section
            }
            ?>
        </div>
    </main>

    <?php require_once '../include/footer.html'; ?>
    <script src="services-user.js"></script>
</body>
</html>