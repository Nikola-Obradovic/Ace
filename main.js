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


const filterButtons = document.querySelectorAll('.red-circle-button');
const filterSections = document.querySelectorAll('.filter-section');
const mainSection = document.querySelector('.main-section');
filterButtons.forEach(button => {
    button.addEventListener('click', () => {
        mainSection.classList.add('hidden')
        let currentSection;
        for (let i=0; i<filterButtons.length; i++) {
            if(filterButtons[i]!==button){
                filterButtons[i].classList.remove('active');
                filterSections[i].classList.add('hidden');
            }else{
                currentSection = filterSections[i];
            }
        }

        if (!button.classList.contains('active')){
        button.classList.add('active');
        currentSection.classList.remove('hidden');

        }
        else{
            button.classList.remove('active');
            currentSection.classList.add('hidden');
            mainSection.classList.remove('hidden');
        }
    });
});

//filters button main
const openFilters = document.querySelector('.filters-button');
const exitFilters = document.querySelector('.exit-button-left');
const main = document.querySelector("main");
openFilters.addEventListener('click', () => {
    document.querySelector('.pop-up').classList.remove('hidden');
    //document.querySelector('.dimmed-background').classList.remove('hidden');
});

exitFilters.addEventListener('click', () => {
   document.querySelector('.pop-up').classList.add('hidden');
    //document.querySelector('.dimmed-background').classList.add('hidden');
});

/*

main.addEventListener('click', () => {
    if( !document.querySelector('.pop-up').classList.contains("hidden") ){
        document.querySelector('.pop-up').classList.add('hidden');
    }
});


 */