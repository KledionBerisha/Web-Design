function validateForm(){
    let x=document.forms["myForm"]["Username"]["Password"].value;
    if(x==""){
        alert("Username and password must be filled out!");
    }
}