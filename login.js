


// Function to check if the user exists in localStorage
function userExists(email) {
    const users = JSON.parse(localStorage.getItem('users')) || [];
    return users.some(user => user.email === email);
}

// Function to add a new user
function addUser(email, password) {
    const users = JSON.parse(localStorage.getItem('users')) || [];
    users.push({ email, password });
    localStorage.setItem('users', JSON.stringify(users));
}

// Function to check user credentials
function validateUser(email, password) {
    const users = JSON.parse(localStorage.getItem('users')) || [];
    return users.some(user => user.email === email && user.password === password);
}

// Handling sign-up
document.getElementById('signupBtn').addEventListener('click', function() {
    const email = document.getElementById('signupEmail').value;
    const password = document.getElementById('signupPassword').value;

    if (email === "" || password === "") {
        alert("Please fill in all fields for sign up.");
    } else if (userExists(email)) {
        alert("User already exists. Please log in.");
    } else {
        addUser(email, password);
        alert("Sign up successful!");
        document.querySelector('.cont').classList.toggle('s--signup');
    }
});

// Handling login
document.getElementById('signinBtn').addEventListener('click', function() {
    const email = document.getElementById('signinEmail').value;
    const password = document.getElementById('signinPassword').value;

    if (email === "" || password === "") {
        alert("Please fill in both email and password for sign in.");
    } else if (validateUser(email, password)) {
        alert("Login successful!");
        // Proceed with user login
    } else {
        alert("Invalid credentials. Please try again or sign up.");
    }
});
