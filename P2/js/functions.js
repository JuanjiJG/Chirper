// Function to validate the "login" form
function validateLoginForm() {
    var username = document.login-form.username.value;
    var password = document.login-form.password.value;

    if (username == "" || password == "") {
        alert("Introduce el nombre de usuario y la contraseña.");
        document.login-form.username.focus();
        document.login-form.username.focus();
        return false;
    }
    else if (password.length < 8) {
        alert("La contraseña debe ser de al menos 8 caracteres.");
        return false;
    }
}

// Function to validate the "register" form
function validateRegisterForm() {

}

// Function to validate the "new post" form
function validateNewPostForm() {

}

// Function to validate the "new comment" form
function validateNewCommentForm() {

}

// Function to validate the "update user info" form
function validateUpdateUserForm() {

}