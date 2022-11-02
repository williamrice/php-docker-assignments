<! -------------------------------------------------------------------------------------------
-- Name: William Rice 
-- Class: CIT 253 
-- Instructor: Bradly Karr 
-- Date: 10/23/2022 
-- Assignment: Assignment Seven 
-- Dev Env: Mac OS | Visual Studio Code | Docker php:7.4-apache
-- Notes: 
-- This page contains a sticky form that allows a user to place a coffee order. If an error is encountered by the user, 
-- an error message is displayed and the data that the user already entered is preserved in the form. 
----------------------------------------------------------------------------------------------->

<?php

// Echo the html head info since we are running on a single php script. 
echo '<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Assignment Seven</title>
    <style>
      td, tr{
        padding: .3em;
      }
    </style>
  </head>';

// This function prints the order form when called. I needed to do this twice, so I just abstracted the 
// echo to a function. 
function display_coffee_order_form()
{
  // Array for coffee names so we can loop over the names later to help make the select sticky
  $coffee_name_array = array("Boca Villa", "South Beach Rhythm", "Pumpkin Paradise", "Sumatran Sunset", "Ball Bature", "Double Dark");

  echo '<h1>The Coffee House</h1>
    <br />
    <h2>Order Form</h2>
    <table>
      <form method="post">
        <tr>
          <td>
            <label for="coffee_name">Coffee:</label>
          </td>
          <td>
            <select name="coffee_name""> 
              <option value="" disabled selected>Choose Coffee:</option>';
  // Loop over the coffee names to echo out as options.
  foreach ($coffee_name_array as $value) {
    echo "<option value=\"$value\" ";
    // If the POST value coffee_name is equal to value, we make it sticky with the value
    if ($_POST['coffee_name'] == $value) {
      echo "selected = \"selected\"";
    }
    echo ">$value</option>";
  }

  echo '</select>
          </td>
        </tr>
        <tr>
          <td>
            <label for="coffee_type">Type:</label>
          </td>
          <td>
            <input type="radio"  name="coffee_type" value="regular" ';
  // If the coffee_type is set on the POST and equal to regular, we make the radio checked as sticky

  if ($_POST['coffee_type'] == "regular") {
    echo "checked=\"checked\"";
  }

  echo '><label for="coffee_type"
            >Regular</label><br>
            <input type="radio"  name="coffee_type" value="decaffinated" ';

  // If the coffee_type is set on the POST and equal to decaffinated, we make the radio checked as sticky          
  if ($_POST['coffee_type'] == "decaffinated") {
    echo "checked=\"checked\"";
  }

  echo '><label for="coffee_type">Decaffinated</label>
          </td>
        </tr>
        <tr>
          <td>
            <label for="quantity">Quantity (in pounds):</label>
          </td>
          <td>
            <input type="text" name="quantity" size="5" value="' . $_POST['quantity'] . '" />
          </td>
        </tr>
        <tr>
          <td>
            <label for="name">Name:</label>
          </td>
          <td>
            <input type="text" name="name" value="' . $_POST['name'] . '"/>
          </td>
        </tr>
        <tr>
          <td>
            <label for="email">E-mail address:</label>
          </td>
          <td>
            <input type="text" name="email" value="' . $_POST['email'] . '"/>
          </td>
        </tr>
        <tr>
          <td>
            <label for="phone_number">Telephone #:</label>
          </td>
          <td>
            <input type="text" name="phone_number" size="15" value="' . $_POST['phone_number'] . '"/>
          </td>
        </tr>
        <tr>
          <td>
            <label for="address">Address:</label>
          </td>
          <td>
            <input type="text" name="address" value="' . $_POST['address'] . '"/>
          </td>
        </tr>
        <tr>
          <td>
            <label for="city">City:</label>
          </td>
          <td>
            <input type="text" name="city" value="' . $_POST['city'] . '"/>
          </td>
        </tr>
        <tr>
          <td>
            <label for="state">State:</label>
          </td>
          <td>
            <input type="text" name="state" size="6" value="' . $_POST['state'] . '"/>
          </td>
        </tr>
        <tr>
          <td>
            <label for="zip_code">Zip:</label>
          </td>
          <td>
            <input type="text" name="zip_code" size="12"value="' . $_POST['zip_code'] . '"/>
          </td>
        </tr>
        <tr>
          <td>
            <input type="submit" value="Submit" />
          </td>
          <td>
            <input type="reset" value="Reset" />
          </td>
        </tr>
      </form>';
}

// If the server request method is GET, we only want to display the order form.
if ($_SERVER['REQUEST_METHOD'] == "GET") {
  display_coffee_order_form();
}

// If the request method is POST, we will start our data validation and display the form
// again if there are errors along with the errors printed out. Any data that was submitted
// with the post is sticky and remains in the form while the user corrects the errors.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
    $err_string = $err_string . "Please enter a valid phone number.<br>";
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
    echo "<p style=\"color:red; font-size:105%;\">$err_string</p>";
    echo "</div>";
    display_coffee_order_form();
    exit;
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

  if ($err_count == 0) {
    echo '<h1>The Coffee House</h1>
        <br />
        <h2>Order Summary</h2>
    
        <table>
            <tr>
                <td>
                    Name:
                </td>
                <td \>' .
      $name .
      '</td>
            </tr>
            <tr>
                <td>
                    Address:
                </td>
                <td \>  ' .
      $address

      . '</td>
            </tr>
            <tr>
                <td>
                    City, State, Zip:
                </td>
                <td \>' .
      $city . "," . $state .  ", " . $zip_code
      . '</td>
            </tr>
            <tr>
                <td>
                    Phone #:
                </td>
                <td \>' .
      $phone_number

      . '</td>
            </tr>
            <tr>
                <td>
                    Email:
                </td>
                <td \>' .
      $email

      . '</td>
            </tr>
        </table>
        <br />
        <div style="display: flex;
        flex-direction: column;
        align-items: center;
        width: fit-content;">
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
                    <td align="right">' . $coffee_name . '</td>
                    <td align="right">' . ucfirst($coffee_type) . '</td>
                    <td align="right">' . $quantity . " lb(s)" . '</td>
                    <td align="right">' . "$" . number_format($unit_cost, 2) . '</td>
                    <td align="right">' . "$" . number_format($total_cost, 2) . '</td>
                </tr>
            </table>
            <p style="margin-right:auto;"><a href="coffee_order.php">Return to order form<a/><p/>
        </div>';
  }
}
