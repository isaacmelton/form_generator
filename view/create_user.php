<?php include './util/notification.php'; ?>
  <div class="container-fluid">
<div class="col-md-6 col-md-offset-2">
    <h1>Create an Account</h1>
    <form class="form-horizontal" role="form" name="createUser" id="createUser" action="./create_user" method="post">

      <div class="form-group">
		<label class="col-sm-2 control-label">First Name:</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="first_name" required>
			</div>
		</div>
		
		<div class="form-group"> 
		<label class="col-sm-2 control-label">Last Name:</label>
		<div class="col-sm-10">
        <input type="text" class="form-control" name="last_name" required>
		</div>
		</div>
		
      <div class="form-group">
        <label class="col-sm-2 control-label">
            Email:
        </label>
		<div class="col-sm-10">
        <input type="text" class="form-control" name="email" required>
		</div>
		</div>
		
      <div class="form-group">
        <label class="col-sm-2 control-label">
            City:
        </label>
				<div class="col-sm-10">
        <input type="text" class="form-control" name="city" required>
        <br>
		</div>
		</div>
      <div class="form-group">
        <label class="col-sm-2 control-label">
            State:
        </label>
		<div class="col-sm-10">
        <input type="text" class="form-control" name="state" required>
		</div>
		</div>
      <div class="form-group"> 
        <label class="col-sm-2 control-label">
            Country:
        </label>
		<div class="col-sm-10">
        <input type="text" class="form-control" name="country" required>
		</div>
		</div>
      <div class="form-group">
        <label class="col-sm-2 control-label">
            Sex:
        </label>
		<div class="col-sm-10">
		<input type = 'radio' Name ='sex' value= 'female'>Female
		&nbsp;
		<input type = 'radio' Name ='sex' value= 'male'>Male
		</div>
		</div>
      <div class="form-group">
        <label class="col-sm-2 control-label">
            &nbsp;
        </label>
		<div class="col-sm-10">
        <input type="submit" name="submit" value="Create User">
		</div>
		</div>
    </form>
</div>
</div>
<br>

