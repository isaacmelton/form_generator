<div id="main">

    <div class="container">
        <!-- display a table of surveys -->
		
        <h2><?php echo $survey['title']; ?></h2>
        <table class="table table-hover">
			    <tr>
					<th>Question</th>
					<th>Response</th>
				</tr>
				<?php foreach ($questions as $question) : ?>
					<tr>
						<td><?php echo $question['question']; ?></td>
						<td></td>
					</tr>

					<?php foreach ($answers as $answer) : ?>
						<?php if ($answer['question_id'] == $question['id']) : ?>
						<tr>
							<td>&nbsp;&nbsp;&nbsp;<?php echo $answer['answer']; ?></td>
							<td><input type="radio" name="question_<?php echo $answer['question_id'] ?>" value="<?php echo $answer['answer_id'] ?>"></td>
						</tr>
						<?php endif; ?>
					<?php endforeach; ?>
	            <?php endforeach; ?>
				</tr>

        </table>
    </div>
</div>