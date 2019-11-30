<?php

require '../connection/connect.php';

$fullSign = $_REQUEST['fullSign'];
$emailSign = $_REQUEST['emailSign'];
$passSign = $_REQUEST['passSign'];

$hashedPass = $hash_pass = password_hash($passSign, PASSWORD_DEFAULT);

if ($_REQUEST['task'] == "register") {
    $query = "INSERT INTO registracija (`fullName`, email, `password`, `activated`) VALUES ('$fullSign', '$emailSign', '$hashedPass', 0)";

    $response = @mysqli_query($dbc, $query);
    if ($response) {
        /* TODO: provjerit kad se hosta */
        $admin_email = "abdulrahman.almonajed@gmail.com";

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: " . $admin_email;

        $message = 'Hvala na registraciji...klik na link / button za verifikaciju';

        $htmlMessage = html_entity_decode($message);

        //send email

        if (mail($emailSign, "E-mail verification", $htmlMessage, $headers)) {
            echo ('sent');
        } else {
            echo ('mail nije poslan');
        }
    } else {
        echo mysqli_error($dbc);
    }
}
