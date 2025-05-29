document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".qty-btn-wrapper").forEach(wrapper => {
        const display = wrapper.querySelector(".qty-display");
        const input = wrapper.querySelector("input[name='quantity']");

        let qty = 1;

        wrapper.addEventListener("click", function (e) {
            if (!e.target.classList.contains("qty-btn")) return;

            if (e.target.classList.contains("plus")) qty++;
            if (e.target.classList.contains("minus") && qty > 1) qty--;

            input.value = qty;
            display.textContent = qty;
        });
    });
});


if ( window.history.replaceState ) {
window.history.replaceState( null, null, window.location.href );
}
// https://wordpress.stackexchange.com/questions/312047/extra-items-added-to-cart-on-refresh-woocommerce

