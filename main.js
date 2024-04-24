const header = document.querySelector(".header");

const btnToggleNav = document.querySelector(".btn-mobile-nav");

//hamburger event listener
btnToggleNav.addEventListener("click", () =>
    header.classList.toggle("nav-open")
);




const navLinks = document.querySelectorAll('.main-nav-link');
const pageURL = window.location.pathname

/* runs each time the page is reloaded (when you open page for the first time or press link to another page), not an event listener because it would not apply the property when you open the page for the first time*/
for (const link of navLinks) {

    if (pageURL.includes(link.getAttribute('href').split('/').pop())){

        link.classList.add('current-link');

    }else if (link.classList.contains('current-link')){

        link.classList.remove('current-link')
    }


}