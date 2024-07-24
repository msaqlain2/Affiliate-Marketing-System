<?php 

require_once('../models/affiliateMarketing.class.php');
echo ((new affiliateMarketing())->deleteCouponSubCategory($_POST['id']));