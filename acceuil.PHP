<<<<<<< HEAD
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
    
    <!-- <header class="header">
  <div class="container">
    <div class="header-content">
       Navigation with Logo -->
      <!-- <nav class="nav">
        <div class="logo">
          <img src="image/Capture d'écran 2025-06-16 131020.png" alt="Souka.ma Logo" class="logo-img">
        </div>
        <a href="#" class="nav-link active">Accueil</a>
        <a href="#" class="nav-link">Services</a>
        <a href="#" class="nav-link">Demander Un Service</a>
        <a href="#" class="nav-link">Contact</a>
        <a href="#" class="nav-link">Mon Compte</a>
      </nav>  --> 

     
      <!-- <div class="header-actions">
        <button class="notification-btn">
          <i class="fas fa-bell"></i>
        </button>
        <button class="btn btn-primary">
            <i class="fas fa-plus"></i>
          Publier une annonce
        </button>
        <button class="btn btn-secondary">
          <i class="fas fa-heart"></i>
          Favorit
        </button>
      </div>
    </div>
  </div>
</header> -->

<?php include 'include/nav.html'; ?>
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
<div class="container-b">
    <div class="group-1">
        <div class="v1">
            <h4>Nouveaux professionnels </h4>
        </div>
    <div class="v2">
        
        <div class="v3">
            <!-- <a href="#" class="view-all-link"><i class="fas fa-arrow-left"></i></a>
            <a href="#" class="view-all-link"><i class="fas fa-arrow-right"></i></a> -->
        </div>
    </div>
    
    </div>
    
        <div class="services-grid">
            <!-- Service Card 1 -->
            <div class="service-card">
                <div class="service-image">
                    <img src="image/pexels-amina-filkins-5413713.jpg" alt="Sanae Karim working" />
                </div>
                <div class="service-content">
                    <div class="profile-header">
                        <div class="profile-info">
                            <div class="avatar">
                                <img src="image/Télécharger_Icône_de_caractère_avatar_belle_femme_latine_gratuitement-removebg-preview.png?height=40&width=40" alt="Sanae Karim" />
                            </div>
                            <div class="profile-details">
                                <h3 class="profile-name">Sanae Karim</h3>
                                <div class="profile-meta">
                                    <span class="time"><i class="fa-solid fa-clock-rotate-left"></i>il y a 5 minutes</span>
                                    <span class="location"><i class="fa-solid fa-location-dot"></i>Casablanca</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="service-description">
                        Bonjour, je suis à la recherche d'un plombier professionnel urgent !
                    </p>
                    <div class="service-footer">
                        <div class="price-section">
                            <span class="price-label">Mon offre</span>
                            <span class="price">1000 DH</span>
                        </div>
                        <button class="favorite-btn" onclick="toggleFavorite(this)">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Service Card 2 -->
            <div class="service-card">
                <div class="service-image">
                    <img src="image/pexels-tima-miroshnichenko-6195273.jpg?height=200&width=350" alt="Ahmed El Mansouri working" />
                </div>
                <div class="service-content">
                    <div class="profile-header">
                        <div class="profile-info">
                            <div class="avatar">
                                <img src="image/Avatar_Homme_-_Photos___téléchargez_gratuitement_des_images_de_haute_qualité___Freepik-removebg-preview.png?height=40&width=40" alt="Ahmed El Mansouri" />
                            </div>
                            <div class="profile-details">
                                <h3 class="profile-name">Ahmed El Mansouri</h3>
                                <div class="profile-meta">
                                    <span class="time"><i class="fa-solid fa-clock-rotate-left"></i>il y a 10 minutes</span>
                                    <span class="location"><i class="fa-solid fa-location-dot"></i>Rabat</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="service-description">
                        Urgent, besoin d'un plombier pour une réparation immédiate !
                    </p>
                    <div class="service-footer">
                        <div class="price-section">
                            <span class="price-label">Mon offre</span>
                            <span class="price">800 DH</span>
                        </div>
                        <button class="favorite-btn" onclick="toggleFavorite(this)">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Service Card 3 -->
            <div class="service-card">
                <div class="service-image">
                    <img src="image/istockphoto-1406498016-612x612.jpg?height=200&width=350" alt="Fatima Zahra working" />
                </div>
                <div class="service-content">
                    <div class="profile-header">
                        <div class="profile-info">
                            <div class="avatar">
                               <img src="image/Télécharger_Icône_de_caractère_avatar_belle_femme_latine_gratuitement-removebg-preview.png?height=40&width=40" alt="Sanae Karim" />
                            </div>
                            <div class="profile-details">
                                <h3 class="profile-name">Fatima Zahra</h3>
                                <div class="profile-meta">
                                    <span class="time"><i class="fa-solid fa-clock-rotate-left"></i>il y a 15 minutes</span>
                                    <span class="location"><i class="fa-solid fa-location-dot"></i>Marrakech</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="service-description">
                        Je recherche un plombier pour l'entretien de mes installations sanitaires.
                    </p>
                    <div class="service-footer">
                        <div class="price-section">
                            <span class="price-label">Mon offre</span>
                            <span class="price">600 DH</span>
                        </div>
                        <button class="favorite-btn" onclick="toggleFavorite(this)">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Service Card 4 -->
            <div class="service-card">
                <div class="service-image">
                    <img src="image/mechanic-with-arms-crossed-holding-spanner.jpg?height=200&width=350" alt="Youssef Benali working" />
                </div>
                <div class="service-content">
                    <div class="profile-header">
                        <div class="profile-info">
                            <div class="avatar">
                                 <img src="image/Avatar_Homme_-_Photos___téléchargez_gratuitement_des_images_de_haute_qualité___Freepik-removebg-preview.png?height=40&width=40" alt="Ahmed El Mansouri" />
                            </div>
                            <div class="profile-details">
                                <h3 class="profile-name">Youssef Benali</h3>
                                <div class="profile-meta">
                                    <span class="time"><i class="fa-solid fa-clock-rotate-left"></i>il y a 20 minutes</span>
                                    <span class="location"><i class="fa-solid fa-location-dot"></i>Tanger</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="service-description">
                        Urgent, besoin d'un plombier pour une fuite à réparer demain !
                    </p>
                    <div class="service-footer">
                        <div class="price-section">
                            <span class="price-label">Mon offre</span>
                            <span class="price">1200 DH</span>
                        </div>
                        <button class="favorite-btn" onclick="toggleFavorite(this)">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <div class="container">
        <h1 class="title">Prestataires près de chez vous</h1>
        
        <div class="providers-grid">
            <!-- Julien Martin - Plombier -->
            <div class="provider-card">
                <div class="profile-image">
                    <img src="image/img 1.png?height=80&width=80" alt="Julien Martin" class="avatar">
                </div>
                <div class="service-badge plombier">Plombier</div>
                <h3 class="provider-name">Julien Martin</h3>
                <div class="rating">
                    <div class="stars">
                        <span class="star filled">★</span>
                        <span class="star filled">★</span>
                        <span class="star filled">★</span>
                        <span class="star filled">★</span>
                        <span class="star empty">★</span>
                    </div>
                    <span class="rating-text">4.0 (34 avis)</span>
                </div>
                <div class="location">
                    <svg class="location-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                        <circle cx="12" cy="10" r="3"></circle>
                    </svg>
                    <span>Lyon</span>
                </div>
                <button class="service-button plombier-btn">Demander un service</button>
            </div>

            <!-- Sophie Leroy - Jardinage -->
            <div class="provider-card">
                <div class="profile-image">
                    <img src="image/img 2.png?height=80&width=80" alt="Sophie Leroy" class="avatar">
                </div>
                <div class="service-badge jardinage">Jardinage</div>
                <h3 class="provider-name">Sophie Leroy</h3>
                <div class="rating">
                    <div class="stars">
                        <span class="star filled">★</span>
                        <span class="star filled">★</span>
                        <span class="star filled">★</span>
                        <span class="star filled">★</span>
                        <span class="star filled">★</span>
                    </div>
                    <span class="rating-text">5.0 (21 avis)</span>
                </div>
                <div class="location">
                    <svg class="location-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                        <circle cx="12" cy="10" r="3"></circle>
                    </svg>
                    <span>Montpellier</span>
                </div>
                <button class="service-button jardinage-btn">Demander un service</button>
            </div>

            <!-- Ahmed Benali - Mécanique -->
            <div class="provider-card">
                <div class="profile-image">
                    <img src="image/img 3.png?height=80&width=80" alt="Ahmed Benali" class="avatar">
                </div>
                <div class="service-badge mecanique">Mécanique</div>
                <h3 class="provider-name">Ahmed Benali</h3>
                <div class="rating">
                    <div class="stars">
                        <span class="star filled">★</span>
                        <span class="star filled">★</span>
                        <span class="star filled">★</span>
                        <span class="star half">★</span>
                        <span class="star empty">★</span>
                    </div>
                    <span class="rating-text">3.5 (17 avis)</span>
                </div>
                <div class="location">
                    <svg class="location-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                        <circle cx="12" cy="10" r="3"></circle>
                    </svg>
                    <span>Paris</span>
                </div>
                <button class="service-button mecanique-btn">Demander un service</button>
            </div>

            <!-- Claire Dubois - Entretien -->
            <div class="provider-card">
                <div class="profile-image">
                    <img src="image/img 4.png?height=80&width=80" alt="Claire Dubois" class="avatar">
                </div>
                <div class="service-badge entretien">Entretien</div>
                <h3 class="provider-name">Claire Dubois</h3>
                <div class="rating">
                    <div class="stars">
                        <span class="star filled">★</span>
                        <span class="star filled">★</span>
                        <span class="star filled">★</span>
                        <span class="star filled">★</span>
                        <span class="star empty">★</span>
                    </div>
                    <span class="rating-text">4.0 (12 avis)</span>
                </div>
                <div class="location">
                    <svg class="location-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                        <circle cx="12" cy="10" r="3"></circle>
                    </svg>
                    <span>Bordeaux</span>
                </div>
                <button class="service-button entretien-btn">Demander un service</button>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-left">
                    <div class="footer-logo">
                        <div class="logo-img">
                          
                           <img src="image/Capture d'écran 2025-06-16 131020.png" alt="souka" srcset="">
                    </div>
                </div>

                <div class="footer-center">
                    <nav class="footer-nav">
                        <a href="#" class="footer-link">Accueil</a>
                        <a href="#" class="footer-link">Services</a>
                        <a href="#" class="footer-link">Demander Un Service</a>
                        <a href="#" class="footer-link">Contact</a>
                        <a href="#" class="footer-link">Mon Compte</a>
                    </nav>
                </div>

                <div class="footer-right">
                    <div class="social-links">
                        <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p class="copyright">© 2024 Souka.ma Tous droits réservés</p>
                <p class="legal-text">Mentions légales | Politique de confidentialité</p>
            </div>
        </div>
    </footer>

    <script src="script.js"></script>
</body>
</html>
=======
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
    <!-- Header -->
    <header class="header">
        <div class="container">
            <div class="header-content">
                <!-- Logo -->
                <div class="logo">
                    <div class="logo-icon">
                        <i class="fas fa-circle"></i>
                    </div>
                    <span class="logo-text">Souka<span class="logo-domain">.ma</span></span>
                </div>

                <!-- Navigation -->
                <nav class="nav">
                    <a href="#" class="nav-link active">Accueil</a>
                    <a href="#" class="nav-link">Services</a>
                    <a href="#" class="nav-link">Demander Un Service</a>
                    <a href="#" class="nav-link">Contact</a>
                    <a href="#" class="nav-link">Mon Compte</a>
                </nav>

                <!-- Header Actions -->
                <div class="header-actions">
                    <button class="notification-btn">
                        <i class="fas fa-bell"></i>
                    </button>
                    <button class="btn btn-primary">
                        <i class="fas fa-plus"></i>
                        Publier une annonce
                    </button>
                    <button class="btn btn-secondary">
                        <i class="fas fa-heart"></i>
                        Favorit
                    </button>
                </div>
            </div>
        </div>
    </header>

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
                        <img src="/images/hero-illustration.png" alt="Service Platform Illustration" class="illustration-img">
                    </div>
                </div>
            </div>
        </div>
    </section>
<div class="container-b">
        <div class="services-grid">
            <!-- Service Card 1 -->
            <div class="service-card">
                <div class="service-image">
                    <img src="/placeholder.svg?height=200&width=350" alt="Sanae Karim working" />
                </div>
                <div class="service-content">
                    <div class="profile-header">
                        <div class="profile-info">
                            <div class="avatar">
                                <img src="/placeholder.svg?height=40&width=40" alt="Sanae Karim" />
                            </div>
                            <div class="profile-details">
                                <h3 class="profile-name">Sanae Karim</h3>
                                <div class="profile-meta">
                                    <span class="time">il y a 5 minutes</span>
                                    <span class="location">Casablanca</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="service-description">
                        Bonjour, je suis à la recherche d'un plombier professionnel urgent !
                    </p>
                    <div class="service-footer">
                        <div class="price-section">
                            <span class="price-label">Mon offre</span>
                            <span class="price">1000 DH</span>
                        </div>
                        <button class="favorite-btn" onclick="toggleFavorite(this)">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Service Card 2 -->
            <div class="service-card">
                <div class="service-image">
                    <img src="/placeholder.svg?height=200&width=350" alt="Ahmed El Mansouri working" />
                </div>
                <div class="service-content">
                    <div class="profile-header">
                        <div class="profile-info">
                            <div class="avatar">
                                <img src="/placeholder.svg?height=40&width=40" alt="Ahmed El Mansouri" />
                            </div>
                            <div class="profile-details">
                                <h3 class="profile-name">Ahmed El Mansouri</h3>
                                <div class="profile-meta">
                                    <span class="time">il y a 10 minutes</span>
                                    <span class="location">Rabat</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="service-description">
                        Urgent, besoin d'un plombier pour une réparation immédiate !
                    </p>
                    <div class="service-footer">
                        <div class="price-section">
                            <span class="price-label">Mon offre</span>
                            <span class="price">800 DH</span>
                        </div>
                        <button class="favorite-btn" onclick="toggleFavorite(this)">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Service Card 3 -->
            <div class="service-card">
                <div class="service-image">
                    <img src="/placeholder.svg?height=200&width=350" alt="Fatima Zahra working" />
                </div>
                <div class="service-content">
                    <div class="profile-header">
                        <div class="profile-info">
                            <div class="avatar">
                                <img src="/placeholder.svg?height=40&width=40" alt="Fatima Zahra" />
                            </div>
                            <div class="profile-details">
                                <h3 class="profile-name">Fatima Zahra</h3>
                                <div class="profile-meta">
                                    <span class="time">il y a 15 minutes</span>
                                    <span class="location">Marrakech</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="service-description">
                        Je recherche un plombier pour l'entretien de mes installations sanitaires.
                    </p>
                    <div class="service-footer">
                        <div class="price-section">
                            <span class="price-label">Mon offre</span>
                            <span class="price">600 DH</span>
                        </div>
                        <button class="favorite-btn" onclick="toggleFavorite(this)">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Service Card 4 -->
            <div class="service-card">
                <div class="service-image">
                    <img src="/placeholder.svg?height=200&width=350" alt="Youssef Benali working" />
                </div>
                <div class="service-content">
                    <div class="profile-header">
                        <div class="profile-info">
                            <div class="avatar">
                                <img src="/placeholder.svg?height=40&width=40" alt="Youssef Benali" />
                            </div>
                            <div class="profile-details">
                                <h3 class="profile-name">Youssef Benali</h3>
                                <div class="profile-meta">
                                    <span class="time">il y a 20 minutes</span>
                                    <span class="location">Tanger</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="service-description">
                        Urgent, besoin d'un plombier pour une fuite à réparer demain !
                    </p>
                    <div class="service-footer">
                        <div class="price-section">
                            <span class="price-label">Mon offre</span>
                            <span class="price">1200 DH</span>
                        </div>
                        <button class="favorite-btn" onclick="toggleFavorite(this)">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <div class="container">
        <h1 class="title">Prestataires près de chez vous</h1>
        
        <div class="providers-grid">
            <!-- Julien Martin - Plombier -->
            <div class="provider-card">
                <div class="profile-image">
                    <img src="/placeholder.svg?height=80&width=80" alt="Julien Martin" class="avatar">
                </div>
                <div class="service-badge plombier">Plombier</div>
                <h3 class="provider-name">Julien Martin</h3>
                <div class="rating">
                    <div class="stars">
                        <span class="star filled">★</span>
                        <span class="star filled">★</span>
                        <span class="star filled">★</span>
                        <span class="star filled">★</span>
                        <span class="star empty">★</span>
                    </div>
                    <span class="rating-text">4.0 (34 avis)</span>
                </div>
                <div class="location">
                    <svg class="location-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                        <circle cx="12" cy="10" r="3"></circle>
                    </svg>
                    <span>Lyon</span>
                </div>
                <button class="service-button plombier-btn">Demander un service</button>
            </div>

            <!-- Sophie Leroy - Jardinage -->
            <div class="provider-card">
                <div class="profile-image">
                    <img src="/placeholder.svg?height=80&width=80" alt="Sophie Leroy" class="avatar">
                </div>
                <div class="service-badge jardinage">Jardinage</div>
                <h3 class="provider-name">Sophie Leroy</h3>
                <div class="rating">
                    <div class="stars">
                        <span class="star filled">★</span>
                        <span class="star filled">★</span>
                        <span class="star filled">★</span>
                        <span class="star filled">★</span>
                        <span class="star filled">★</span>
                    </div>
                    <span class="rating-text">5.0 (21 avis)</span>
                </div>
                <div class="location">
                    <svg class="location-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                        <circle cx="12" cy="10" r="3"></circle>
                    </svg>
                    <span>Montpellier</span>
                </div>
                <button class="service-button jardinage-btn">Demander un service</button>
            </div>

            <!-- Ahmed Benali - Mécanique -->
            <div class="provider-card">
                <div class="profile-image">
                    <img src="/placeholder.svg?height=80&width=80" alt="Ahmed Benali" class="avatar">
                </div>
                <div class="service-badge mecanique">Mécanique</div>
                <h3 class="provider-name">Ahmed Benali</h3>
                <div class="rating">
                    <div class="stars">
                        <span class="star filled">★</span>
                        <span class="star filled">★</span>
                        <span class="star filled">★</span>
                        <span class="star half">★</span>
                        <span class="star empty">★</span>
                    </div>
                    <span class="rating-text">3.5 (17 avis)</span>
                </div>
                <div class="location">
                    <svg class="location-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                        <circle cx="12" cy="10" r="3"></circle>
                    </svg>
                    <span>Paris</span>
                </div>
                <button class="service-button mecanique-btn">Demander un service</button>
            </div>

            <!-- Claire Dubois - Entretien -->
            <div class="provider-card">
                <div class="profile-image">
                    <img src="/placeholder.svg?height=80&width=80" alt="Claire Dubois" class="avatar">
                </div>
                <div class="service-badge entretien">Entretien</div>
                <h3 class="provider-name">Claire Dubois</h3>
                <div class="rating">
                    <div class="stars">
                        <span class="star filled">★</span>
                        <span class="star filled">★</span>
                        <span class="star filled">★</span>
                        <span class="star filled">★</span>
                        <span class="star empty">★</span>
                    </div>
                    <span class="rating-text">4.0 (12 avis)</span>
                </div>
                <div class="location">
                    <svg class="location-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                        <circle cx="12" cy="10" r="3"></circle>
                    </svg>
                    <span>Bordeaux</span>
                </div>
                <button class="service-button entretien-btn">Demander un service</button>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-left">
                    <div class="footer-logo">
                        <div class="logo-icon">
                            <i class="fas fa-circle"></i>
                        </div>
                        <span class="logo-text">Souka<span class="logo-domain">.ma</span></span>
                    </div>
                </div>

                <div class="footer-center">
                    <nav class="footer-nav">
                        <a href="#" class="footer-link">Accueil</a>
                        <a href="#" class="footer-link">Services</a>
                        <a href="#" class="footer-link">Demander Un Service</a>
                        <a href="#" class="footer-link">Contact</a>
                        <a href="#" class="footer-link">Mon Compte</a>
                    </nav>
                </div>

                <div class="footer-right">
                    <div class="social-links">
                        <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p class="copyright">© 2024 Souka.ma Tous droits réservés</p>
                <p class="legal-text">Mentions légales | Politique de confidentialité</p>
            </div>
        </div>
    </footer>

    <script src="script.js"></script>
</body>
</html>
>>>>>>> b7ad28f05387826d8eb4e78252b06a0c75125db7
