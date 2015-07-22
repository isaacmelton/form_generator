<?php include './util/notification.php'; ?>
<div class="container-fluid">
    <div class="col-md-4"></div>
    <div class="col-md-5 text-center">
        <h1 align="left">Log In</h1>
        <h4>In order to access this page you must log in.</h4>
        <br>

        <form class="form-horizontal" role="form" name="logIn" id="logIn" action="" method="post">
            <input type="hidden" name="nav" value="login"/>

            <div class="form-group">
                <label class="col-sm-2 control-label">Email:</label>

                <div class="col-sm-4">
                    <input type="text" class="form-control" name="email" required>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Password:</label>

                <div class="col-sm-4">
                    <input type="password" class="form-control" name="password" required>

                    <div style="padding: 5px;"></div>
                    <input style="margin-right: 10px; float: left;" type="checkbox" name="remember_me" id="remember-me"
                           value="yes"/>
                    <label style="float: left;" class="string optional" for="user_remember_me"> Remember me</label>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">
                    &nbsp;
                </label>

                <div class="col-sm-4">
                    <input class="btn btn-default" type="submit" name="submit" value="Log In">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-6">
                    <p>Don't have an account?&nbsp;<a href="index.php?nav=create_user">Create one here!</a></p>
                </div>
            </div>

        </form>
    </div>
    <div class="col-md-4"></div>
</div>
<br>

