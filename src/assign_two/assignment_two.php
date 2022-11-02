<! ---------------------------------------------------------------------------------------------------------------------------------------------- 
-- Name: William Rice 
-- Class: CIT 253 
-- Instructor: Bradly Karr 
-- Date: 09/03/2022 
-- Assignment: Assignment Two 
-- Dev Env: Mac OS | Visual Studio Code 
-- Notes: Just being transparent that I used a docker container running php 7.4 when developing and testing this assignment. 
-- I chose php 7.4 because the textbook uses php 7. 
----------------------------------------------------------------------------------------------------------------------------------------------->

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Assignment Two</title>
    </head>

    <body>
        <?php
        $number_one = rand(1, 100);
        $number_two = rand(1, 100);

        $addition = $number_one + $number_two;
        $difference = $number_two - $number_one;
        $product = $number_one * $number_two;
        $division = $number_two / $number_one;
        $remainder = $number_two % $number_one;

        echo "$number_one + $number_two = $addition";
        echo "<br/>";
        echo "$number_two - $number_one = $difference";
        echo "<br/>";
        echo "$number_one * $number_two = $product";
        echo "<br/>";
        echo "$number_two / $number_one = $division";
        echo "<br/>";
        echo "$number_two % $number_one = $remainder";
        ?>
    </body>

    </html>