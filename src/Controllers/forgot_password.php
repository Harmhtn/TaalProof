<?php

$to = 'maud@vierhazen.nl';
$subject = 'the subject';
$message = 'hello';
$headers = 'From: webmaster@example.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);


//load head and navbar
require 'Resources/views/head.php';

//load view
require 'Resources/views/default/forgot_password.view.php';

//load footer
require 'Resources/views/footer.php';