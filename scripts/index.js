let password = document.querySelector("#password");
let showPassword = document.querySelector("#showPassword")


showPassword.addEventListener("click", show);
function show(){
    if(password.type == "password"){
        password.type ="text"
    }else{
        password.type="password"
    }
}
