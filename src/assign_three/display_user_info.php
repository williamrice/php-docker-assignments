<!--------------------------------------------------- 
-- Name: William Rice 
-- Class: CIT 253 
-- Instructor: Bradly Karr 
-- Date: 09/10/2022 
-- Assignment: Assignment Three 
-- Dev Env: Mac OS | Visual Studio Code | Docker php:7.4-apache
-- Notes: I'm assuming that input validation isn't required in
-- this assignment. I do know that it is a must do in real world. 
------------------------------------------------------>


<?php
$name = $_POST['first_name'] . " " . $_POST['last_name'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zipcode'];
$phone = $_POST['phone'];
$email = $_POST['email'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Assignment Three</title>
    <link rel="stylesheet" href="./styles.css" />
</head>

<body>
    <table>
        <th colspan="2">User information</th>
        <tr>
            <td>
                Name:
            </td>
            <td>
                <?php echo $name ?>
            </td>
        </tr>
        <tr>
            <td>
                Address:
            </td>
            <td>
                <?php echo $address ?>

            </td>
        </tr>
        <tr>
            <td>
                City, State, Zip:
            </td>
            <td>
                <?php echo "$city, $state, $zip" ?>

            </td>
        </tr>
        <tr>
            <td>
                Telephone #:
            </td>
            <td>
                <?php echo $phone ?>

            </td>
        </tr>
        <tr>
            <td>
                Email:
            </td>
            <td>
                <?php echo $email ?>

            </td>
        </tr>
        <tr>
            <td>
                <a href="user_input.html">Return to input form</a>
            </td>
        </tr>
    </table>
</body>

</html>