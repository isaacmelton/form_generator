 <h2>Survey List</h2>
    <div class="container">
        <?php if (isset($message)) : ?>
            <p><?php echo $message; ?></p>
        <?php elseif (isset($surveys)) : ?>
            <h2>Surveys</h2>
        <table class="table table-hover">
                <tr>
                    <th>Title</th>
                    <th>Creator ID</th>
                    <th>ID</th>
                    <th>&nbsp;</th>
                </tr>
                <?php foreach ($surveys as $survey) : ?>
                <tr>
                    <td><?php echo $survey['title']; ?></td>
                    <td><?php echo $survey['person_id']; ?></td>
                    <td><?php echo $survey['id']; ?></td>
                    <td><form name="showSurvey" id="showSurvey" action="detailed_survey" method="post">
                        <input type="hidden" name="id"
                               value="<?php echo $survey['id']; ?>" />
                        <input type="submit" value="Select" />
                    </form></td>
                </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>
	
	<form name="createForm" id="createForm" action="create_form" method="post">

