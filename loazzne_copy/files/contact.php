




<?php
 
if($_POST) {
    $name = "";
    $email = "";
    $tel = "";
    // $email_title = "";
    $dropdown = "";
    // $visitor_message = "";
     
    if(isset($_POST['name'])) {
        $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    }
     
    if(isset($_POST['email'])) {
        $email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['email']);
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    }
     
    if(isset($_POST['tell'])) {
        $tel = filter_var($_POST['tell'], FILTER_SANITIZE_STRING);
    }
     
    if(isset($_POST['select'])) {
        $dropdown = filter_var($_POST['select'], FILTER_SANITIZE_STRING);
    }
     
    // if(isset($_POST['visitor_message'])) {
    //     $visitor_message = htmlspecialchars($_POST['visitor_message']);
    // }
     
    if($dropdown == "Heating") {
        $recipient = "frederickdbanks@gmail.com";
    }
    else if($concerned_department == "Ventilation") {
        $recipient = "brzyonna@gmail.com";
    }
    else if($concerned_department == "Air Conditioning") {
        $recipient = "frederickbanks@icloud.com";
    }
    else {
        $recipient = "fridgedr2@gmail.com";
    }
     
    $headers  = 'MIME-Version: 1.0' . "\r\n"
    .'Content-type: text/html; charset=utf-8' . "\r\n"
    .'From: ' . $email . "\r\n";
     
    if(mail($recipient, $tel, $name, $headers)) {
        echo "<p>Thank you for contacting us, $name. You will get a reply within 24 hours.</p>";
    } else {
        echo '<p>We are sorry but the email did not go through.</p>';
    }
     
} else {
    echo '<p>Something went wrong</p>';
}
 
?>