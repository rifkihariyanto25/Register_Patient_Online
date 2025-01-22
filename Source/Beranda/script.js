document.addEventListener("DOMContentLoaded", function () {
  const navLinks = document
    .getElementById("nav-links")
    .getElementsByTagName("a");
  const currentLocation = window.location.href; // Mengambil URL halaman saat ini

  for (let i = 0; i < navLinks.length; i++) {
    if (navLinks[i].href === currentLocation) {
      navLinks[i].classList.add("active"); // Menambahkan kelas 'active' jika URL cocok
    }
  }
});

// Add this script to your script.js file or within a script tag in your HTML

document.addEventListener("DOMContentLoaded", function () {
  const menuButton = document.getElementById("menu");
  const closeButton = document.getElementById("close-menu");
  const mobileMenu = document.getElementById("mobile-menu");

  menuButton.addEventListener("click", function () {
    mobileMenu.style.display = "block"; // Ensure the menu is displayed
    setTimeout(() => {
      mobileMenu.classList.add("open"); // Add the open class to trigger the animation
    }, 10); // Small delay to allow the display change to take effect
  });

  closeButton.addEventListener("click", function () {
    mobileMenu.classList.remove("open"); // Remove the open class to trigger the close animation
    setTimeout(() => {
      mobileMenu.style.display = "none"; // Hide the menu after the animation completes
    }, 300); // Match this delay to the CSS transition duration
  });

  // Close menu when clicking on any menu item
  const menuLinks = mobileMenu.querySelectorAll("a");
  menuLinks.forEach((link) => {
    link.addEventListener("click", function () {
      mobileMenu.classList.remove("open");
      setTimeout(() => {
        mobileMenu.style.display = "none";
      }, 300);
    });
  });
});

// Smooth scroll for nav links
const links = document.querySelectorAll(".nav-links a");
links.forEach((link) => {
  link.addEventListener("click", (e) => {
    e.preventDefault();
    const target = document.querySelector(link.getAttribute("href"));
    target.scrollIntoView({
      behavior: "smooth",
    });
  });
});

// Smooth scroll for nav links
const link2 = document.querySelectorAll(".mobile-menu a");
links.forEach((link) => {
  link.addEventListener("click", (e) => {
    e.preventDefault();
    const target = document.querySelector(link.getAttribute("href"));
    target.scrollIntoView({
      behavior: "smooth",
    });
  });
});
