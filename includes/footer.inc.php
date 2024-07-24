<div id="subscriber">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-5">
        <h3><strong>Subscribe Our Newsletter</strong></h3>
      </div>
      <div class="col-lg-8 col-md-7" id="subscriberForm">
        <form id="subscribeNewsLetterForm" method="POST" accept-charset="utf-8">
            
          <div class="col-lg-12">
            <div class="response-box"></div>
          </div>
          <div class="row">
                                <input type="hidden" name="page_source" home_page value="Homepage"/>
                        <div class="col-md-6  col-sm-12">
              <div class="form-group">
                <label>Name</label>
                <input name="username" id="username" type="text" class="form-control" required>
              </div>
            </div>
            <div class="col-md-6 col-sm-12">
              <div class="form-group">
                <label>Email Address*</label>
                <input name="emailAddress" id="email" type="email" class="form-control" required>
              </div>
            </div>
            <div class="col-md-12 col-sm-12">
              <input id="submit_em" class="buttonWidget btn btn-block btn-primary" type="submit"  value="Subscribe" >
            </div>
          </div>
        </form>
        <h5 class="text-center mt-2" id="subscribeMessage"></h5>
        </div>
    </div>
  </div>

</div>


<button class="howtosaveBtn"><span>How to use</span></button> <footer>
<div id="footernavigation">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="<?= BASE_URL ?>about">About Us</a>
                <a class="nav-item nav-link" href="<?= BASE_URL ?>privacy-policy">Privacy Policy</a>
                <a class="nav-item nav-link" href="<?= BASE_URL ?>contact-us">Contact Us</a>
            </div>
        </nav>
    </div>
</div>
<div id="footersocial">
    <div class="container">
        <div class="footer-social">

               
                <a target="_blank" href="#">
                    <img src="<?= BASE_URL ?>theme/imgs/facebook.png" class="img-fluid lazy">
                </a>
            
                        <a target="_blank" href="#">
                <img src="<?= BASE_URL ?>theme/imgs/google.png" class="img-fluid lazy">
            </a>
            
                       <a target="_blank" href="#">
                <img src="<?= BASE_URL ?>theme/imgs/twiter.png" class="img-fluid lazy">
            </a>
            
                        <a target="_blank" href="#">
                <img src="<?= BASE_URL ?>theme/imgs/pinterest.png" class="img-fluid lazy">
            </a>
            
                        <a target="_blank" href="#">
                <img src="<?= BASE_URL ?>theme/imgs/instagram.png" class="img-fluid lazy">
            </a>
            

        </div>
    </div>
</div>
<div id="copyright">
    <div class="container">
        <div class="container">
            <p>Copyright © 2023 <a href="https://www.verifiedsaver.com" style="color:white">Verified Saver</a>. All rights reserved.</p>
            <p>Website Developed by <a href="https://www.metatechnologix.com" style="color:white">MetaTechnologix</a></p>
        </div>
    </div>
</div>
</footer>
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700;900&amp;display=swap" rel="stylesheet">
<link href="../cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
<!--<script src="<?= BASE_URL ?>theme/js/smartssaving_script.js"></script>-->
</body>
<script>
    
    $(document).ready(function(){
       $("#search-input").keyup(function(){
        let search = $('#search-input').val();
        $.ajax({
            type:'POST',
            url: 'admin/api/autoCompleteSearchBar.api.php',
            data:{'search':search},
            success:function(data) {
                if(search.length > 0) {
                    var suggestions = JSON.parse(data);
                    var suggestionsList = "<ul>";
                    for (var i = 0; i < suggestions.length; i++) {
                        let categoryName = suggestions[i].store_name;
                            categoryName = categoryName.replace(/ /g, "-");
                            categoryName = categoryName.toLowerCase();
                        suggestionsList += "<a href='<?php BASE_URL ?>stores/" + categoryName + "'><li>" + suggestions[i].store_name + "</li></a>";

                    }
                    suggestionsList += "</ul>";
                    $("#search-results").html(suggestionsList);
                    $("#search-results").show();
                } else {
                    $("#search-results").hide();
                }
            }
        });
       });
    
    $('#contactUsForm').click(function(e){
        e.preventDefault();
        alert();
    })
       

       
    });


var couponCodes = document.querySelectorAll(".couponClickCountIndexPage");
  
  couponCodes.forEach(function(coupon) {
    var couponCode = coupon.getAttribute("data-coupon-code");
    var couponCodePlaceholder = coupon.querySelector("#coupon-code-placeholder");
    var verifiedCouponCodePlaceholder = coupon.querySelector(".verified-coupon-container");
  
    function handleClick(){
      couponCodePlaceholder.innerText = couponCode;
      
      var tempInput = document.createElement("input");
      tempInput.value = couponCode;
      document.body.appendChild(tempInput);
      tempInput.select();
      document.execCommand("copy");
      document.body.removeChild(tempInput);
    }
    couponCodePlaceholder.addEventListener('click', handleClick);
    verifiedCouponCodePlaceholder.addEventListener('click', handleClick);

  });

var couponLinks = document.querySelectorAll(".couponClickCountIndexPage");

couponLinks.forEach(function(couponLink) {
  var couponId = couponLink.getAttribute("data-coupon-id");
  couponLink.addEventListener('click', function(event) {
    event.preventDefault();
    countClickIndex(couponId);
    window.open(couponLink.getAttribute("href"), "_blank");
  });
});


  function countClickIndex(id) {
  $.ajax({
    type: 'POST',
    url: '<?= BASE_URL ?>admin/api/updateClickCount.api.php',
    data: { 'id': id },
    success: function(data) {
      console.log('Success');
    }
  });
}


    $(document).ready(function() {
      $('#featuredStores').click(function() {
        $.ajax({
          url: '<?= BASE_URL ?>admin/api/getFeaturedStores.api.php',
          success: function(data) {
            let response = $.parseJSON(data);
            $('#storeslist .stores-list').empty();
            $.each(response, function(index, store) {
                console.log(response)
              var storeName = store.store_name.toLowerCase().replace(/[^a-z0-9-]+/g, '-');
              var url = '<?= BASE_URL ?>' + 'stores/' + storeName;
              var imageSrc = 'admin/store_images/' + store.featured_image;
              var cardHtml = '<div class="col-md-3 col-sm-4 col-6" id="featureStoreCards">' +
                '<div class="coupon-item store-list storeCouponGrid">' +
                '<a href="' + url + '">' +
                '<div class="store web_imagebox">' +
                '<img data-src="' + imageSrc + '" src="' + imageSrc + '" class="img-fluid lazy">' +
                '</div>' +
                '</a>' +
                '<div class="col-xs-12 coupon-detail-container">' +
                '<a href="' + url + '">' + store.store_name + '</a>' +
                '</div>' +
                '</div>' +
                '</div>';
              $('#storeslist .stores-list').append(cardHtml);
            });
          },
          error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
          }
        });
      });
    });


    $(document).ready(function() {
      $('#allStores').click(function() {
        $.ajax({
          url: '<?= BASE_URL ?>admin/api/getAllStores.api.php',
          success: function(data) {
            let response = $.parseJSON(data);
            $('#storeslist .stores-list').empty();
            $.each(response, function(index, store) {
                console.log(response)
              var storeName = store.store_name.toLowerCase().replace(/[^a-z0-9-]+/g, '-');
              var url = '<?= BASE_URL ?>' + 'stores/' + storeName;
              var imageSrc = 'admin/store_images/' + store.featured_image;
              var cardHtml = '<div class="col-md-3 col-sm-4 col-6" id="featureStoreCards">' +
                '<div class="coupon-item store-list storeCouponGrid">' +
                '<a href="' + url + '">' +
                '<div class="store web_imagebox">' +
                '<img data-src="' + imageSrc + '" src="' + imageSrc + '" class="img-fluid lazy">' +
                '</div>' +
                '</a>' +
                '<div class="col-xs-12 coupon-detail-container">' +
                '<a href="' + url + '">' + store.store_name + '</a>' +
                '</div>' +
                '</div>' +
                '</div>';
              $('#storeslist .stores-list').append(cardHtml);
            });
          },
          error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
          }
        });
      });
    });

    $(document).ready(function(){

    $('#stars li').on('mouseover', function(){
        var onStar = parseInt($(this).data('value'), 10); 

        $(this).parent().children('li.star').each(function(e){
            if (e < onStar) {
                $(this).addClass('hover');
            }
            else {
                $(this).removeClass('hover');
            }
        });
    }).on('mouseout', function(){
        $(this).parent().children('li.star').each(function(e){
            $(this).removeClass('hover');
        });
    });

    $('#stars li').on('click', function(){
        var onStar = parseInt($(this).data('value'), 10); 
        var stars = $(this).parent().children('li.star');

        for (i = 0; i < stars.length; i++) {
            $(stars[i]).removeClass('selected');
        }

        for (i = 0; i < onStar; i++) {
            $(stars[i]).addClass('selected');
        }

        var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
        const url = window.location.href;
        const str = url.split('/').pop(); // extract last segment of URL
        const words = str.split('-'); // split string into words
        const capitalizedWords = words.map(word => word.charAt(0).toUpperCase() + word.slice(1)); // capitalize first letter of each word
        const result = capitalizedWords.join(' '); // join words with spaces
        $.ajax({
            type: "POST",
            url: '<?= BASE_URL ?>admin/api/couponRating.api.php',
            data: { 'rating': ratingValue, 'storeName': result },
            success: function(data) {
                let response = $.parseJSON(data);
                if(response.status == "success"){
                    $('#counterVotesAndRating').hide();
                    $('.successRating').show();
                    $('.successRating').html("Thanks For Rating");
                    $('.successRating').fadeOut(2000);
                    $('#counterVotesAndRating').fadeIn(2000);
                    
                    $.ajax({
                        type: "POST",
                        url: '<?= BASE_URL ?>admin/api/updateStoreVotes.api.php',
                        data: {'storeName': result},
                        success: function(data){
                            $('#counterVotesAndRating').html(ratingValue + " Rating, " + ratingValue +  " Votes");
                        }
                    });
                    
                }
                else if(response.status == "failed"){
                    $('#counterVotesAndRating').hide();
                    $('.successRating').show();
                    $('.successRating').html("Aready Rated!");
                    $('.successRating').fadeOut(2000);
                    $('#counterVotesAndRating').fadeIn(2000);
                }
                // updateRatingCount();
            }
        });
    });
});


$(document).ready(function(){
    $('#subscribeNewsLetterForm').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: '<?= BASE_URL ?>admin/api/subscribeNewsletter.api.php',
            data: new FormData(e.target),
            processData: false,
            contentType: false,
            type: 'POST',
            success: function(data) {
                let response = $.parseJSON(data);
                 console.log(response.status)
                if(response.status === 'success') {
                    $('#subscribeNewsLetterForm')[0].reset();
                    $("#subscribeMessage").show();
                    $('#subscribeMessage').html('Thanks for Subscribe Us');
                    $('#subscribeMessage').fadeOut(2000);
                }
                else{
                    $('#subscribeNewsLetterForm')[0].reset();
                    $("#subscribeMessage").show();
                    $('#subscribeMessage').html('You have Already Subscribed');
                    $('#subscribeMessage').fadeOut(2000);
                }
            }   
        }); 
    }); 
});



</script>
</html>