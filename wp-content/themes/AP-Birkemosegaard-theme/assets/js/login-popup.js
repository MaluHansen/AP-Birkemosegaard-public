
var profileIcon = document.getElementById("profile-icon");

var loginPopup = document.querySelector(".login-popup");

var toggleLoginPopup = (show) => {
    loginPopup.style.display = show ? "block" : "none";
};

profileIcon.addEventListener("click", () => {
    var isVisible = loginPopup.style.display === "block";
    toggleLoginPopup(!isVisible);
});

window.addEventListener("click", (e) => {
    if (!loginPopup.contains(e.target) && e.target !== profileIcon) {
        toggleLoginPopup(false);
    }
});
