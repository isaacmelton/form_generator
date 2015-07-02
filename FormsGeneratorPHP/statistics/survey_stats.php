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
                <?php foreach ($survey as $arow) {
                    if ($qrow['question'] == $arow['question']) {
                        echo '<li>' . $arow['answer'] . '</li>';
                    }
                } ?>
            </ul>
            <?php $uniq = $qrow['question'];
        endif;
    endforeach; ?>
</ol>

<br />

<br />
