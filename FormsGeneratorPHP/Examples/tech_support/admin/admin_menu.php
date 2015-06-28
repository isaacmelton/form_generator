<?php include '../view/header.php'; ?>
<?php include '../admin/valid_admin.php'; ?>
<?php require '../util/secure_conn.php';?>

<div id="main">

	<h2>Admin Menu</h2>
	
	<div id="content">
	    <ul class="nav">
	        <li><a href="../product_manager">Manage Products</a></li>
	        <li><a href="../technician_manager">Manage Technicians</a></li>
	        <li><a href="../customer_manager">Manage Customers</a></li>
	        <li><a href="../incident_create">Create Incident</a></li>
	        <li><a href="../incident_assign">Assign Incident</a></li>
	        <li><a href="../incident_display">Display Incidents</a></li>
	    </ul>
	</div>
	
	<?php include '../admin/admin_logout.php' ?>

</div>    
<?php include '../view/footer.php'; ?>