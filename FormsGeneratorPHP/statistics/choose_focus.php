<?php if (empty($surveys)):
    header('Location: index.php');
elseif (empty($author_id)): ?>
<p>
You can choose which survey you want to look at, or you can narrow it down by author.  Possibly later, you'll be able to view user statistics and author statistics.
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
<?php else: ?>
<p>
   Now that you've narrowed it down, choose which survey you want to look at it.
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

<?php endif; ?>


<br />
