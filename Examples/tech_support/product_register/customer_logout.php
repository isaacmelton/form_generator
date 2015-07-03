 
 <br /><br /> 
 <h2>Login Status</h2>
	        You are logged in as <?php echo $_SESSION['customer']['email']; ?>
	        <br />
	        <form action="" method="post">
                    <input type="hidden" name="action"
                           value="customer_logout" />
                    <input type="submit" value="Logout" />
                    </form>