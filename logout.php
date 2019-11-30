<?php
session_start();
//echo 'Logged out <br>';
$_SESSION['url'] = $_SERVER['HTTP_REFERER'];
//$_SESSION['url'] = $_SERVER['REQUEST_URI'];
if (isset($_SESSION['url'])) {
    if ($_SESSION['url'] != 'https://shoeshion.com/favorite.php')
        $url = $_SESSION['url'];
    else
        $url = "index.php";
} else {
    $url = "index.php";
}
//echo $url;
session_destroy();
header("location: " . $url);
//echo "<script>location='".$url."'</script>";
