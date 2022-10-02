<?php
require_once('../function/get_all_members.php');




?>
<style>
#btn,.btn{
    height: 50px;
    width: 70%;
    margin:2px;
    border: none;
    border-radius: 10%;
}
#btn{
    background-color: #16a085;
}
.btn{
    background-color: #e00f0f;
}
</style>
<br>
<br>
<br>
<br>
<br>
<form action="../function/update_member.php" method="post" name = 'edit' id="edit">
    <div class="wrapper">
        <div class="title">
        EDIT MEMBER
        </div>
        <div class="form">
            <div class="inputfield">
                <label>First Name</label>
                <input  type="text" class="input" name="fname">
                <input hidden readonly type="text" class="input" name="login">
            </div>
            <div class="inputfield">
                <label>Last Name</label>
                <input type="text" class="input" name="lname">
            </div>
            <div class="inputfield">
                <label>Age</label>
                <input type="date" class="input" name="age">
            </div>
            <div class="inputfield">
                <label>Email Address</label>
                <input type="text" class="input" name="email">
            </div>
            <div class="inputfield">
                <label>Phone Number</label>
                <input type="text" class="input" name="phone">
            </div>
            <div class="inputfield">
                <label>Postal Code</label>
                <input type="text" class="input" name="postcode">
            </div>
            <div class="inputfield">
                <button  type="submit" value="ADD AREA" class="btn">EDIT</button>
                <button style="background-color:red
" type="button" value="ADD AREA" class="btn" onclick="cancel()">CANCEL</button>
            </div>
        </div>
    </div>
</form>

<form action="../function/delete_member.php" method="POST" name="delete" id="delete_area">
<br>
     <br>
     <br>
     <br>
     <br>
    <div class="wrapper">
        <div class="title" style="color: red ;">
        confirm to delete Member
        </div>
        <div class="form">
            <label>delete <strong> " <span id="narea"></span> "</strong> from Member list ?</label>
            <div class="inputfield">
                <input hidden  type="text" class="input" name="uname" >
            </div>
            <div class="inputfield">
                <button  type="submit" value="ADD AREA" class="btn">DELETE</button>
                <button style="background-color:red
" type="button" value="ADD AREA" class="btn" onclick="cancel()">CANCEL</button>
            </div>
        </div>
    </div>
</form>


<table id ="table">
        <tr id="header">
            <th>First name</th>
            <th>Last name</th>
            <th>Address</th>
            <th>Bar code</th>
            <th>Action</th>
        </tr>
        <!-- 
    \''.$row['login'].'\'    
    -->
        <?php
        foreach($fet_all_members as $row){
            echo'
        <tr class=\"tr\">
            <td>'.$row['nom'].'</td>
            <td>'.$row['prenom'].'</td>
            <td>'.$row['postal_code'].'</td>
            <td><img class="barcode" src="'.$row['barcode'].'"></td>
            <td><button id="btn" onclick = "functedit(\''.$row['nom'].'\',\''.$row['prenom'].'\',\''.$row['age'].'\',\''.$row['email'].'\',\''.$row['phone'].'\',\''.$row['postal_code'].'\',\''.$row['login'].'\')"; >EDIT</button><button class="btn" onclick = "delete_area_form(\''.$row['login'].'\')" >DELETE</td>
            
        </tr>';
        }

    ?>
    
     </table>

     
<script>

let edit = document.getElementById('edit');
edit.style.display = 'none';

let table = document.getElementById('table');


let delete_area = document.getElementById('delete_area');

delete_area.style.display = "none";

let forms = document.forms.edit;
let formd = document.forms.delete;





function functedit(nom,prenom,age,email,phone,postalcode,login) {
    table.style.display ="none";
    edit.style.display = '';
    forms.elements.fname.value = nom;
    forms.elements.lname.value = prenom;
    forms.elements.age.value = age;
    forms.elements.email.value = email;
    forms.elements.phone.value = phone;
    forms.elements.postcode.value = postalcode;
    forms.elements.login.value = login;


    
}

function delete_area_form(uname){
    table.style.display ="none";
    delete_area.style.display = '';
    formd.elements.uname.value = uname;
    document.getElementById('narea').textContent = uname;
    
}

function cancel() {
    table.style.display ="";
    delete_area.style.display = 'none';
    edit.style.display = 'none';
}

</script>




















