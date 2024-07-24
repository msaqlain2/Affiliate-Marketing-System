<?php
require_once('../models/affiliateMarketing.class.php');

if(isset($_POST['username']) && isset($_POST['password'])) {
    $userName = htmlspecialchars($_POST['username'], ENT_QUOTES, 'UTF-8');
    $userPass = htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8');
    $affiliateMarketing = new affiliateMarketing();
    try {
        echo $affiliateMarketing->login($userName, $userPass);
		
    } catch (Exception $e) {
        echo $affiliateMarketing->failedResponseFunction($e->getMessage());
    }
}