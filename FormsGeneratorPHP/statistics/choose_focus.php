<?php 
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
?>

<?php // include HEADER_STUFF_GOES_HERE ?>

<?php 
    // $takers will wait until users are added to the DB
    if (!isset($surveys)) || (!isset($authors)) || /* (!isset($takers)) */ { 
        header("Location: index.php"); 
    } 
?>

<p>
    Hey look!  This is where you choose either the survey or author (or ultimately survey-taker) you want to inspect statistics-wise.
</p>
