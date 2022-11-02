<!------------------------------------------------------------------------------ 
-- Name: William Rice 
-- Class: CIT 253 
-- Instructor: Bradly Karr 
-- Date: 09/24/2022 
-- Assignment: Assignment Five 
-- Dev Env: Mac OS | Visual Studio Code | Docker php:7.4-apache
-- Notes: Input validation done according to project requirements. Form won't submit
-- with empty fields so null validation wasn't implemented.   
--
-- This page contains PHP code that will process a submitted form containing data
-- about the users full name, phone number, email address, and notes. The PHP code
-- will manipulate the submitted data to extract first and last name out of the 
-- full name, remove characters and whitespace from the phone number, extract the
-- username and domain from the email address, and display the first 30 characters
-- of the notes after stripping all html and php tags, replacing whitespace with 
-- dashes, and inserting html breaks for new lines.  
------------------------------------------------------------------------------->


<?php
// Raw data from the form
$full_name = $_POST['full_name'];
$phone_number = $_POST['phone_number'];
$email_address = $_POST['email_address'];
$notes = $_POST['notes'];

//Process name and split into first name and last name and captilize first letter
//of each name after ensuring the rest of the name is lower case
$trimmed_name = trim($full_name);
$first_name = ucfirst(strtolower(strtok($trimmed_name, " ")));
$last_name = ucfirst(strtolower(strtok(" ")));

//Process phone number to remove special characters, white space, and dashes
// Regex replaces all non-digit characters with nothing (deletes)
$clean_phone_number = preg_replace('/\D/', '', $phone_number);

//Trim leading and trailing whitespace from email address
$trimmed_email_address = trim($email_address);

//Break down the email address. Username is up until '@', domain is after
//Convert each to lowercase and remove internal whitespaces
$username = str_replace(" ", "", strtolower(strtok($trimmed_email_address, "@")));
$domain = str_replace(" ", "", strtolower(strtok("@")));

//Process notes to remove all html and php tags, replace spaces with '-', and 
// extract only first 30 characters. Finally display new lines as break tags
$notes = strip_tags($notes);
$notes = str_replace(" ", "-", $notes);
$notes = substr($notes, 0, 30);
$notes = nl2br($notes);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Assignment Five</title>
    <!-- CSS styling to achieve style comparable to assignment requirements -->
    <style>
        table,
        th,
        td {
            border: 1px solid black;
        }

        td {
            width: 10em;
        }

        td:first-child {
            font-weight: bold;
        }
    </style>
</head>
<!-- HTML Body  -->

<body>
    <h1>Display your info</h1>

    <table>
        <tr>
            <td>
                First Name:
            </td>
            <td \>
                <?php echo $first_name ?>
            </td>
        </tr>
        <tr>
            <td>
                Last Name:
            </td>
            <td \>
                <?php echo $last_name ?>

            </td>
        </tr>
        <tr>
            <td>
                Telephone Number:
            </td>
            <td \>
                <?php echo $clean_phone_number ?>

            </td>
        </tr>
        <tr>
            <td>
                Username:
            </td>
            <td \>
                <?php echo $username ?>

            </td>
        </tr>
        <tr>
            <td>
                Domain:
            </td>
            <td \>
                <?php echo $domain ?>

            </td>
        </tr>
        <tr>
            <td>
                Notes:
            </td>
            <td \>
                <?php echo $notes ?>

            </td>
        </tr>
    </table>
</body>

</html>