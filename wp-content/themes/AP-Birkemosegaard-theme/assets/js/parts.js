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

// Scrollanimation til eventCards, teksbokse og billeder
      function handleScrollAnimations() {
        document.querySelectorAll(".eventCard").forEach((card) => {
          const rect = card.getBoundingClientRect();
          if (rect.top < window.innerHeight - 100) {
            card.style.animationPlayState = "running";
          }
        });

        document.querySelectorAll(".fade-in").forEach((el) => {
          const rect = el.getBoundingClientRect();
          if (rect.top < window.innerHeight - 100) {
            el.classList.add("visible");
          }
        });
      }

      window.addEventListener("scroll", handleScrollAnimations);
      window.addEventListener("load", handleScrollAnimations);