<!------------------------------------------------------------------------------ 
-- Name: William Rice 
-- Class: CIT 253 
-- Instructor: Bradly Karr 
-- Date: 11/21/22
-- Assignment: Final Assignment 
-- Dev Env: Arch Linux | Neovim | Docker php:7.4-apache mysql:8.0.31
-- Notes:  
--
-- This page contains the script 13.2 (functions.php) from the text book. 
------------------------------------------------------------------------------->

<?php
/* This page denies custom funcitons.*/

// This function checks if the user is an administrator.
// This function takes two optional values.
// This functions returns a boolean value.
function is_administrator($name = "Samuel", $value = "Clemens")
{

  // Check for the cookie and check it's value
  if (isset($_COOKIE[$name]) && ($_COOKIE[$name] == $value)) {
    return true;
  } else {
    return false;
  }
}
