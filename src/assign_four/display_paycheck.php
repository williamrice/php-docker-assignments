<!------------------------------------------------------------------------------ 
-- Name: William Rice 
-- Class: CIT 253 
-- Instructor: Bradly Karr 
-- Date: 09/22/2022 
-- Assignment: Assignment Four 
-- Dev Env: Mac OS | Visual Studio Code | Docker php:7.4-apache
-- Notes: I'm assuming that input validation isn't required in
-- this assignment. I do know that it is a must do in real world. However, 
-- I don't allow the form to be submitted without all the required data. I still
-- prefer to validate expected data, but didn't want to over engineer this
-- assignment.  
--
-- This page contains PHP code that will process a submitted form with pertaining
-- to the users name, hourly rate, and hours worked. The page will calculate the 
-- data to obtain gross pay, federal taxes, state taxes, ss taxes, medicare taxes, 
-- total taxes, and net pay. That data is then displayed to the user in an html
-- table. 
------------------------------------------------------------------------------->


<?php
// Variable data submitted from the form
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$hourly_rate = $_POST['hourly_rate'];
$hours_worked = $_POST['hours_worked'];

// Calculations on the form data to achieve output data
$gross_pay = $hourly_rate * $hours_worked;
$federal_taxes = $gross_pay * (10.65 / 100);
$state_taxes = $gross_pay * (4 / 100);
$social_security_taxes = $gross_pay * (3.8 / 100);
$medicare_taxes = $gross_pay * (1.3 / 100);
$total_taxes = $federal_taxes + $state_taxes + $social_security_taxes + $medicare_taxes;
$net_pay = $gross_pay - $total_taxes;
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Assignment Four</title>
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

        .return-link {
            margin-top: 1em;
        }
    </style>
</head>
<!-- HTML Body  -->

<body>
    <h1>Paycheck Information</h1>

    <?php echo "<p>Hello $first_name $last_name. This week you worked $hours_worked hours and, based on the <br>
                    pay rate of \$" . number_format($hourly_rate, 2) . " per hour, your pay check information is: </p>" ?>

    <table>
        <tr>
            <td>
                Gross Pay:
            </td>
            <td align="right">
                <?php echo "\$" . number_format($gross_pay, 2) . "" ?>
            </td>
        </tr>
        <tr>
            <td>
                Federal Taxes:
            </td>
            <td align="right">
                <?php echo "\$" . number_format($federal_taxes, 2) . "" ?>

            </td>
        </tr>
        <tr>
            <td>
                State Taxes:
            </td>
            <td align="right">
                <?php echo "\$" . number_format($state_taxes, 2) . "" ?>

            </td>
        </tr>
        <tr>
            <td>
                Social Security Taxes:
            </td>
            <td align="right">
                <?php echo "\$" . number_format($social_security_taxes, 2) . "" ?>

            </td>
        </tr>
        <tr>
            <td>
                Medicare Taxes:
            </td>
            <td align="right">
                <?php echo "\$" . number_format($medicare_taxes, 2) . "" ?>

            </td>
        </tr>
        <tr>
            <td>
                Total Taxes:
            </td>
            <td align="right">
                <?php echo "\$" . number_format($total_taxes, 2) . "" ?>

            </td>
        </tr>
        <tr>
            <td>
                Net Pay:
            </td>
            <td align="right">
                <?php echo "\$" . number_format($net_pay, 2) . "" ?>

            </td>
        </tr>
    </table>

    <div class="return-link">
        <a href="user_input.html">Return to input form</a>
    </div>
</body>

</html>