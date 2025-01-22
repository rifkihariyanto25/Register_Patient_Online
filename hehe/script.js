document.addEventListener("DOMContentLoaded", () => {
  // Add event listener for menu button
  document.getElementById("menu").addEventListener("click", function () {
    document.getElementById("mobile-menu").classList.add("open");
  });

  // Add event listener for close button
  document.getElementById("close-menu").addEventListener("click", function () {
    document.getElementById("mobile-menu").classList.remove("open");
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
      document.getElementById("mobile-menu").classList.remove("open");
    });
  });
});
