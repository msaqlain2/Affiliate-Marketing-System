<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once('../models/affiliateMarketing.class.php');
$affiliateMarketing = new affiliateMarketing();


 $name = $_POST['couponOrder'];



    echo (new affiliateMarketing())->addCouponOrder(
        $name
    );


