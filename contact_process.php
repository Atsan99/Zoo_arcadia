<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $email = $_POST['email'];

    
    $to = 'zoo@example.com';
    $subject = "Contact: $title";
    $message = "Description: $description\nEmail: $email";
    $headers = "From: $email";

    if (mail($to, $subject, $message, $headers)) {
        echo "Votre message a été envoyé avec succès.";
    } else {
        echo "Erreur lors de l'envoi de votre message. Veuillez réessayer.";
    }
}
?>
