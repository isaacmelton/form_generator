<?php include '../view/header.php'; ?>
<?php include '../admin/valid_admin.php'; ?>
<div id="main">

    <div id="content">
        <!-- display a list of unassigned incidents -->
        <h2>Unassigned Incidents</h2>
        
        <p><a href="?action=display_assigned">View Assigned Incidents</a>
        
        <?php if (count($unassigned_incidents) == 0) {?>
        
        	<p>There are no unassigned incidents.</p>
        	<p><a href="">Refresh List of Incidents</a></p>
        	
        <?php } else {?>
        
	        <table>
	            <tr>
	                <th>Customer</th>
	                <th>Product</th>
	                <th>Incident</th>
	            </tr>
	            <?php foreach ($unassigned_incidents as $incident) : ?>
	            <tr>
	            	<td><?php echo $incident["firstName"]." ".$incident["lastName"];?></td>
	                <td><?php echo $incident['name']; ?></td>
	                <td>
		                <label>ID:</label><?php echo $incident['incidentID']; ?><br />
		                <label>Opened:</label><?php echo date('m/d/Y', strtotime($incident['dateOpened'])); ?><br />
		                <label>Title:</label><?php echo $incident['title']; ?><br />
		                <label>Description:</label><label><?php echo $incident['description']; ?></label>	                
	                </td>	             
	            </tr>
	            <?php endforeach; ?>
	        </table>	        
                            
        <?php } ?>       
       
    </div>
    
    <?php include '../admin/admin_logout.php' ?>
</div>
<?php include '../view/footer.php'; ?>
