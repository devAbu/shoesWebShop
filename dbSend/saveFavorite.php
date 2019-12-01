<?php

require '../connection/connect.php';

$productID = $_REQUEST['productID'];
$user = $_REQUEST['user'];

if ($_REQUEST['task'] == "save") {

    $sql = "SELECT * from favoriteproduct where productID = $productID and user = '$user'";
    $result = $dbc->query($sql);

    $count = $result->num_rows;
    if ($count > 0) {
        echo ('exists');
    } else {
        $query = "INSERT INTO favoriteproduct (`productID`, `user`) VALUES ('$productID', '$user')";

        $response = @mysqli_query($dbc, $query);
        if ($response) {
            echo ('saved');
        } else {
            echo mysqli_error($dbc);
        }
    }
}
