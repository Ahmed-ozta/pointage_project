
const password = document.getElementById("password")
const button = document.getElementById("button_view");
button.style.backgroundImage = "url('icons/View.svg')";
button.addEventListener("click", () => {
    if (password.getAttribute("type") == "password") {
        password.setAttribute("type", "text");
        button.style.backgroundImage = "url('icons/View_hide.svg')";

    } else {
        password.setAttribute("type", "password");
        button.style.backgroundImage = "url('icons/View.svg')";
    }
})