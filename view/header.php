<?php
ob_start();
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
    <link rel="stylesheet" href="./assets/css/font-awesome.min.css">

    <!-- Optional theme -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"> -->
    <link rel="stylesheet" href="https://bootswatch.com/yeti/bootstrap.min.css">

    <link rel="stylesheet" type="text/css"
          href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/css/main.css'; ?>"/>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

    <!-- jQuery UI -->
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

    <!-- Site JS -->
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
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>">Forms Generator</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>"><?php echo $fa->icon('home'); ?>&nbsp;Home <span
                                        class="sr-only">(current)</span></a></li>

                            <!--BIG NOTE!! THE HREF LINKS BELOW WERE PREVIOUS /create_form, /view_survey, ETC. TO GET THEM WORKING ON MY LOCAL MACHINE, I NEEDED TO CHANGE THEM TO index.php?nav=action_in_question. IF I FORGET TO CHANGE THEM BACK AND THE LINK NAVIGATION ISN'T WORKING... LET ME KNOW-->

                            <li class="active"><a href="./create_form"><?php echo $fa->icon('plus-circle'); ?>&nbsp;Create Form<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="active"><a href="./view_survey"><?php echo $fa->icon('eye'); ?>&nbsp;View Surveys<span
                                        class="sr-only">(current)</span></a></li>
                            <li class="active"><a href="./view_statistics"><?php echo $fa->icon('bar-chart-o'); ?>&nbsp;View Statistics<span class="sr-only">(current)</span></a>
                            </li>

                            <li class="active">
                                <?php if (!isset($_SESSION['logged_in'])): ?>
                                <div class="dropdown-menu" style="padding: 15px; padding-bottom: 5px;">
 							<li class="active"><a href="./log_in"><?php echo $fa->icon('user'); ?>&nbsp;Log In<span class="sr-only">(current)</span></a>
                            </li>
                                    <?php else: ?>
                                    <a class="dropdown-toggle" href="#" data-toggle="dropdown"><?php echo $fa->icon('user'); ?>&nbsp;Logged in
                                        as <?php echo $_SESSION['logged_in']; ?><strong class="caret"></strong></a>

                                    <div class="dropdown-menu" style="padding: 15px; padding-bottom: 5px;">
                                        <form method="post" action="">
                                            <input type="hidden" name="nav" value="logout"/>
                                            <input class="btn btn-primary btn-block" type="submit" id="sign-in"
                                                   value="Log out"/>
                                        </form>
                                        <?php endif; ?>

                                    </div>
                            </li>
                        </ul>

                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container-fluid -->
        </nav>


    </header>

    <?php if (isset($_SESSION['login_message'])):
        echo '<p><i>' . $_SESSION['login_message'] . '</i></p>';
        unset($_SESSION['login_message']);
    endif; ?>

    <div class="row">
        <div class="col-md-1"></div>
    </div>
</div>


   
