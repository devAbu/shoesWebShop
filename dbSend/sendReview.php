<?php

require '../connection/connect.php';

$productID = $_REQUEST["productID"];
$user = $_REQUEST["user"];
$review = $_REQUEST["review"];

if ($_REQUEST['task'] == "send") {

    $query = "INSERT INTO productsreview (`productID`, `review` ,`user`) VALUES ('$productID', '$review', '$user')";

    $response = @mysqli_query($dbc, $query);
    if ($response) {
        echo ('send');
    } else {
        echo mysqli_error($dbc);
    }
}
