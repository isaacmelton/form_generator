<?php include '../view/header.php'; ?>
<div id="main">

    <div id="content">
        <!-- display a list of unassigned incidents -->
        <h2>Select Incident</h2>
        
        <?php if (count($tech_incidents) == 0) {?>
        
        	<p>There are no open incidents.</p>
        	<p><a href=".">Refresh List of Incidents</a></p>        	
        	
        <?php } else {?>
        
	        <table>
	            <tr>
	                <th>Customer</th>
	                <th>Product</th>
	                <th>Date Opened</th>
	                <th>Title</th>
	                <th>Description</th>
	                <th>&nbsp;</th>
	            </tr>
	            <?php foreach ($tech_incidents as $incident) : ?>
	            <tr>
	            	<td><?php echo $incident["firstName"]." ".$incident["lastName"];?></td>
	                <td><?php echo $incident['productCode']; ?></td>
	                <td><?php echo $incident['dateOpened']; ?></td>
	                <td><?php echo $incident['title']; ?></td>
	                <td><?php echo $incident['description'];?>
	                <td><form action="." method="post">
	                    <input type="hidden" name="action"
	                           value="update_incident" />
	                    <input type="hidden" name="incidentID"
	                           value="<?php echo $incident['incidentID']; ?>" />
	                    <input type="submit" value="Select" />
	                </form></td>
	            </tr>
	            <?php endforeach; ?>
	        </table>	        
                            
        <?php } ?>       
       
    </div>
    <?php include 'tech_logout.php';?>
</div>
<?php include '../view/footer.php'; ?>
