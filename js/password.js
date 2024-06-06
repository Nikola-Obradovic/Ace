const eyeIcon = document.querySelector('.eye-container');

if(eyeIcon) {
    eyeIcon.addEventListener('click', () => {
        const passwordInput = document.querySelector('.password-input');
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
    });
}