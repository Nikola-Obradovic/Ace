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
const exitFilters = document.querySelector('.exit-button-right');


if (openFilters && exitFilters) { //error prevention on pages where openFilters/exitFilters is undefined
    openFilters.addEventListener('click', () => {
        document.querySelector('.pop-up').classList.remove('hidden');
        document.querySelector('.dimmed-background').classList.remove('hidden');
    });

    exitFilters.addEventListener('click', () => {
        document.querySelector('.pop-up').classList.add('hidden');
        document.querySelector('.dimmed-background').classList.add('hidden');
    });

}

const purchaseListing = document.querySelector('.purchase-button');
const exitPayment = document.querySelector('.exit-button-payment');

if (purchaseListing && exitPayment) {
    purchaseListing.addEventListener('click', () => {
        document.querySelector('.transaction-pop-up').classList.remove('hidden');
        document.querySelector('.dimmed-background').classList.remove('hidden');
    });

    exitPayment.addEventListener('click', () => {
        document.querySelector('.transaction-pop-up').classList.add('hidden');
        document.querySelector('.dimmed-background').classList.add('hidden');
    });
}



const itemInputsArr = document.querySelectorAll('.item-inputs');
const typeInputSelect = document.querySelector('#type-input-select');

if (typeInputSelect) {
    typeInputSelect.addEventListener('change', function () {

        let selectedOption = this.value;
        switch (selectedOption) {
            case "Cars":
                itemInputsArr.forEach(input => {
                    input.classList.add('hidden');

                });
                itemInputsArr[0].classList.remove('hidden');


                break;
            case "Housings":
                itemInputsArr.forEach(input => {
                    input.classList.add('hidden');

                });
                itemInputsArr[1].classList.remove('hidden');
                break;
            case "Smartphones":
                itemInputsArr.forEach(input => {
                    input.classList.add('hidden');

                });
                itemInputsArr[2].classList.remove('hidden');
                break;
            case "Shoes":
                itemInputsArr.forEach(input => {
                    input.classList.add('hidden');

                });
                itemInputsArr[3].classList.remove('hidden');
                break;
            case "Laptops":
                itemInputsArr.forEach(input => {
                    input.classList.add('hidden');

                });
                itemInputsArr[4].classList.remove('hidden');
                break;

            default:
                itemInputsArr.forEach(input => {
                    input.classList.add('hidden');

                });
                break;

        }


    });
}


const searchInputs = document.querySelectorAll('.searchInput');
searchInputs.forEach(searchInput => {
    searchInput.addEventListener('keydown', function (event) {
        if (event.key === "Enter") { // Check if the pressed key is Enter
            event.preventDefault(); // Prevent default form submission
            this.form.submit();
        }
    });
});


const paymentForm = document.querySelectorAll('.form-payment');
const paymentOptions = document.querySelector('.payment-options');



if (paymentOptions) {
    paymentOptions.addEventListener('change', function () {
        let selectedOption = this.value;

        switch (selectedOption) {
            case "Credit Card":
                paymentForm[0].classList.remove('hidden');
                paymentForm[1].classList.add('hidden');
                break;

            case "Paypal":
                paymentForm[1].classList.remove('hidden');
                paymentForm[0].classList.add('hidden');
                break;
        }
    });


}

const commentsBtn = document.querySelector('.comments-btn');

if(commentsBtn) {
    commentsBtn.addEventListener('click', () => {
        document.querySelector('.comment-section').classList.toggle('hidden');
    });
}

const replyBtn = document.querySelectorAll('.reply');

if(replyBtn) {
    replyBtn.forEach(function (element) {
        element.addEventListener('click', function(event){

            let commentId = event.target.getAttribute('reply-id');

            /*

            document.querySelectorAll('.reply-comment').forEach(function(replyComment) {
                replyComment.classList.add('hidden');
            });

             */

            let replyComment = document.getElementById('reply-comment-' + commentId);
            if (replyComment) {
                replyComment.classList.toggle('hidden');
            }

            //document.querySelector('.reply-comment').classList.toggle('hidden');
        });
    });
}