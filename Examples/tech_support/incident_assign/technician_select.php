<?php include '../view/header.php'; ?>
<?php include '../admin/valid_admin.php'; ?>
<div id="main">

    <div id="content">
        <!-- display a list of unassigned incidents -->
        <h2>Select Technician</h2>
        <table>
            <tr>
                <th>Name</th>
                <th>Open Incidents</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($technician_incidents as $technician) : ?>
            <tr>
            	<td><?php echo $technician["firstName"]." ".$technician["lastName"];?></td>
                <td><?php echo $technician['openIncidents']; ?></td>
                <td><form action="" method="post">
                    <input type="hidden" name="action"
                           value="technician_assign" />
                    <input type="hidden" name="techID"
                           value="<?php echo $technician['techID']; ?>" />
                    <input type="submit" value="Select" />
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    
    <?php include '../admin/admin_logout.php' ?>
</div>
<?php include '../view/footer.php'; ?>
