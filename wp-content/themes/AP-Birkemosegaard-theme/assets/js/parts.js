// Accordion-funktionalitet til fx spørgsmål/svar eller lign.
document.addEventListener("DOMContentLoaded", () => {
  document.querySelectorAll(".accordion-toggle").forEach((button) => {
    button.addEventListener("click", () => {
      const accordion = button.parentElement;
      accordion.classList.toggle("open"); // Toggler klassen for at vise/skjule indhold
    });
  });
});

// Burger-menu funktion til mobil/tablet navigation
const burgerToggle = document.getElementById("burger-toggle");
const globalMenu = document.querySelector(".global-menu");

burgerToggle.addEventListener("click", () => {
  globalMenu.classList.toggle("active"); // Vis/skjul menu

  // Skift ikontekst mellem "menu" og "close"
  if (burgerToggle.textContent === "menu") {
    burgerToggle.textContent = "close";
  } else {
    burgerToggle.textContent = "menu";
  }
});

// Scrollanimation til indhold (fx event cards, tekstbokse og billeder)
function handleScrollAnimations() {
  document.querySelectorAll(".eventCard").forEach((card) => {
    const rect = card.getBoundingClientRect();
    if (rect.top < window.innerHeight - 100) {
      card.style.animationPlayState = "running"; // Start animation når elementet kommer i view
    }
  });

  document.querySelectorAll(".fade-in").forEach((el) => {
    const rect = el.getBoundingClientRect();
    if (rect.top < window.innerHeight - 100) {
      el.classList.add("visible"); // Tilføj 'visible' klasse når elementet scrolles ind
    }
  });
}

window.addEventListener("scroll", handleScrollAnimations);
window.addEventListener("load", handleScrollAnimations); // Sørger for animation også ved første load

// Fremhæv tidligere gennemførte steps i breadcrumbs navigation
document.addEventListener("DOMContentLoaded", () => {
  const progress = document.querySelector(".progress-breadcrumb");
  const steps = progress.querySelectorAll(".step");
  const activeStep = parseInt(progress.dataset.step, 10); // Henter aktivt trin fra data attribut

  steps.forEach((step, index) => {
    if (index < activeStep) {
      step.classList.add("done"); // Markér tidligere steps som 'done'
    }
  });
});

// --- Scroll-funktionalitet til 'til top'-knap ---
window.onscroll = function () {
  const btn = document.getElementById("toTopBtn");
  if (window.scrollY > 200) {
    btn.classList.add("visible");
  } else {
    btn.classList.remove("visible");
  }
};

function scrollToTop() {
  window.scrollTo({ top: 0, behavior: "smooth" });
}
