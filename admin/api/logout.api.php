<?php
if(!isset($_SESSION)) session_start();
require_once('../models/affiliateMarketing.class.php');
unset($_SESSION[$_SERVER['REMOTE_ADDR']]);

header('location:'.BASE_URL.'admin/');