let nom = document.getElementById("nom");
let invalid_name = document.getElementById("invalid_name");
let password = document.getElementById("password");
let invalid_password = document.getElementById("invalid_password");
const form = document.getElementById("form");

form.addEventListener("submit", function (event) {
    let formValid = true;
    event.preventDefault();
    nom.classList.remove("border-red-500");
    invalid_name.innerHTML = "";
    password.classList.remove("border-red-500");
    invalid_password.innerHTML = "";

    if (nom.value.trim() === "") {
        nom.classList.add("border-red-500");
        formValid = false;
        invalid_name.innerHTML = "Ce champ ne doit pas être vide.";
    }

    if (password.value.trim() === "") {
        password.classList.add("border-red-500");
        formValid = false;
        invalid_password.innerHTML = "Ce champ ne doit pas être vide.";
    }


    if (formValid) {
        form.submit();

    }
});

// Function for incorrect password message
function incorrectPassword() {
    password.innerHTML = "";
    password.classList.add("border-red-500");
    invalid_password.innerHTML = "Mot de passe incorrect.";
}
function incorrectName() {
    nom.innerHTML = "";
    password.innerHTML = "";
    nom.classList.add("border-red-500");
    invalid_name.innerHTML = "Nom et prénom incorrect.";
}

