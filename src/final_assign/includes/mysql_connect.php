<!------------------------------------------------------------------------------ 
-- Name: William Rice 
-- Class: CIT 253 
-- Instructor: Bradly Karr 
-- Date: 11/1/22
-- Assignment: Final Assignment 
-- Dev Env: Arch Linux | Neovim | Docker php:7.4-apache mysql:8.0.31
-- Notes:  
--
-- This page contains the script 13.1 (mysqli_connect.php) from the text book. 
------------------------------------------------------------------------------->

<?php

/* this script establishes connection to the database and the character set
 * for communications */

// Connect
$dbc = mysqli_connect('localhost', 'user', 'password', 'quotes');

// Set the character set
mysqli_set_charset($dbc, 'utf8');
