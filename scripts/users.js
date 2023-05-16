const searchInput = document.querySelector(".input-search")
const searchBtn = document.querySelector(".btn-search")

const userList = document.querySelector(".users-list")

window.addEventListener("load", updateUsers)

function updateUsers() {
    let xhr = new XMLHttpRequest()
        xhr.open("GET", "php/users.php", true)
        xhr.onload = ()=>{
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    let data = xhr.response
                    console.log(data)
                    userList.innerHTML = data
                }
            }
        }
        xhr.send()
    setInterval(() => {
        let xhr = new XMLHttpRequest()
        xhr.open("GET", "php/users.php", true)
        xhr.onload = ()=>{
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    let data = xhr.response
                    userList.innerHTML = data
                }
            }
        }
        xhr.send()
    }, 500)
}

searchInput.addEventListener("input", function(event) {
    const searchValue = event.target.value
    let xhr = new XMLHttpRequest()
    xhr.open("POST", "php/searchUser.php", true)
    xhr.onload = ()=>{
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response
                userList.innerHTML = data
            }
        }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
    xhr.send("searchValue=" + searchValue)
})

searchBtn.addEventListener("click", function() {
    let xhr = new XMLHttpRequest()
    xhr.open("GET", "php/users.php", true)
    xhr.onload = ()=>{
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response
                userList.innerHTML = data
            }
        }
    }
    xhr.send()
})