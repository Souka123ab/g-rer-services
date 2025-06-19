<?php
session_start();
require_once '/xampp/htdocs/PFE/include/conexion.php'; // Include database connection

// Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
if (!isset($_SESSION['user_id'])) {
    header("Location: /PFE/auth/seconnecter.php");
    exit;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $titre = $_POST['nom'] ?? '';
    $description = $_POST['description'] ?? ''; // Data from form
    $prix = $_POST['prix'] ?? 0;
    $user_id = $_SESSION['user_id'];
    $categorie = $_POST['categorie'] ?? '';
    $telephone = '+212' . ($_POST['telephone'] ?? '');
    $image = '/placeholder.svg?height=200&width=300'; // Default image

    // Map category to id_categorie
    $category_map = [];
    $stmt = $pdo->query("SELECT id_categorie, nom FROM categorie");
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $category_map[$row['nom']] = $row['id_categorie'];
    }
    $id_categorie = $category_map[$categorie] ?? null;

    // Handle file upload
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $upload_dir = '/xampp/htdocs/PFE/uploads/'; // Define your upload directory
        if (!file_exists($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }
        $image_name = uniqid() . '_' . basename($_FILES['photo']['name']);
        $target_file = $upload_dir . $image_name;
        if (move_uploaded_file($_FILES['photo']['tmp_name'], $target_file)) {
            $image = '/PFE/uploads/' . $image_name; // Store relative path
        }
    }

    // Insert into database (using 'discpition' and removing 'ville' since it's not in the table)
    if ($id_categorie && !empty($titre) && !empty($telephone)) {
        try {
            $stmt = $pdo->prepare("INSERT INTO service (titre, discpition, prix, user_id, id_categorie, image, telephone) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$titre, $description, $prix, $user_id, $id_categorie, $image, $telephone]);
            // Redirect to service page after successful insertion
            header("Location: /PFE/services-user/services-user.php");
            exit;
        } catch (PDOException $e) {
            echo "<p style='color:red;'>Erreur : " . htmlspecialchars($e->getMessage()) . "</p>";
        }
    } else {
        echo "<p style='color:red;'>Veuillez remplir tous les champs obligatoires.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Souka.ma - Publier une annonce</title>
    <link rel="stylesheet" href="publier-anance-pestateair.css">
</head>
<body>
    <!-- Header -->
    <?php include '../include/nav.php'; ?>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Form Section -->
        <div class="form-section">
            <h1>Publier une annonce</h1>
            
            <form id="serviceForm" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" id="nom" name="nom" class="form-control" placeholder="Soukayna maghrab" required>
                </div>
                
                <div class="form-group">
                    <label for="categorie">Categorie</label>
                    <select id="categorie" name="categorie" class="form-control" required>
                        <option value="">Sélectionner une catégorie</option>
                        <?php
                        $stmt = $pdo->query("SELECT id_categorie, nom FROM categorie");
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo '<option value="' . htmlspecialchars($row['nom']) . '">' . htmlspecialchars($row['nom']) . '</option>';
                        }
                        ?>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="ville">Ville</label>
                    <select id="ville" name="ville" class="form-control" required>
                        <option value="">Sélectionner une ville</option>
                        <option value="casablanca">Casablanca</option>
                        <option value="rabat">Rabat</option>
                        <option value="marrakech">Marrakech</option>
                        <option value="fes">Fès</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" class="form-control" placeholder="écrire une message..."></textarea>
                </div>
                
                <div class="form-group">
                    <label for="photo">Photo de services</label>
                    <div class="file-input-wrapper">
                        <input type="file" id="photo" name="photo" class="file-input" accept="image/*">
                        <label for="photo" class="file-input-label">Choisir une fichier</label>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="telephone">Numéro de telephone</label>
                    <div class="phone-input">
                        <div class="phone-prefix">+212</div>
                        <input type="tel" id="telephone" name="telephone" class="form-control phone-number" placeholder="123456789" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="prix">prix</label>
                    <input type="number" id="prix" name="prix" class="form-control" placeholder="0" required>
                </div>
                
                <button type="submit" class="btn btn-validate">Valider</button>
            </form>
        </div>
        
        <!-- Illustration Section -->
        <div class="illustration">
            <div class="person-illustration">
                <div class="person">
                    <div class="person-hair"></div>
                    <div class="person-head"></div>
                    <div class="person-body"></div>
                    <div class="person-arm"></div>
                    <div class="person-legs"></div>
                    <div class="person-feet"></div>
                    <div class="person-feet"></div>
                </div>
            </div>
            
            <div class="phone-mockup">
                <div class="phone-notch"></div>
                <div class="phone-screen">
                    <div class="phone-content">
                        <div style="height: 20px; background: #e9ecef; border-radius: 4px; margin-bottom: 10px;"></div>
                        <div style="height: 15px; background: #e9ecef; border-radius: 4px; margin-bottom: 10px; width: 70%;"></div>
                        
                        <div class="notification-card">
                            <div class="notification-icon">
                                <div style="width: 20px; height: 20px; background: white; border-radius: 50%;"></div>
                            </div>
                            <div>
                                <div style="height: 4px; background: rgba(255,255,255,0.8); border-radius: 2px; margin-bottom: 4px;"></div>
                                <div style="height: 4px; background: rgba(255,255,255,0.8); border-radius: 2px; width: 60%;"></div>
                            </div>
                        </div>
                        
                        <div style="height: 15px; background: #e9ecef; border-radius: 4px; margin-bottom: 8px;"></div>
                        <div style="height: 15px; background: #e9ecef; border-radius: 4px; margin-bottom: 8px; width: 80%;"></div>
                        <div style="height: 15px; background: #e9ecef; border-radius: 4px; margin-bottom: 8px; width: 60%;"></div>
                        <div style="height: 15px; background: #e9ecef; border-radius: 4px; margin-bottom: 8px;"></div>
                        <div style="height: 15px; background: #e9ecef; border-radius: 4px; margin-bottom: 8px; width: 90%;"></div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <?php include '../include/footer.html'; ?>

    <script>
        // File input handling
        document.getElementById('photo').addEventListener('change', function(e) {
            const label = document.querySelector('.file-input-label');
            if (e.target.files.length > 0) {
                label.textContent = e.target.files[0].name;
            } else {
                label.textContent = 'Choisir une fichier';
            }
        });

        // Phone number formatting
        document.getElementById('telephone').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length > 9) {
                value = value.substring(0, 9);
            }
            e.target.value = value;
        });

        // Price formatting
        document.getElementById('prix').addEventListener('input', function(e) {
            let value = e.target.value.replace(/[^\d.]/g, '');
            e.target.value = value;
        });
    </script>
</body>
</html>