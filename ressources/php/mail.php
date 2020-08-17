<?php
$name = (isset($_POST['name']) and !empty($_POST['name'])) ? $_POST['name'] : false;
$email = (isset($_POST['email']) and !empty($_POST['email'])) ? $_POST['email'] : false;
$message = (isset($_POST['message']) and !empty($_POST['message'])) ? $_POST['message'] : false;

header('Content-Type: application/json');

if ($name and $email and $message) {
    $content = "=== Message du site ===\n\nDe: $name \nEmail: $email\nMessage:\n\"$message\"";
    $recipient = "cirquepolichinelle@gmail.com";
    $subject = "Nouveau message de $name ($email) du le site";
    $mailheader = "From: $email \r\n";
    if (mail($recipient, $subject, $content, $mailheader)) {
        print json_encode(array('message' => 'Merci pour votre message !', 'code' => 1));
    } else {
        print json_encode(array('message' => 'Une erreur s\'est produite lors de l\'envoi du formulaire, veuillez réessayer plus tard.', 'code' => 0));
    }
} else {
    print json_encode(array('message' => 'Tous les champs du formulaire doivent être remplis pour l\'envoyer.', 'code' => 0));
}

?>
