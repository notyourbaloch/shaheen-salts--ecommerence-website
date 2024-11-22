<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="styles1.css">


    <title>Himalayan Store</title>
    <script src="script.js" defer></script>
</head>
<body>

<?php include 'header.php'; ?>

<!-- Popup Notification -->
<div id="popup" class="popup">
    <p id="popup-message">Item added to cart!</p>
    <button id="close-popup">Close</button>
</div>

    <!-- Hero Section -->
<section id="hero">
    <h2>Super Value Deals</h2>
    <h1>On All Products</h1>
    <p>Up to 50% Off</p>
    <a href="shop.php" class="shop-button">Shop Now</a> <!-- Updated button -->
</section>

    
   <!-- Featured Products Section -->
   <section id="featured-products">
    <h2>Featured Products</h2>
    <div class="slider">
        <div class="slider-wrapper">
                <div class="product-container">
                    <div class="product" data-category="lamp">
                        <div class="product-card">
                            <img src="pictures/download.jfif" alt="Himalayan Salt Moon Lamp">
                            <h3>Himalayan Salt Moon Lamp</h3>
                            <p class="price">₨2200</p>
                            <p class="description">Illuminate your space with the enchanting glow of our Himalayan Salt Moon Lamp.</p>
                            <button class="add-to-cart" data-product-id="prod1" data-product-name="Himalayan Salt Moon Lamp" data-product-price="2200">Add to Cart</button>
                        </div>
                    </div>
                    <div class="product" data-category="lamp">
                        <div class="product-card">
                            <img src="pictures/images (1).jfif" alt="Himalayan Salt Lamp">
                            <h3>Himalayan Salt Lamp</h3>
                            <p class="price">₨1650</p>
                            <p class="description">Illuminate your home with the charm of our Himalayan salt lamp.</p>
                            <button class="add-to-cart" data-product-id="prod2" data-product-name="Himalayan Salt Lamp" data-product-price="1650">Add to Cart</button>
                        </div>
                    </div>
                    <div class="product" data-category="lamp">
                        <div class="product-card">
                            <img src="pictures/images.jfif" alt="Himalayan Salt Swan Lamp">
                            <h3>Himalayan Salt Swan Lamp</h3>
                            <p class="price">₨5000</p>
                            <p class="description">Add elegance to your decor with our handcrafted Himalayan salt swan lamp.</p>
                            <button class="add-to-cart" data-product-id="prod3" data-product-name="Himalayan Salt Swan Lamp" data-product-price="5000">Add to Cart</button>
                        </div>
                    </div>
                    <div class="product" data-category="lantern">
                        <div class="product-card">
                            <img src="pictures/hsl.jfif" alt="Himalayan Salt Lantern">
                            <h3>Himalayan Salt Lantern</h3>
                            <p class="price">₨2210</p>
                            <p class="description">Experience the ambient glow of our Himalayan salt lantern.</p>
                            <button class="add-to-cart" data-product-id="prod4" data-product-name="Himalayan Salt Lantern" data-product-price="2210">Add to Cart</button>
                        </div>
                    </div>
                    <div class="product" data-category="scrub">
                        <div class="product-card">
                            <img src="pictures/hsss.jfif" alt="Himalayan Salt Scrub">
                            <h3>Himalayan Salt Scrub</h3>
                            <p class="price">₨2000</p>
                            <p class="description">Revitalize your skin with our Himalayan salt scrub.</p>
                            <button class="add-to-cart" data-product-id="prod5" data-product-name="Himalayan Salt Scrub" data-product-price="2000">Add to Cart</button>
                        </div>
                    </div>
                    <div class="product" data-category="block">
                        <div class="product-card">
                            <img src="pictures/hscp.jfif" alt="Himalayan Salt Cooking Block">
                            <h3>Himalayan Salt Cooking Block</h3>
                            <p class="price">₨2000</p>
                            <p class="description">Enhance your culinary experience with our Himalayan salt cooking block.</p>
                            <button class="add-to-cart" data-product-id="prod6" data-product-name="Himalayan Salt Cooking Block" data-product-price="2000">Add to Cart</button>
                        </div>
                    </div>
                    <div class="product" data-category="decor">
                        <div class="product-card">
                            <img src="pictures/hsd.jfif" alt="Himalayan Salt Decorative Piece">
                            <h3>Himalayan Salt Decor</h3>
                            <p class="price">₨2000</p>
                            <p class="description">Beautify your space with our unique Himalayan salt decorative piece.</p>
                            <button class="add-to-cart" data-product-id="prod7" data-product-name="Himalayan Salt Decor" data-product-price="2000">Add to Cart</button>
                        </div>
                    </div>
                </div>
            </div>
            <button class="slider-button left" id="prev-button">&#10094;</button>
            <button class="slider-button right" id="next-button">&#10095;</button>
    </div>
</section>
        </section>
        <section class="benefits-section">
            <div class="container">
              <h2>Why Choose Himalayan Store?</h2>
              <p class="intro-text">Discover the unique benefits of our Himalayan salt products, crafted to improve your wellness and enhance your living spaces.</p>
              <div class="benefits-list">
                <div class="benefit-item">
                  <img src="https://cdn-icons-png.flaticon.com/128/1460/1460537.png" alt="Authentic Icon">
                  <h3>100% Natural & Authentic</h3>
                  <p>Our products are sourced directly from the Himalayan salt mines, guaranteeing the purity and authenticity of each item.</p>
                </div>
                <div class="benefit-item">
                  <img src="https://cdn-icons-png.flaticon.com/128/6512/6512351.png" alt="Health Icon">
                  <h3>Health Benefits</h3>
                  <p>Himalayan salt lamps help purify the air, reduce allergens, and create a calming ambiance for your home or workspace.</p>
                </div>
                <div class="benefit-item">
                  <img src="https://cdn-icons-png.flaticon.com/128/4411/4411222.png" alt="Eco-Friendly Icon">
                  <h3>Eco-Friendly Packaging</h3>
                  <p>We use recyclable materials to reduce our carbon footprint, ensuring that our products are sustainable from start to finish.</p>
                </div>
                <div class="benefit-item">
                  <img src="https://cdn-icons-png.flaticon.com/128/3859/3859602.png" alt="Craftsmanship Icon">
                  <h3>Unique Craftsmanship</h3>
                  <p>Each product is handcrafted by skilled artisans, making every piece unique and a beautiful addition to any space.</p>
                </div>
                <div class="benefit-item">
                  <img src="https://cdn-icons-png.flaticon.com/128/1067/1067566.png" alt="Customer Support Icon">
                  <h3>Customer Satisfaction</h3>
                  <p>We are dedicated to providing excellent customer service and a satisfaction guarantee to ensure you love your products.</p>
                </div>
              </div>
            </div>
            
          </section>  
          <?php include 'footer.php'; ?>
          </html>