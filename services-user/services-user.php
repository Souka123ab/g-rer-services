<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="service-user.css">
    <link rel="stylesheet" href="/PFE/include/nav.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>

<?php require_once'../include/nav.html'; ?>
    <!-- Search Section -->
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

    <!-- Popular Categories -->
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

    <!-- Service Sections -->
    <main class="main-content">
        <div class="container">
            <!-- Plomberie Section -->
            <section class="service-section">
                <div class="section-header">
                    <h3>
                        <i class="fas fa-wrench" style="color: #4a90e2;"></i>
                        Nouvelles annonces de plomberies
                    </h3>
                    <a href="#" class="view-more">Plus d'annonces <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="services-grid">
                    <div class="service-card">
                        <div class="service-image">
                            <img src="/placeholder.svg?height=200&width=300" alt="Plomberie service">
                        </div>
                        <div class="service-content">
                            <div class="provider-info">
                                <img src="/placeholder.svg?height=40&width=40" alt="Provider" class="provider-avatar">
                                <div>
                                    <h4>Emma Koffi</h4>
                                    <div class="rating">
                                        <span class="stars">★★★★★</span>
                                        <span class="rating-count">4.8</span>
                                    </div>
                                </div>
                            </div>
                            <p class="service-description">Bonjour, je suis à la recherche d'un plombier professionnel urgent !</p>
                            <div class="service-footer">
                                <span class="price">1000 DH</span>
                                <div class="tags">
                                    <span class="tag tag-plomberie">Plomberie</span>
                                    <span class="tag tag-installation">Installation</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="service-card">
                        <div class="service-image">
                            <img src="/placeholder.svg?height=200&width=300" alt="Plomberie service">
                        </div>
                        <div class="service-content">
                            <div class="provider-info">
                                <img src="/placeholder.svg?height=40&width=40" alt="Provider" class="provider-avatar">
                                <div>
                                    <h4>Ahmed El Mansouri</h4>
                                    <div class="rating">
                                        <span class="stars">★★★★★</span>
                                        <span class="rating-count">4.9</span>
                                    </div>
                                </div>
                            </div>
                            <p class="service-description">Urgent, besoin d'un plombier pour une réparation immédiate !</p>
                            <div class="service-footer">
                                <span class="price">800 DH</span>
                                <div class="tags">
                                    <span class="tag tag-plomberie">Plomberie</span>
                                    <span class="tag tag-reparation">Réparation</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="service-card">
                        <div class="service-image">
                            <img src="/placeholder.svg?height=200&width=300" alt="Plomberie service">
                        </div>
                        <div class="service-content">
                            <div class="provider-info">
                                <img src="/placeholder.svg?height=40&width=40" alt="Provider" class="provider-avatar">
                                <div>
                                    <h4>Fatima Zahra</h4>
                                    <div class="rating">
                                        <span class="stars">★★★★★</span>
                                        <span class="rating-count">4.7</span>
                                    </div>
                                </div>
                            </div>
                            <p class="service-description">Je recherche un plombier pour l'entretien de mes installations sanitaires.</p>
                            <div class="service-footer">
                                <span class="price">650 DH</span>
                                <div class="tags">
                                    <span class="tag tag-plomberie">Plomberie</span>
                                    <span class="tag tag-entretien">Entretien</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="service-card">
                        <div class="service-image">
                            <img src="/placeholder.svg?height=200&width=300" alt="Plomberie service">
                        </div>
                        <div class="service-content">
                            <div class="provider-info">
                                <img src="/placeholder.svg?height=40&width=40" alt="Provider" class="provider-avatar">
                                <div>
                                    <h4>Youssef Benali</h4>
                                    <div class="rating">
                                        <span class="stars">★★★★★</span>
                                        <span class="rating-count">4.6</span>
                                    </div>
                                </div>
                            </div>
                            <p class="service-description">Urgent, besoin d'un plombier pour une fuite à réparer demain !</p>
                            <div class="service-footer">
                                <span class="price">1200 DH</span>
                                <div class="tags">
                                    <span class="tag tag-plomberie">Plomberie</span>
                                    <span class="tag tag-urgent">Urgent</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Jardinage Section -->
            <section class="service-section">
                <div class="section-header">
                    <h3>
                        <i class="fas fa-seedling" style="color: #4caf50;"></i>
                        Nouvelles annonces de Jardinage
                    </h3>
                    <a href="#" class="view-more">Plus d'annonces <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="services-grid">
                    <div class="service-card">
                        <div class="service-image">
                            <img src="/placeholder.svg?height=200&width=300" alt="Jardinage service">
                        </div>
                        <div class="service-content">
                            <div class="provider-info">
                                <img src="/placeholder.svg?height=40&width=40" alt="Provider" class="provider-avatar">
                                <div>
                                    <h4>Emma Koffi</h4>
                                    <div class="rating">
                                        <span class="stars">★★★★★</span>
                                        <span class="rating-count">4.8</span>
                                    </div>
                                </div>
                            </div>
                            <p class="service-description">Bonjour, je suis à la recherche d'un jardinier professionnel urgent !</p>
                            <div class="service-footer">
                                <span class="price">1000 DH</span>
                                <div class="tags">
                                    <span class="tag tag-jardinage">Jardinage</span>
                                    <span class="tag tag-entretien">Entretien</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="service-card">
                        <div class="service-image">
                            <img src="/placeholder.svg?height=200&width=300" alt="Jardinage service">
                        </div>
                        <div class="service-content">
                            <div class="provider-info">
                                <img src="/placeholder.svg?height=40&width=40" alt="Provider" class="provider-avatar">
                                <div>
                                    <h4>Ahmed El Mansouri</h4>
                                    <div class="rating">
                                        <span class="stars">★★★★★</span>
                                        <span class="rating-count">4.9</span>
                                    </div>
                                </div>
                            </div>
                            <p class="service-description">Urgent, besoin d'un jardinier pour une réparation immédiate !</p>
                            <div class="service-footer">
                                <span class="price">800 DH</span>
                                <div class="tags">
                                    <span class="tag tag-jardinage">Jardinage</span>
                                    <span class="tag tag-plantation">Plantation</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="service-card">
                        <div class="service-image">
                            <img src="/placeholder.svg?height=200&width=300" alt="Jardinage service">
                        </div>
                        <div class="service-content">
                            <div class="provider-info">
                                <img src="/placeholder.svg?height=40&width=40" alt="Provider" class="provider-avatar">
                                <div>
                                    <h4>Fatima Zahra</h4>
                                    <div class="rating">
                                        <span class="stars">★★★★★</span>
                                        <span class="rating-count">4.7</span>
                                    </div>
                                </div>
                            </div>
                            <p class="service-description">Je recherche un jardinier pour l'entretien de mes installations sanitaires.</p>
                            <div class="service-footer">
                                <span class="price">650 DH</span>
                                <div class="tags">
                                    <span class="tag tag-jardinage">Jardinage</span>
                                    <span class="tag tag-entretien">Entretien</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="service-card">
                        <div class="service-image">
                            <img src="/placeholder.svg?height=200&width=300" alt="Jardinage service">
                        </div>
                        <div class="service-content">
                            <div class="provider-info">
                                <img src="/placeholder.svg?height=40&width=40" alt="Provider" class="provider-avatar">
                                <div>
                                    <h4>Youssef Benali</h4>
                                    <div class="rating">
                                        <span class="stars">★★★★★</span>
                                        <span class="rating-count">4.6</span>
                                    </div>
                                </div>
                            </div>
                            <p class="service-description">Urgent, besoin d'un jardinier pour une taille à réparer demain !</p>
                            <div class="service-footer">
                                <span class="price">1200 DH</span>
                                <div class="tags">
                                    <span class="tag tag-jardinage">Jardinage</span>
                                    <span class="tag tag-taille">Taille</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Mécanique Section -->
            <section class="service-section">
                <div class="section-header">
                    <h3>
                        <i class="fas fa-cog" style="color: #ff9800;"></i>
                        Nouvelles annonces de Mécanique
                    </h3>
                    <a href="#" class="view-more">Plus d'annonces <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="services-grid">
                    <div class="service-card">
                        <div class="service-image">
                            <img src="/placeholder.svg?height=200&width=300" alt="Mécanique service">
                        </div>
                        <div class="service-content">
                            <div class="provider-info">
                                <img src="/placeholder.svg?height=40&width=40" alt="Provider" class="provider-avatar">
                                <div>
                                    <h4>Emma Koffi</h4>
                                    <div class="rating">
                                        <span class="stars">★★★★★</span>
                                        <span class="rating-count">4.8</span>
                                    </div>
                                </div>
                            </div>
                            <p class="service-description">Bonjour, je suis à la recherche d'un mécanicien professionnel urgent !</p>
                            <div class="service-footer">
                                <span class="price">1000 DH</span>
                                <div class="tags">
                                    <span class="tag tag-mecanique">Mécanique</span>
                                    <span class="tag tag-reparation">Réparation</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="service-card">
                        <div class="service-image">
                            <img src="/placeholder.svg?height=200&width=300" alt="Mécanique service">
                        </div>
                        <div class="service-content">
                            <div class="provider-info">
                                <img src="/placeholder.svg?height=40&width=40" alt="Provider" class="provider-avatar">
                                <div>
                                    <h4>Ahmed El Mansouri</h4>
                                    <div class="rating">
                                        <span class="stars">★★★★★</span>
                                        <span class="rating-count">4.9</span>
                                    </div>
                                </div>
                            </div>
                            <p class="service-description">Urgent, besoin d'un mécanicien pour une réparation immédiate !</p>
                            <div class="service-footer">
                                <span class="price">800 DH</span>
                                <div class="tags">
                                    <span class="tag tag-mecanique">Mécanique</span>
                                    <span class="tag tag-diagnostic">Diagnostic</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="service-card">
                        <div class="service-image">
                            <img src="/placeholder.svg?height=200&width=300" alt="Mécanique service">
                        </div>
                        <div class="service-content">
                            <div class="provider-info">
                                <img src="/placeholder.svg?height=40&width=40" alt="Provider" class="provider-avatar">
                                <div>
                                    <h4>Fatima Zahra</h4>
                                    <div class="rating">
                                        <span class="stars">★★★★★</span>
                                        <span class="rating-count">4.7</span>
                                    </div>
                                </div>
                            </div>
                            <p class="service-description">Je recherche un mécanicien pour l'entretien de mes installations sanitaires.</p>
                            <div class="service-footer">
                                <span class="price">600 DH</span>
                                <div class="tags">
                                    <span class="tag tag-mecanique">Mécanique</span>
                                    <span class="tag tag-entretien">Entretien</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="service-card">
                        <div class="service-image">
                            <img src="/placeholder.svg?height=200&width=300" alt="Mécanique service">
                        </div>
                        <div class="service-content">
                            <div class="provider-info">
                                <img src="/placeholder.svg?height=40&width=40" alt="Provider" class="provider-avatar">
                                <div>
                                    <h4>Youssef Benali</h4>
                                    <div class="rating">
                                        <span class="stars">★★★★★</span>
                                        <span class="rating-count">4.6</span>
                                    </div>
                                </div>
                            </div>
                            <p class="service-description">Urgent, besoin d'un mécanicien pour une fuite à réparer demain !</p>
                            <div class="service-footer">
                                <span class="price">1200 DH</span>
                                <div class="tags">
                                    <span class="tag tag-mecanique">Mécanique</span>
                                    <span class="tag tag-urgent">Urgent</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Ménage Section -->
            <section class="service-section">
                <div class="section-header">
                    <h3>
                        <i class="fas fa-broom" style="color: #e91e63;"></i>
                        Nouvelles annonces de Ménage
                    </h3>
                    <a href="#" class="view-more">Plus d'annonces <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="services-grid">
                    <div class="service-card">
                        <div class="service-image">
                            <img src="/placeholder.svg?height=200&width=300" alt="Ménage service">
                        </div>
                        <div class="service-content">
                            <div class="provider-info">
                                <img src="/placeholder.svg?height=40&width=40" alt="Provider" class="provider-avatar">
                                <div>
                                    <h4>Emma Koffi</h4>
                                    <div class="rating">
                                        <span class="stars">★★★★★</span>
                                        <span class="rating-count">4.8</span>
                                    </div>
                                </div>
                            </div>
                            <p class="service-description">Bonjour, je suis à la recherche d'un plombier professionnel urgent !</p>
                            <div class="service-footer">
                                <span class="price">1000 DH</span>
                                <div class="tags">
                                    <span class="tag tag-menage">Ménage</span>
                                    <span class="tag tag-nettoyage">Nettoyage</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="service-card">
                        <div class="service-image">
                            <img src="/placeholder.svg?height=200&width=300" alt="Ménage service">
                        </div>
                        <div class="service-content">
                            <div class="provider-info">
                                <img src="/placeholder.svg?height=40&width=40" alt="Provider" class="provider-avatar">
                                <div>
                                    <h4>Ahmed El Mansouri</h4>
                                    <div class="rating">
                                        <span class="stars">★★★★★</span>
                                        <span class="rating-count">4.9</span>
                                    </div>
                                </div>
                            </div>
                            <p class="service-description">Urgent, besoin d'un plombier pour une réparation immédiate !</p>
                            <div class="service-footer">
                                <span class="price">800 DH</span>
                                <div class="tags">
                                    <span class="tag tag-menage">Ménage</span>
                                    <span class="tag tag-repassage">Repassage</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="service-card">
                        <div class="service-image">
                            <img src="/placeholder.svg?height=200&width=300" alt="Ménage service">
                        </div>
                        <div class="service-content">
                            <div class="provider-info">
                                <img src="/placeholder.svg?height=40&width=40" alt="Provider" class="provider-avatar">
                                <div>
                                    <h4>Fatima Zahra</h4>
                                    <div class="rating">
                                        <span class="stars">★★★★★</span>
                                        <span class="rating-count">4.7</span>
                                    </div>
                                </div>
                            </div>
                            <p class="service-description">Je recherche un plombier pour l'entretien de mes installations sanitaires.</p>
                            <div class="service-footer">
                                <span class="price">600 DH</span>
                                <div class="tags">
                                    <span class="tag tag-menage">Ménage</span>
                                    <span class="tag tag-organisation">Organisation</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="service-card">
                        <div class="service-image">
                            <img src="/placeholder.svg?height=200&width=300" alt="Ménage service">
                        </div>
                        <div class="service-content">
                            <div class="provider-info">
                                <img src="/placeholder.svg?height=40&width=40" alt="Provider" class="provider-avatar">
                                <div>
                                    <h4>Youssef Benali</h4>
                                    <div class="rating">
                                        <span class="stars">★★★★★</span>
                                        <span class="rating-count">4.6</span>
                                    </div>
                                </div>
                            </div>
                            <p class="service-description">Urgent, besoin d'un plombier pour une fuite à réparer demain !</p>
                            <div class="service-footer">
                                <span class="price">1200 DH</span>
                                <div class="tags">
                                    <span class="tag tag-menage">Ménage</span>
                                    <span class="tag tag-desinfection">Désinfection</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Electricité Section -->
            <section class="service-section">
                <div class="section-header">
                    <h3>
                        <i class="fas fa-bolt" style="color: #9c27b0;"></i>
                        Nouvelles annonces de Electricité
                    </h3>
                    <a href="#" class="view-more">Plus d'annonces <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="services-grid">
                    <div class="service-card">
                        <div class="service-image">
                            <img src="/placeholder.svg?height=200&width=300" alt="Electricité service">
                        </div>
                        <div class="service-content">
                            <div class="provider-info">
                                <img src="/placeholder.svg?height=40&width=40" alt="Provider" class="provider-avatar">
                                <div>
                                    <h4>Emma Koffi</h4>
                                    <div class="rating">
                                        <span class="stars">★★★★★</span>
                                        <span class="rating-count">4.8</span>
                                    </div>
                                </div>
                            </div>
                            <p class="service-description">Bonjour, je suis à la recherche d'un plombier professionnel urgent !</p>
                            <div class="service-footer">
                                <span class="price">1000 DH</span>
                                <div class="tags">
                                    <span class="tag tag-electricite">Electricité</span>
                                    <span class="tag tag-installation">Installation</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="service-card">
                        <div class="service-image">
                            <img src="/placeholder.svg?height=200&width=300" alt="Electricité service">
                        </div>
                        <div class="service-content">
                            <div class="provider-info">
                                <img src="/placeholder.svg?height=40&width=40" alt="Provider" class="provider-avatar">
                                <div>
                                    <h4>Ahmed El Mansouri</h4>
                                    <div class="rating">
                                        <span class="stars">★★★★★</span>
                                        <span class="rating-count">4.9</span>
                                    </div>
                                </div>
                            </div>
                            <p class="service-description">Urgent, besoin d'un plombier pour une réparation immédiate !</p>
                            <div class="service-footer">
                                <span class="price">800 DH</span>
                                <div class="tags">
                                    <span class="tag tag-electricite">Electricité</span>
                                    <span class="tag tag-diagnostic">Diagnostic</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="service-card">
                        <div class="service-image">
                            <img src="/placeholder.svg?height=200&width=300" alt="Electricité service">
                        </div>
                        <div class="service-content">
                            <div class="provider-info">
                                <img src="/placeholder.svg?height=40&width=40" alt="Provider" class="provider-avatar">
                                <div>
                                    <h4>Fatima Zahra</h4>
                                    <div class="rating">
                                        <span class="stars">★★★★★</span>
                                        <span class="rating-count">4.7</span>
                                    </div>
                                </div>
                            </div>
                            <p class="service-description">Je recherche un plombier pour l'entretien de mes installations sanitaires.</p>
                            <div class="service-footer">
                                <span class="price">800 DH</span>
                                <div class="tags">
                                    <span class="tag tag-electricite">Electricité</span>
                                    <span class="tag tag-reparation">Réparation</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="service-card">
                        <div class="service-image">
                            <img src="/placeholder.svg?height=200&width=300" alt="Electricité service">
                        </div>
                        <div class="service-content">
                            <div class="provider-info">
                                <img src="/placeholder.svg?height=40&width=40" alt="Provider" class="provider-avatar">
                                <div>
                                    <h4>Youssef Benali</h4>
                                    <div class="rating">
                                        <span class="stars">★★★★★</span>
                                        <span class="rating-count">4.6</span>
                                    </div>
                                </div>
                            </div>
                            <p class="service-description">Urgent, besoin d'un plombier pour une fuite à réparer demain !</p>
                            <div class="service-footer">
                                <span class="price">800 DH</span>
                                <div class="tags">
                                    <span class="tag tag-electricite">Electricité</span>
                                    <span class="tag tag-maintenance">Maintenance</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-links">
                    <a href="#">Accueil</a>
                    <a href="#">Services</a>
                    <a href="#">Demander un Service</a>
                    <a href="#">Contact</a>
                    <a href="#">Mon Compte</a>
                </div>
                <div class="social-links">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>
            <div class="footer-bottom">
                <p>Aquila Pro | Plateforme de Services au Maroc</p>
            </div>
        </div>
    </footer>

    <script src="services-user.js"></script>
</body>
</html>