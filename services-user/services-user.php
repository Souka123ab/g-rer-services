<?php
session_start();
require_once '/xampp/htdocs/PFE/include/conexion.php'; // Include database connection

// Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
if (!isset($_SESSION['user_id'])) {
    header("Location: /PFE/auth/seconnecter.php");
    exit;
}

// Fetch category mappings
$category_map = [];
$stmt = $pdo->query("SELECT id_categorie, nom FROM categorie");
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $category_map[$row['nom']] = $row['id_categorie'];
}

// Fetch services from the database
$stmt = $pdo->query("SELECT id_service, titre, prix, user_id, id_categorie, image, telephone FROM service");
$services = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (!$services) {
    echo "<p>Aucun service trouvé dans la base de données.</p>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>
    <link rel="stylesheet" href="service-user.css">
    <link rel="stylesheet" href="/PFE/include/nav.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
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
                <button class="btn btn-search">
                    <i class="fas fa-search"></i>
                    Rechercher
                </button>
                <button class="btn btn-filter">
                    <i class="fas fa-sliders-h"></i>
                </button>
            </div>
        </div>
    </section>

    <section class="categories-section">
        <div class="container">
            <h2>Catégories populaires</h2>
            <div class="categories-grid">
                <div class="category-item">
                    <div class="category-icon blue">
                        <i class="fas fa-wrench"></i>
                    </div>
                    <span>Plomberie</span>
                </div>
                <div class="category-item">
                    <div class="category-icon green">
                        <i class="fas fa-seedling"></i>
                    </div>
                    <span>Jardinage</span>
                </div>
                <div class="category-item">
                    <div class="category-icon orange">
                        <i class="fas fa-cog"></i>
                    </div>
                    <span>Mécanique</span>
                </div>
                <div class="category-item">
                    <div class="category-icon pink">
                        <i class="fas fa-broom"></i>
                    </div>
                    <span>Ménage</span>
                </div>
                <div class="category-item">
                    <div class="category-icon purple">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <span>Electricité</span>
                </div>
                <div class="category-item">
                    <div class="category-icon gray">
                        <i class="fas fa-ellipsis-h"></i>
                    </div>
                    <span>Voir plus</span>
                </div>
            </div>
        </div>
    </section>

    <main class="main-content">
        <div class="container">
            <?php
            // Group services by category
            $services_by_category = [];
            foreach ($services as $service) {
                $category_name = $pdo->query("SELECT nom FROM categorie WHERE id_categorie = " . $service['id_categorie'])->fetchColumn();
                if (!isset($services_by_category[$category_name])) {
                    $services_by_category[$category_name] = [];
                }
                $services_by_category[$category_name][] = $service;
            }

            // Define category colors and icons
            $category_styles = [
                'Plomberie' => ['color' => '#4a90e2', 'icon' => 'fa-wrench'],
                'Jardinage' => ['color' => '#4caf50', 'icon' => 'fa-seedling'],
                'Mécanique' => ['color' => '#ff9800', 'icon' => 'fa-cog'],
                'Ménage' => ['color' => '#e91e63', 'icon' => 'fa-broom'],
                'Electricité' => ['color' => '#9c27b0', 'icon' => 'fa-bolt']
            ];

            // Display services by category
            foreach ($services_by_category as $category_name => $category_services) {
                $style = $category_styles[$category_name] ?? ['color' => '#4a90e2', 'icon' => 'fa-wrench'];
                echo '<section class="service-section">';
                echo '<div class="section-header">';
                echo '<h3>';
                echo '<i class="fas ' . $style['icon'] . '" style="color: ' . $style['color'] . ';"></i>';
                echo " Nouvelles annonces de $category_name";
                echo '</h3>';
                echo '<a href="#" class="view-more">Plus d\'annonces <i class="fas fa-arrow-right"></i></a>';
                echo '</div>';
                echo '<div class="services-grid">';
                foreach ($category_services as $service) {
                    echo '<a href="detail.php?category=' . urlencode($category_name) . '&image=' . urlencode($service['image']) . '&provider_avatar=' . urlencode('/placeholder.svg?height=40&width=40') . '&provider_name=' . urlencode($service['titre']) . '&rating=' . urlencode('4.8') . '&price=' . urlencode($service['prix'] . ' DH') . '&phone=' . urlencode($service['telephone']) . '">';
                    echo '<div class="service-card">';
                    echo '<div class="service-image">';
                    echo '<img src="' . htmlspecialchars($service['image']) . '" alt="' . htmlspecialchars($category_name) . ' service">';
                    echo '</div>';
                    echo '<div class="service-content">';
                    echo '<div class="provider-info">';
                    echo '<img src="/placeholder.svg?height=40&width=40" alt="Provider" class="provider-avatar">';
                    echo '<div>';
                    echo '<h4>' . htmlspecialchars($service['titre']) . '</h4>';
                    echo '<div class="rating">';
                    echo '<span class="stars">★★★★★</span>';
                    echo '<span class="rating-count">4.8</span>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '<span class="price">' . htmlspecialchars($service['prix']) . ' DH</span>';
                    echo '<div class="service-footer">';
                    echo '<div class="actions">';
                    echo '<button class="btn-favorite" data-href="/PFE/favourite/favourite.php">Favorite</button>';
                    echo '<button class="btn-demander" data-href="demander.php?service_name=' . urlencode($category_name) . '&id_categorie=' . $service['id_categorie'] . '&phone=' . urlencode($service['telephone']) . '">Demander</button>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</a>';
                }
                echo '</div>'; // End of services-grid
                echo '</section>'; // End of service-section
            }
            ?>
        </div>
    </main>

    <?php require_once '../include/footer.html'; ?>

    <script src="services-user.js"></script>
</body>
</html>