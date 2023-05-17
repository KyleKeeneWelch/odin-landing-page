<?php

$nameErr = $emailErr = $contact_numberErr = $contact_methodErr = "";
$name = $email = $contact_number = "";
$contact_method = [];
$valid = TRUE;

// Process if POST.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
        $valid = FALSE;
    }
    else {
        // Not match accepted characters.
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
        // Validates by email rules.
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
            // Add email to method array.
            array_push($contact_method, "email");
        }
        
        if (IsChecked("contact_method", "contact_number")) {
            // Add contact number to method array.
            array_push($contact_method, "contact_number");
        }
    
        foreach ($contact_method as $chkval) {
            // Convert to html special characters for each contact method in array.
            $chkval = htmlspecialchars($chkval);
        }
    }

    // If all checks are complete and save to newsletter is valid.
    if ($valid == TRUE) {
        // Read contents of newsletter.text and save to variable.
        $contents = file_get_contents("docs/newsletter.text");
        // If file contains the user's name.
        if (strpos($contents, strtolower($name)) !== false)
        {
            echo "Already Signed Up";
            $name = $email = $contact_number = "";
            $contact_method = [];
        }
        else {
            // Open newsletter.text.
            try {
                $newsletter = fopen("docs/newsletter.text", "a");
            } catch (Exception $e) {
                echo "Unable to open file";
            }
    
            // Convert contact methods into a string.
            $contact_method_str = "";
            foreach ($contact_method as $method) {
                $contact_method_str .= $method . "\n";
            }
            $date = date("l jS \of F Y h:i:s A");
    
            // Concatenate components of text to place into newsletter.text.
            $txt = $date . "\n" . strtolower($name) . "\n" . $email . "\n" . $contact_number . "\n" . $contact_method_str . "\n";
            // Try to write text to newsletter.text.
            try {
                fwrite($newsletter, $txt);
                echo "Sign Up Successful";
            } catch (Exception $e) {
                echo "Sign Up Unsuccessful";
            }
            fclose($newsletter);

            $name = $email = $contact_number = "";
            $contact_method = [];
        }
    }
}

function IsChecked($chkname, $value) {
    if(!empty($_POST[$chkname])) {
        // For each contact method.
        foreach($_POST[$chkname] as $chkval) {
            // If method == value.
            if ($chkval == $value) {
                return true;
            }
        }
    }
    return false;
}

function test_input($data) {
    // Pass through data and trim, stripslashes and convert to html special characters.
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