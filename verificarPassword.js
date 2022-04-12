function checkPassword()
{
    let password = document.getElementById("password").value;
    let verifyPassword = document.getElementById("verifypassword").value;
    console.log(password, verifyPassword);
    //let message = document.getElementById("errorMessage");

    if (password != 0)
    {
        if (password != verifyPassword)
        {
            //message.textContent = "Ambas contraseñas no coinciden";
            //message.style.color = "#FF4D4D";
            alert("Ambas contraseñas no coinciden");
        }
    }
}