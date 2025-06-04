// Kilde: https://leafletjs.com/ //

// Opretter en ny rød markør-ikon med skygge ved hjælp af Leaflet
const redIcon = new L.Icon({
  // Angiver URL'en til den røde markør, som skal vises på kortet
  iconUrl:
    "https://cdn.jsdelivr.net/gh/pointhi/leaflet-color-markers@master/img/marker-icon-red.png",
  // Angiver URL'en til skyggen under markøren (Leaflets standard-skygge)
  shadowUrl: "https://unpkg.com/leaflet@1.9.4/dist/images/marker-shadow.png",
  iconSize: [25, 41],
  iconAnchor: [12, 41],
  popupAnchor: [1, -34],
  shadowSize: [41, 41],
});

// oprette en liste af lokaliteter, som vi bruger til at vise markører på kortet og vise info i infoBox
const locations = [
  {
    name: "Enghave Kaffe",
    coords: [55.6669, 12.5476],
    address: "Enghave Plads 3\n1670 København V",
    phone: "23 83 49 91",
    time: "Torsdag 15:00 - 18:00",
    text: "Hent din Torsdagskasse hos Vesterbros hyggeligste kaffebar. ",
    image: "/wp-content/themes/AP-Birkemosegaard-theme/assets/img/enghave-kaffe.png",
  },
  {
    name: "Nørrebro Kolonial",
    coords: [55.6925, 12.544],
    address: "Jægersborggade 25 2200 Kbh. N",
    phone: "20 91 08 00",
    time: "Torsdag 16:00 - 19:00",
    text: "Byens bedste kolonialbutik med egenimport af økologisk og biodynamisk mad og vin.",
    image: "/wp-content/themes/AP-Birkemosegaard-theme/assets/img/kolonial.png",
  },
  {
    name: "Rosforth & Rosforth",
    coords: [55.6743, 12.5877],
    address: "Knippelsbrogade 10 1409 København K",
    phone: "33 32 55 20",
    time: "Torsdag 14:00 - 17:30",
    text: "Danmarks ukronede øko, bio og naturvins konger. Noma's tidligere Sommelier. ",
    image: "/wp-content/themes/AP-Birkemosegaard-theme/assets/img/rosforth.png",
  },
  {
    name: "Rødder & Vin",
    coords: [55.6882, 12.5618],
    address: "Ravnsborggade 8 2200 København N",
    phone: "27 20 27 84",
    time: "Torsdag 15:00 - 18:00",
    text: "Nørrebros lokale naturvinsbutik med et stort udvalg af egenimporterede vine nøje udvalgt af legendariske Solfinn. ",
    image: "/wp-content/themes/AP-Birkemosegaard-theme/assets/img/roodogvin.jpg",
  },
  {
    name: "Grønttorvet Valby",
    coords: [55.6561, 12.5017],
    address: "Belle de Boskoopvej 20 2500 Valby",
    phone: "23 72 31 26",
    time: "Torsdag 15:00 - 18:00",
    text: "Privat initiativ. Kasserne står i forhaven. ",
    image: "/wp-content/themes/AP-Birkemosegaard-theme/assets/img/Valby_1.jpg",
  },
  {
    name: "L E Bruuns Vej 3 - Charlottenlund",
    coords: [55.7493, 12.5656],
    address: "L E Bruuns Vej 3 2920 Charlottenlund",
    phone: "31 49 03 49",
    time: "Torsdag 15:00 - 18:00",
    text: "Privat afhentningssted hos Stig Wall og Mette Marie Lydert. Kasserne står i cykelskuret. ",
    image: "/wp-content/themes/AP-Birkemosegaard-theme/assets/img/Charlottenlund.jpg",
  },
  {
    name: "Josephine - Vinhandel & Bar",
    coords: [55.6617, 12.6074],
    address: "Frankrigsgade 15 2300 København S",
    phone: "60 65 00 34",
    time: "Torsdag 15:00 - 20:00",
    text: "Josephine - Vinhandel og Bar parrer det bedste fra bodegaernes verden med gode vine og snacks. ",
    image: "/wp-content/themes/AP-Birkemosegaard-theme/assets/img/Josephine.jpg",
  },
  {
    name: "Anne Black Store",
    coords: [55.6745, 12.5521],
    address: "Gammel Kongevej 74 1850 Frederiksberg C",
    phone: "35 10 73 27",
    time: "Torsdag 15:00 - 18:00",
    text: "Anne Black Store er en eksklusiv konceptbutik med et nøje udvalgt sortiment af tøj, ",
    image: "/wp-content/themes/AP-Birkemosegaard-theme/assets/img/anneblackstore.png",
  },
  {
    name: "Atelier September Nordhavn",
    coords: [55.7073, 12.5937],
    address: "Århusgade 128 2150 København Nordhavn",
    phone: "29 89 04 49",
    time: "Torsdag 15:00 - 18:00",
    text: "Hos Atelier September kan du få morgenmad, frokost og kager samt varme og kolde drikke hele dagen. ",
    image: "/wp-content/themes/AP-Birkemosegaard-theme/assets/img/Valby_1.jpg",
  },
  {
    name: "Den Røde By - Valby",
    coords: [55.6561, 12.5017],
    address: "Traps Allé 24 2500 Valby",
    phone: "61 50 63 05",
    time: "Torsdag 15:00 - 18:00",
    text: "Privat initiativ hos Lise Christensen Bjerno.",
    image: "/wp-content/themes/AP-Birkemosegaard-theme/assets/img/valby_red.png",
  },
];

// Opretter et Leaflet-kort og viser det i HTML-elementet med id'et "kort"
const map = L.map("kort").setView([55.675, 12.565], 12);

// Tilføjer OpenStreetMap som baggrundskort på Leaflet-kortet
L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
  attribution: "&copy; OpenStreetMap", // Viser kildehenvisning nederst på kortet så i kan se hvor det er fra
}).addTo(map); // Lægger lagene oven på kortet

// Henter HTML-elementet hvor information om en lokalitet skal vises
const infoBox = document.getElementById("infoBox");
const accordionContainer = document.getElementById("accordionContainer");
// Opretter en funktion der opdaterer infoBox med detaljer om en valgt lokalitet
function updateInfoBox(location) {
  infoBox.classList.add("fade");
  setTimeout(() => {
    // Opdaterer indholdet i infoBox med data fra 'location'-objektet
    infoBox.innerHTML = `
          <img src="${location.image}" alt="${location.name}">
          <h3>${location.name}</h3>
          <p><strong>Adresse:</strong><br>${location.address.replace(
            "\n",
            "<br>"
          )}</p>
          <p><strong>Telefon:</strong> ${location.phone}</p>
          <p><strong>Åbningstid:</strong> ${location.time}</p>
          <p>${location.text}</p>
        `;
    // Fjerner fade-klassen igen, fx for at vise fade-in animation bagefter
    infoBox.classList.remove("fade");
  }, 200);
}
// Gennemgår hver lokalitet (loc) i arrayet 'locations' med en indexværdi
locations.forEach((loc, index) => {
  // Opretter en Leaflet-marker med lokationens koordinater og bruger et rødt ikon
  const marker = L.marker(loc.coords, { icon: redIcon }).addTo(map);
  // Tilføjer en klik-event til markøren, så informationsboksen opdateres med data fra den valgte lokation
  marker.on("click", () => updateInfoBox(loc));
  // Opretter en knap til accordion-visning af lokationen
  const button = document.createElement("button");
  button.className = "accordion-button";
  button.textContent = loc.name;
  // Når knappen klikkes, opdateres informationsboksen med den aktuelle lokation
  button.addEventListener("click", () => updateInfoBox(loc));
  // Tilføjer knappen til HTML-elementet 'accordionContainer'
  accordionContainer.appendChild(button);
  // Simulerer klik på den første knap for at vise den første lokation automatisk
  if (index === 0) {
    setTimeout(() => button.click(), 0);
  }
});
