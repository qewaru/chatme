const form = document.querySelector(".signup-form")
const continueBtn = form.querySelector(".btn-create")


continueBtn.addEventListener("click", function(event) {
    event.preventDefault()

    let xhr = new XMLHttpRequest()
    xhr.open("POST", "php/signup.php", true)
    xhr.onload = ()=>{
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response
                if (data == "Success") {
                    location.href = "users.php"
                }
            }
        }
    }
    let formData = new FormData(form)
    xhr.send(formData)
})