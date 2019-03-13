<?php

    if(isset($_POST['submit'])) 
    {
        $recipient='malaybakery6919@gmail.com';
        $subject='Thank you for contacting us!';
        $subject2='Contact from website';

        $name = $_POST['name'];
        $senderEmail=$_POST['email'];
        $message=$_POST['message'];

        $mailBody='Name: '. $sender.'\nEmail: ' . $senderEmail .'\n\n' . $message;
        $thankYou='Thank you! Your message has been sent. We will try to reply as soon as possible.';


        mail($recipient, $subject2, $mailBody); // mailing to bakery
        mail($senderEmail, $subject, $thankYou); // confirmation message sent back to sender

    }

?>
