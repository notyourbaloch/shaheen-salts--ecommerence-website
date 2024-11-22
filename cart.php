<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cart.css">
    <title>Your Shopping Cart</title>
</head>
<body>

    <!-- Cart Section -->
    <section id="cart">
        <h2>Your Shopping Cart</h2>
        <div id="cart-items"></div>
        <h3 id="cart-total">Total: PKR 0</h3>
        <button class="checkout" onclick="window.location.href='checkout.php'">Proceed to Checkout</button>
        <button class="back-to-home" onclick="window.location.href='index.php'">Back to Home</button>
    </section>

    <script>
       let cart = [];

// Load cart from localStorage
function loadCart() {
    const storedCart = localStorage.getItem('cart');
    if (storedCart) {
        cart = JSON.parse(storedCart);
    }
}

// Save cart to localStorage
function saveCart() {
    localStorage.setItem('cart', JSON.stringify(cart));
}

// Add item to cart (merge if same item exists)
function addToCart(newItem) {
    const existingItem = cart.find(item => item.id === newItem.id);
    
    if (existingItem) {
        // Increase quantity if item already exists in the cart
        existingItem.quantity += newItem.quantity;
    } else {
        // Add as a new item if it doesn't exist
        cart.push(newItem);
    }

    // Save updated cart to localStorage
    saveCart();
    displayCartItems();
}

// Remove item from cart
function removeCartItem(index) {
    const item = cart[index];

    if (item.quantity > 1) {
        item.quantity -= 1; // Decrease quantity if more than 1
    } else {
        cart.splice(index, 1); // Remove the item if quantity is 1
    }

    saveCart();
    displayCartItems();
}

// Increase quantity of an item in the cart
function increaseQuantity(index) {
    cart[index].quantity += 1;
    saveCart();
    displayCartItems();
}

// Display Cart Items on Cart Page
function displayCartItems() {
    const cartItemsContainer = document.getElementById('cart-items');
    const cartTotalElement = document.getElementById('cart-total');
    let cartTotal = 0;

    cartItemsContainer.innerHTML = '';

    if (cart.length === 0) {
        const emptyMessage = document.createElement('p');
        emptyMessage.textContent = 'No products selected.';
        emptyMessage.style.fontSize = '1.2em';
        emptyMessage.style.color = '#d85e0f';
        cartItemsContainer.appendChild(emptyMessage);
    } else {
        cart.forEach((item, index) => {
            const itemTotal = item.price * item.quantity;
            cartTotal += itemTotal;

            const cartItem = document.createElement('div');
            cartItem.classList.add('cart-item');
            cartItem.innerHTML = `
                <div class="cart-item-image">
                    <img src="${item.image}" alt="${item.name}">
                </div>
                <div class="cart-item-details">
                    <h4>${item.name}</h4>
                    <p>Price: PKR ${item.price} x ${item.quantity} = PKR ${itemTotal.toFixed(2)}</p>
                    <div class="quantity-controls">
                        <span class="quantity-label">Quantity:</span>
                        <button class="quantity-btn remove-from-cart" onclick="removeCartItem(${index})">-</button>
                        <span class="quantity">${item.quantity}</span>
                        <button class="quantity-btn add-to-cart" onclick="increaseQuantity(${index})">+</button>
                    </div>
                </div>
            `;

            cartItemsContainer.appendChild(cartItem);
        });
    }

    cartTotalElement.textContent = `Total: PKR ${cartTotal.toFixed(2)}`;
}

// Load cart and display items on page load
document.addEventListener('DOMContentLoaded', function () {
    loadCart();
    displayCartItems();
});

    </script>

    <style>
      /* Cart Section Styles */
      
#cart {
    padding: 40px;
    text-align: center;
}

#cart h2 {
    font-size: 2.5em;
    margin-bottom: 20px;
    color: #d85e0f; /* Consistent color scheme */
}

#cart-items {
    display: flex;
    flex-direction: column;
    gap: 20px; /* Space between items */
    margin-bottom: 40px; /* Space before the summary */
}

.cart-item {
    background-color: #fff; /* White background for item */
    border-radius: 10px; /* Rounded corners */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Subtle shadow */
    padding: 20px; /* Space inside item */
    text-align: left; /* Align text to the left */
}

.cart-item img {
    width: 300px; /* Full width */
    height: auto; /* Maintain aspect ratio */
    border-radius: 10px; /* Rounded corners for images */
}

.cart-item h4 {
    font-size: 1.5em;
    margin: 10px 0;
    color: #333; /* Dark text */
}

.cart-item p {
    font-size: 1em;
    color: #666; /* Gray for description */
    margin-bottom: 15px;
}

/* Add these styles to your existing CSS */

.quantity-controls {
    display: flex;
    align-items: center;
    margin-top: 10px;
}

.quantity-label {
    margin-right: 10px;
    font-weight: bold;
}

.quantity-btn {
    width: 30px;
    height: 30px;
    font-size: 18px;
    line-height: 1;
    padding: 0;
    background-color: #f0f0f0;
    border: 1px solid #ccc;
    cursor: pointer;
}

.quantity {
    margin: 0 10px;
    font-size: 16px;
}

/* Modify your existing button styles */
.remove-from-cart, .add-to-cart {
    background-color: #f0f0f0;
    color: #333;
    border: 1px solid #ccc;
    padding: 5px 10px;
    border-radius: 3px;
    cursor: pointer;
    transition: background-color 0.3s;
    width: auto;
    margin-top: 0;
}

.remove-from-cart:hover, .add-to-cart:hover {
    background-color: #e0e0e0;
}
.checkout {
    background-color: #ff6347; /* Checkout button color */
    color: white; /* White text */
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
    margin-top: 20px; /* Space above the button */
}

.checkout:hover {
    background-color: #e53e31; /* Darker shade on hover */
}

/* Back to Home Button Styles */
.back-to-home {
    background-color: #f72200; /* Blue button color */
    color: white; /* White text */
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
    margin-top: 10px; /* Space above the button */
}

.back-to-home:hover {
    background-color:#ff5b00; /* Darker shade on hover */
}

/* Responsive Styles */
@media screen and (max-width: 768px) {
    #cart-items {
        flex-direction: column; /* Stack items vertically */
    }
}

@media screen and (max-width: 480px) {
    #cart-items {
        flex-direction: column; /* Stack items vertically */
    }
}
    </style>
</body>
</html>
