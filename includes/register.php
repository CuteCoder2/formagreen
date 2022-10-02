<?php

require_once('../function/get_type.php');

?>


<form action="../function/sign_up.php" method="post">
    <div class="wrapper">
        <div class="title">
            <h1>Register Now</h1>
        </div>
        <div class="form">
            <div class="inputfield">
                <label>First Name</label>
                <input type="text" class="input" name="fname">
            </div>
            <div class="inputfield">
                <label>Last Name</label>
                <input type="text" class="input" name="lname">
            </div>
            <div class="inputfield">
                <label>User Name</label>
                <input type="text" class="input" name="uname">
            </div>
            <div class="inputfield">
                <label>Age</label>
                <input type="date" class="input" name="age">
            </div>
            <div class="inputfield">
                <label>Password</label>
                <input type="password" class="input" name="pswd">
            </div>
            <div class="inputfield">
                <label>Confirm Password</label>
                <input type="password" class="input" name="confpswd">
            </div>
            <div class="inputfield">
                <label>Gender</label>
                <div class="custom_select">
                    <select name="sex">
                        <option value="">Select</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
            </div>
            <div class="inputfield">
                <label>Type Membre</label>
                <div class="custom_select">
                    <select name="typememe">
                        <option value="">Select type</option>
                        <?php
                        foreach ($retur_all_type as $row) {
                            echo '<option value = ' . $row['id_type_membre'] . '>' . $row['type_membre'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
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
            <div class="inputfield terms">
                <label class="check">
                    <input type="checkbox" name="confirmed" id="check">
                    <span class="checkmark"></span>
                </label>
                <p>Agreed to terms and conditions</p>
            </div>
            <div class="inputfield">
                <input type="submit" value="Register" class="btn">
            </div>
        </div>
    </div>
</form>


<script>
    let check = document.getElementById("check");

    check.value = "";
    check.addEventListener("change", checking);

    function checking() {

        if (check.checked) {
            check.value = "checked";
        } else {
            check.value = "";
        }
    }
</script>