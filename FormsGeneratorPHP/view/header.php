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
          href="<?php echo $path . 'css/main.css'; ?>" />
		  
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
		<li class="active"><a href="/create">Create Form<span class="sr-only">(current)</span></a></li>
	    <li class="active"><a href="/view_survey">View Surveys<span class="sr-only">(current)</span></a></li>
		<li class="active"><a href="/view_statistics">View Statistics<span class="sr-only">(current)</span></a></li>

      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</div>	
  </nav>

</header>
        <p>Interactive Forms Generation</p>
        <p>Enter links/buttons to create survey/take survey, etc here.</p>
    </div>
</div>

   