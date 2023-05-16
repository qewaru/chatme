const form = document.querySelector(".type-message")
const inputField = form.querySelector(".input-message")
const sendButton = form.querySelector(".type-message button")
const chatArea = document.querySelector(".chat-area")

sendButton.addEventListener("click", function(event) {
    event.preventDefault()
    let xhr = new XMLHttpRequest()
    xhr.open("POST", "php/sendMessage.php", true)
    xhr.onload = ()=>{
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response
                inputField.value = ""
            }
        }
    }
    let formData = new FormData(form)
    xhr.send(formData)
})

setInterval(() => {
    let xhr = new XMLHttpRequest()
    xhr.open("POST", "php/getMessage.php", true)
    xhr.onload = ()=>{
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response
                chatArea.innerHTML = data
            }
        }
    }
    let formData = new FormData(form)
    xhr.send(formData)
}, 500)