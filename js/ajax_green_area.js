let uname = document.getElementById('uname');
let fname = document.getElementById('fname');
let lname = document.getElementById('lname');
let age = document.getElementById('age');
let sex = document.getElementById('sex');
let email = document.getElementById('email');
let phone = document.getElementById('phone');
let postalcode = document.getElementById('postalcode');


uname.addEventListener('keyup',udateName);

function udateName() {

    let unameValue = uname.value;
    
    let xhr = new XMLHttpRequest();

    xhr.open("GET","../function/ajax_green_area.php?uname="+unameValue,true);

    xhr.onload = ()=>{

        if (xhr.readyState == 4 && xhr.status == 200) {
            
            let resp = JSON.parse(xhr.responseText);
            resp.forEach(element => {
                fname.value = element.nom;
                lname.value = element.prenom;
                age.value = element.age;
                sex.value = element.gender;
                email.value = element.email;
                phone.value = element.phone;
                postalcode.value = element.postal_code;
            });
        }
    }

    xhr.send();
}

