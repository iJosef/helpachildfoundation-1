<?php
    // get data from contact form
    if (isset($_POST['contact'])){
        if(isset($_POST['name'])&& isset($_POST['email'])&& isset($_POST['message'])){
            // Check for empty fields
            if(empty($_POST['name'])      ||
                empty($_POST['email'])     ||
                empty($_POST['message'])   ||
                !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
                {
                echo "No arguments Provided!";
                return false;
            }
            
            // defining variables    
            $name = strip_tags(htmlspecialchars($_POST['name']));
            $email_address = strip_tags(htmlspecialchars($_POST['email']));
            $message = strip_tags(htmlspecialchars($_POST['message']));
                
            // Creating the email and sending the message
            $to = 'info@helpachildfoundation.org'; // This is where the form will send a message to.
            $email_subject = "Help A Child Foundation Contact Form:  $name";
            $email_body = "You have received a new message from Help A Child Foundation Contact Form contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nMessage:\n$message";
            $headers = "From: noreply@helpachildfoundation.org\n"; // This is the email address the generated message will be from.
            $headers .= "Reply-To: $email_address";   
            mail($to,$email_subject,$email_body,$headers);
            return true; 
            header ("location: contact.html"); // returns back to contact page
        }
    }
?>