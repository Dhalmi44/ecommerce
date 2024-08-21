// Handle cart button click
document.getElementById('cart-button').addEventListener('click', function() {
    const modal = document.getElementById('cart-modal');
    modal.style.display = 'block';
});

// Handle modal close button click
document.querySelector('.modal .close').addEventListener('click', function() {
    const modal = document.getElementById('cart-modal');
    modal.style.display = 'none';
});

// Close modal if clicked outside
window.addEventListener('click', function(event) {
    const modal = document.getElementById('cart-modal');
    if (event.target === modal) {
        modal.style.display = 'none';
    }
});

// Add to cart functionality (mockup)
document.querySelectorAll('.product button.add-to-cart').forEach(button => {
    button.addEventListener('click', function() {
        alert('Product added to cart!');
        // Update cart count (mockup)
        const cartButton = document.getElementById('cart-button');
        const currentCount = parseInt(cartButton.textContent.match(/\d+/)[0]);
        cartButton.textContent = `Cart (${currentCount + 1})`;
    });
});
