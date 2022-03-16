<?php

header('Content-Type: text/html; charset=utf-8');

$EmailTo = "hallo@eelcoverbrugge.nl";

$errors = "";

if (empty($_POST["name"])) {
    $errors = "Vergeet je naam niet ";
} else {
    $name = $_POST["name"];
}

if (empty($_POST["email"])) {
    $errors .= "Vergeet je e-mail niet ";
} else {
    $email = $_POST["email"];
}

if (empty($_POST["subject"])) {
    $errors = "Vergeet je onderwerp niet ";
} else {
    $Subject = $_POST["subject"];
}

if (empty($_POST["message"])) {
    $errors .= "Vergeet je bericht niet ";
} else {
    $message = $_POST["message"];
}

$Body = "";
$Body .= "Naam: ";
$Body .= $name;
$Body .= "\n";
$Body .= "Email: ";
$Body .= $email;
$Body .= "\n";
$Body .= "Bericht: ";
$Body .= $message;
$Body .= "\n";

$Headers = 'Content-Type: text/plain; charset=utf-8' . "\r\n";
$Headers .= 'Content-Transfer-Encoding: base64' . "\r\n";
$Headers .= "From:".$email . "\r\n";

$success = mail($EmailTo, '=?UTF-8?B?' . base64_encode($Subject) . '?=' , base64_encode($Body), $Headers);

if ($success && $errors == ""){
   echo 'success';
}
else{
    echo $errors;
}
?>
