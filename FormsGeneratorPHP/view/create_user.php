<?php



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
		<input type = 'radio' Name ='sex' value= 'female'>Female
		<input type = 'radio' Name ='sex' value= 'male'>Male
        <br>

        <label>
            &nbsp;
        </label>
        <input type="submit" name="submit" value="Create User">
        <br>
    </form>

</div>
<br>