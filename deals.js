document.addEventListener('DOMContentLoaded', function () {
    // Countdown Timer
    const endTime = new Date('2024-12-30T00:00:00').getTime();
    const timerDisplay = document.querySelector('.timer');

    function updateTimer() {
        const now = new Date().getTime();
        const distance = endTime - now;

        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        timerDisplay.textContent = `Time Left: ${days}d ${hours}h ${minutes}m ${seconds}s until the deal ends`;

        if (distance < 0) {
            clearInterval(interval);
            timerDisplay.textContent = "EXPIRED";
        }
    }

    const interval = setInterval(updateTimer, 1000);

    // Initialize Cart
    let cart = JSON.parse(localStorage.getItem('cart')) || [];

    // Update Cart Count on Page Load
    document.getElementById('cart-count').textContent = cart.reduce((total, item) => total + item.quantity, 0);

    // Function to show the popup
    function showPopup() {
        const popup = document.getElementById('popup');
        popup.style.display = 'block';
        setTimeout(() => {
            popup.style.display = 'none';
        }, 3000); // Hide the popup after 3 seconds
    }

    // Add to Cart Functionality for Deals
    const addToCartButtons = document.querySelectorAll('.add-to-cart');

    addToCartButtons.forEach(button => {
        button.addEventListener('click', () => {
            const dealId = button.getAttribute('data-deal-id');
            const productsData = button.getAttribute('data-products');

            try {
                const products = JSON.parse(productsData);

                products.forEach(product => {
                    const productInCart = cart.find(item => item.id === product.id);

                    if (productInCart) {
                        productInCart.quantity += 1; // Increase quantity if product already in cart
                    } else {
                        cart.push({
                            id: product.id,
                            name: product.name,
                            price: product.price,
                            quantity: 1,
                            image: product.image
                        });
                    }
                });

                localStorage.setItem('cart', JSON.stringify(cart));
                document.getElementById('cart-count').textContent = cart.reduce((total, item) => total + item.quantity, 0);
                
                updateCartSection(); // Update the cart display

                showPopup(); // Show the popup notification

            } catch (error) {
                console.error("Error parsing products data:", error);
            }
        });
    });

    // Close the popup when the close button is clicked
    document.getElementById('close-popup').addEventListener('click', () => {
        document.getElementById('popup').style.display = 'none';
    });

    function updateCartSection() {
        const cartSection = document.getElementById('cart-section');
        cartSection.innerHTML = ''; // Clear previous content

        // Group products by their IDs
        const groupedProducts = cart.reduce((acc, item) => {
            if (!acc[item.id]) {
                acc[item.id] = { ...item }; // Store the full item object
            } else {
                acc[item.id].quantity += item.quantity; // Increment quantity for existing items
            }
            return acc;
        }, {});

        const cartItem = document.createElement('div');
        cartItem.classList.add('cart-item');

        // Create a section for images
        const imagesContainer = document.createElement('div');
        imagesContainer.classList.add('images-container');

        // Create a section for product info
        const productInfo = document.createElement('div');
        productInfo.classList.add('product-info');

        let totalPrice = 0;

      
    }

    // Search Functionality
    const searchInput = document.getElementById('search-input');
    const searchButton = document.querySelector('#search-bar button');
    const dealCards = document.querySelectorAll('.deal-card');

    function performSearch() {
        const searchQuery = searchInput.value.trim().toLowerCase();

        if (searchQuery) {
            dealCards.forEach(card => {
                const dealName = card.querySelector('h3').textContent.toLowerCase();
                card.style.display = dealName.includes(searchQuery) ? 'block' : 'none';
            });
        } else {
            dealCards.forEach(card => card.style.display = 'block');
        }
    }

    searchButton.addEventListener('click', (e) => {
        e.preventDefault();
        performSearch();
    });

    searchInput.addEventListener('keypress', (e) => {
        if (e.key === 'Enter') {
            e.preventDefault();
            performSearch();
        }
    });
});