<?php 
include('includes/header.inc.php');
$affiliateMarketing = new affiliateMarketing();
$storesData = $affiliateMarketing->getAllStoresDataJoinCoupons();
$couponsData = $affiliateMarketing->getAllCoupons();
?>

<?php
if(isset($_POST['submit'])) {
$name = isset($_POST['name']);
$email= $_POST['email'];
$subject= $_POST['subject'];
$message= $_POST['message'];
$to = " info@verifiedsaver.com";
$subject = "Meta Technologix";
$txt ="Name = ". $name . "\r\n  Email = " . $email . "\r\n  Subject = " . $subject . "\r\n Message =" . $message;
$headers = "From: . $email" . "\r\n";
if($email!=NULL){
    mail($to,$subject,$txt,$headers);
}
}


?>



    <div id="contact-us">
        <div class="notification-container notification-container-empty"><span></span></div>
        <div class="container">
            <h1>Contact Us</h1>
            <div class="text-box">
                <form  method="post" accept-charset="utf-8">
            <input type="hidden" name="_token" />                                                                                           
                    <div class="response-box"></div>
                    <div>
                        <label for="name">Name:</label></div>
                    <div>
                        <input class="text" type="text" size="40" name="name" id="name"></div>

                    <div>
                        <label for="email">Email Address:</label></div>
                    <div>
                        <input class="text" type="email" size="40" name="email" id="email"></div>


                   

                    <div><label for="subject">Subject: <span class="required">*</span></label>
                    </div>
                    <div><input class="text" type="text" size="40" name="subject" id="subject"></div>

                    <div><label for="message">Message: <span class="required">*</span></label></div>
                    <div><textarea name="message" id="message"></textarea></div>
                    
                    <div><input type="submit" name="submit" class="btn-submit1" value="Submit">
            
                    
                    </div>
                </form>            </div>
        </div>
    </div>
 


<?php include('includes/footer.inc.php') ?>