const passField = document.querySelector(".form .field input[type='password'] ");
toogleBtn = document.querySelector(".form .field i");

toogleBtn.onclick = ()=>{
    if (passField.type == "password") {
        passField.type = "text"; 
        toogleBtn.classList.add("active");
    }else{
        passField.type = "password";
        toogleBtn.classList.remove("active");
    }
}