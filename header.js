// Select the header element
const header = document.querySelector("header");

// Function to add or remove the "scrolled" class based on scroll position
function handleScroll() {
    if (window.scrollY > 50) {  // Adjust the scroll value as needed
        header.classList.add("scrolled");
    } else {
        header.classList.remove("scrolled");
    }
}

// Listen for the scroll event
window.addEventListener("scroll", handleScroll);
