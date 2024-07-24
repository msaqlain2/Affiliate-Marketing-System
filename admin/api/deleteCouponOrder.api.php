<?php 

require_once('../models/affiliateMarketing.class.php');
echo ((new affiliateMarketing())->deleteCouponOrder($_POST['id']));