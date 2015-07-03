<?php include '../view/header.php'; ?>
<div id="main">

    <h2>Admin Login</h2>
    <?php if (isset($error_message)) { ?>
		<errormessage><?php echo $error_message; ?></errormessage>
    <?php } ?>
    <div id="content">
        <!-- display a search form -->
        <form action="" method="post">
            <input type="hidden" name="action" value="admin_login" />
            <label>Username</label>
            <input type="input" name="username" value="<?php if (isset($adminUsername)) { echo $adminUsername; } ?>" /><br />
            <label>Password</label>
            <input type="password" name="password" /><br />
            <label>&nbsp;</label>
            <input type="submit" value="Login" />
        </form>
    </div>

</div>
<?php include '../view/footer.php'; ?>