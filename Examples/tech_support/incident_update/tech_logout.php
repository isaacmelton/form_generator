 <br /><br /> 
	        You are logged in as <?php echo $_SESSION['technician']['email']; ?>
	        <br />
	        <form action="" method="post">
                    <input type="hidden" name="action"
                           value="technician_logout" />
                    <input type="submit" value="Logout" />
                    </form>