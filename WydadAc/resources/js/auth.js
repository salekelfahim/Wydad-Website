const container = document.getElementById('container');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');

registerBtn.addEventListener('click', () => {
    container.classList.add("active");
});

loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
});

const form = document.querySelector('form');

form.addEventListener('submit', function(event) {
    event.preventDefault(); 

    const firstnameInput = document.getElementById('firstname');
    const lastnameInput = document.getElementById('lastname');
    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');

    const firstnameError = document.getElementById('firstnameError');
    const lastnameError = document.getElementById('lastnameError');
    const emailError = document.getElementById('emailError');
    const passwordError = document.getElementById('passwordError');

    const nameRegex = /^[a-zA-Z\s]+$/;
    const emailRegex = /^\S+@\S+\.\S+$/;
    const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;

    if (!nameRegex.test(firstnameInput.value)) {
        firstnameError.textContent = 'Please enter a valid first name';
        return;
    } else {
        firstnameError.textContent = '';
    }

    if (!nameRegex.test(lastnameInput.value)) {
        lastnameError.textContent = 'Please enter a valid last name';
        return;
    } else {
        lastnameError.textContent = '';
    }

    if (!emailRegex.test(emailInput.value)) {
        emailError.textContent = 'Please enter a valid email address';
        return;
    } else {
        emailError.textContent = '';
    }

    if (!passwordRegex.test(passwordInput.value)) {
        passwordError.textContent = 'Password must contain at least 8 characters, including one uppercase letter, one lowercase letter, and one number';
        return;
    } else {
        passwordError.textContent = '';
    }

    this.submit();
});

