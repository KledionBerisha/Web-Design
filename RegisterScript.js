document.addEventListener("DOMContentLoaded",() =>{
    const submit=document.getElementById("submit");
    
    const validateForm=()=>{

            const username = document.getElementById('username').value.trim();
            const email = document.getElementById('email').value.trim();
            const phoneNumber = document.getElementById('phone').value.trim();
            const birthDate = document.getElementById('birthdate').value.trim();
            const gender = document.querySelector('input[name="gender"]:checked');
            const password = document.getElementById('password').value.trim();

            if(username === "") {
                alert("Please enter Username!");
                username.focus();
                return false;
            } else if(username.length < 3){
                alert("Fill a valid Username!")
            }
            if(email === "") {
                alert("Please fill in your email!");
                email.focus();
                return false;
            }
            if(phoneNumber === "") {
                alert("Please enter your phone number!");
                phoneNumber.focus();
                return false;
            } else if(phoneNumber.length < 9){
                alert("Please fill a valid phone number!");
            }
            if(birthDate === "") {
                alert("Please fill your birth date!");
                birthDate.focus();
                return false;
            }
            if(gender === "") {
                alert("Please fill your gender!");
                gender.focus();
                return false;
            }
            if(password === "") {
                alert("Please fill your password");
                password.focus();
                return false;
            } else if(password.length < 8) {
                alert("Password must contain minimum 8 character!");
            }

            if(!emailValid(email)){
                alert("Please fill in a valid email!");
                email.focus();
                return false;
            }
            if(!gender) {
                alert("Please select your gender");
                return false;
            }
            alert("Form submitted successfully");
            window.location.href = "homepage.html";
            return false;
        };
        const emailValid = (email) =>{
            const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
                return emailRegex.test(email.toLowerCase());
            };

        submit.addEventListener('click', (event) =>{
            if(!validateForm()){
                event.preventDefault();
            }
        });

});