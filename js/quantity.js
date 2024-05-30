document.addEventListener('DOMContentLoaded', function () {
    const quantityContainer = document.querySelector('.quantity-container');
    const quantityInput = quantityContainer.querySelector('.quantity-input');
    const incrementButton = quantityContainer.querySelector('.increment');
    const decrementButton = quantityContainer.querySelector('.decrement');

    incrementButton.addEventListener('click', function () {
        if(quantityInput.value < quantityInput.max) {
            quantityInput.value = parseInt(quantityInput.value) + 1;
            updateQuantity(quantityInput.value);
        }
    });

    decrementButton.addEventListener('click', function () {
        if (quantityInput.value > quantityInput.min) {
            quantityInput.value = parseInt(quantityInput.value) - 1;
            updateQuantity(quantityInput.value);
        }
    });



    function updateQuantity(quantity) {
        const xhr = new XMLHttpRequest();
        xhr.open('POST', '../public/listing.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                console.log(xhr.responseText);
            }
        };
        xhr.send('quantity=' + quantity);

    }
});






