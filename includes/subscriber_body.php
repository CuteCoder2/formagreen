<?php

require_once("../function/get_sub.php");

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

<br>
<br>
<br>
<div class="wrapper" id="run_sub">
    <?php
    if ($get_all_sub == []){
        $end_sub_date = "";
        echo"
        <div class='title'>
        NO SUBSRIBETION
        </div>
        <div class='form'>
        <div class='inputfield'>
        <button  type='submit' id='sub_now' value='ADD AREA' class='btn'>SUNSCRIBE NOW</button></div>
        </div>";
        
    }else{
        foreach($get_all_sub as $row){
            $end_sub_date =  substr($row['date_end'],0,9);
            echo"
            <div class='title'>
            SUBSCRIBTION RUNS TILL
            </div>
            <div class='title'>
            ".$end_sub_date."
            </div>
            <form action='../function/subscribe.php' method='post'>
            <div class='form'>
            <div class='inputfield'>
        <button  type='button' id='ext_now' value='ADD AREA' class='btn'   onclick='exerten()'>EXTERN SUBSCRIBETION</button>
        <input hidden type = 'text' value='end' name ='end'/>
        <button  type='submit' id='sub_now' value='ADD AREA' class='btn'>END NOW</button></button>
        </div>
        </div>
        </form>
        ";
        }
        
    }
    
    ?>
    </div>
        

</div>
<form action="../function/subscribe.php" method="post" id="subscribe">
    <div class="wrapper">
        <div class="title">
            SUBSCRIBE NOW 
        </div>
        <div class="form">
            <div class="inputfield">
                <label>END DATE</label>
                <input type="date" class="input" name="new_sub" id="uname">
            </div><div class="inputfield">
                <button  type="submit" value="ADD AREA" class="btn" >SUNSCRIBE NOW</button>
                <button style="background-color:red
" type="button" value="ADD AREA" class="btn"  onclick="cancel()">CANCEL</button>
            </div>
        </div>
    </div>
</form>


<form action="../function/subscribe.php" method="post" id="renew_sub">
    <div class="wrapper">
        <div class="title">
        RENEW SUBSCRITION
        </div>
        <div class="form">
            <div class="inputfield">
                <label> EXTERN TO </label>
                <input type="DATE" class="input" name="new_sub_date" id="uname">
            </div>
            <div class="inputfield">
                <button  type="submit" value="ADD AREA" class="btn">REWNEW</button>
                <button style="background-color:red
" type="button" value="ADD AREA" class="btn" onclick="cancel()">CANCEL</button>
            </div>
        </div>
    </div>
</form>


<script>
let run_sub = document.getElementById('run_sub');
let subscribe = document.getElementById('subscribe');
let renew_sub = document.getElementById('renew_sub');
let sub_now = document.getElementById('sub_now');
let ext_now = document.getElementById('ext_now');

subscribe.style.display = "none";
renew_sub.style.display = "none";


sub_now.addEventListener('click',()=>{
        run_sub.style.display = "none";
        subscribe.style.display = "";
    })
    function exerten(){
        run_sub.style.display = "none";
        renew_sub.style.display = "";
        

}

function cancel() {
    subscribe.style.display = "none";
    renew_sub.style.display = "none";
    run_sub.style.display = "";

}

</script>






