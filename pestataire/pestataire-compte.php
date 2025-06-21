<?php
session_start();
require_once '/xampp/htdocs/PFE/include/conexion.php';

// Redirect to login page if user is not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: /PFE/auth/seconnecter.php");
    exit;
}

// Fetch provider data from _user table
$providerData = [];
$userId = isset($_GET['user_id']) ? (int)$_GET['user_id'] : $_SESSION['user_id']; // Use URL user_id or logged-in user_id
try {
    $stmt = $pdo->prepare("SELECT nom, ville AS profession, numero AS comments, user_id AS views, email AS about FROM _user WHERE user_id = ?");
    $stmt->execute([$userId]);
    $providerData = $stmt->fetch(PDO::FETCH_ASSOC) ?: [];
    if (empty($providerData['nom']) && isset($_SESSION['nom'])) {
        $providerData['nom'] = $_SESSION['nom']; // Fallback to session
    }
    $providerData['reviews'] = [
        ['name' => 'Soukayna machraa', 'rating' => 5, 'text' => 'Très bon travail merci!'],
        ['name' => 'Soukayna machraa', 'rating' => 5, 'text' => 'Très bon travail merci!']
    ];
    $providerData['hours'] = [
        'Lundi' => ['09:00 - 12:00', '14:00 - 16:00'],
        'Mardi' => ['09:00 - 12:00', '14:00 - 16:00'],
        'Mercredi' => ['09:00 - 12:00', '14:00 - 16:00'],
        'Jeudi' => ['09:00 - 12:00', '14:00 - 16:00'],
        'Vendredi' => ['09:00 - 12:00', '14:00 - 16:00']
    ];
} catch (PDOException $e) {
    echo "<p style='color:red;'>Erreur : " . htmlspecialchars($e->getMessage()) . "</p>";
}

// Logout function
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: /PFE/auth/seconnecter.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($providerData['nom'] ?? 'Utilisateur') . ' | Souka.ma'; ?></title>
    <link rel="stylesheet" href="pestataire-compte.css">
</head>
<body>
    <?php include '../include/nav.php'; ?>

    <main class="main-content">
        <div class="container">
            <!-- Logout Button -->
            <?php if ($userId == $_SESSION['user_id']): ?>
                <a href="?logout=1" class="logout-btn">Déconnexion</a>
            <?php endif; ?>

            <section class="profile-section">
                <div class="profile-avatar"></div>
                <h1 class="profile-name"><?php echo htmlspecialchars($providerData['nom'] ?? ''); ?></h1>
                <p class="profile-profession"><?php echo htmlspecialchars($providerData['profession'] ?? ''); ?></p>
                
                <div class="profile-stats">
                    <div class="stat-item">
                        <div class="stat-label">Commentaires</div>
                        <div class="stat-value"><?php echo htmlspecialchars($providerData['comments'] ?? 0); ?></div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-label">Vistes de profil</div>
                        <div class="stat-value"><?php echo htmlspecialchars($providerData['views'] ?? 0); ?></div>
                    </div>
                </div>
                
                <div class="profile-actions">
                    <button class="action-btn btn-comments">⭐ Commentaires</button>
                    <button class="action-btn btn-call">📞 appel</button>
                    <button class="action-btn btn-favorite">❤️ Favourit</button>
                </div>
            </section>

            <section class="about-section">
                <h2 class="section-title">À propos</h2>
                <p class="about-text"><?php echo nl2br(htmlspecialchars($providerData['about'] ?? '')); ?></p>
            </section>

            <section class="reviews-section">
                <h2 class="section-title">Avis</h2>
                <div class="reviews-grid">
                    <?php foreach ($providerData['reviews'] as $review): ?>
                        <div class="review-card">
                            <div class="review-header">
                                <span class="reviewer-name"><?php echo htmlspecialchars($review['name']); ?></span>
                                <span class="stars"><?php echo str_repeat('⭐', $review['rating']); ?></span>
                            </div>
                            <p class="review-text"><?php echo htmlspecialchars($review['text']); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>

            <section class="hours-section">
                <h2 class="section-title">Heures d'ouverture</h2>
                <div class="hours-header">
                    <span class="time-period">Matin</span>
                    <span class="time-period">Après-midi</span>
                </div>
                
                <div class="hours-table">
                    <?php foreach ($providerData['hours'] as $day => $slots): ?>
                        <div class="hours-row">
                            <span class="day-label"><?php echo htmlspecialchars($day); ?></span>
                            <div class="time-slots">
                                <?php foreach ($slots as $slot): ?>
                                    <div class="time-slot"><?php echo htmlspecialchars($slot); ?></div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>
        </div>
    </main>

    <?php include '../include/footer.html'; ?>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const actionButtons = document.querySelectorAll('.action-btn');
            actionButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const action = this.textContent.trim();
                    console.log(`Action clicked: ${action}`);
                    this.style.transform = 'scale(0.95)';
                    setTimeout(() => {
                        this.style.transform = '';
                    }, 150);
                });
            });
        });
    </script>
</body>
</html>