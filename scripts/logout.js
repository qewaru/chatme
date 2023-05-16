const logoutBtn = document.querySelector(".logout")

logoutBtn.addEventListener("click", function() {
    let xhr = new XMLHttpRequest()
    xhr.open("GET", "php/logout.php", true)
    xhr.onload = ()=>{
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response
                console.log(data)
            }
        }
    }
    xhr.send()
})