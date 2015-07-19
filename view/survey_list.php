<?php
include './util/notification.php';
?>

<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-8"><h2>Surveys Available</h2></div>
</div>

<div class="container">
    <div class="col-md-3"></div>
    <div class="col-sm-5 text-center">
        <?php if (isset($message)) : ?>
            <p><?php echo $message; ?></p>
        <?php elseif (isset($surveys)) : ?>
            <h2>Surveys</h2>
            <table class="table table-hover">
                <?php foreach ($surveys as $survey) : ?>
                    <tr col-md-2>
                        <td class="lead"><?php echo $survey['title']; ?></td>
                        <td>
                            <form name="showSurvey" id="showSurvey" action="detailed_survey" method="post">
                                <input type="hidden" name="id"
                                       value="<?php echo $survey['id']; ?>"/>
                                <input class="btn btn-default" type="submit" value="Select"/>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>
</div>
</div>

