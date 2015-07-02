<p>
    Okay, so uh... this is going to get adjusted depending on the format we plan on using, ultimately, but I'll try to make it somewhat clear what's going on...
</p>

<h1><?php echo $survey[0]['title']; ?></h1>

<h2>Author: <?php echo $survey[0]['email']; ?></h2>

<h3><i>Number of submissions: <?php echo $survey[0]['total']; ?></i></h3>

<ol>
    <?php $uniq = null;
    foreach ($survey as $qrow):
        if ($qrow['question'] != $uniq):
            echo '<li>' . $qrow['question'] . '</li>'; ?>
            <ul>
                <?php foreach ($survey as $arow):
                    if ($qrow['question'] == $arow['question']): ?>
                        <li>
                            <?php echo $arow['answer']; ?>
                            <ul><i>
                                <li>total votes: <?php echo $arow['choice_count']; ?></li>
                                <?php $percent = round(100 * $arow['choice_count'] / $arow['total'], 1); ?>
                                <li>percent of votes: <?php echo $percent; ?>%</li>
                            </i></ul>
                        </li>
                    <?php endif;
                endforeach; ?>
            </ul>
            <?php $uniq = $qrow['question'];
        endif;
    endforeach; ?>
</ol>

<br />

<br />
