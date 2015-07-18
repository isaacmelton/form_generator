<?php include './util/notification.php'; ?>
<?php $states = states_list(); ?>
<?php $countries = country_list(); ?>
  <div class="container-fluid">
<div class="col-md-4"></div>
<div class="col-md-5 text-center">
    <h1 align="left">Create an Account</h1>
<br>
    <form class="form-horizontal" role="form" name="createUser" id="createUser" action="" method="post">
      <input type="hidden" name="nav" value="create_user" />
      <div class="form-group">
		<label class="col-sm-2 control-label">First Name:</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" name="first_name" required>
			</div>
		</div>

		<div class="form-group">
		<label class="col-sm-2 control-label">Last Name:</label>
		<div class="col-sm-4">
        <input type="text" class="form-control" name="last_name" required>
		</div>
		</div>

      <div class="form-group">
        <label class="col-sm-2 control-label">
            Email:
        </label>
		<div class="col-sm-4">
        <input type="text" class="form-control" placeholder="Enter Email Here" name="email" required>
		</div>
		</div>

      <div class="form-group">
        <label class="col-sm-2 control-label">
            Password:
        </label>
    <div class="col-sm-4">
        <input type="password" class="form-control" name="password" required>
    </div>
    </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">
            Confirm password:
        </label>
    <div class="col-sm-4">
        <br /> <!-- quick fix in lieu of css changes -->
        <input type="password" class="form-control" name="verify_password" required>
    </div>
    </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">
            City:
        </label>
				<div class="col-sm-4">
        <input type="text" class="form-control" name="city" required>
		</div>
		</div>
      <div class="form-group">
        <label class="col-sm-2 control-label">
            State:
        </label>
		<div class="col-sm-4">
    <select name="state" class="form-control">
        <option selected="selected">Select your state...</option>
        <?php foreach($states as $key=>$value) { ?>
            <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
        <?php } ?>
    </select>


		</div>
		</div>
      <div class="form-group">
        <label class="col-sm-2 control-label">
            Country:
        </label>
		<div class="col-sm-4">
    <select name="country" class="form-control">
        <option selected="selected">Select your country...</option>
        <?php foreach($countries as $key=>$value) { ?>
            <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
        <?php } ?>
    </select>
		</div>
		</div>
      <div class="form-group">
        <label class="col-sm-2 control-label">
            Sex:
        </label>
		<div class="col-sm-4">
		<input type = 'radio' Name ='sex' value= 'female'>Female
		&nbsp;
		<input type = 'radio' Name ='sex' value= 'male'>Male
		</div>
		</div>
      <div class="form-group">
        <label class="col-sm-2 control-label">
            &nbsp;
        </label>
		<div class="col-sm-4">
        <input type="submit" name="submit" value="Create User">
		</div>
		</div>
    </form>
</div>
<div class="col-md-4"></div>
</div>
<br>

