// Search functionality
document.addEventListener('DOMContentLoaded', function() {
    const searchBtn = document.querySelector('.btn-search');
    const searchInput = document.querySelector('.search-input input');
    const locationInput = document.querySelector('.location-input input');
    
    // Search button click handler
    searchBtn.addEventListener('click', function() {
        const searchTerm = searchInput.value.trim();
        const location = locationInput.value.trim();
        
        if (searchTerm || location) {
            performSearch(searchTerm, location);
        }
    });
    
    // Enter key handler for search inputs
    [searchInput, locationInput].forEach(input => {
        input.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                const searchTerm = searchInput.value.trim();
                const location = locationInput.value.trim();
                performSearch(searchTerm, location);
            }
        });
    });
    
    // Category click handlers
    const categoryItems = document.querySelectorAll('.category-item');
    categoryItems.forEach(item => {
        item.addEventListener('click', function() {
            const categoryName = this.querySelector('span').textContent;
            filterByCategory(categoryName);
        });
    });
    
    // Service card hover effects
    const serviceCards = document.querySelectorAll('.service-card');
    serviceCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-8px)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
    
    // View more links
    const viewMoreLinks = document.querySelectorAll('.view-more');
    viewMoreLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const sectionTitle = this.closest('.section-header').querySelector('h3').textContent;
            loadMoreServices(sectionTitle);
        });
    });
    
    // Mobile menu toggle (if needed)
    const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
    if (mobileMenuBtn) {
        mobileMenuBtn.addEventListener('click', function() {
            const nav = document.querySelector('.nav');
            nav.classList.toggle('active');
        });
    }
});

// Search function
function performSearch(searchTerm, location) {
    console.log('Searching for:', searchTerm, 'in location:', location);
    
    // Show loading state
    showLoadingState();
    
    // Simulate API call
    setTimeout(() => {
        // Filter services based on search criteria
        filterServices(searchTerm, location);
        hideLoadingState();
    }, 1000);
}

// Filter by category
function filterByCategory(categoryName) {
    console.log('Filtering by category:', categoryName);
    
    const sections = document.querySelectorAll('.service-section');
    sections.forEach(section => {
        const sectionTitle = section.querySelector('h3').textContent.toLowerCase();
        if (sectionTitle.includes(categoryName.toLowerCase()) || categoryName === 'Voir plus') {
            section.style.display = 'block';
        } else {
            section.style.display = 'none';
        }
    });
    
    // Scroll to first visible section
    const firstVisibleSection = document.querySelector('.service-section[style="display: block;"], .service-section:not([style])');
    if (firstVisibleSection) {
        firstVisibleSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
}

// Filter services
function filterServices(searchTerm, location) {
    const serviceCards = document.querySelectorAll('.service-card');
    let visibleCount = 0;
    
    serviceCards.forEach(card => {
        const description = card.querySelector('.service-description').textContent.toLowerCase();
        const providerName = card.querySelector('.provider-info h4').textContent.toLowerCase();
        const tags = Array.from(card.querySelectorAll('.tag')).map(tag => tag.textContent.toLowerCase());
        
        const matchesSearch = !searchTerm || 
            description.includes(searchTerm.toLowerCase()) ||
            providerName.includes(searchTerm.toLowerCase()) ||
            tags.some(tag => tag.includes(searchTerm.toLowerCase()));
        
        const matchesLocation = !location; // Location filtering would require actual location data
        
        if (matchesSearch && matchesLocation) {
            card.style.display = 'block';
            visibleCount++;
        } else {
            card.style.display = 'none';
        }
    });
    
    // Show/hide sections based on visible cards
    const sections = document.querySelectorAll('.service-section');
    sections.forEach(section => {
        const visibleCards = section.querySelectorAll('.service-card[style="display: block;"], .service-card:not([style])');
        if (visibleCards.length === 0) {
            section.style.display = 'none';
        } else {
            section.style.display = 'block';
        }
    });
    
    // Show results message
    showSearchResults(visibleCount, searchTerm, location);
}

// Load more services
function loadMoreServices(sectionTitle) {
    console.log('Loading more services for:', sectionTitle);
    
    // Simulate loading more services
    const section = Array.from(document.querySelectorAll('.service-section')).find(s => 
        s.querySelector('h3').textContent.includes(sectionTitle.split(' ').pop())
    );
    
    if (section) {
        const grid = section.querySelector('.services-grid');
        // In a real app, you would fetch more data from an API
        showNotification('Plus de services chargés avec succès!');
    }
}

// Show loading state
function showLoadingState() {
    const searchBtn = document.querySelector('.btn-search');
    const originalText = searchBtn.innerHTML;
    searchBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Recherche...';
    searchBtn.disabled = true;
    
    // Store original text for restoration
    searchBtn.dataset.originalText = originalText;
}

// Hide loading state
function hideLoadingState() {
    const searchBtn = document.querySelector('.btn-search');
    searchBtn.innerHTML = searchBtn.dataset.originalText;
    searchBtn.disabled = false;
}

// Show search results
function showSearchResults(count, searchTerm, location) {
    // Remove existing results message
    const existingMessage = document.querySelector('.search-results-message');
    if (existingMessage) {
        existingMessage.remove();
    }
    
    // Create results message
    const message = document.createElement('div');
    message.className = 'search-results-message';
    message.style.cssText = `
        background: #e3f2fd;
        padding: 1rem;
        margin: 2rem 0;
        border-radius: 8px;
        text-align: center;
        color: #1976d2;
    `;
    
    let messageText = `${count} service(s) trouvé(s)`;
    if (searchTerm) messageText += ` pour "${searchTerm}"`;
    if (location) messageText += ` à ${location}`;
    
    message.textContent = messageText;
    
    // Insert message before main content
    const mainContent = document.querySelector('.main-content');
    mainContent.insertBefore(message, mainContent.firstChild);
}

// Show notification
function showNotification(message) {
    const notification = document.createElement('div');
    notification.className = 'notification';
    notification.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        background: #4caf50;
        color: white;
        padding: 1rem 2rem;
        border-radius: 8px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.2);
        z-index: 1000;
        transform: translateX(100%);
        transition: transform 0.3s ease;
    `;
    notification.textContent = message;
    
    document.body.appendChild(notification);
    
    // Animate in
    setTimeout(() => {
        notification.style.transform = 'translateX(0)';
    }, 100);
    
    // Remove after 3 seconds
    setTimeout(() => {
        notification.style.transform = 'translateX(100%)';
        setTimeout(() => {
            notification.remove();
        }, 300);
    }, 3000);
}

// Smooth scrolling for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// Add scroll-to-top functionality
window.addEventListener('scroll', function() {
    const scrollBtn = document.querySelector('.scroll-to-top');
    if (window.pageYOffset > 300) {
        if (!scrollBtn) {
            createScrollToTopButton();
        } else {
            scrollBtn.style.display = 'block';
        }
    } else if (scrollBtn) {
        scrollBtn.style.display = 'none';
    }
});

function createScrollToTopButton() {
    const scrollBtn = document.createElement('button');
    scrollBtn.className = 'scroll-to-top';
    scrollBtn.innerHTML = '<i class="fas fa-arrow-up"></i>';
    scrollBtn.style.cssText = `
        position: fixed;
        bottom: 20px;
        right: 20px;
        width: 50px;
        height: 50px;
        border: none;
        border-radius: 50%;
        background: #20b2aa;
        color: white;
        font-size: 1.2rem;
        cursor: pointer;
        box-shadow: 0 4px 20px rgba(0,0,0,0.2);
        z-index: 1000;
        transition: all 0.3s ease;
    `;
    
    scrollBtn.addEventListener('click', function() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
    
    scrollBtn.addEventListener('mouseenter', function() {
        this.style.background = '#1a9b94';
        this.style.transform = 'scale(1.1)';
    });
    
    scrollBtn.addEventListener('mouseleave', function() {
        this.style.background = '#20b2aa';
        this.style.transform = 'scale(1)';
    });
    
    document.body.appendChild(scrollBtn);
}