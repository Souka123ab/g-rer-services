// DOM Elements
const searchForm = document.querySelector(".search-form")
const searchBtn = document.querySelector(".search-btn")
const searchInputs = document.querySelectorAll(".search-input")
const notificationBtn = document.querySelector(".notification-btn")

// Search functionality
searchBtn.addEventListener("click", (e) => {
  e.preventDefault()

  const serviceInput = searchInputs[0].value.trim()
  const locationInput = searchInputs[1].value.trim()

  if (!serviceInput || !locationInput) {
    alert("Veuillez remplir tous les champs de recherche.")
    return
  }

  // Simulate search loading
  searchBtn.textContent = "Recherche..."
  searchBtn.disabled = true

  setTimeout(() => {
    alert(`Recherche: "${serviceInput}" à "${locationInput}"`)
    searchBtn.textContent = "Rechercher"
    searchBtn.disabled = false
  }, 1500)
})

// Enter key support for search
searchInputs.forEach((input) => {
  input.addEventListener("keypress", (e) => {
    if (e.key === "Enter") {
      searchBtn.click()
    }
  })
})

// Notification button
notificationBtn.addEventListener("click", () => {
  alert("Aucune nouvelle notification")
})

// Smooth scrolling for anchor links
document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
  anchor.addEventListener("click", function (e) {
    e.preventDefault()
    const target = document.querySelector(this.getAttribute("href"))
    if (target) {
      target.scrollIntoView({
        behavior: "smooth",
        block: "start",
      })
    }
  })
})

// Add loading animation to buttons
document.querySelectorAll(".btn").forEach((btn) => {
  btn.addEventListener("click", function () {
    if (!this.classList.contains("loading")) {
      this.classList.add("loading")
      setTimeout(() => {
        this.classList.remove("loading")
      }, 2000)
    }
  })
})

// Form validation
searchInputs.forEach((input) => {
  input.addEventListener("blur", function () {
    if (this.value.trim() === "") {
      this.style.borderColor = "#dc3545"
    } else {
      this.style.borderColor = "#20b2aa"
    }
  })

  input.addEventListener("focus", function () {
    this.style.borderColor = "#20b2aa"
  })
})

// Mobile menu toggle (if needed)
function toggleMobileMenu() {
  const nav = document.querySelector(".nav")
  nav.classList.toggle("mobile-open")
}

// Add some interactive hover effects
document.querySelectorAll(".social-link").forEach((link) => {
  link.addEventListener("mouseenter", function () {
    this.style.transform = "translateY(-3px) scale(1.1)"
  })

  link.addEventListener("mouseleave", function () {
    this.style.transform = "translateY(0) scale(1)"
  })
})

console.log("Souka.ma platform loaded successfully!")
function toggleFavorite(button) {
  button.classList.toggle("active")

  // Add a small animation effect
  button.style.transform = "scale(0.9)"
  setTimeout(() => {
    button.style.transform = ""
  }, 150)

  // Optional: You can add logic here to save favorites to localStorage
  // or send to a backend API
  console.log("Favorite toggled")
}

// Optional: Add some interactive effects
document.addEventListener("DOMContentLoaded", () => {
  const cards = document.querySelectorAll(".service-card")

  cards.forEach((card) => {
    card.addEventListener("mouseenter", function () {
      this.style.transform = "translateY(-4px)"
    })

    card.addEventListener("mouseleave", function () {
      this.style.transform = "translateY(0)"
    })
  })
})

// Simulate real-time updates (optional)
function updateTimestamps() {
  const timeElements = document.querySelectorAll(".time")
  const times = ["il y a 5 minutes", "il y a 10 minutes", "il y a 15 minutes", "il y a 20 minutes"]

  timeElements.forEach((element, index) => {
    // This could be connected to real data
    element.textContent = times[index]
  })
}

// Update timestamps every minute (optional)
setInterval(updateTimestamps, 60000)
document.addEventListener("DOMContentLoaded", () => {
  // Add click handlers for service buttons
  const serviceButtons = document.querySelectorAll(".service-button")

  serviceButtons.forEach((button) => {
    button.addEventListener("click", function (e) {
      e.preventDefault()

      // Get the provider name from the card
      const card = this.closest(".provider-card")
      const providerName = card.querySelector(".provider-name").textContent
      const serviceType = card.querySelector(".service-badge").textContent

      // Add a subtle animation
      this.style.transform = "scale(0.95)"
      setTimeout(() => {
        this.style.transform = ""
      }, 150)

      // Show alert (in a real app, this would open a modal or navigate to a booking page)
      alert(`Demande de service envoyée à ${providerName} pour ${serviceType}`)
    })
  })

  // Add hover effects for cards
  const cards = document.querySelectorAll(".provider-card")

  cards.forEach((card) => {
    card.addEventListener("mouseenter", function () {
      this.style.transform = "translateY(-4px)"
    })

    card.addEventListener("mouseleave", function () {
      this.style.transform = "translateY(0)"
    })
  })

  // Animate cards on page load
  const observerOptions = {
    threshold: 0.1,
    rootMargin: "0px 0px -50px 0px",
  }

  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.style.opacity = "1"
        entry.target.style.transform = "translateY(0)"
      }
    })
  }, observerOptions)

  // Initially hide cards for animation
  cards.forEach((card, index) => {
    card.style.opacity = "0"
    card.style.transform = "translateY(20px)"
    card.style.transition = `opacity 0.6s ease ${index * 0.1}s, transform 0.6s ease ${index * 0.1}s`
    observer.observe(card)
  })
})
