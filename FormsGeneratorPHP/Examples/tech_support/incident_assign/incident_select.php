<?php include '../view/header.php'; ?>
<?php include '../admin/valid_admin.php'; ?>
<div id="main">

    <div id="content">
        <!-- display a list of unassigned incidents -->
        <h2>Select Incident</h2>
        <table>
            <tr>
                <th>Customer</th>
                <th>Product</th>
                <th>Date Opened</th>
                <th>Title</th>
                <th>Description</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($incidents as $incident) : ?>
            <tr>
            	<td><?php echo $incident["firstName"]." ".$incident["lastName"];?></td>
                <td><?php echo $incident['productCode']; ?></td>
                <td><?php echo $incident['dateOpened']; ?></td>
                <td><?php echo $incident['title']; ?></td>
                <td><?php echo $incident['description'];?>
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="incident_assign" />
                    <input type="hidden" name="incidentID"
                           value="<?php echo $incident['incidentID']; ?>" />
                    <input type="submit" value="Select" />
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    
    <?php include '../admin/admin_logout.php' ?>
</div>
<?php include '../view/footer.php'; ?>
