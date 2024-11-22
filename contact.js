document.addEventListener("DOMContentLoaded", function () {
    // Accordion Functionality
    const accordionItems = document.querySelectorAll(".accordion-item");

    accordionItems.forEach((item) => {
        const header = item.querySelector("h4");
        const content = item.querySelector(".content");

        header.addEventListener("click", () => {
            const isVisible = content.style.display === "block";
            // Close all content sections before opening the clicked one
            accordionItems.forEach((otherItem) => {
                otherItem.querySelector(".content").style.display = "none";
            });

            if (!isVisible) {
                content.style.display = "block";
            }
        });
    });

    // Cart Management
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    
    // Function to update cart count
    function updateCartCount() {
        const cartCountElement = document.getElementById('cart-count'); // The cart counter element
        if (cartCountElement) {
            const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
            cartCountElement.textContent = totalItems; // Update the count displayed on the cart icon
        }
    }

    // Update cart count on page load
    updateCartCount();

    // Add to Cart Functionality
    const addToCartButtons = document.querySelectorAll('.add-to-cart');

    addToCartButtons.forEach(button => {
        button.addEventListener('click', () => {
            const productId = button.getAttribute('data-product-id');
            const productName = button.getAttribute('data-product-name');
            const productPrice = parseFloat(button.getAttribute('data-product-price'));

            const productInCart = cart.find(product => product.id === productId);

            if (productInCart) {
                productInCart.quantity += 1; // Increment quantity if product is already in the cart
            } else {
                cart.push({
                    id: productId,
                    name: productName,
                    price: productPrice,
                    quantity: 1 // Start with quantity of 1
                });
            }

            localStorage.setItem('cart', JSON.stringify(cart));
            updateCartCount(); // Update the cart count here
            showPopup(`${productName} has been added to your cart!`); // Show popup notification
        });
    });

    // Search Functionality
    const searchInput = document.getElementById('search-input');
    const searchButton = document.querySelector('#search-bar button');
    const dealCards = document.querySelectorAll('.product-card');

    // Function to search and display relevant results
    function performSearch() {
        const searchQuery = searchInput.value.trim().toLowerCase();

        // Filter products based on search query
        dealCards.forEach(card => {
            const productName = card.querySelector('h3').textContent.toLowerCase();
            card.style.display = productName.includes(searchQuery) ? 'block' : 'none';
        });
    }

    // Redirect to shop.html if input or button is hovered (and not focused)
    [searchInput, searchButton].forEach(element => {
        element.addEventListener('mouseover', () => {
            if (document.activeElement !== searchInput) {
                window.location.href = 'shop.html'; // Redirect to shop.html
            }
        });
    });

    // Search button click
    searchButton.addEventListener('click', (e) => {
        e.preventDefault();
        performSearch();
    });

    // Search on "Enter" key
    searchInput.addEventListener('keypress', (e) => {
        if (e.key === 'Enter') {
            e.preventDefault();
            performSearch();
        }
    });

    // Display Cart Items on Cart Page (if you have a cart.html page)
    function displayCartItems() {
        const cartItemsContainer = document.getElementById('cart-items'); // Assuming there's a container for cart items
        if (!cartItemsContainer) return;

        // Clear existing items
        cartItemsContainer.innerHTML = '';

        if (cart.length === 0) {
            cartItemsContainer.innerText = 'Your cart is empty.'; // Inform user if cart is empty
            return;
        }

        cart.forEach(item => {
            const itemElement = document.createElement('div');
            itemElement.innerText = `${item.name} - Quantity: ${item.quantity} - Price: PKR ${item.price.toFixed(2)}`;
            cartItemsContainer.appendChild(itemElement);
        });
    }

    // Call displayCartItems when on the cart page
    if (window.location.pathname.includes('cart.html')) {
        displayCartItems();
    }
});
