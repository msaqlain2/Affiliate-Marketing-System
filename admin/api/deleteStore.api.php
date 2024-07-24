<?php 

require_once('../models/affiliateMarketing.class.php');
echo ((new affiliateMarketing())->deleteStore($_POST['id']));