document.addEventListener('DOMContentLoaded', function() {
    const addToCartButtons = document.querySelectorAll('.product-card button');
    const cartCount = document.querySelector('.cart-count');
    let count = 0;

    addToCartButtons.forEach(button => {
        button.addEventListener('click', function() {
            count++;
            cartCount.textContent = count;
            // می‌توانید محصول را به سبد خرید اضافه کنید (اینجا فقط شمارش را افزایش می‌دهیم)
        });
    });
});