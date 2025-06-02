// All bruges her da der er flere ikoner med classen
// For hvert icon i "listen" bliver der kørt en funktion
document.querySelectorAll('.heart-icon').forEach(function (icon) {

// Tilføj en klik-eventlistener til hvert hjerteikon
icon.addEventListener('click', function (e) {

    // Forhindrer at a tagget aktiveres når man klikker på hjertet (fordi ikonet ligger inde i a)
    e.preventDefault();

    // Tjek om ikonet er pressed
    let pressed = this.getAttribute('aria-pressed') === 'true';

    // Skift tilstand, hvis det var 'true', bliver det 'false' og omvendt
    this.setAttribute('aria-pressed', !pressed);

    // Fjern klassen animate-pop for at kunne genstarte animationen
    this.classList.remove('animate-pop');

    // Tving browseren til at "reloade" elementets layout
    // Sikre, at animationen faktisk afspilles igen
    void this.offsetWidth;

    // Tilføj klassen animate-pop igen, så animationen starter
    this.classList.add('animate-pop');
});
});

