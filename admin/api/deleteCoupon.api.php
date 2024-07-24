<?php 

require_once('../models/affiliateMarketing.class.php');
echo ((new affiliateMarketing())->deleteCoupon($_POST['id']));
?>