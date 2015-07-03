<?php

if(isset($_POST['submit'])){

    $fName = $_POST['fName'];
    $lname = $_POST['lName'];
	$email = $_POST['email'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$country = $_POST['country'];
	$sex = $_POST['sex'];

}
if(empty($fName) || empty($lName) || empty($email) || empty($city) || empty($state) || empty($country) || empty($sex) ) {
 echo $error = "Invalid data entered. Check fields and try again.";
    } else {

	//CODE HERE SUBMITS TO DB
	
    }

?>

<div>
    <h1>Create an Account</h1>
<form name="createUser" id="createUser" action="create_user" method="post">

        <label>
            First Name:
        </label>
        <input type="text" name="fName" required>
        <br>

        <label>
            Last Name:
        </label>
        <input type="text" name="lName" required>
        <br>

        <label>
            Email:
        </label>
        <input type="text" name="email" required>
        <br>

        <label>
            City:
        </label>
        <input type="text" name="city" required>
        <br>

        <label>
            State:
        </label>
        <input type="text" name="state" required>
        <br>

		<label>
			Country:
        </label>
        <input type="text" name="country" required>
        <br>
		
		<label>
			Sex:
        </label>
        <input type="text" name="sex" required>
        <br>
		
        <label>
            &nbsp;
        </label>
        <input type="submit" value="Create User">
        <br>
    </form>

</div>
<br>