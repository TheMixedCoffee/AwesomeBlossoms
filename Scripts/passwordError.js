function passwordError(){
                    var passError = document.getElementById("passwordLabel");
                    var error = "Passwords do not match";
                    error.style.color = "red";
                    passError.appendChild(error);
}