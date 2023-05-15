<?php

error_reporting(-1);
ini_set('display_errors', 'On');
set_error_handler("var_dump");

$nameErr = $emailErr = $messageErr = "";
$name = $email = $message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    }
    else {
        $name = test_input($_POST["name"]);

        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    }
    else {
        $email = test_input($_POST["email"]);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    if (empty($_POST["message"])) {
        $messageErr = "Message is required";
    }
    else {
        $message = test_input($_POST["message"]);
    }

    if ($nameErr == "" && $emailErr == "" && $messageErr == "") {
        $msg = "Name:" . "\n" . $name . "\n" . "\n" . "Email:" . "\n" . $email . "\n" . "\n" . "Message:" . "\n" . $message;
        $msg = wordwrap($msg, 70);

        if (mail("kylekeene.welch@gmail.com", "Landing Page Contact", $msg)) {
            echo "Email successfully sent";
        }
        else {
            echo "Email sending failed";
        }
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>