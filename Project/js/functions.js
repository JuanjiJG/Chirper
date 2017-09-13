// Function to validate the "login" form
function validateLoginForm() {
    var username = document.forms["login-form"]["username"];
    var password = document.forms["login-form"]["password"];
    var letters_numbers = /^[0-9a-zA-ZñÑ]+$/;

    if (username.value == "") {
        alert("Introduce el nombre de usuario.");
        username.focus();
        return false;
    }
    else if (!username.value.match(letters_numbers)) {
        alert("El nombre de usuario no puede contener caracteres especiales.");
        username.focus();
        return false;
    }
    else if (username.value.length > 50 || username.value.length < 4) {
        alert("El nombre de usuario debe contener al menos 4 caracteres y no exceder los 50 caracteres.");
        username.focus();
        return false;
    }

    if (password.value == "") {
        alert("Introduce la contraseña.");
        password.focus();
        return false;
    }
    else if (password.value.length < 8 || password.value.length > 25) {
        alert("La contraseña debe ser de al menos 8 caracteres y no exceder los 25 caracteres.");
        password.focus();
        return false;
    }
}

// Function to validate the "register" form
function validateRegisterForm() {
    var first_name = document.forms["register-form"]["first-name"];
    var last_name = document.forms["register-form"]["last-name"];
    var username = document.forms["register-form"]["username"];
    var password = document.forms["register-form"]["password"];
    var repeat_password = document.forms["register-form"]["repeat-password"];
    var letters_numbers = /^[0-9a-zA-ZñÑ]+$/;

    if (first_name.value == "") {
        alert("Introduce el nombre.");
        first_name.focus();
        return false;
    }
    else if (!first_name.value.match(letters_numbers)) {
        alert("El nombre no puede contener caracteres especiales.");
        first_name.focus();
        return false;
    }
    else if (first_name.value.length > 50 || first_name.value.length < 4) {
        alert("El nombre debe contener al menos 4 caracteres y no exceder los 50 caracteres.");
        first_name.focus();
        return false;
    }

    if (last_name.value == "") {
        alert("Introduce el apellido.");
        last_name.focus();
        return false;
    }
    else if (!last_name.value.match(letters_numbers)) {
        alert("El apellido no puede contener caracteres especiales.");
        last_name.focus();
        return false;
    }
    else if (last_name.value.length > 50 || last_name.value.length < 4) {
        alert("El apellido debe contener al menos 4 caracteres y no exceder los 50 caracteres.");
        last_name.focus();
        return false;
    }

    if (username.value == "") {
        alert("Introduce el nombre de usuario.");
        username.focus();
        return false;
    }
    else if (!username.value.match(letters_numbers)) {
        alert("El nombre de usuario no puede contener caracteres especiales.");
        username.focus();
        return false;
    }
    else if (username.value.length > 50 || username.value.length < 4) {
        alert("El nombre de usuario debe contener al menos 4 caracteres y no exceder los 50 caracteres.");
        username.focus();
        return false;
    }

    if (password.value == "") {
        alert("Introduce la contraseña.");
        password.focus();
        return false;
    }
    else if (password.value.length < 8 || password.value.length > 25) {
        alert("La contraseña debe ser de al menos 8 caracteres y no exceder los 25 caracteres.");
        password.focus();
        return false;
    }
    else if (password.value != repeat_password.value) {
        alert("Las contraseñas deben coincidir.");
        repeat_password.focus();
        return false;
    }
}

// Function to validate the "new post" form
function validateNewPostForm() {
    var title = document.forms["new-post-form"]["title"];
    var content = document.forms["new-post-form"]["content"];

    if (title.value == "") {
        alert("Introduce un título para la entrada.");
        title.focus();
        return false;
    }
    else if (title.value.length > 50 || title.value.length < 4) {
        alert("El título debe contener al menos 4 caracteres y no exceder los 50 caracteres.");
        title.focus();
        return false;
    }

    if (content.value == "") {
        alert("Introduce texto en el comentario.");
        content.focus();
        return false;
    }
    else if (content.value.length > 500 || content.value.length < 4) {
        alert("El comentario debe contener al menos 4 caracteres y no exceder los 500 caracteres.");
        content.focus();
        return false;
    }
}

// Function to validate the "new comment" form
function validateNewCommentForm() {
    var content = document.forms["new-comment-form"]["content"];

    if (content.value == "") {
        alert("Introduce texto en el comentario.");
        content.focus();
        return false;
    }
    else if (content.value.length > 500 || content.value.length < 4) {
        alert("El comentario debe contener al menos 4 caracteres y no exceder los 500 caracteres.");
        content.focus();
        return false;
    }
}

// Function to validate the "update user info" form
function validateUpdateUserForm() {
    var first_name = document.forms["active-profile-form"]["edit-first-name"];
    var last_name = document.forms["active-profile-form"]["edit-last-name"];
    var username = document.forms["active-profile-form"]["edit-username"];
    var password = document.forms["active-profile-form"]["edit-password"];
    var repeat_password = document.forms["active-profile-form"]["edit-repeat-password"];
    var letters_numbers = /^[0-9a-zA-ZñÑ]+$/;

    if (first_name.value == "") {
        alert("Introduce el nombre.");
        first_name.focus();
        return false;
    }
    else if (!first_name.value.match(letters_numbers)) {
        alert("El nombre no puede contener caracteres especiales.");
        first_name.focus();
        return false;
    }
    else if (first_name.value.length > 50 || first_name.value.length < 4) {
        alert("El nombre debe contener al menos 4 caracteres y no exceder los 50 caracteres.");
        first_name.focus();
        return false;
    }

    if (last_name.value == "") {
        alert("Introduce el apellido.");
        last_name.focus();
        return false;
    }
    else if (!last_name.value.match(letters_numbers)) {
        alert("El apellido no puede contener caracteres especiales.");
        last_name.focus();
        return false;
    }
    else if (last_name.value.length > 50 || last_name.value.length < 4) {
        alert("El apellido debe contener al menos 4 caracteres y no exceder los 50 caracteres.");
        last_name.focus();
        return false;
    }

    if (username.value == "") {
        alert("Introduce el nombre de usuario.");
        username.focus();
        return false;
    }
    else if (!username.value.match(letters_numbers)) {
        alert("El nombre de usuario no puede contener caracteres especiales.");
        username.focus();
        return false;
    }
    else if (username.value.length > 50 || username.value.length < 4) {
        alert("El nombre de usuario debe contener al menos 4 caracteres y no exceder los 50 caracteres.");
        username.focus();
        return false;
    }

    if (password.value == "") {
        alert("Introduce la contraseña.");
        password.focus();
        return false;
    }
    else if (password.value.length < 8 || password.value.length > 25) {
        alert("La contraseña debe ser de al menos 8 caracteres y no exceder los 25 caracteres.");
        password.focus();
        return false;
    }
    else if (password.value != repeat_password.value) {
        alert("Las contraseñas deben coincidir.");
        repeat_password.focus();
        return false;
    }
}