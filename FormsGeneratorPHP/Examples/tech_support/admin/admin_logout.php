 
 <br /><br /> 
 <h2>Login Status</h2>
	        You are logged in as <?php echo $_SESSION['admin']['adminUsername']; ?>
	        <br />
	        <form action="../admin/" method="post">
                    <input type="hidden" name="action"
                           value="admin_logout" />
                    <input type="submit" value="Logout" />
                    </form>