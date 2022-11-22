<!------------------------------------------------------------------------------ 
-- Name: William Rice 
-- Class: CIT 253 
-- Instructor: Bradly Karr 
-- Date: 11/21/22
-- Assignment: Final Assignment 
-- Dev Env: Arch Linux | Neovim | Docker php:7.4-apache mysql:8.0.31
-- Notes:  
--
-- This page contains the script 13.6 (logout.php) from the text book. 
------------------------------------------------------------------------------->

<?php

/* This is the logout page. It destroys the cookie. */


// Destroy the cookie, but only if it exists:
if (isset($_COOKIE['Samuel'])) {
  setcookie('Samuel', FALSE, time() - 300);
}


// Define a page title and include the header:
define('TITLE', 'Logout');
include('templates/header.html');


//Print a message
echo '<p>You are now logged out.</p>';


// Include the footer
include('templates/footer.html');
