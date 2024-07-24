<?php 
if(!isset($_SESSION)) session_start();
require_once('../models/affiliateMarketing.class.php');

echo json_encode((new affiliateMarketing())->getCouponOrderById($_POST['id']));