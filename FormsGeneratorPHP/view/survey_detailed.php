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
			<tr>
				<?php foreach ($questions as $question) : ?>
				<tr>
				<td><?php echo $question['question']; ?></td>
	            <?php endforeach; ?>
				</tr>
            </tr>
        </table>
    </div>
</div>