<?php

session_start();

$_SESSION = [];

session_destroy();

define('TITLE', 'Logout');

include('templates/header.html');

?>

<h2>Welcome to the J.D. Salinger Fan Club!</h2>
<p>You are now logged out</p>
<p>Thank you for using this site. We hope that you liked it. <br>
Blah, blah, blah...
Blah, blah, blah...
</p>


<?php include('templates/footer.html'); ?>
