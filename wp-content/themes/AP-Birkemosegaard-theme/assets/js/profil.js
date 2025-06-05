// Tabs-funktionalitet: Skift mellem sektioner på profilsiden
document.querySelectorAll('.link').forEach(tab => {
  tab.addEventListener('click', () => {
    const selectedTab = tab.getAttribute('data-tab'); // Hent ID på det tilhørende indhold

    // Fjern 'active' klassen fra alle tab-links
    document.querySelectorAll('.link').forEach(link => link.classList.remove('active'));
    tab.classList.add('active'); // Tilføj aktiv klasse til det valgte link

    // Skjul alle content sektioner
    document.querySelectorAll('.content').forEach(section => {
      section.classList.remove('active');
      section.setAttribute('hidden', true);
    });

    // Vis den sektion der matcher det valgte tab link
    const activeContent = document.getElementById(selectedTab);
    if (activeContent) {
      activeContent.classList.add('active');
      activeContent.removeAttribute('hidden');
    }
  });
});


// Wishlist-funktion: Klik på hjerte for at tilføje/fjerne fra favoritter
document.querySelectorAll(".wishlist").forEach((button) => {
  button.addEventListener("click", (e) => {
    e.preventDefault();
    e.stopPropagation();

    const isActive = button.classList.contains("active");

    // Toggle aktiv tilstand
    button.classList.toggle("active");
    button.setAttribute("aria-pressed", (!isActive).toString());

    const img = button.querySelector("img");

    // Skift billede alt efter om hjertet er aktivt eller ej
    img.src = !isActive
      ? "./assets/icons/Roodhjerte.png"
      : "./assets/icons/Hvidhjerte.png";

    // Trigger CSS animation ved at tvinge reflow
    img.classList.remove("animate-pop");
    void img.offsetWidth;
    img.classList.add("animate-pop");

    // Hvis hjertet deaktiveres i "favoritter" visning, fjern hele kortet
    if (isActive) {
      const card = button.closest(".produktCard-favoritter");
      if (card) card.remove();
    }
  });
});
