<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!defined('BASE_URL')) define('BASE_URL', 'http://localhost/Affiliate-Marketing-System/');

class affiliateMarketing{
    private $connect;

    public function __construct() {
        require_once 'database.class.php';
        $db_config = new database();
        $this->connect = $db_config->connect();
    }

    public function successResponseFunction($returnMessage, $returnData)
    {
        return json_encode(array("status" => "success", "message" => $returnMessage, "data" => $returnData));
    }

    public function failedResponseFunction($returnMessage)
    {
        return json_encode(array("status" => "failed", "message" => $returnMessage));
    }

    public function login(string $username, string $password){
        $query = "SELECT * FROM `admin` WHERE username = :username AND password = :password";
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        // setcookie($data['id'], $data['username'], time() + (86400 * 30), "/");
        if (!empty($data) && count($data) > 0) {
            session_start();
            $_SESSION[$_SERVER['REMOTE_ADDR']] = array(
                'user' => $data['username'],
                'user_id' => $data['id'],
            );
            return $this->successResponseFunction('Logged In', ['user_id' => $data['id']]);
        }
        return $this->failedResponseFunction("Invalid Username or Password");
    }

    public function addStore(string $storeName, string $storeCategories, string $websiteUrl, string $affiliateLink, string $featuredImage, string $description, string $couponExpiryDate, string $hotStory) {
        $query = "INSERT INTO `store` (`store_name`, `store_categories`, `website_url`, `affliliate_link`, `is_hot_story`,  `featured_image`, `description`, `coupon_expiry_date`) VALUES (:storeName, :storeCategories, :websiteUrl, :affiliateLink, :hotStory, :featuredImage, :description, :couponExpiryDate)";
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(':storeName', $storeName);
        $stmt->bindParam(':storeCategories', $storeCategories);
        $stmt->bindParam(':websiteUrl', $websiteUrl);
        $stmt->bindParam(':affiliateLink', $affiliateLink);
        $stmt->bindParam(':featuredImage', $featuredImage);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':couponExpiryDate', $couponExpiryDate);
        $stmt->bindParam(':hotStory', $hotStory);
        $stmt->execute();
        return $this->successResponseFunction('Store Added Successfully', '');
    }

    public function updateStore(int $id, string $storeName, string $storeCategories, string $websiteUrl, string $affiliateLink, string $featuredImage, string $description, string $couponExpiryDate, string $hotStory) {
        $query = "UPDATE `store` SET store_name = :storeName, store_categories = :storeCategories, website_url = :websiteUrl, affliliate_link = :affiliateLink, is_hot_story = :hotStory, featured_image = :featuredImage, description = :description, coupon_expiry_date = :couponExpiryDate WHERE id = :id";
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':storeName', $storeName);
        $stmt->bindParam(':storeCategories', $storeCategories);
        $stmt->bindParam(':websiteUrl', $websiteUrl);
        $stmt->bindParam(':affiliateLink', $affiliateLink);
        $stmt->bindParam(':featuredImage', $featuredImage);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':couponExpiryDate', $couponExpiryDate);
        $stmt->bindParam(':hotStory', $hotStory);
        $stmt->execute();
        return $this->successResponseFunction('Store Added Successfully', '');
    }



    public function addCoupon(string $storeId, string $title, string $description, string $affiliateLink, string $code, string $expiryDate, $category, int $isHotStory, $couponReorder) {
        $query = "INSERT INTO `coupon`(`store_id`, `title`, `description`, `affiliate_link`, `code`, `expiry_date`, `category`, `is_hot_story` , `coupon_reorder`) VALUES (:storeId, :title, :description, :affiliateLink, :code, :expiryDate, :category, :isHotStory, :couponReorder)";
        $stmt = $this->connect->prepare($query);
            $stmt->bindValue(':storeId', $storeId);
            $stmt->bindValue(':title', $title);
            $stmt->bindValue(':description', $description);
            $stmt->bindValue(':affiliateLink', $affiliateLink);
            $stmt->bindValue(':code', $code);
            $stmt->bindValue(':expiryDate', $expiryDate);
            $stmt->bindValue(':category', $category);
            $stmt->bindValue(':isHotStory', $isHotStory);
            $stmt->bindValue(':couponReorder', $couponReorder);
            $stmt->execute();
            return $this->successResponseFunction('Coupons Added Successfully', '');
    }
    
    
    public function addCouponOrder(string $orderName) {
        $query = "INSERT INTO `coupons_reorder`(`name`) VALUES (:orderName)";
        $stmt = $this->connect->prepare($query);
        $stmt->bindValue(':orderName', $orderName);
        $stmt->execute();
        return $this->successResponseFunction('Coupons Order Added Successfully', '');
    } 
    
    public function updateAboutUs(string $about) {
        $query = "UPDATE `about_us` SET about_us = :about WHERE id = 1";
        $stmt = $this->connect->prepare($query);
        $stmt->bindValue(':about', $about);
        $stmt->execute();
        return $this->successResponseFunction('About Us Updated Successfully', '');
    }

    public function updateCoupon(int $id, string $storeId, string $title, string $description, string $affiliateLink, string $code, string $expiryDate, int $category, int $isHotStory, $couponOrder) {
        $query = "UPDATE `coupon` SET store_id = :storeId, title = :title, description = :description, affiliate_link = :affiliateLink, code = :code, expiry_date = :expiryDate, category = :category, is_hot_story = :isHotStory, coupon_reorder = :couponOrder WHERE id = :id";
        $stmt = $this->connect->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':storeId', $storeId);
        $stmt->bindValue(':title', $title);
        $stmt->bindValue(':description', $description);
        $stmt->bindValue(':affiliateLink', $affiliateLink);
        $stmt->bindValue(':code', $code);
        $stmt->bindValue(':expiryDate', $expiryDate);
        $stmt->bindValue(':category', $category);
        $stmt->bindValue(':isHotStory', $isHotStory);
        $stmt->bindValue(':couponOrder', $couponOrder);
        $stmt->execute();
        return $this->successResponseFunction('Coupons Updated Successfully', '');
    }


    public function updateCouponCategory(int $id, string $category, string $categoryImage) {
        $query = "UPDATE `coupon_categories` SET category = :category, category_image = :categoryImage WHERE id = :id";
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':categoryImage', $categoryImage);
        $stmt->execute();
        return $this->successResponseFunction('Category Updated Successfully', '');
    }

    public function getRatingByIp(int $storeId, string $ipAdress){
        $query = "SELECT * FROM `rating` WHERE store_id =  :storeId AND userIP = :userIp";
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':categoryImage', $categoryImage);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getRatingByIpAndStoreName(string $storeName, string $ipAdress){
        $query = "SELECT * FROM rating INNER JOIN store ON rating.store_id = store.id
        WHERE store.store_name = :storeName AND userIP = :ipAdress";
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(':storeName', $storeName);
        $stmt->bindParam(':ipAdress', $ipAdress);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }



    public function couponRating(int $storeId, int $rating, string $userIp, string $dated){
    $query = "SELECT count(*) as count FROM `rating` WHERE `store_id`=:storeId AND `userIP`=:userIp";
    $stmt = $this->connect->prepare($query);
    $stmt->bindParam(':storeId', $storeId);
    $stmt->bindParam(':userIp', $userIp);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row['count'] > 0) {
        return $this->failedResponseFunction('You have already rated this store');
    } else {
        $query = "INSERT INTO `rating`(`store_id`, `rating`, `userIP`, `created_at`) VALUES
        (:storeId, :rating, :userIp, :dated)";
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(':storeId', $storeId);
        $stmt->bindParam(':rating', $rating);
        $stmt->bindParam(':userIp', $userIp);
        $stmt->bindParam(':dated', $dated);
        $stmt->execute();
        return $this->successResponseFunction('Thanks For Rating', '');
    }
}

    public function updateStoreVotes(string $storeId, int $vote) {
        $query = "UPDATE `store` SET votes = :vote WHERE id = :storeId";
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(':storeId', $storeId);
        $stmt->bindParam(':vote', $vote);
        $stmt->execute();
        // return $this->successResponseFunction('Thanks For Rating', '');
    }

    
    public function updateSubCategory(int $id, int $categoryId, string $subCategory) {
        $query = "UPDATE `coupon_sub_categories` SET category_id = :categoryId, category_name = :subCategory  WHERE id = :id";
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':categoryId', $categoryId);
        $stmt->bindParam(':subCategory', $subCategory);
        $stmt->execute();
        return $this->successResponseFunction('Category Updated Successfully', '');
    }
    
    public function UpdateCouponOrder(string $id, string $orderName) {
    $query = "UPDATE `coupon` SET coupon_reorder = :orderName WHERE id = :id";
    $stmt = $this->connect->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':orderName', $orderName);
    $stmt->execute();
    return $this->successResponseFunction('Coupon Order Updated Successfully', '');
}

    
    public function updateBannerImage(string $bannerImage) {
        $query = "UPDATE `banner_image` SET banner_image = :bannerImage WHERE id = 1";
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(':bannerImage', $bannerImage);
        $stmt->execute();
        return $this->successResponseFunction('Banner Image Updated Successfully', '');
        
    }
    
    

    public function deleteStore(int $id) {
        $query = "DELETE FROM `store` WHERE id = :id";
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $this->successResponseFunction('Store Deleted Successfully', '');
    }
    
    public function deleteCoupon(int $id) {
        $query = "DELETE FROM `coupon` WHERE id = :id";
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $this->successResponseFunction('Store Deleted Successfully', '');
    }
    
    public function deleteCouponCategory(int $id) {
        $query = "DELETE FROM `coupon_categories` WHERE id = :id";
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $this->successResponseFunction('Category Deleted Successfully', '');
    }

    public function deleteCouponSubCategory(int $id) {
        $query = "DELETE FROM `coupon_sub_categories` WHERE id = :id";
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $this->successResponseFunction('Sub Category Deleted Successfully', '');
    }
    
    public function deleteCouponOrder(int $id) {
        $query = "DELETE FROM `coupons_reorder` WHERE id = :id";
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $this->successResponseFunction('Coupon Order Deleted Successfully', '');
    }

    public function addSubCategory(int $category, string $subCategory) {
        $query = "INSERT INTO `coupon_sub_categories` (`category_id`, `category_name`) 
        VALUES (:category, :subCategory)";
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':subCategory', $subCategory);
         $stmt->execute();
        return $this->successResponseFunction('Sub Category Added Successfully', '');
    }

    public function addCouponCategory(string $category, string $categoryImage) {
        $query = "INSERT INTO `coupon_categories` (`category`, `category_image`) VALUES (:category, :categoryImage)";
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':categoryImage', $categoryImage);
        $stmt->execute();
        return $this->successResponseFunction('Category Added Successfully', '');
    }

    public function getAllStoresData() {
        $query = "SELECT * FROM `store`";
        $stmt = $this->connect->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getBannerImage() {
        $query = "SELECT * FROM `banner_image` WHERE id = 1";
         $stmt = $this->connect->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getFeaturedStore() {
        $query = "SELECT * FROM `store` WHERE is_hot_story = 1";
        $stmt = $this->connect->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllStoresDataJoinCoupons() {
        $query = "SELECT * FROM `store` INNER JOIN coupon_categories ON coupon_categories.id = store.store_categories";    
        $stmt = $this->connect->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
   public function getNewsLetterData(string $email, $name) {
    try {
        $query = "SELECT * FROM `Newsletter` WHERE Email = :email";
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $result = $stmt->fetch();
        if ($result) {
            return $this->failedResponseFunction("You have already subscribed!");
        } else {
            $query = "INSERT INTO `Newsletter`(`Name`, `Email`) VALUES (:name, :email)";
            $stmt = $this->connect->prepare($query);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            return $this->successResponseFunction('Thanks for subscribing us', '');
        }
    } catch (PDOException $e) {
        return $this->failedResponseFunction("Error: " . $e->getMessage());
    }
}

    

    
    public function getCouponOrderById(int $id) {
        $query = "SELECT * FROM `coupons_reorder` WHERE id = id";    
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getAboutUs() {
        $query = "SELECT * FROM `about_us` WHERE id = 1";    
        $stmt = $this->connect->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getPrivacyPolicy1(){
        $query = "SELECT * FROM `privacy_policy` WHERE id = 1";    
        $stmt = $this->connect->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getPrivacyPolicy2(){
        $query = "SELECT * FROM `privacy_policy` WHERE id = 2";    
        $stmt = $this->connect->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getPrivacyPolicy3(){
        $query = "SELECT * FROM `privacy_policy` WHERE id = 3";    
        $stmt = $this->connect->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getPrivacyPolicy4(){
        $query = "SELECT * FROM `privacy_policy` WHERE id = 4";    
        $stmt = $this->connect->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    

    public function autoCompleteSearchBar(string $search) {
    $query = "SELECT store.id, store.store_name FROM `store` WHERE store_name LIKE :search";
    $stmt = $this->connect->prepare($query);
    $search = "%".$search."%";
    $stmt->bindParam(':search', $search);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}



    public function getSmimilarStores(int $storeId , string $storeName){
        $query = "SELECT * FROM `store` WHERE store_categories = :storeId AND store_name != :storeName";
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(':storeId', $storeId);
        $stmt->bindParam(':storeName', $storeName);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getStoreById(int $id){
        $query = "SELECT * FROM `store` WHERE id = :id";    
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllCouponCategories() {
        $query = "SELECT * FROM `coupon_categories`";    
        $stmt = $this->connect->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getAllCouponSubCategoriesById(int $id) {
        $query = "SELECT * FROM `coupon_sub_categories` WHERE id = :id";    
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCouponCategoryById(int $id) {
        $query = "SELECT * FROM `coupon_categories` WHERE id = :id";    
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllCoupons() {
        $query = "SELECT coupon.*, coupon.is_hot_story as coupon_hot_story, coupon.id as coupon_id, store.* , store.id as store_id FROM coupon INNER JOIN store ON coupon.store_id = store.id GROUP BY coupon.id ORDER BY coupon_reorder ASC";    
        $stmt = $this->connect->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getAllCouponOrdersName(){
        $query = "SELECT * FROM `coupons_reorder`";
        $stmt = $this->connect->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllCouponsForClicksCount(int $id){
        $query = "SELECT * FROM `coupon` WHERE id = :id";    
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCouponsData() {
        $query = "SELECT * FROM `coupon` ORDER BY coupon_reorder ASC";    
        $stmt = $this->connect->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateCouponClickCount(int $id, int $clickCount) {
        $query = "UPDATE `coupon` SET click_count = :clickCount WHERE id = :id";
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':clickCount', $clickCount);
        $stmt->execute();
        return $this->successResponseFunction('Category Added Successfully', '');
    }
    
    public function updatePrivacyPolicy1(string $heading1, string $desc1) {
        $query = "UPDATE `privacy_policy` SET heading = :heading1, description = :desc1 WHERE id = 1";
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(':heading1', $heading1);
        $stmt->bindParam(':desc1', $desc1);
        $stmt->execute();
        return $this->successResponseFunction('Card 1 updated Successfully', '');
    }
    
    public function updatePrivacyPolicy2(string $heading2, string $desc2) {
        $query = "UPDATE `privacy_policy` SET heading = :heading2, description = :desc2 WHERE id = 2";
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(':heading2', $heading2);
        $stmt->bindParam(':desc2', $desc2);
        $stmt->execute();
        return $this->successResponseFunction('Card 2 updated Successfully', '');
    }
    
    public function updatePrivacyPolicy3(string $heading3, string $desc3) {
        $query = "UPDATE `privacy_policy` SET heading = :heading3, description = :desc3 WHERE id = 3";
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(':heading3', $heading3);
        $stmt->bindParam(':desc3', $desc3);
        $stmt->execute();
        return $this->successResponseFunction('Card 3 updated Successfully', '');
    }
    
    public function updatePrivacyPolicy4(string $heading4, string $desc4) {
        $query = "UPDATE `privacy_policy` SET heading = :heading4, description = :desc4 WHERE id = 4";
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(':heading4', $heading4);
        $stmt->bindParam(':desc4', $desc4);
        $stmt->execute();
        return $this->successResponseFunction('Card 4 updated Successfully', '');
    }

    public function getStoreIdByStoreName(string $storeName){
        $query = "SELECT * FROM `store` WHERE store_name = :storeName";    
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(':storeName', $storeName);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);   
    }

    public function getStoreByName(string $storeName) {
        $query = "SELECT * FROM `store` INNER JOIN `coupon_categories` ON store.store_categories = coupon_categories.id WHERE store_name = :storeName";    
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(':storeName', $storeName);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);   
    }

    public function getCategoryByName(string $categoryName) {
        $query = "SELECT coupon.*, coupon.category as category_id, coupon_categories.*, coupon.id as coupon_id, coupon_categories.category as category_name, coupon.description as coupon_description, store.*, store.store_categories as scid FROM coupon INNER JOIN coupon_categories ON coupon_categories.id = coupon.category INNER JOIN store ON store.id = coupon.store_id WHERE coupon_categories.category = :categoryName";
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(':categoryName', $categoryName);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCouponsByStoreName(string $storeName) {
        $query = "SELECT c.*, cc.category, s.featured_image, s.website_url, s.store_name FROM coupon c JOIN store s ON c.store_id = s.id JOIN coupon_categories cc ON c.category = cc.id WHERE s.store_name = :storeName";    
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(':storeName', $storeName);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);   
    }

    public function getAllCouponsData(int $id){
        $query = "SELECT coupon.*, coupon_categories.category AS cc FROM coupon JOIN store ON coupon.store_id = store.id JOIN coupon_categories ON coupon.category = coupon_categories.id AND coupon.id = :id";
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCouponSubCategories() {
        $query = "SELECT coupon_sub_categories.*, coupon_categories.* FROM coupon_sub_categories, coupon_categories WHERE coupon_sub_categories.category_id = coupon_categories.id";    
        $stmt = $this->connect->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCouponSubCategoriesForTreeView(int $categoryId) {
        $query = "SELECT * FROM coupon_sub_categories WHERE category_id = :categoryId";    
        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(':categoryId', $categoryId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
