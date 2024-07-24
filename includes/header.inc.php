<?php 
include('admin/models/affiliateMarketing.class.php');

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="<?= BASE_URL ?>uploads/ssaving/Vs Final Logo-01.jpg" type="image/gif" >
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Verified Saver</title>

<link rel="stylesheet" href="<?= BASE_URL ?>theme/css/main-style.min.css">

</head>

<style type="text/css">
  .search-container {
  position: relative;
}

.search-input {
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  width: 100%;
}

.search-results {
  position: absolute;
  top: 100%;
  left: 0;
  right: 0;
  background-color: #fff;
  border: 1px solid #ccc;
  list-style: none;
  padding: 0;
  margin: 0;
  display: none;
}

.search-results li {
  padding: 10px;
  border-bottom: 1px solid #ccc;
}

.search-results li:last-child {
  border-bottom: none;
}

.search-results li:hover {
  background-color: #f2f2f2;
  cursor: pointer;
}

</style>

<body>
<script type="text/javascript" src="https://classic.avantlink.com/affiliate_app_confirm.php?mode=js&amp;authResponse=94edb9e7ac5712fe4712c746f38f8da0b6ff4337"></script>

<header>
  <div class="container">
    <div class="row">

    <div class="col-md-3 col-sm-12 col-xs-12">
        <a class="navbar-brand" href="<?= BASE_URL ?>">
        <img class="ls-is-cached lazyloaded" src="<?= BASE_URL ?>uploads/ssaving/logo11.png" width="60%">
        </a>
      </div>
      <div class="searchHeader col-md-9 col-sm-12 col-xs-12">
        <div id="search-Stores">
          <div class="row">
            <div class=" col-lg-12 ">
              <form action="#" class="search-bar form-search" method="post" accept-charset="utf-8">
                  <input type="hidden" name="_token"/>        
              <div class="icon-addon addon-lg">
                <div id="searchFieldSet">
                  <span><i class="fa fa-search"></i></span>
                  <input type="text" class="newtag form-control ui-autocomplete-input search-input" name="query" id="search-input" placeholder="Verified Saver has Thousand of Stores for You to Search..." autocomplete="off">
                  <ul id="search-results" class="search-results"></ul>
                </div>
              </div>
              <div class="search_resultbox">
                
              </div>
              </form>            
            </div>


            <div class="col-lg-12">
              <div id="results">
                <ul class="ui-autocomplete ui-front ui-menu ui-widget ui-widget-content" id="ui-id-1" tabindex="0" style="display: none;"></ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="navigation">
    <button class="navbar-toggler" id="menu-btn" type="button" data-toggle="collapse" onclick="$('#navbarNavAltMarkup').slideToggle()" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation"><span class="line"></span><span class="line"></span><span class="line"></span></button>
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light ">
        
        <div class="collapse navbar-collapse " id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-item nav-link active" href="<?= BASE_URL ?>">Home <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="<?= BASE_URL ?>stores">Stores</a>
            <a class="nav-item nav-link" href="<?= BASE_URL ?>categories">Categories</a></div>
        </div>
      </nav>
    </div>
  </div>
  </div>
</header>