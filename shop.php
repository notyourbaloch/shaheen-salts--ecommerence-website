<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="styles1.css">
    <link rel="stylesheet" href="shop.css"> <!-- Link to new shop styles -->
    <script src="shop.js" defer></script>
    <title>Shop Now - Himalayan Store</title>
</head>

   <!-- Popup Notification -->
   <div id="popup" class="popup">
    <p id="popup-message">Item added to cart!</p>
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
});</script>       <!-- Shop page HTML -->
  
    
    <!-- Shop Now Section -->
    <section id="shop-now">
        <h1>All Products</h1>
        
        <section id="categories">
            <h3>Shop by Category</h3>
            <div class="category-list">
                <button class="category-btn" data-category="all">All</button>
                <button class="category-btn" data-category="lamp">Lamps</button>
                <button class="category-btn" data-category="lantern">Lanterns</button>
                <button class="category-btn" data-category="scrub">Scrubs</button>
                <button class="category-btn" data-category="block">Cooking Blocks</button>
                <button class="category-btn" data-category="decor">Decor</button>
            </div>
        </section>
        <div class="product-container">
            <div class="product" data-category="lamp">
                <div class="product-card">
                    <img src="pictures/download.jfif" alt="Himalayan Salt Moon Lamp">
                    <h3>Himalayan Moon Lamp</h3>
                    <p class="price">₨2200</p>
                    <p class="description" style="display: none;">Illuminate your space with the enchanting glow of our handcrafted Himalayan Salt Moon Lamp. Made from natural, high-quality Himalayan salt, this lamp exudes a soothing, calming light that promotes relaxation and well-being. Its unique, artisan design not only adds a touch of elegance to your decor but also purifies the air by emitting negative ions. </p>
                    <button class="add-to-cart" data-product-id="prod1" >Add to Cart</button>
                    <button class="view-product" >View Description</button>
                </div>
            </div>
            <div class="product" data-category="lamp">
                <div class="product-card">
                    <img src="pictures/images (1).jfif" alt="Himalayan Salt Lamp">
                    <h3>Himalayan Salt Lamp</h3>
                    <p class="price">₨1650</p>
                    <p class="description" style="display: none;">Illuminate your home with the timeless charm of our Himalayan Salt Lamp, crafted from 100% pure, premium-grade Himalayan salt crystals sourced directly from the Himalayan mountains. This natural work of art not only enhances your decor with its organic beauty but also contributes to a healthier living space. Each lamp is uniquely hand-carved. </p>
                    <button class="add-to-cart" data-product-id="prod2">Add to Cart</button>
                    <button class="view-product">View Description</button>
                </div>
            </div>
            <div class="product" data-category="lamp">
                <div class="product-card">
                    <img src="pictures/images.jfif" alt="Himalayan Salt Swan Bird Lamp">
                    <h3>Himalayan Swan Lamp</h3>
                    <p class="price">₨5000</p>
                    <p class="description" style="display: none;">Add sophistication and elegance to your decor with our beautifully handcrafted Himalayan Salt Swan Lamp. This stunning piece, carved meticulously from 100% natural Himalayan salt crystals, combines unique artistry with functional benefits, making it a true statement piece for any room. Its graceful swan shape not only adds an enchanting charm.</p>
                    <button class="add-to-cart" data-product-id="prod3">Add to Cart</button>
                    <button class="view-product" >View Description</button>
                </div>
            </div>
            <div class="product" data-category="lantern">
                <div class="product-card">
                    <img src="pictures/hsl.jfif" alt="Himalayan Salt Lantern">
                    <h3>Himalayan Salt Lantern</h3>
                    <p class="price">₨2000</p>
                    <p class="description" style="display: none;">Experience the ambient glow of our Himalayan salt lantern. Ideal for any setting, this lantern not only illuminates but also adds a touch of natural beauty. Crafted from high-quality Himalayan salt, it emits a calming light that soothes the senses. Perfect for creating a peaceful environment during meditation or unwinding after a long day.</p>
                    <button class="add-to-cart" data-product-id="prod4">Add to Cart</button>
                    <button class="view-product" >View Description</button>
                </div>
            </div>
            <div class="product" data-category="scrub">
                <div class="product-card">
                    <img src="pictures/hsss.jfif" alt="Himalayan Salt Scrubs & Soaps">
                    <h3>Himalayan Salt Scrub</h3>
                    <p class="price">₨2210</p>
                    <p class="description" style="display: none;">Revitalize your skin with our Himalayan salt scrub. Infused with natural ingredients, it gently exfoliates to reveal smoother, healthier skin. The minerals in Himalayan salt nourish your skin while promoting relaxation. This scrub is perfect for pampering yourself or as a gift for loved ones who appreciate self-care. Enjoy a spa-like experience at home.</p>
                    <button class="add-to-cart" data-product-id="prod5">Add to Cart</button>
                    <button class="view-product">View Description</button>
                </div>
            </div>
            <div class="product" data-category="block">
                <div class="product-card">
                    <img src="pictures/hscp.jfif" alt="Himalayan Salt Cooking Block">
                    <h3>Himalayan Cook Block</h3>
                    <p class="price">₨1000</p>
                    <p class="description" style="display: none;">Enhance your culinary experience with our Himalayan salt cooking block. Perfect for grilling, chilling, or serving, this block adds a unique flavor to your dishes. Its natural properties allow for even heating, ensuring your food cooks perfectly. Impress your guests with this innovative cooking tool that not only elevates your meals but also looks great on any table.</p>
                    <button class="add-to-cart" data-product-id="prod6">Add to Cart</button>
                    <button class="view-product" >View Description</button>
                </div>
            </div>
            <div class="product" data-category="decor">
                <div class="product-card">
                    <img src="pictures/candle hol.jfif" alt="Himalayan Salt Candle Holder">
                    <h3>Himalayan Candle Holder</h3>
                    <p class="price">₨2500</p>
                    <p class="description" style="display: none;">Illuminate your space with our handcrafted Himalayan Salt Candle Holder. Each piece is carved from pure Himalayan salt, providing a warm glow when a candle is lit. This unique candle holder not only adds a soothing ambiance but also purifies the air, creating a peaceful environment in your home.</p>
                    <button class="add-to-cart" data-product-id="prod7">Add to Cart</button>
                    <button class="view-product">View Description</button>
                </div>
            </div>
            
            <div class="product" data-category="block">
                <div class="product-card">
                    <img src="pictures/salt bowl.jfif" alt="Himalayan Salt Bowl">
                    <h3>Himalayan Salt Bowl</h3>
                    <p class="price">₨3000</p>
                    <p class="description" style="display: none;">Serve your favorite snacks in style with our exquisite Himalayan Salt Bowl. Each bowl is meticulously crafted from natural Himalayan salt, adding a unique touch to your dining experience. It naturally enhances the flavor of your food and can be chilled or heated, making it perfect for both appetizers and desserts.</p>
                    <button class="add-to-cart" data-product-id="prod8">Add to Cart</button>
                    <button class="view-product">View Description</button>
                </div>
            </div>
            
            <div class="product" data-category="decor">
                <div class="product-card">
                    <img src="pictures/coaster set.jfif" alt="Himalayan Salt Coaster Set">
                    <h3>Himalayan Coaster Set</h3>
                    <p class="price">₨1500</p>
                    <p class="description" style="display: none;">Protect your surfaces with our beautiful Himalayan Salt Coaster Set. Handcrafted from authentic Himalayan salt, these coasters not only prevent water rings but also provide a unique aesthetic to your home. Their natural properties help to absorb moisture and keep your drinks chilled for longer.</p>
                    <button class="add-to-cart" data-product-id="prod9">Add to Cart</button>
                    <button class="view-product">View Description</button>
                </div>
            </div>
            <div class="product" data-category="scrub">
                <div class="product-card">
                    <img src="pictures/massage stones.jfif" alt="Himalayan Salt Massage Stone">
                    <h3>Massage Stone</h3>
                    <p class="price">₨1800</p>
                    <p class="description" style="display: none;">Indulge in relaxation with our Himalayan Salt Massage Stone. Perfect for soothing tired muscles, this massage stone retains heat for long periods, making it ideal for therapeutic massages. Its natural mineral content nourishes the skin, leaving you feeling refreshed and rejuvenated.</p>
                    <button class="add-to-cart" data-product-id="prod10">Add to Cart</button>
                    <button class="view-product">View Description</button>
                </div>
            </div>
            <div class="product" data-category="lamp">
                <div class="product-card">
                    <img src="pictures/hsd.jfif" alt="Himalayan Salt Sphere Lamp">
                    <h3>Himalayan Sphere Lamp</h3>
                    <p class="price">₨2500</p>
                    <p class="description" style="display: none;">Transform your space with our Himalayan Salt Sphere Lamp. This unique lamp, shaped like a sphere, emits a soft, warm glow that enhances any room's ambiance. The natural properties of Himalayan salt help purify the air, making it a stylish and healthy addition to your home.</p>
                    <button class="add-to-cart" data-product-id="prod11">Add to Cart</button>
                    <button class="view-product">View Description</button>
                </div>
            </div>
            
            <div class="product" data-category="decor">
                <div class="product-card">
                    <img src="pictures/wall art.jfif" alt="Himalayan Salt Wall Art">
                    <h3>Himalayan Wall Art</h3>
                    <p class="price">₨5000</p>
                    <p class="description" style="display: none;">Add a touch of elegance to your home with our Himalayan Salt Wall Art. Each piece is uniquely crafted from natural Himalayan salt, creating a stunning focal point for any room. This wall art not only enhances your decor but also provides the air-purifying benefits of salt.</p>
                    <button class="add-to-cart" data-product-id="prod12">Add to Cart</button>
                    <button class="view-product">View Description</button>
                </div>
            </div>
            
            <div class="product" data-category="decor">
                <div class="product-card">
                    <img src="pictures/flower vase.jfif" alt="Himalayan Salt Flower Vase">
                    <h3>Himalayan Flower Vase</h3>
                    <p class="price">₨3500</p>
                    <p class="description" style="display: none;">Showcase your favorite blooms in our Himalayan Salt Flower Vase. Each vase is uniquely crafted from authentic Himalayan salt, adding a natural touch to your decor. Its beautiful design complements any room, while the salt naturally purifies the air around it.</p>
                    <button class="add-to-cart" data-product-id="prod13">Add to Cart</button>
                    <button class="view-product">View Description</button>
                </div>
            </div>
            
            <div class="product" data-category="lamp">
                <div class="product-card">
                    <img src="pictures/heart lamp.jfif" alt="Himalayan Salt Heart Lamp">
                    <h3>Himalayan Heart Lamp</h3>
                    <p class="price">₨2800</p>
                    <p class="description" style="display: none;">Spread love with our Himalayan Salt Heart Lamp. This charming lamp is carved from pure Himalayan salt, providing a warm, inviting glow that enhances any space. Perfect for bedrooms, living rooms, or as a thoughtful gift for someone special.</p>
                    <button class="add-to-cart" data-product-id="prod14">Add to Cart</button>
                    <button class="view-product">View Description</button>
                </div>
            </div>
            
            <div class="product" data-category="scrub">
                <div class="product-card">
                    <img src="pictures/lip scrrub.jfif" alt="Himalayan Salt Lip Scrub">
                    <h3>Himalayan Lip Scrub</h3>
                    <p class="price">₨1000</p>
                    <p class="description" style="display: none;">Keep your lips soft and smooth with our Himalayan Salt Lip Scrub. Formulated with natural ingredients, this scrub gently exfoliates while moisturizing your lips, leaving them feeling refreshed and revitalized. Ideal for everyday use.</p>
                    <button class="add-to-cart" data-product-id="prod15">Add to Cart</button>
                    <button class="view-product">View Description</button>
                </div>
            </div>
            
        </div>
    </section>

    
    
    <?php include 'footer.php'; ?>
    </html>