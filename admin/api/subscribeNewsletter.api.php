<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once('../models/affiliateMarketing.class.php');
$affiliateMarketing = new affiliateMarketing();

$name = $_POST['username'];
$email = $_POST['emailAddress'];


$response = (new affiliateMarketing())->getNewsLetterData($email, $name);

$result = json_decode($response, true);
if ($result['message'] == 'Thanks for subscribing us') {
    // User subscribed successfully, send email
    $to = "info@verifiedsaver.com";
    $subject = "Meta Technologix";
    $txt ="Name = ". $name . "\r\n  Email = " . $email . "\r\n  Subject = " . $subject;
    $headers = "From: " . $email . "\r\n";
    if ($email != NULL) {
        mail($to,$subject,$txt,$headers);
    }
}

echo $response;

?>
