<div id="main">

    <div class="container">
        <!-- display a table of products -->
        <h2>Survey List</h2>
        <table class="table table-hover">
            <tr>
                <th>Title</th>
                <th>Creator</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($surveys as $survey) : ?>
            <tr>
                <td><?php echo $survey['title']; ?></td>
                <td><?php echo $survey['person_id']; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>

