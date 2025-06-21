<?php
session_start();
require_once '/xampp/htdocs/PFE/include/conexion.php'; // Include database connection

// Redirect to login page if user is not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: /PFE/auth/seconnecter.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Souka.ma - Plateforme de Services</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
<?php include 'include/nav.php'; ?>
    <!-- Hero Section -->
    <section class="hero">
        <div class="container-v">
            <div class="hero-content">
                <div class="hero-left">
                    <h1 class="hero-title">Bienvenue sur notre plateforme !</h1>
                    <p class="hero-description">
                        Trouvez rapidement un professionnel de confiance près de chez vous pour tous vos besoins en services à domicile.
                    </p>
                    
                    <!-- Search Form -->
                    <div class="search-form">
                        <div class="search-inputs">
                            <div class="input-group">
                                <i class="fas fa-search input-icon"></i>
                                <input type="text" placeholder="Quel service cherchez-vous ?" class="search-input">
                            </div>
                            <div class="input-group">
                                <i class="fas fa-map-marker-alt input-icon"></i>
                                <input type="text" placeholder="Votre ville ou code postal" class="search-input">
                            </div>
                        </div>
                        <button class="search-btn">Rechercher</button>
                    </div>
                </div>

                <div class="hero-right">
                    <div class="hero-illustration">
                        <img src="image/brand loyalty-pana.png" alt="Service Platform Illustration" class="illustration-img">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Nouveaux Professionnels Section -->
    <div class="container-b">
        <div class="group-1">
            <div class="v1">
                <h4>Nouveaux professionnels</h4>
            </div>
            <div class="v2">
                <div class="v3">
                    <!-- Navigation arrows can be added here if needed -->
                    <!-- <a href="#" class="view-all-link"><i class="fas fa-arrow-left"></i></a>
                    <a href="#" class="view-all-link"><i class="fas fa-arrow-right"></i></a> -->
                </div>
            </div>
        </div>
        <div class="services-grid">
            <?php
            try {
                $stmt = $pdo->query("SELECT u.nom, u.ville, u.user_id, s.titre, s.prix, s.image, s.telephone 
                                   FROM _user u 
                                   LEFT JOIN service s ON u.user_id = s.user_id 
                                   WHERE u.is_provider = 1 
                                   LIMIT 4"); // Removed description
                $newProviders = [];
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $avatar = "image/default-avatar.png";
    $nom = $row['nom']; // Correction ici
    $ville = $row['ville'];
    $titre_service = $row['titre']; // Correction ici
    $prix = $row['prix'];
    $image = $row['image'] ?? 'image/default-service.jpg';
?>
    <div class="service-card">
        <div class="service-image">
            <img src="<?= htmlspecialchars($image); ?>" alt="<?= htmlspecialchars($titre_service); ?>">
        </div>
        <div class="service-content">
            <div class="profile-header">
                <div class="profile-info">
                    <div class="avatar">
                        <img src="<?= htmlspecialchars($avatar); ?>" alt="<?= htmlspecialchars($nom); ?>">
                    </div>
                    <div class="profile-details">
                        <div class="profile-name"><?= htmlspecialchars($nom); ?></div>
                        <div class="profile-meta">
                            <span class="location"><?= htmlspecialchars($ville); ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="service-description">
                <?= htmlspecialchars($titre_service); ?>
            </div>
            <div class="service-footer">
                <div class="price-section">
                    <div class="price-label">Prix</div>
                    <div class="price"><?= htmlspecialchars($prix); ?> DH</div>
                </div>
                <a href="/PFE/pestataire/service.php?user_id=<?= htmlspecialchars($row['user_id']); ?>" class="service-button <?= strtolower(str_replace(' ', '-', $ville)); ?>-btn">
                    Voir services
                </a>
            </div>
        </div>
    </div>
<?php } ?>

            ?>
            <div class="service-card">
                <div class="service-image">
                    <img src="<?php echo htmlspecialchars($provider['image'] ?? 'image/default-service.jpg'); ?>" alt="<?php echo htmlspecialchars($provider['titre'] ?? 'Service'); ?>">
                </div>
                <div class="service-content">
                    <div class="profile-header">
                        <div class="profile-info">
                            <div class="avatar">
                                <img src="<?php echo htmlspecialchars($avatar); ?>" alt="<?php echo htmlspecialchars($provider['nom']); ?>">
                            </div>
                            <div class="profile-details">
                                <div class="profile-name"><?php echo htmlspecialchars($provider['nom']); ?></div>
                                <div class="profile-meta">
                                    <span class="location"><?php echo htmlspecialchars($provider['ville']); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="service-description">
                        <?php echo htmlspecialchars($services[0]['titre'] ?? 'Aucun service'); ?><br>
                        <!-- Removed description since it's not in the table -->
                    </div>
                    <div class="service-footer">
                        <div class="price-section">
                            <div class="price-label">Prix</div>
                            <div class="price"><?php echo htmlspecialchars($services[0]['prix'] ?? 'N/A'); ?> DH</div>
                        </div>
                        <a href="/PFE/pestataire/service.php?user_id=<?php echo htmlspecialchars($userId); ?>" class="service-button <?php echo $buttonClass; ?>">
                            Voir services
                        </a>
                    </div>
                </div>
            </div>
            <?php
                }
            
            catch (PDOException $e) {
                echo "<p style='color:red;'>Erreur : " . htmlspecialchars($e->getMessage()) . "</p>";
            }
            ?>
        </div>
    </div>

    <!-- Prestataires près de chez vous Section -->
    <div class="container">
        <h1 class="title">Prestataires près de chez vous</h1>
        
        <div class="providers-grid">
            <?php
            try {
                $stmt = $pdo->query("SELECT u.nom, u.ville, u.user_id, u.is_provider, s.titre, s.prix, s.image 
                                   FROM _user u 
                                   LEFT JOIN service s ON u.user_id = s.user_id 
                                   WHERE u.is_provider = 1");
                $providers = [];
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $providers[$row['user_id']] = $row;
                }

                if ($providers) {
                    foreach ($providers as $provider) {
                        $rating = max(0, min(5, (float)(rand(3, 5) + (rand(0, 1) ? 0.5 : 0)))); // Random rating between 3.0 and 5.0
                        $reviewsCount = rand(10, 50); // Random review count
                        $avatar = "image/default-avatar.png"; // Default avatar
                        $profession = $provider['ville']; // Use ville as profession
                        $buttonClass = strtolower(str_replace(' ', '-', $profession)) . '-btn';
                        $badgeClass = strtolower(str_replace(' ', '-', $profession));
            ?>
            <div class="provider-card">
                <div class="profile-image">
                    <img src="<?php echo htmlspecialchars($avatar); ?>" alt="<?php echo htmlspecialchars($provider['nom']); ?>" class="avatar">
                </div>
                <div class="service-badge <?php echo $badgeClass; ?>">
                    <?php echo htmlspecialchars($profession); ?>
                </div>
                <h3 class="provider-name"><?php echo htmlspecialchars($provider['nom']); ?></h3>
                <div class="rating">
                    <div class="stars">
                        <?php
                        $fullStars = floor($rating);
                        $halfStar = $rating - $fullStars >= 0.5 ? 1 : 0;
                        $emptyStars = max(0, 5 - $fullStars - $halfStar);
                        echo str_repeat('<span class="star filled">★</span>', $fullStars);
                        if ($halfStar) echo '<span class="star half">★</span>';
                        echo str_repeat('<span class="star empty">★</span>', $emptyStars);
                        ?>
                    </div>
                    <span class="rating-text"><?php echo number_format($rating, 1); ?> (<?php echo $reviewsCount; ?> avis)</span>
                </div>
                <div class="location">
                    <svg class="location-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                        <circle cx="12" cy="10" r="3"></circle>
                    </svg>
                    <span><?php echo htmlspecialchars($provider['ville']); ?></span>
                </div>
                <a href="/PFE/pestataire/service.php?user_id=<?php echo htmlspecialchars($provider['user_id']); ?>" class="service-button <?php echo $buttonClass; ?>">
                    Demander un service
                </a>
                <a href="/PFE/pestataire/pestataire-compte.php?user_id=<?php echo htmlspecialchars($provider['user_id']); ?>" class="service-button view-profile-btn">
                    Voir profil
                </a>
            </div>
            <?php
                    }
                } else {
                    echo "<p>Aucun prestataire trouvé.</p>";
                }
            } catch (PDOException $e) {
                echo "<p style='color:red;'>Erreur : " . htmlspecialchars($e->getMessage()) . "</p>";
            }
            ?>
        </div>
    </div>
    <!-- Footer -->
    <?php
     require_once './include/footer.html';
    ?>

    <script src="script.js">
        function toggleFavorite(button) {
            const svg = button.querySelector('svg');
            const path = svg.querySelector('path');

            if (button.classList.contains('favorited')) {
                button.classList.remove('favorited');
                path.setAttribute('fill', 'none');
            } else {
                button.classList.add('favorited');
                path.setAttribute('fill', '#e74c3c');
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            const searchBtn = document.querySelector('.search-btn');
            const serviceInput = document.querySelector('.search-inputs input[placeholder*="service"]');
            const locationInput = document.querySelector('.search-inputs input[placeholder*="ville"]');

            searchBtn.addEventListener('click', () => {
                const service = serviceInput.value.toLowerCase();
                const location = locationInput.value.toLowerCase();

                const providers = document.querySelectorAll('.provider-card');

                providers.forEach(provider => {
                    const badge = provider.querySelector('.service-badge')?.textContent.toLowerCase();
                    const city = provider.querySelector('.location span')?.textContent.toLowerCase();

                    if ((service && !badge.includes(service)) || (location && !city.includes(location))) {
                        provider.style.display = 'none';
                    } else {
                        provider.style.display = 'block';
                    }
                });
            });
        });
    </script>
</body>
</html>