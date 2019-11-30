<?php
/* TODO: ne moze user isti artikal 2 put save-at */
require '../connection/connect.php';

$productID = $_REQUEST['productID'];
$user = $_REQUEST['user'];

if ($_REQUEST['task'] == "save") {

    $query = "INSERT INTO favoriteproduct (`productID`, `user`) VALUES ('$productID', '$user')";

    $response = @mysqli_query($dbc, $query);
    if ($response) {
        echo ('saved');
    } else {
        echo mysqli_error($dbc);
    }
}
