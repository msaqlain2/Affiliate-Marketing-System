<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once('../models/affiliateMarketing.class.php');

if(isset($_POST['heading1']) && isset($_POST['description1'])) {
    echo (new affiliateMarketing())->updatePrivacyPolicy1(
        $_POST['heading1'],
        $_POST['description1']
    );
}

if(isset($_POST['heading2']) && isset($_POST['description2'])) {
    echo (new affiliateMarketing())->updatePrivacyPolicy2(
        $_POST['heading2'],
        $_POST['description2']
    );
}

if(isset($_POST['heading3']) && isset($_POST['description3'])) {
    echo (new affiliateMarketing())->updatePrivacyPolicy3(
        $_POST['heading3'],
        $_POST['description3']
    );
}

if(isset($_POST['heading4']) && isset($_POST['description4'])) {
    echo (new affiliateMarketing())->updatePrivacyPolicy4(
        $_POST['heading4'],
        $_POST['description4']
    );
}




?>
