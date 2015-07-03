<?php include '../view/header.php'; ?>
<?php include '../admin/valid_admin.php'; ?>
<div id="main">

    <div id="content">
        <!-- display a the tecnician and incident to assign -->
        <h2>Assign Incident</h2>
        
        <?php if (isset($confirmed)) { ?> 
        	
        	<?php if ($confirmed) { ?>
        	
        		This incident was assigned to a technician.
        	
        	<?php } else {?>
        	
        		There was an error assigning this incident to the technician.
        	
        	<?php } ?>
        	
        		<br />
        		<a href="">Select Another Incident</a>
        	
        <?php } else { ?>
        
        	<label>Customer:</label>
	        <?php echo $customer['firstName']." ".$customer['lastName']; ?>
	        <br />
	        
	        <label>Product:</label>
	        <?php echo $incident['productCode']; ?>
	        <br />
	        
	        <label>Technician:</label>
	        <?php echo $technician['firstName']." ".$technician['lastName']; ?>
	        <br />
	              
	        <form action="" method="post">
	            <input type="hidden" name="action"
	            	value="incident_assignment_confirm" />
	            <input type="submit" value="Assign Incident" />
	                </form>
	        <br />
        
        <?php }?>
        
    </div>
    
    <?php include '../admin/admin_logout.php' ?>
</div>
<?php include '../view/footer.php'; ?>
