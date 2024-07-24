<?php 

require_once('../models/affiliateMarketing.class.php');
echo ((new affiliateMarketing())->deleteCouponCategory($_POST['id']));