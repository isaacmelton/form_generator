<?php include '../view/header.php'; ?>
<div id="main">

    <h2>Technician Login</h2>
    <?php if (isset($error_message)) { ?>
		<errormessage><?php echo $error_message; ?></errormessage>
    <?php } ?>
    <p>You must login before you can update an incident.</p>
    <div id="content">
        <!-- display a search form -->
        <form action="" method="post">
            <input type="hidden" name="action" value="get_technician" />
            <label>Email:</label>
            <input type="input" name="email" value="<?php echo $email; ?>" /><br />
            <label>Password:</label>
            <input type="password" name="password" /><br />
            <label>&nbsp;</label>
            <input type="submit" value="Login" />
        </form>
    </div>

</div>
<?php include '../view/footer.php'; ?>