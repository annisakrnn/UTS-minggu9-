document.getElementById('loginForm').addEventListener('submit', function(event) {
    let username = document.getElementById('username').value.trim();
    let password = document.getElementById('password').value.trim();
    let usernameError = document.getElementById('usernameError');
    let passwordError = document.getElementById('passwordError');

    usernameError.textContent = '';
    passwordError.textContent = '';

    let isValid = true;

    if (username === '') {
        usernameError.textContent = 'Harus terisi';
        isValid = false;
    }

    if (password === '') {
        passwordError.textContent = 'Harus terisi';
        isValid = false;
    } else if (password.length < 5) {
        passwordError.textContent = 'Password minimal 5 karakter';
        isValid = false;
    } else if (!/\d/.test(password)) {
        passwordError.textContent = 'Password harus terdiri dari huruf dan angka';
        isValid = false;
    }

    if (!isValid) {
        event.preventDefault();
    }
});

