<?php
session_start();
require_once '/xampp/htdocs/PFE/include/conexion.php';

// Redirect if not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: /PFE/auth/seconnecter.php");
    exit;
}

// Check if service ID is provided
if (!isset($_GET['id_service'])) {
    header("Location: services-user.php");
    exit;
}

$id_service = $_GET['id_service'];

// Verify the service belongs to the user
$stmt = $pdo->prepare("SELECT titre FROM service WHERE id_service = ? AND user_id = ?");
$stmt->execute([$id_service, $_SESSION['user_id']]);
$service = $stmt->fetch(PDO::FETCH_ASSOC);

if ($service) {
    // Delete the service
    $stmt = $pdo->prepare("DELETE FROM service WHERE id_service = ? AND user_id = ?");
    $stmt->execute([$id_service, $_SESSION['user_id']]);

    // Set success message
    $_SESSION['service_supprime'] = ['titre' => $service['titre'], 'date' => date('Y-m-d H:i:s')];
}

header("Location: services-user.php");
exit;
?>