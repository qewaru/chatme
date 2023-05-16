const btnShow = document.querySelector(".btn-show-hide")
const inputField = document.querySelector("[type='password']")

btnShow.addEventListener("click", function() {
    if (inputField.type === "password") {
        inputField.type = "text"
        btnShow.src = "./images/icon-eye-close.png"
    } else {
        inputField.type = "password"
        btnShow.src = "./images/icon-eye-open.png"
    }
})