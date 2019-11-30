<?php

require '../connection/connect.php';

$favoriteID = $_REQUEST['favoriteID'];

if ($_REQUEST['task'] == "delete") {

    $query = "DELETE FROM favoriteproduct where ID = $favoriteID";

    $response = @mysqli_query($dbc, $query);
    if ($response) {
        echo ('deleted');
    } else {
        echo mysqli_error($dbc);
    }
}
