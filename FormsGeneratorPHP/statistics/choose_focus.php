<p>
    Hey look!  This is where you choose either the survey or author (or ultimately survey-taker) you want to inspect statistics-wise.
</p>

<form action="" method="post" id="aligned">
    <input type="hidden" name="action" value="surveys" />
    <select name="survey_id">
        <?php foreach ($surveys as $survey): ?>
            <option value="<?php echo $survey['id']; ?>">
                <?php echo $survey['title']; ?>
            </option>
        <?php endforeach; ?>
    </select>
    <br />
    <input type="submit" value="Inspect" />
</form>

<br />

<form action="" method="post" id="aligned">
    <input type="hidden" name="action" value="authors" />
    <select name="author_id">
        <?php foreach ($authors as $author): ?>
            <option value="<?php echo $author['id']; ?>">
                <?php echo $author['email']; ?>
            </option>
        <?php endforeach; ?>
    </select>
    <br />
    <input type="submit" value="Inspect" />
</form>

<br />
