<?php

echo "<div class='debug'>";
echo "<br><h4>Debug Assistance</h4>";
if (is_array($action)) {
    echo "Array Keys: ".implode(array_keys($action))."<br>";
    echo "Array Data: ".implode($action);
} else {
    echo $action;
}
echo "<br>Nav: ".$nav."<br><br>";

$post_array_debug = print_r($_POST);
echo "<p>Post: ".$post_array_debug."</p>";
echo "</div>";