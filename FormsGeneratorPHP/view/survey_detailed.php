<div id="main">

    <div class="container">
        <!-- display a table of surveys -->
		
        <h2><?php echo $survey['title']; ?></h2>
        <table class="table table-hover">
            <tr>
                <th>Title</th>
                <th>Creator</th>
                <th>&nbsp;</th>
            </tr>
            <tr>
                <td><?php echo $survey['title']; ?></td>
                <td><?php echo $survey['person_id']; ?></td>
				<td>Questions and whatnot will be displayed here later.</td>
            </tr>
        </table>
    </div>
</div>