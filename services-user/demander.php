<?php
require_once '/xampp/htdocs/PFE/include/conexion.php';

session_start();

// Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
if (!isset($_SESSION['user_id'])) {
    header("Location: /PFE/auth/seconnecter.php");
    exit;
}


$user_id = $_SESSION['user_id'] ?? 1;

// Récupération via URL
$category = $_GET['service_name'] ?? '';
$id_categorie = $_GET['id_categorie'] ?? '';
$phone = $_GET['phone'] ?? '';

// Validate id_categorie
if ($id_categorie) {
    $stmt = $pdo->prepare("SELECT id_categorie FROM categorie WHERE id_categorie = ?");
    $stmt->execute([$id_categorie]);
    if (!$stmt->fetch()) {
        echo "<p class='error'>❌ Catégorie invalide.</p>";
        $id_categorie = '';
    }
}

// Traitement du formulaire
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id_categorie = $_POST['id_categorie'] ?? '';
    $date_service = $_POST['service-date'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $ville = $_POST['city'] ?? '';
    $status = $_POST['status'] ?? '';
    $category = $_POST['service_name'] ?? '';

    if (!empty($id_categorie) && !empty($date_service) && !empty($phone) && !empty($ville) && !empty($status)) {
        try {
            // Convert date to datetime format
            $date_service = date('Y-m-d H:i:s', strtotime($date_service));
            
            echo $id_categorie;
            echo "<br>";
            $stmtService = $pdo->prepare("SELECT id_service FROM service WHERE id_categorie = ? LIMIT 1");
            $stmtService->execute([$id_categorie]);
            $id_service = $stmtService->fetchColumn();
            echo "<pre>";
            print_r($id_service);
            echo "</pre>";

            if (!$id_service) {
                echo "<p class='error'>❌ Aucun service trouvé pour cette catégorie.</p>";
            } else {
                $stmt = $pdo->prepare("
                    INSERT INTO reservation (
                        date_reservation, date_service, status, user_id, id_service, id_categorie, phone, ville
                    ) VALUES (
                        NOW(), ?, ?, ?, ?, ?, ?, ?
                    )
                ");
                $stmt->execute([
                    $date_service, $status, $user_id,
                    $id_service, $id_categorie, $phone, $ville
                ]);

                echo "<p class='success'>✅ Service réservé avec succès !</p>";
            }
        } catch (PDOException $e) {
            echo "<p class='error'>❌ Erreur : " . htmlspecialchars($e->getMessage()) . "</p>";
        }
    } else {
        echo "<p class='warning'>❗Veuillez remplir tous les champs.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Demande de Service</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="demander.css">
</head>
<body>

<?php require_once '../include/nav.php'; ?>

<main class="main">
    <div class="container">
        <div class="form-container">
            <h1 class="form-title">Validation des Services</h1>

            <form class="validation-form" method="post">
                <!-- Nom du service -->
                <div class="form-group">
                    <label>Service demandé</label>
                    <input type="text" class="form-input" value="<?= htmlspecialchars($category) ?>" readonly>
                    <input type="hidden" name="service_name" value="<?= htmlspecialchars($category) ?>">
                </div>

                <!-- Choix de la catégorie -->
                <div class="form-group">
                    <label for="id_categorie">Catégorie</label>
                    <select name="id_categorie" id="id_categorie" class="form-select" required>
                        <option value="">Sélectionner une catégorie</option>
                        <?php
                        $stmt = $pdo->query("SELECT id_categorie, nom FROM categorie");
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            $selected = ($row['id_categorie'] == $id_categorie) ? 'selected' : '';
                            echo '<option value="' . htmlspecialchars($row['id_categorie']) . '" ' . $selected . '>' . htmlspecialchars($row['nom']) . '</option>';
                        }
                        ?>
                    </select>
                </div>

                <!-- Date du service -->
                <div class="form-group">
                    <label for="service-date">Date du service</label>
                    <input type="date" id="service-date" name="service-date" class="form-input" required>
                </div>

                <!-- Numéro de téléphone -->
                <div class="form-group">
                    <label for="phone">Numéro de téléphone</label>
                    <input type="tel" id="phone" name="phone" class="form-input" value="<?= htmlspecialchars($phone) ?>" required>
                </div>

                <!-- Ville -->
                <div class="form-group">
                    <label for="city">Ville</label>
                    <select id="city" name="city" class="form-select" required>
                        <option value="">Sélectionner une ville</option>
                        <option value="casablanca">Casablanca</option>
                        <option value="rabat">Rabat</option>
                        <option value="marrakech">Marrakech</option>
                        <option value="fes">Fès</option>
                    </select>
                </div>

                <!-- Statut -->
                <div class="form-group">
                    <label for="status">Statut</label>
                    <select id="status" name="status" class="form-select" required>
                        <option value="">Sélectionner le statut</option>
                        <option value="en_attente">En attente</option>
                        <option value="valide">Validé</option>
                        <option value="refuse">Refusé</option>
                    </select>
                </div>

                <!-- Bouton -->
                <button type="submit" class="validate-btn">Valider</button>
            </form>
        </div>
    </div>
</main>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const form = document.querySelector(".validation-form");
        form.addEventListener("submit", (e) => {
            const inputs = form.querySelectorAll("[required]");
            let isValid = true;
            inputs.forEach(input => {
                if (!input.value.trim()) {
                    input.style.borderColor = "#ff4757";
                    isValid = false;
                } else {
                    input.style.borderColor = "#ccc";
                }
            });
            if (!isValid) e.preventDefault();
        });
    });
</script>

</body>
</html>