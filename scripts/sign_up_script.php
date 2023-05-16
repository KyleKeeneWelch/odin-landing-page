<?php

$nameErr = $emailErr = $contact_numberErr = $contact_methodErr = "";
$name = $email = $contact_number = "";
$contact_method = [];
$valid = TRUE;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
        $valid = FALSE;
    }
    else {
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
            $valid = FALSE;
        }
        else {
            $name = test_input($_POST["name"]);
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
        $valid = FALSE;
    }
    else {
        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            $valid = FALSE;
        }
        else {
            $email = test_input($_POST["email"]);
        }
    }

    if (empty($_POST["contact_number"])) {
        $contact_numberErr = "Contact Number is required";
        $valid = FALSE;
    }
    else {
        $contact_number = test_input($_POST["contact_number"]);
    }

    if (empty($_POST["contact_method"])) {
        $contact_methodErr = "At least one contact method is required";
        $valid = FALSE;
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

    if ($valid == TRUE) {
        try {
            $newsletter = fopen("docs/newsletter.text", "a");
        } catch (Exception $e) {
            echo "Unable to open file";
        }

        $contact_method_str = "";
        foreach ($contact_method as $method) {
            $contact_method_str .= $method . "\n";
        }
        $date = date("l jS \of F Y h:i:s A");

        $txt = $date . "\n" . $name . "\n" . $email . "\n" . $contact_number . "\n" . $contact_method_str . "\n";
        try {
            fwrite($newsletter, $txt);
            echo "Sign Up Successful";
        } catch (Exception $e) {
            echo "Sign Up Unsuccessful";
        }
        fclose($newsletter);

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
    try {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    } catch (Exception $e) {
        echo "Invalid Input";
    }
}
?>