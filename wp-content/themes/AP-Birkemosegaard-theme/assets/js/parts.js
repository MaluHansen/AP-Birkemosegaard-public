document.addEventListener("DOMContentLoaded", () => {
  document.querySelectorAll(".accordion-toggle").forEach((button) => {
    button.addEventListener("click", () => {
      const accordion = button.parentElement;
      accordion.classList.toggle("open");
    });
  });
});

// Burger menu til mobil/tablet visning
const burgerToggle = document.getElementById("burger-toggle");
const globalMenu = document.querySelector(".global-menu");

burgerToggle.addEventListener("click", () => {
  globalMenu.classList.toggle("active");

  // Skift ikon
  if (burgerToggle.textContent === "menu") {
    burgerToggle.textContent = "close";
  } else {
    burgerToggle.textContent = "menu";
  }
});
