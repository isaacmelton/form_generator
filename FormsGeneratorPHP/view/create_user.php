<?php



?>

<div>
    <h1>Create an Account</h1>
    <form class="form-horizontal" role="form" name="createUser" id="createUser" action="./create_user" method="post">
      <div class="form-group">
	  <div class="col-sm-offset-2 col-sm-10">
		<label>
            First Name:
        </label>
        <input type="text" name="first_name" required>
        <br>
		</div>
		</div>
		
		<div class="form-group"> 
		<div class="col-sm-offset-2 col-sm-10">
        <label>
            Last Name:
        </label>
        <input type="text" name="last_name" required>
        <br>
		</div>
		</div>
		
      <div class="form-group">
	  <div class="col-sm-offset-2 col-sm-10">	  
        <label>
            Email:
        </label>
        <input type="text" name="email" required>
        <br>
		</div>
		</div>
      <div class="form-group">
	  <div class="col-sm-offset-2 col-sm-10">
        <label>
            City:
        </label>
        <input type="text" name="city" required>
        <br>
		</div>
		</div>
      <div class="form-group">
	  <div class="col-sm-offset-2 col-sm-10">
        <label>
            State:
        </label>
        <input type="text" name="state" required>
        <br>
		</div>
		</div>
      <div class="form-group"> 
	  <div class="col-sm-offset-2 col-sm-10">
        <label>
            Country:
        </label>
        <input type="text" name="country" required>
        <br>
		</div>
		</div>
      <div class="form-group">
	  <div class="col-sm-offset-2 col-sm-10">
        <label>
            Sex:
        </label>
		<input type = 'radio' Name ='sex' value= 'female'>Female
		<input type = 'radio' Name ='sex' value= 'male'>Male
        <br>
		</div>
		</div>
      <div class="form-group">
	  <div class="col-sm-offset-2 col-sm-10">
        <label>
            &nbsp;
        </label>
        <input type="submit" name="submit" value="Create User">
        <br>
		</div>
		</div>
    </form>

</div>
<br>