<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="deals.css">
    <link rel="stylesheet" href="shop.css"> <!-- Link to new shop styles -->
    <script src="deals.js" defer></script>


    <title>Shop Now - Himalayan Store</title>
   
    <style>
        .popup {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            z-index: 1000;
            display: none;
        }

        .popup button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .popup button:hover {
            background-color: #3e8e41;
        }
    </style>
</head>
<!-- Popup Notification -->
<div id="popup" class="popup">
    <p id="popup-message">Deal added to cart!</p>
    <button id="close-popup">Close</button>
</div>

<body>
<?php include 'header.php'; ?>

<script>   document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('search-input'); // Updated ID
    const searchButton = document.querySelector('#search-bar button'); // Get the button inside the search bar
    const dealCards = document.querySelectorAll('.product-card');

    // Function to search and display relevant results
    function performSearch() {
        const searchQuery = searchInput.value.trim().toLowerCase();
        
        // Filter products based on search query
        if (searchQuery) {
            dealCards.forEach(card => {
                const productName = card.querySelector('h3').textContent.toLowerCase();
                card.style.display = productName.includes(searchQuery) ? 'block' : 'none';
            });
        } else {
            // If search is empty, display all products
            dealCards.forEach(card => card.style.display = 'block');
        }
    }

    // Redirect to shop.html when mouse is over the search input
    searchInput.addEventListener('mouseover', () => {
        // Only redirect if the input is not focused
        if (document.activeElement !== searchInput) {
            window.location.href = 'shop.php'; // Redirect to shop.html
        }
    });

    // Redirect to shop.html when mouse is over the button
    searchButton.addEventListener('mouseover', () => {
        // Only redirect if the input is not focused
        if (document.activeElement !== searchInput) {
            window.location.href = 'shop.php'; // Redirect to shop.html
        }
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
});</script>    <!-- Deals Section -->
    <section id="deals">
        <div class="timer"></div> <!-- Timer Display -->
        <h2>Exclusive Product Deals</h2>
        <div class="deal-container">
            <!-- Deal 1 -->
            <div class="deal-card">
                <div class="deal-images">
                    <img src="pictures/download.jfif" alt="Moon Lamp">
                    <img src="pictures/hsd.jfif" alt="Sphere Lamp">
                    <img src="pictures/heart lamp.jfif" alt="Heart Lamp">
                </div>
                <h3>Himalayan Salt Moon Lamp + Sphere Lamp + Heart Lamp</h3>
                <p class="original-price">Original Price: ₨7500</p>
                <p class="deal-price">Deal Price: ₨6800</p>
                <button class="add-to-cart" 
                    data-deal-id="deal1" 
                    data-products='[
                        {"id": "prod1", "name": "Himalayan Salt Moon Lamp", "price": 2200, "image": "pictures/download.jfif"},
                        {"id": "prod11", "name": "Himalayan Salt Sphere Lamp", "price": 1650, "image": "pictures/hsd.jfif"},
                        {"id": "prod14", "name": "Himalayan Salt Heart Lamp", "price": 5000, "image": "pictures/heart lamp.jfif"}
                    ]'>Add All to Cart</button>
            </div>

            <!-- Deal 2 -->
            <div class="deal-card">
                <div class="deal-images">
                    <img src="pictures/images.jfif" alt="Swan Lamp">
                    <img src="pictures/images (1).jfif" alt="Lantern">
                    <img src="pictures/coaster set.jfif" alt="Coaster Set">
                </div>
                <h3>Himalayan Salt Swan Lamp + Lantern + Coaster Set</h3>
                <p class="original-price">Original Price: ₨8500</p>
                <p class="deal-price">Deal Price: ₨7800</p>
                <button class="add-to-cart" 
                    data-deal-id="deal2" 
                    data-products='[
                        {"id": "prod3", "name": "Himalayan Salt Swan Lamp", "price": 5000, "image": "pictures/images.jfif"},
                        {"id": "prod2", "name": "Lantern", "price": 2000, "image": "pictures/images (1).jfif"},
                        {"id": "prod9", "name": "Coaster Set", "price": 1500, "image": "pictures/coaster set.jfif"}
                    ]'>Add All to Cart</button>
            </div>

            <!-- Deal 3 -->
            <div class="deal-card">
                <div class="deal-images">
                    <img src="pictures/hscp.jfif" alt="Cooking Block">
                    <img src="pictures/salt bowl.jfif" alt="Salt Bowl">
                    <img src="pictures/candle hol.jfif" alt="Candle Holder">
                </div>
                <h3>Himalayan Cooking Block + Salt Bowl + Candle Holder</h3>
                <p class="original-price">Original Price: ₨6500</p>
                <p class="deal-price">Deal Price: ₨5900</p>
                <button class="add-to-cart" 
                    data-deal-id="deal3" 
                    data-products='[
                        {"id": "prod6", "name": "Cooking Block", "price": 3000, "image": "pictures/hscp.jfif"},
                        {"id": "prod8", "name": "Salt Bowl", "price": 2000, "image": "pictures/salt bowl.jfif"},
                        {"id": "prod7", "name": "Candle Holder", "price": 500, "image": "pictures/candle hol.jfif"}
                    ]'>Add All to Cart</button>
            </div>

            <!-- Deal 4 -->
            <div class="deal-card">
                <div class="deal-images">
                    <img src="pictures/hsss.jfif" alt="Salt Scrub">
                    <img src="pictures/massage stones.jfif" alt="Massage Stone">
                    <img src="pictures/lip scrrub.jfif" alt="Lip Scrub">
                </div>
                <h3>Himalayan Salt Scrub + Massage Stone + Lip Scrub</h3>
                <p class="original-price">Original Price: ₨5010</p>
                <p class="deal-price">Deal Price: ₨4500</p>
                <button class="add-to-cart" 
                    data-deal-id="deal4" 
                    data-products='[
                        {"id": "prod5", "name": "Salt Scrub", "price": 2000, "image": "pictures/hsss.jfif"},
                        {"id": "prod10", "name": "Massage Stone", "price": 1500, "image": "pictures/massage stones.jfif"},
                        {"id": "prod15", "name": "Lip Scrub", "price": 1510, "image": "pictures/lip scrrub.jfif"}
                    ]'>Add All to Cart</button>
            </div>

            <!-- Deal 5 -->
            <div class="deal-card">
                <div class="deal-images">
                    <img src="pictures/hsl.jfif" alt="Salt Lamp">
                    <img src="pictures/wall art.jfif" alt="Wall Art">
                    <img src="pictures/istockphoto-1052198822-612x612.jpg" alt="Flower Vase">
                </div>
                <h3>Himalayan Salt Lamp + Wall Art + Flower Vase</h3>
                <p class="original-price">Original Price: ₨9650</p>
                <p class="deal-price">Deal Price: ₨8900</p>
                <button class="add-to-cart" 
                    data-deal-id="deal5" 
                    data-products='[
                        {"id": "prod2", "name": "Himalayan Salt Lamp", "price": 3000, "image": "pictures/hsl.jfif"},
                        {"id": "prod12", "name": "Wall Art", "price": 3000, "image": "pictures/wall art.jfif"},
                        {"id": "prod13", "name": "Flower Vase", "price": 2900, "image": "pictures/istockphoto-1052198822-612x612.jpg"}
                    ]'>Add All to Cart</button>
            </div>
        </div>
    </section>

    <!-- Cart Section -->
    <section id="cart-section"></section>

  
    <?php include 'footer.php'; ?>
    </html>
   