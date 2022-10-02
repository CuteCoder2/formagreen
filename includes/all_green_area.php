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
.delete,.btn{
    background-color: #e00f0f;
}
</style>


     <form action="../function/update_area.php" method="POST" name="edit" id="edit">
     <br>
     <br>
     <br>
     <br>
     <br>
    <div class="wrapper">
        <div class="title">
            Edit Green Areas
        </div>
        <div class="form">
            <div class="inputfield">
                <label>User Name</label>
                <input readonly type="text" class="input" name="uname" id="uname">
            </div>
            <div class="inputfield">
                <label>longitute</label>
                <input type="text" class="input" name="longitute">
            </div>
            <div class="inputfield">
                <label>latitude</label>
                <input type="text" class="input" name="latitute">
            </div>
            <div class="inputfield">
                <label>Common Name</label>
                <input type="text" class="input" name="comname">
            </div>
            <div class="inputfield">
                <button  type="submit" value="ADD AREA" class="btn">EDIT</button>
                <button style="background-color:red
" type="button" value="ADD AREA" class="btn" onclick="cancel()">CANCEL</button>
            </div>
        </div>
    </div>
</form>



<form action="../function/delete_area.php" method="POST" name="delete" id="delete_area">
<br>
     <br>
     <br>
     <br>
     <br>
    <div class="wrapper">
        <div class="title" style="color: red ;">
        confirm to delete Area
        </div>
        <div class="form">
            <label>delete <strong> " <span id="narea"></span> "</strong> from Area list ?</label>
            <div class="inputfield">
                <input hidden  type="text" class="input" name="uname" >
            </div>
            <div class="inputfield">
                <input hidden  type="text" class="input" name="area" >
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
            <th>Name</th>
            <th>longitude</th>
            <th>latitute</th>
            <th>Area</th>
            <th>Bar code</th>
            <th>action</th>
        </tr>
        <?php
        foreach($fet_all_areas as $row){
            echo'
        <tr class="tr">
            <td>'.$row['nom'].' '.$row['prenom'].'</td>
            <td>'.$row['longitude'].'</td>
            <td>'.$row['latitute'].'</td>
            <td>'.$row['area_name'].'</td>
            <td><img class="barcode" src="'.$row['barcode'].'" alt=""></td>
            <td><button id="btn" onclick = "functedit(\''.$row['login'].'\','.$row['longitude'].','.$row['latitute'].',\''.$row['area_name'].'\')"; >EDIT</button><button class="btn" onclick = "delete_area_form(\''.$row['login'].'\',\''.$row['area_name'].'\')" >DELETE</td>
        </tr>';
        }

    ?>
    
     </table>

     


<script>

    let edit = document.getElementById('edit');
    edit.style.display = 'none';
    let green_table = document.getElementById('table');

    let delete_area = document.getElementById('delete_area');

    delete_area.style.display = "none";
    
    let forms = document.forms.edit;
    let formd = document.forms.delete;
    
    
    
    function functedit(unname,longitute,latitute,commname) {
        green_table.style.display ="none";
        edit.style.display = 'block';
        forms.elements.uname.value = unname;
        forms.elements.longitute.value = longitute;
        forms.elements.latitute.value = latitute;
        forms.elements.comname.value = commname;
        console.log(forms.elements.uname);
    }
    
    function delete_area_form(login,area){
        green_table.style.display ="none";
        delete_area.style.display = 'block';
        formd.uname.value = login;
        formd.area.value = area;
        document.getElementById('narea').textContent = area;
}

function cancel() {
    green_table.style.display = "";
    edit.style.display = 'none';
    delete_area.style.display = 'none';
}


</script>