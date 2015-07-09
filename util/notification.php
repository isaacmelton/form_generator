<?php

if (isset($errors)) {
    if (array_filter($errors)) {
        foreach ($errors as $err) {
            echo "<div class='error'>";
            echo $err;
            echo "</div>";
        }
    }
}

if (isset($notice)) {
    echo "<div class='notice'>";
    echo $notice;
    echo "</div>";
}
?>