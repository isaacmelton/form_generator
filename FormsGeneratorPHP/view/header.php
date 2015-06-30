<?php
// determine the absolute path to the style sheet main.css
$uri = $_SERVER['REQUEST_URI'];
$dirs = explode('/', $uri);
$i = 1;
$path = '/';
while ($dirs[$i] != "") {
    $path .= $dirs[$i] . '/';
    $i += 1;
}
$path .= '';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- the head section -->
<head>
    <title>Forms Generator</title>
    <link rel="stylesheet" type="text/css"
          href="<?php echo $path . 'main.css'; ?>" />
</head>

<!-- the body section -->
<body>
<div id="page">
    <div id="header">
        <h1>Forms Generator</h1>
        <p>Interactive Forms Generation</p>
        <ul class="nav"><li><a href="http://<?php echo $_SERVER['HTTP_HOST'].$path; ?>">Home</a></li></ul>
    </div>


   