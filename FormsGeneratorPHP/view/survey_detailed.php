<div id="main">

    <div class="container">
        <!-- display a table of surveys -->
		
        <h2><?php echo $survey['title']; ?></h2>
        <table class="table table-hover">
			    <tr>
					<th>Question</th>
					<th>Question ID</th>
				</tr>
				<?php foreach ($questions as $question) : ?>
				<tr>
					<td><?php echo $question['question']; ?></td>
					<td><?php echo $question['id']; ?></td>
				</tr>
					<?php foreach ($answers as $answer) : ?>
					<?php if ($answer['question_id'] == $question['id']) { ?>
					<tr>
						<td>&nbsp;&nbsp;&nbsp;<?php echo $answer['answer']; ?></td>
					</tr>
					<?php } ?>
					<?php endforeach ?>
	            <?php endforeach; ?>
				</tr>

        </table>
    </div>
</div>