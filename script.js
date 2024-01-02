// navbar
const hamburger = document.querySelector(".hamburger");
const navMenu = document.querySelector(".nav-menu");

hamburger.addEventListener("click", mobileMenu);

function mobileMenu() {
    hamburger.classList.toggle("active");
    navMenu.classList.toggle("active");

    // Check if the menu is open or closed and change the style of the hamburger accordingly
    if (hamburger.classList.contains("active")) {
        // Menu is open, transform to "X"
        hamburger.innerHTML = "&#10006;"; // You can use any Unicode character for "X"
    } else {
        // Menu is closed, transform back to hamburger
        hamburger.innerHTML = '<span class="bar"></span><span class="bar"></span><span class="bar"></span>';
    }
}

const navLink = document.querySelectorAll(".nav-link");

navLink.forEach(n => n.addEventListener("click", closeMenu));

function closeMenu() {
    hamburger.classList.remove("active");
    navMenu.classList.remove("active");
    // Change the style of the hamburger back to the initial state
    hamburger.innerHTML = '<span class="bar"></span><span class="bar"></span><span class="bar"></span>';
}


//accordion
document.querySelectorAll('.accordionButton').forEach(button => {
    button.addEventListener('click', () => {
        const accordionContent = button.nextElementSibling;

        button.classList.toggle('accordionButtonActive');

        if (button.classList.contains('accordionButtonActive')) {
            accordionContent.style.maxHeight = accordionContent.scrollHeight + 'px';
        } else {
            accordionContent.style.maxHeight = 0;
        }
    })
})