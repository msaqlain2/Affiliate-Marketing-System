<?php
// if (!isset($_SESSION)) {
//     session_start();
// }
// require_once('../models/affiliateMarketing.class.php');

// $couponStore = $_POST['couponOrder'];



// echo (new affiliateMarketing())->UpdateCouponOrder(
//     $_POST['id'],
//     $couponStore
// );

?>
<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once('../models/affiliateMarketing.class.php');

$couponStore = $_POST['couponOrder'];

foreach ($couponStore as $order) {
    $orderId = $order['id'];
    $orderValue = $order['order'];

    (new affiliateMarketing())->UpdateCouponOrder($orderId, $orderValue);
}

echo "Coupon Order Updated Successfully";

