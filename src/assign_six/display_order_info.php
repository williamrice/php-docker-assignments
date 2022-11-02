<!------------------------------------------------------------------------------ 
-- Name: William Rice 
-- Class: CIT 253 
-- Instructor: Bradly Karr 
-- Date: 10/16/2022 
-- Assignment: Assignment Six 
-- Dev Env: Mac OS | Visual Studio Code | Docker php:7.4-apache
-- Notes: I did in-line styling directly on the error elements for this assignment. I know
-- it's not the preferred way to do things, but minimal styling was needed and the elements
-- were echoed to the page in php so I thought it was easier to do.
--
-- The approach I took for the errors were to create an error count variable and 
-- an error string variable. I increment the error_count variable everytime an error
-- is encountered and append the error message to the error string. The appropriate design
-- for this would be a list/array of error messages and if there were any messages, loop over
-- each one and print it, I just went with the simpler approach for the sake of not 
-- over-engineering a simple assignment. 
--
-- This page processes a coffee order using data received from the form on user_input.html.
-- The data is validated and errors are displayed if the script doesn't receive the expected
-- data. If all data is as expected, an order summary is displayed.  
------------------------------------------------------------------------------->


<?php

// Pricing map array
$coffee_price_array = [
    "Boca Villa" => 7.99,
    "South Beach Rhythm" => 8.99,
    "Pumpkin Paradise" => 8.99,
    "Sumatran Sunset" => 9.99,
    "Ball Bature" => 10.95,
    "Double Dark" => 9.95
];


// Data validation and errors
$err_count = 0;
$err_string = "";

// Coffee Name validation
if (!isset($_POST['coffee_name'])) {
    $err_count++;
    $err_string = $err_string . "Please select a coffee to be purchased.<br>";
}

// Coffee Type Validation
if (!isset($_POST['coffee_type'])) {
    $err_count++;
    $err_string = $err_string . "Please select regular of decaffeinated.<br>";
}

// Quantity Validation - is_numeric validates numeric value and if not empty because NULL is treated as non-numeric
if (!is_numeric($_POST['quantity'])) {
    $err_count++;
    $err_string = $err_string . "Please enter a numeric value for quantity.<br>";
}
// Name validation
if (empty($_POST['name'])) {
    $err_count++;
    $err_string = $err_string . "Please enter a name.<br>";
}

// email validation
if (empty($_POST['email'])) {
    $err_count++;
    $err_string = $err_string . "Please enter an email.<br>";
}

// phone number validation
if (empty($_POST['phone_number'])) {
    $err_count++;
    $err_string = $err_string . "Please enter a phone number.<br>";
}

// address validation
if (empty($_POST['address'])) {
    $err_count++;
    $err_string = $err_string . "Please enter an address.<br>";
}
// city validation
if (empty($_POST['city'])) {
    $err_count++;
    $err_string = $err_string . "Please enter a city.<br>";
}
// state validation
if (empty($_POST['state'])) {
    $err_count++;
    $err_string = $err_string . "Please enter a state.<br>";
}

// zip code validation
if (!is_numeric($_POST['zip_code'])) {
    $err_count++;
    $err_string = $err_string . "Please enter a zip code.<br>";
}

// If there are any errors, output the errors and kill the script after giving a return link
if ($err_count > 0) {
    echo "<div style=\"width:fit-content; border-style: dotted; padding:1.3em; margin-bottom:1em;\">";
    echo "<h1 style=\"color:red; text-align:center;\" >Errors!!</h1>";
    echo "<p style=\"color:red; font-size:160%;\">$err_string</p>";
    echo "</div>";
    echo "<a href=\"user_input.html\" style=\"font-size:160%;\">Return to order form</a>";
    die();
}

// Raw data from the form
$coffee_name = $_POST['coffee_name'];
$coffee_type = $_POST['coffee_type'];
$quantity = $_POST['quantity'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone_number = $_POST['phone_number'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip_code = $_POST['zip_code'];







//Get cost of coffee type and calculate total
$is_regular = $coffee_type == "regular";


$unit_cost = $is_regular ? $coffee_price_array[$coffee_name] :
    $coffee_price_array[$coffee_name] + 1.00;
$total_cost = $unit_cost * $quantity;
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Assignment Six</title>
    <!-- CSS styling to achieve style comparable to assignment requirements -->
    <style>
        table,
        th,
        td {
            padding: .3em;
        }

        thead {
            text-align: center;
        }

        .order-info-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: fit-content;
        }
    </style>
</head>
<!-- HTML Body  -->

<body>
    <h1>The Coffee House</h1>
    <br />
    <h2>Order Summary</h2>

    <table>
        <tr>
            <td>
                Name:
            </td>
            <td \>
                <?php echo $name ?>
            </td>
        </tr>
        <tr>
            <td>
                Address:
            </td>
            <td \>
                <?php echo $address ?>

            </td>
        </tr>
        <tr>
            <td>
                City, State, Zip:
            </td>
            <td \>
                <?php echo $city . ',' . $state . ', ' . $zip_code ?>
            </td>
        </tr>
        <tr>
            <td>
                Phone #:
            </td>
            <td \>
                <?php echo $phone_number ?>

            </td>
        </tr>
        <tr>
            <td>
                Email:
            </td>
            <td \>
                <?php echo $email ?>

            </td>
        </tr>
    </table>
    <br />
    <div class="order-info-container">
        <h4>Order Information</h4>
        <table border="1">
            <thead align="center">
                <tr>
                    <th>Coffee</th>
                    <th>Type</th>
                    <th>Quantity</th>
                    <th>Unit Cost</th>
                    <th>Total</th>
                </tr>

            </thead>

            <tr>
                <td align="right"><? echo $coffee_name ?></td>
                <td align="right"><? echo ucfirst($coffee_type) ?></td>
                <td align="right"><? echo $quantity . ' lb(s)' ?></td>
                <td align="right"><? echo '$' . number_format($unit_cost, 2)  ?></td>
                <td align="right"><? echo '$' . number_format($total_cost, 2) ?></td>
            </tr>
        </table>
    </div>
    <p><a href="user_input.html">Return to order form</a></p>
</body>

</html>