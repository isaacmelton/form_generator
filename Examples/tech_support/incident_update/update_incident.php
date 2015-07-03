<?php include '../view/header.php'; ?>
<div id="main">
    <h1>Update Incident</h1>
    
    <div class="error"><?php if (isset($error)) {
        	echo $error;
        } ?> </div>
    
    <?php if ($success) {?>
    
    	<p>This incident was updated.</p>
    	<p><a href="">Select Another Incident</a></p>
    
    <?php } else {?>
    
	    <form action="" method="post" id="aligned">
	        <input type="hidden" name="action" value="submit_update" />
			<input type="hidden" name="incidentID" value="<?php echo $incident['incidentID']; ?>" />
	        
	        
	        <label>Incident ID:</label>
	        <?php echo $incident['incidentID']; ?>
	        <br />
	
	        <label>Product Code:</label>
	        <?php echo $incident['productCode']; ?>
	        <br />
	
	        <label>Date Opened:</label>
	        <?php echo date('m/d/Y', strtotime($incident['dateOpened'])); ?>
	        <br />
	
	        <label>Date Closed:</label>
	        <input type="date" name="dateClosed" value="<?php echo $date; ?>" />
	        <br />
	        
	        <label>Title:</label>
	        <?php echo $incident['title']; ?>
	        <br />
	        
	        <label>Description:</label>
	        <textarea rows="6" cols="50" name="description"><?php echo $incident['description']; ?></textarea>
	        <br />
	
	        <label>&nbsp;</label>        
	        <input type="submit" value="Update Incident" />
	        <br />
	    </form>
	    
	<?php } ?>
    <?php include('tech_logout.php');?>
</div>
<?php include '../view/footer.php'; ?>