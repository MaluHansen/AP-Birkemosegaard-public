// Henter ikonet der bruges til at toggle adgangskode
let togglePassword = document.querySelector('.toggle-password');

// Henter adgangskode-feltet
let passwordInput = document.querySelector('#psw');

// Når brugeren klikker på ikonet (.togglePassword)
togglePassword.addEventListener('click', function () {
    // Tjekker om adgangskoden aktuelt er type="password" (og derfor er skjult)
    let isPassword = passwordInput.type === 'password';

    // Skifter type, password=skjul tekst, text=vis tekst
    passwordInput.type = isPassword ? 'text' : 'password';

    // Skifter ikonet (this=.togglePassword)
    this.textContent = isPassword ? 'visibility' : 'visibility_off';
});