document.addEventListener("DOMContentLoaded",() =>{
    const form=document.querySelector("#registerForm");
    
    const validateForm=()=>{

            const username = document.getElementById('username').value.trim();
            const email = document.getElementById('email').value.trim();
            const phoneNumber = document.getElementById('phone').value.trim();
            const birthDate = document.getElementById('birthdate').value.trim();
            const gender = document.querySelector('input[name="gender"]:checked');
            const password = document.getElementById('password').value.trim();

            if(username === "") {
                alert("Please enter Username!");
                return false;
            } else if(username.length < 3){
                alert("Fill a valid Username!");
                return false;
            }
            if(email === "") {
                alert("Please fill in your email!");
                return false;
            }else if(!emailValid(email)){
                alert("Please fill in a valid email!");
                return false;
            }
            if(phoneNumber === "") {
                alert("Please enter your phone number!");
                return false;
            } else if(phoneNumber.length < 9){
                alert("Please fill a valid phone number!");
                return false;
            }
            if(birthDate === "") {
                alert("Please fill your birth date!");
                return false;
            }
            if(gender === "") {
                alert("Please fill your gender!");
                return false;
            }else if(!gender) {
                alert("Please select your gender");
                return false;
            }
            if(password === "") {
                alert("Please fill your password");
                return false;
            } else if(password.length < 8) {
                alert("Password must contain minimum 8 character!");
                return false;
            }

            
            
            //window.location.href = "homepage.html";
            return true;
        };
        const emailValid = (email) =>{
            const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
                return emailRegex.test(email.toLowerCase());
            };

        form.addEventListener("submit", (event) => {
            if(!validateForm()){
                event.preventDefault();   
            }
        })

});