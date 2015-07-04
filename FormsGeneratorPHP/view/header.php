<?php
// determine the absolute path to the style sheet main.css
$uri = $_SERVER['REQUEST_URI'];
$dirs = explode('/', $uri);
$i = 1;
$path = '/';
while ($dirs[$i] != "") {
    $path .= $dirs[$i] . '/';
    $i += 1;
}
$path .= '';
?>
<?php require './model/database.php'; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- the head section -->
<head>
    <title>Forms Generator</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

	<link rel="stylesheet" type="text/css"
          href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/css/main.css'; ?>" />

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="./js/main.js"></script>

</head>

<!-- the body section -->
<body>
<div id="page">
    <header class="navbar-inverse" role="banner">
	<nav class="navbar navbar-inverse">
		<div class="container">

  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Forms Generator</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>">Home <span class="sr-only">(current)</span></a></li>
		<li class="active"><a href="/create_survey">Create Form<span class="sr-only">(current)</span></a></li>
	    <li class="active"><a href="/view_survey">View Surveys<span class="sr-only">(current)</span></a></li>
		<li class="active"><a href="/view_statistics">View Statistics<span class="sr-only">(current)</span></a></li>
      </ul>
	  
	   <!-- Working on dropdown here -->
				<ul class="nav pull-right">
					<li class="dropdown">
						<a class="dropdown-toggle" href="#" data-toggle="dropdown">Sign In <strong class="caret"></strong></a>
						<div class="dropdown-menu" style="padding: 15px; padding-bottom: 5px;">
							<form method="post" action="login" accept-charset="UTF-8">
								<input style="margin-bottom: 15px;" type="text" placeholder="Username" id="username" name="username">
								<input style="margin-bottom: 15px;" type="password" placeholder="Password" id="password" name="password">
								<input style="float: left; margin-right: 10px;" type="checkbox" name="remember-me" id="remember-me" value="1">
								<label class="string optional" for="user_remember_me"> Remember me</label>
								<input class="btn btn-primary btn-block" type="submit" id="sign-in" value="Sign In">
								<li class="active"><a href="/create_user" >Sign me up for an account<span class="sr-only">(current)</span></a></li>
							</form>
						</div>
					</li>
				</ul>
	  <!-- END DROPDOWN WORK-->
	  
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</div>	
  </nav>

</header>
        <p>Interactive Forms Generation</p>
        <p>Enter links/buttons to create survey/take survey, etc here.</p>
    </div>
</div>

   