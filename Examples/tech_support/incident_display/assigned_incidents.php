<?php include '../view/header.php'; ?>
<?php include '../admin/valid_admin.php'; ?>
<div id="main">

    <div id="content">
        <!-- display a list of unassigned incidents -->
        <h2>Assigned Incidents</h2>
        
        <p><a href="?action=display_unassigned">View Unassigned Incidents</a>
        
        <?php if (count($assigned_incidents) == 0) {?>
        
        	<p>There are no assigned incidents.</p>
        	<p><a href="?action='display_assigned'">Refresh List of Incidents</a></p>
        	
        <?php } else {?>
        
	        <table>
	            <tr>
	                <th>Customer</th>
	                <th>Product</th>
	                <th>Technician</th>
	                <th>Incident</th>
	            </tr>
	            <?php foreach ($assigned_incidents as $incident) : ?>
	            <tr>
	            	<td><?php echo $incident["customerFirstName"]." ".$incident["customerLastName"];?></td>
	                <td><?php echo $incident['name']; ?></td>
	                <td><?php echo $incident["technicianFirstName"]." ".$incident["technicianLastName"];?></td>
	                <td>
		                <label>ID:</label><?php echo $incident['incidentID']; ?><br />
		                <label>Opened:</label><?php echo date('m/d/Y', strtotime($incident['dateOpened'])); ?><br />
		                <label>Closed:</label><?php (!empty($incident['dateClosed']) ? $open = date('m/d/Y', strtotime($incident['dateClosed'])) : $open = "OPEN"); echo $open; ?><br />
		                <label>Title:</label><?php echo $incident['title']; ?><br />
		                <label>Description:</label><?php echo $incident['description']; ?>               
	                </td>	             
	            </tr>
	            <?php endforeach; ?>
	        </table>	        
                            
        <?php } ?>       
       
    </div>
    
    <?php include '../admin/admin_logout.php' ?>
</div>
<?php include '../view/footer.php'; ?>
