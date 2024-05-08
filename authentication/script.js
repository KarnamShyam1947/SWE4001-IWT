form = document.getElementById("form");
checkBox = document.getElementById("flexCheckDefault");
username = document.getElementById("name");
gender = document.getElementById("gender");
email = document.getElementById("email");
phone = document.getElementById("phone");
city = document.getElementById("pass1");
reg = document.getElementById("pass2");
zip = document.getElementById("dob");

form.onsubmit = (e) => {
    var flag = 1;

    checkBox.classList.remove('is-invalid');
    username.classList.remove('is-invalid');
    email.classList.remove('is-invalid');
    gender.classList.remove('is-invalid');
    phone.classList.remove('is-invalid');
    city.classList.remove('is-invalid');
    reg.classList.remove('is-invalid');
    zip.classList.remove('is-invalid');

    e.preventDefault();
    
    if(username.value == "") {
        username.classList.add('is-invalid');
        flag = 0;
    }
    
    if(reg.value == "") {
        reg.classList.add('is-invalid');
        flag = 0;
    }
    
    if(clg.value == "") {
        clg.classList.add('is-invalid');
        flag = 0;
    }
    
    if(gender.value == "") {
        gender.classList.add('is-invalid');
        flag = 0;
    }

    if(email.value == "") {
        email.classList.add('is-invalid');
        flag = 0;
    }
    
    if(phone.value == "") {
        phone.classList.add('is-invalid');
        flag = 0;
    }
    
    if(zip.value == "") {
        zip.classList.add('is-invalid');
        flag = 0;
    }

    if(city.value == "") {
        cityError.innerText = "Please enter a city.";
        city.classList.add('is-invalid');
        flag = 0;
    }

    if(flag) {
        alert("Form submitted successfully..... :)");
    }
}