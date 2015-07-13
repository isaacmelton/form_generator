<?php include './util/notification.php'; ?>
  <div class="container-fluid">
<div class="col-md-4"></div>
<div class="col-md-5 text-center">
    <h1 align="left">Log In</h1>
	<h4>In order to access this page you must log in.</h4>
<br>
    <form class="form-horizontal" role="form" name="logIn" id="logIn" action="login" method="post">

      <div class="form-group">
		<label class="col-sm-2 control-label">Email:</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" name="email" required>
			</div>
		</div>
		
		<div class="form-group"> 
		<label class="col-sm-2 control-label">Password:</label>
		<div class="col-sm-4">
        <input type="text" class="form-control" name="password" required>
		</div>
		</div>
      <div class="form-group">
        <label class="col-sm-2 control-label">
            &nbsp;
        </label>
		<div class="col-sm-4">
        <input type="submit" name="submit" value="Log In">
		</div>
		</div>
		<div class="form-group">
		<div class="col-sm-6">
		<p>Don't have an account?&nbsp;<a href="./create_user">Create one here!</a></p>
		</div>
		</div>
		
    </form>
</div>
<div class="col-md-4"></div>
</div>
<br>

