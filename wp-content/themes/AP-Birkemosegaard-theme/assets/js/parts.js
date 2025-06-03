document.addEventListener("DOMContentLoaded", () => {
  document.querySelectorAll(".accordion-toggle").forEach((button) => {
    button.addEventListener("click", () => {
      const accordion = button.parentElement;
      accordion.classList.toggle("open");
    });
  });
});