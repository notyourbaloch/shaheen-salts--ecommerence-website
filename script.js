document.addEventListener('DOMContentLoaded', function () {
    // Initialize Cart from localStorage or create an empty cart
    let cart = JSON.parse(localStorage.getItem('cart')) || [];

    // Update Cart Count on Page Load
    const updateCartCount = () => {
        const cartCountElement = document.getElementById('cart-count');
        if (cartCountElement) {
            cartCountElement.textContent = cart.reduce((total, item) => total + item.quantity, 0);
        }
    };
    updateCartCount();

    // Show popup function
    function showPopup(message) {
        const popup = document.getElementById('popup');
        const popupMessage = document.getElementById('popup-message');

        popupMessage.textContent = message;
        popup.style.display = 'block';

        document.getElementById('close-popup').onclick = function() {
            popup.style.display = 'none';
        };
    }

    // Add to Cart Functionality
    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', () => {
            const productId = button.getAttribute('data-product-id');
            const productName = button.closest('.product-card').querySelector('h3').textContent;
            const productPrice = parseFloat(button.closest('.product-card').querySelector('.price').textContent.replace(/₨/, '').trim());
            const productImage = button.closest('.product-card').querySelector('img').src;

            const productInCart = cart.find(product => product.id === productId);

            if (productInCart) {
                productInCart.quantity += 1;
            } else {
                cart.push({
                    id: productId,
                    name: productName,
                    price: productPrice,
                    quantity: 1,
                    image: productImage
                });
            }

            localStorage.setItem('cart', JSON.stringify(cart));
            updateCartCount();
            showPopup(`${productName} has been added to your cart!`);
        });
    });

    // Remove Item from Cart
    window.removeCartItem = function(index) {
        cart.splice(index, 1);
        localStorage.setItem('cart', JSON.stringify(cart));
        updateCartCount();
        displayCartItems();
    }

    // Display Cart Items on Cart Page
    function displayCartItems() {
        const cartItemsContainer = document.getElementById('cart-items');
        if (!cartItemsContainer) return;

        cartItemsContainer.innerHTML = '';

        cart.forEach((item, index) => {
            const cartItem = document.createElement('div');
            cartItem.classList.add('cart-item');
            cartItem.innerHTML = `
                <div class="cart-item-image">
                    <img src="${item.image}" alt="${item.name}">
                </div>
                <div class="cart-item-details">
                    <h4>${item.name}</h4>
                    <p>Price: PKR ${item.price} x ${item.quantity} = PKR ${(item.price * item.quantity).toFixed(2)}</p>
                    <button onclick="removeCartItem(${index})">Remove</button>
                </div>
            `;
            cartItemsContainer.appendChild(cartItem);
        });

        updateCartTotal();
    }

    // Update Cart Total
    function updateCartTotal() {
        const cartTotalElement = document.getElementById('cart-total');
        if (cartTotalElement) {
            const total = cart.reduce((acc, item) => acc + (item.price * item.quantity), 0);
            cartTotalElement.textContent = total.toFixed(2);
        }
    }

    // Call this function to display cart items if on the cart page
    if (window.location.pathname.endsWith('cart.php')) {
        displayCartItems();
        updateCartTotal();
    }

    // Toggle Product Description
    document.querySelectorAll('.view-product').forEach(button => {
        button.addEventListener('click', function() {
            const card = this.closest('.product-card');
            const description = card.querySelector('.description');
            const isVisible = description.style.display === 'block';

            description.style.display = isVisible ? 'none' : 'block';
            this.textContent = isVisible ? 'View Description' : 'Hide Description';
        });
    });

    // Hide product descriptions by default on page load
    document.querySelectorAll('.description').forEach(description => {
        description.style.display = 'none';
    });

    // Search Functionality for Products
    const searchInput = document.getElementById('shop-search-input');
    const productCards = document.querySelectorAll('.product');

    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const searchValue = this.value.toLowerCase();

            productCards.forEach(product => {
                const productName = product.querySelector('h3').textContent.toLowerCase();
                product.style.display = productName.includes(searchValue) ? 'block' : 'none';
            });
        });
    }

    // Category Filter Functionality
    document.querySelectorAll('.category-btn').forEach(button => {
        button.addEventListener('click', function() {
            const selectedCategory = this.getAttribute('data-category');

            productCards.forEach(product => {
                if (selectedCategory === 'all' || product.getAttribute('data-category') === selectedCategory) {
                    product.style.display = 'block';
                } else {
                    product.style.display = 'none';
                }
            });
        });
    });

    const productContainer = document.querySelector('.product-container');
    const prevButton = document.getElementById('prev-button');
    const nextButton = document.getElementById('next-button');
    
    let currentSlide = 0;
    const productsPerSlide = 3;
    const totalSlides = Math.ceil(document.querySelectorAll('.product-card').length / productsPerSlide);
    
    function updateSliderPosition() {
        const slideWidth = productContainer.offsetWidth / productsPerSlide;
        productContainer.style.transform = `translateX(-${currentSlide * slideWidth}px)`;
    }
    
    prevButton.addEventListener('click', () => {
        currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
        updateSliderPosition();
    });
    
    nextButton.addEventListener('click', () => {
        currentSlide = (currentSlide + 1) % totalSlides;
        updateSliderPosition();
    });
    
    // Initial position
    updateSliderPosition();
    
    // Update slider on window resize
    window.addEventListener('resize', updateSliderPosition);
});