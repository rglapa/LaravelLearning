const modalButton = document.getElementById("user-menu-button");
const modal = document.getElementById("modal_test");
const main_view = document.querySelector('main[data-id="mainview"]');
let button_clicked = false;
modalButton.addEventListener("click", function () {
    console.log("clicked");
    if (modal.classList.contains("hidden")) {
        modal.classList.remove("hidden");
        button_clicked = true;
    } else {
        modal.classList.add("hidden");
        button_clicked = false;
    }
});
main_view.addEventListener("click", function () {
    if (button_clicked) {
        console.log("main view clicked");
        modal.classList.add("hidden");
    } else {
        button_clicked = false;
    }
});
