<!------------------------------------------------------------------------------ 
-- Name: William Rice 
-- Class: CIT 253 
-- Instructor: Bradly Karr 
-- Date: 11/21/22
-- Assignment: Final Assignment 
-- Dev Env: Arch Linux | Neovim | Docker php:7.4-apache mysql:8.0.31
-- Notes:  
--
-- This page contains the script 13.1 (mysqli_connect.php) from the text book. 
------------------------------------------------------------------------------->

<?php

/* this script establishes connection to the database and the character set
 * for communications */

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!ALERT!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// Connect - hostname is a random string because docker. It is forcing me
// to use the docker container id. We should be using environment variables anyways :)
// If testing on a system, be sure to change the first param to your hostname. 
$dbc = mysqli_connect('a5d9f9b2d386', 'root', 'password', 'db');

// Set the character set
mysqli_set_charset($dbc, 'utf8');
