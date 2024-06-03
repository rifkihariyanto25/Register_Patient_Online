document.addEventListener("DOMContentLoaded", () => {
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
});

$(document).ready(function () {
  $("#menu").on("click", function () {
    $("#mobileMenu").toggle();
  });
});
