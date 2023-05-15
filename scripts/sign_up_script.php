<?php

$nameErr = $emailErr = $contact_numberErr = $contact_methodErr = "";
$name = $email = $contact_number = "";
$contact_method = [];

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

    if (empty($_POST["contact_number"])) {
        $contact_numberErr = "Contact Number is required";
    }
    else {
        $contact_number = test_input($_POST["contact_number"]);
    }

    if (empty($_POST["contact_method"])) {
        $contact_methodErr = "At least one contact method is required";
    }
    else {
        if (IsChecked("contact_method", "email")) {
            array_push($contact_method, "email");
        }
        
        if (IsChecked("contact_method", "contact_number")) {
            array_push($contact_method, "contact_number");
        }
    
        foreach ($contact_method as $chkval) {
            $chkval = htmlspecialchars($chkval);
        }
    }
}

function IsChecked($chkname, $value) {
    if(!empty($_POST[$chkname])) {
        foreach($_POST[$chkname] as $chkval) {
            if ($chkval == $value) {
                return true;
            }
        }
    }
    return false;
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>