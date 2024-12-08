document.addEventListener("DOMContentLoaded",() =>{
    const submit=document.getElementById("submit");
    
    const validateForm=()=>{
        
        const email=document.getElementById("email").value.trim();
        const password=document.getElementById("password").value.trim();
        if(email===""){
            alert("Please fill in your email!");
            email.focus();
            return false;
        }
        if(password===""){
            alert("Please fill in your password!");
            password.focus();
            return false;
        }
        if(!emailValid(email)){
            alert("Please fill in a valid email!");
            email.focus();
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