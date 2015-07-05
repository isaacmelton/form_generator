<?php

if(isset($_POST['submit'])){

    //Remove this, here for testing
    echo "Post submit set<br>";

try {

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // <== add this line
$sql = "INSERT INTO people (first_name, last_name, email, city, state, country, sex)
VALUES ('".$_POST["first_name"]."','".$_POST["last_name"]."','".$_POST["email"]."','".$_POST["city"]."','".$_POST["state"]."'
,'".$_POST["country"]."','".$_POST["sex"]."')";
if ($db->query($sql)) {
echo "<script type= 'text/javascript'>alert('New Record Inserted Successfully');</script>";
}
else{
echo "<script type= 'text/javascript'>alert('Data not successfully Inserted.');</script>";
}

$db = null;
}
catch(PDOException $e)
{
echo $e->getMessage();
}

}

?>



<div>
    <h1>Create an Account</h1>
    <form name="createUser" id="createUser" action="./create_user" method="post">
        <label>
            First Name:
        </label>
        <input type="text" name="first_name" required>
        <br>

        <label>
            Last Name:
        </label>
        <input type="text" name="last_name" required>
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
        <input type="submit" name="submit" value="Create User">
        <br>
    </form>

</div>
<br>