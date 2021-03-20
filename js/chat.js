const form = document.querySelector(".typing-area"),
    inputField = form.querySelector(".input-field"),
    sendBtn = form.querySelector("button"),
    chatBox = document.querySelector(".chat-box");

form.onsubmit = (e) => {
    e.preventDefault(); // Preventing  Form from submitting
}

sendBtn.onclick = () => {
    // ajax
    let xhr = new XMLHttpRequest(); // Create XML Object
    xhr.open("POST", "php/insert-chat.php");
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                inputField.value = ""; //once message inserted into database then leave blank the input field 
            }
        }
    }

    // we have to send the form data through ajax to php
    let formData = new FormData(form); // creating new formData Object
    xhr.send(formData) // sending the form data to php
}

chatBox.onmouseenter = () => {
    chatBox.classList.add("active");
}

chatBox.onmouseleave = () => {
    chatBox.classList.remove("active");
}

setInterval(() => {
    // AJAX
    let xhr = new XMLHttpRequest(); // Create XML Object
    xhr.open("POST", "php/get-chat.php");
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                chatBox.innerHTML = data;
                if (!chatBox.classList.contains("active")) {
                    scrollToBottom();
                }
            }
        }
    }
    let formData = new FormData(form); // creating new formData Object
    xhr.send(formData) // sending the form data to php
}, 500); //this function will run frequently after 500ms

function scrollToBottom() {
    chatBox.scrollTop = chatBox.scrollHeight;
}