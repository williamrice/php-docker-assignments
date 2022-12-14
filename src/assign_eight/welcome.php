<!------------------------------------------------------------------------------ 
-- Name: William Rice 
-- Class: CIT 253 
-- Instructor: Bradly Karr 
-- Date: 11/1/22
-- Assignment: Assignment Eight 
-- Dev Env: Arch Linux | Neovim | Docker php:7.4-apache
-- Notes:  
--
-- This page contains the script 9.8 (welcome.php) from the text book. 
------------------------------------------------------------------------------->

<?php

session_start();

define('TITLE', 'Welcome to the J.D. Balinger Fan Club!');

include('templates/header.html');


//greeting
print '<h2>Welome to the J.D. Salinger Fan Club!</h2>';
print '<p>Hello, ' . $_SESSION['email'] . '!</p>';

//print how long they've been logged in
date_default_timezone_set('America/New_York');

print '<p>You have been logged in since:' . date('g:i a', $_SESSION['loggedin'])
        . '.</p>';

//logout link
print '<p><a href="logout.php">Logout</a></p>';

include('templates/footer.html');
