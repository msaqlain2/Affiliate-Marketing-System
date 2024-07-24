$(document).ready(function(){
    $('.loginForm').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: 'api/login.api.php',
            data: new FormData(e.target),
            processData: false,
            contentType: false,
            type: 'POST',
            beforeSend : function()
            {
                $("#wait").fadeIn();
                $('#error').fadeOut();
            },
            success: function(data) {
                let response = $.parseJSON(data);
                if(response.status==="success")
                {
                    if(response){   
                        window.location.href = 'store';
                    }
                }
                else
                {
                    $("#wait").fadeOut();
                    $('#message').html(response.message)
                    $('#error').fadeIn();
                }
            },
            error: function(e)
            {
                $("#wait").fadeOut();
                $('#message').html("Something went wrong!")
                $('#error').fadeIn();
            }
        });
    });

    $('#addStoreForm').submit(function(e){
        e.preventDefault();
        $.ajax({
            url: 'api/addStore.api.php',
            data: new FormData(e.target),
            processData: false,
            contentType: false,
            type: 'POST',
            success: function(data) {
                let response = $.parseJSON(data);
                if(response.status === 'success') {
                    Swal.fire({
                        type: "success",
                        title: 'Success',
                        text: response.message,
                        confirmButtonClass: 'btn btn-success',
                    }).then(function (){
                        location.reload();
                    })
                }
            }   
        });
    });

    $('#subCategoryForm').submit(function(e){
        e.preventDefault();
        $.ajax({
            url: 'api/addSubCategory.api.php',
            data: new FormData(e.target),
            processData: false,
            contentType: false,
            type: 'POST',
            success: function(data) {
                let response = $.parseJSON(data);
                if(response.status === 'success') {
                    Swal.fire({
                        type: "success",
                        title: 'Success',
                        text: response.message,
                        confirmButtonClass: 'btn btn-success',
                    }).then(function (){
                        location.reload();
                    })
                }
            }   
        });
    });

    $('#couponCategoryForm').submit(function(e){
        e.preventDefault();
        $.ajax({
            url: 'api/addCouponCategory.api.php',
            data: new FormData(e.target),
            processData: false,
            contentType: false,
            type: 'POST',
            success: function(data) {
                let response = $.parseJSON(data);
                if(response.status === 'success') {
                    Swal.fire({
                        type: "success",
                        title: 'Success',
                        text: response.message,
                        confirmButtonClass: 'btn btn-success',
                    }).then(function (){
                        location.reload();
                    })
                }
            }   
        });
    });
    
    $('#uploadBannerImageForm').submit(function(e){
        e.preventDefault();
        $.ajax({
            url: 'api/updateBannerImage.api.php',
            data: new FormData(e.target),
            processData: false,
            contentType: false,
            type: 'POST',
            success: function(data) {
                let response = $.parseJSON(data);
                if(response.status === 'success') {
                    Swal.fire({
                        type: "success",
                        title: 'Success',
                        text: response.message,
                        confirmButtonClass: 'btn btn-success',
                    }).then(function (){
                        location.reload();
                    })
                }
            }   
        });
    });
    
    $('#UpdateAboutUsForm').submit(function(e){
            e.preventDefault();
            let form = new FormData(e.target);
            $.ajax({
                url: 'api/updateAboutUs.api.php',
                data: form,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function(data) {
                    let response = $.parseJSON(data);
                    if(response.status === 'success') {
                        Swal.fire({
                            type: "success",
                            title: 'Success',
                            text: response.message,
                            confirmButtonClass: 'btn btn-success',
                        }).then(function (){
                            location.reload();
                        })
                    } 
                }   
            });
        });
        
        
    $('#privacyPolicy1').submit(function(e){
        e.preventDefault();
        let form = new FormData(e.target);
        $.ajax({
            url: 'api/updatePrivacyPolicy.api.php',
            data: form,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function(data) {
                let response = $.parseJSON(data);
                if(response.status === 'success') {
                    Swal.fire({
                        type: "success",
                        title: 'Success',
                        text: response.message,
                        confirmButtonClass: 'btn btn-success',
                    }).then(function (){
                        location.reload();
                    })
                } 
            }   
        });
    });
    
    $('#privacyPolicy2').submit(function(e){
        e.preventDefault();
        let form = new FormData(e.target);
        $.ajax({
            url: 'api/updatePrivacyPolicy.api.php',
            data: form,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function(data) {
                let response = $.parseJSON(data);
                if(response.status === 'success') {
                    Swal.fire({
                        type: "success",
                        title: 'Success',
                        text: response.message,
                        confirmButtonClass: 'btn btn-success',
                    }).then(function (){
                        location.reload();
                    })
                } 
            }   
        });
    });
    
    $('#privacyPolicy3').submit(function(e){
        e.preventDefault();
        let form = new FormData(e.target);
        $.ajax({
            url: 'api/updatePrivacyPolicy.api.php',
            data: form,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function(data) {
                let response = $.parseJSON(data);
                if(response.status === 'success') {
                    Swal.fire({
                        type: "success",
                        title: 'Success',
                        text: response.message,
                        confirmButtonClass: 'btn btn-success',
                    }).then(function (){
                        location.reload();
                    })
                } 
            }   
        });
    });
    
    $('#privacyPolicy4').submit(function(e){
        e.preventDefault();
        let form = new FormData(e.target);
        $.ajax({
            url: 'api/updatePrivacyPolicy.api.php',
            data: form,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function(data) {
                let response = $.parseJSON(data);
                if(response.status === 'success') {
                    Swal.fire({
                        type: "success",
                        title: 'Success',
                        text: response.message,
                        confirmButtonClass: 'btn btn-success',
                    }).then(function (){
                        location.reload();
                    })
                } 
            }   
        });
    });
    
    
    $('#couponOrderForm').submit(function(e){
        e.preventDefault();
        $.ajax({
            url: 'api/addCouponOrder.api.php',
            data: new FormData(e.target),
            processData: false,
            contentType: false,
            type: 'POST',
            success: function(data) {
                let response = $.parseJSON(data);
                if(response.status === 'success') {
                    Swal.fire({
                        type: "success",
                        title: 'Success',
                        text: response.message,
                        confirmButtonClass: 'btn btn-success',
                    }).then(function (){
                        location.reload();
                    })
                }
            }   
        });
    });

    $('#addCouponForm').submit(function(e){
        e.preventDefault();
        $.ajax({
            url: 'api/addCoupon.api.php',
            data: new FormData(e.target),
            processData: false,
            contentType: false,
            type: 'POST',
            success: function(data) {
                let response = $.parseJSON(data);
                if(response.status === 'success') {
                    Swal.fire({
                        type: "success",
                        title: 'Success',
                        text: response.message,
                        confirmButtonClass: 'btn btn-success',
                    }).then(function (){
                        location.reload();
                    })
                } else if(response.message === 'store') {
                    Swal.fire({
                        type: "error",
                        title: 'Coupon Store is Required',
                        text: 'Please check any one store',
                        confirmButtonClass: 'btn btn-danger',
                    })
                } else if(response.message === 'category') {
                    Swal.fire({
                        type: "error",
                        title: 'Coupon Category is Required',
                        text: 'Please check any one category',
                        confirmButtonClass: 'btn btn-danger',
                    })
                }
            }   
        });
    });

    $.ajax({
        url: "api/getAllCouponCategories.api.php",
        type: "POST",
        dataType: "json",
        success: function(data) {
            $.each(data, function(i, item) {
                $("#categoryId").append("<option value='" + item.id + "'>" + item.category + "</option>");
            });
        }
    });

    $.ajax({
        url: "api/getAllCouponCategories.api.php",
        type: "POST",
        dataType: "json",
        success: function(data) {
            $.each(data, function(i, item) {
                $("#editCategoryId").append("<option value='" + item.id + "'>" + item.category + "</option>");
            });
        }
    });

    $.ajax({
        url: "api/getAllCouponCategories.api.php",
        type: "POST",
        dataType: "json",
        success: function(data) {
            $.each(data, function(i, item) {
                $("#storeCategory").append("<option value='" + item.id + "'>" + item.category + "</option>");
            });
        }
    });

    $.ajax({
        url: "api/getAllCouponCategories.api.php",
        type: "POST",
        dataType: "json",
        success: function(data) {
            $.each(data, function(i, item) {
                $("#editStoreCategory").append("<option value='" + item.id + "'>" + item.category + "</option>");
            });
        }
    });

    // let form = new FormData(e.target);
    // const urlParams = new URLSearchParams(window.location.search);
    // const id = urlParams.get('id');


    $('.parent-checkbox').change(function() {
        $(this).closest('li').find('.child-checkbox').prop('checked', this.checked);
    });

  $('.child-checkbox').change(function() {
    var allChecked = true;
    $(this).closest('ul').find('.child-checkbox').each(function() {
      if (!this.checked) {
        allChecked = false;
        return false;
      }
    });
    $(this).closest('li').find('.parent-checkbox').prop('checked', allChecked);
  });

    $(".parent-checkbox").click(function() {
        if ($(this).prop("checked")) {
            $(".parent-checkbox").not(this).prop("checked", false);
            $(".child-checkbox").prop("checked", false);
        }
    });


});

    $('#editStoreForm').submit(function(e){
        e.preventDefault();
        let form = new FormData(e.target);
        const urlParams = new URLSearchParams(window.location.search);
        const id = urlParams.get('id');
        form.append("id", id);
        $.ajax({
            url: 'api/updateStore.api.php',
            data: form,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function(data) {
                let response = $.parseJSON(data);
                if(response.status === 'success') {
                    Swal.fire({
                        type: "success",
                        title: 'Success',
                        text: response.message,
                        confirmButtonClass: 'btn btn-success',
                    }).then(function (){
                        location.reload();
                    })
                } else if(response.message === 'Invalid Image Format') {
                    Swal.fire({
                        type: "error",
                        title: 'Invalid File Format',
                        text: 'Featured Image will only accept .jpeg, .jpg, .png, .gif and .webp Format',
                        confirmButtonClass: 'btn btn-danger',
                    })
                }
            }   
        });
    });

    $('#editCouponForm').submit(function(e){
        e.preventDefault();
        let form = new FormData(e.target);
        const urlParams = new URLSearchParams(window.location.search);
        const id = urlParams.get('id');
        form.append("id", id);
        $.ajax({
            url: 'api/updateCoupon.api.php',
            data: form,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function(data) {
                let response = $.parseJSON(data);
                if(response.status === 'success') {
                    Swal.fire({
                        type: "success",
                        title: 'Success',
                        text: response.message,
                        confirmButtonClass: 'btn btn-success',
                    }).then(function (){
                        location.reload();
                    })
                } 
            }   
        });
    });


function limit_checkboxes(checkbox) {
  var checkboxes = document.getElementsByName("couponStore");
  for (var i = 0; i < checkboxes.length; i++) {
    checkboxes[i].checked = false;
    checkboxes[i].removeAttribute("required");
  }
  checkbox.checked = true;
  checkbox.setAttribute("required", true);
}





function limit_categories_checkboxes(checkbox) {
      var checkboxes = document.getElementsByName("category");
      for (var i = 0; i < checkboxes.length; i++) {
        checkboxes[i].checked = false;
      }
      checkbox.checked = true;
}

function editCouponCategory(id) {
    $.ajax({
        url: 'api/getCouponCategories.api.php',
        data: {'id':id},
        type: 'POST',
        success: function(data) {
            $('#editCategory').val(JSON.parse(data)[0].category);                
            $('#editOldCategoryImage').val(JSON.parse(data)[0].category_image);                
        }
    })
}

function editCouponOrder(id) {
    $.ajax({
        url: 'api/getCouponOrderById.api.php',
        data: {'id':id},
        type: 'POST',
        success: function(data) {
            $('#CouponOrderName').val(JSON.parse(data)[0].name);                
        }
    })
}

function editSubCategory(id) {
    $.ajax({
        url: 'api/getCouponSubCategories.api.php',
        data: {'id':id},
        type: 'POST',
        success: function(data) {
            $('#editCategoryId').val(JSON.parse(data)[0].category_id);                
            $('#editSubCategoryName').val(JSON.parse(data)[0].category_name);
            console.log(JSON.parse(data)[0].category_name);                
        }
    })
}


    function updateCouponCategory(id){
        $('#editcouponCategoryForm').submit(function(e){
            e.preventDefault();
            let form = new FormData(e.target);
            form.append("id", id);
            $.ajax({
                url: 'api/updateCategory.api.php',
                data: form,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function(data) {
                    let response = $.parseJSON(data);
                    if(response.status === 'success') {
                        Swal.fire({
                            type: "success",
                            title: 'Success',
                            text: response.message,
                            confirmButtonClass: 'btn btn-success',
                        }).then(function (){
                            location.reload();
                        })
                    } 
                }   
            });
        });
    }
    
    
    function updateCouponOrder(id){
        $('#updateCouponOrderForm').submit(function(e){
            e.preventDefault();
            let form = new FormData(e.target);
            form.append("id", id);
            $.ajax({
                url: 'api/updateCouponOrder.api.php',
                data: form,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function(data) {
                    let response = $.parseJSON(data);
                    if(response.status === 'success') {
                        Swal.fire({
                            type: "success",
                            title: 'Success',
                            text: response.message,
                            confirmButtonClass: 'btn btn-success',
                        }).then(function (){
                            location.reload();
                        })
                    } 
                }   
            });
        });
    }


    function updateSubCategory(id) {
        $('#editsubCategoryForm').submit(function(e){
            e.preventDefault();
            let form = new FormData(e.target);
            form.append("id", id);
            $.ajax({
                url: 'api/updateSubCategory.api.php',
                data: form,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function(data) {
                    let response = $.parseJSON(data);
                    if(response.status === 'success') {
                        Swal.fire({
                            type: "success",
                            title: 'Success',
                            text: response.message,
                            confirmButtonClass: 'btn btn-success',
                        }).then(function (){
                            location.reload();
                        })
                    } 
                }   
            });
        });
    }

function deleteCouponCategory(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "api/deleteCouponCategory.api.php",
                    type: "POST",
                    data: {"id": id},
                    success: (response) => {
                        response = $.parseJSON(response);
                        if (response.status === "success") {
                            Swal.fire(
                                'Deleted!',
                                'Category has been deleted.',
                                'success'
                            ).then(function () {
                                location.reload();
                            })
                        } else {
                            Swal.fire(
                                'Not Delete!',
                                'Category not delete.',
                                'danger'
                            )
                        }
                    }
                })
            }
        })
    }
    
    
    function deleteStore(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "api/deleteStore.api.php",
                    type: "POST",
                    data: {"id": id},
                    success: (response) => {
                        response = $.parseJSON(response);
                        if (response.status === "success") {
                            Swal.fire(
                                'Deleted!',
                                'Category has been deleted.',
                                'success'
                            ).then(function () {
                                location.reload();
                            })
                        } else {
                            Swal.fire(
                                'Not Delete!',
                                'Category not delete.',
                                'danger'
                            )
                        }
                    }
                })
            }
        })
    }
    
    
    function deleteCoupon(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "api/deleteCoupon.api.php",
                    type: "POST",
                    data: {"id": id},
                    success: (response) => {
                        response = $.parseJSON(response);
                        if (response.status === "success") {
                            Swal.fire(
                                'Deleted!',
                                'Category has been deleted.',
                                'success'
                            ).then(function () {
                                location.reload();
                            })
                        } else {
                            Swal.fire(
                                'Not Delete!',
                                'Category not delete.',
                                'danger'
                            )
                        }
                    }
                })
            }
        })
    }    
    
    function deleteCouponOrder(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "api/deleteCouponOrder.api.php",
                    type: "POST",
                    data: {"id": id},
                    success: (response) => {
                        response = $.parseJSON(response);
                        if (response.status === "success") {
                            Swal.fire(
                                'Deleted!',
                                'Category has been deleted.',
                                'success'
                            ).then(function () {
                                location.reload();
                            })
                        } else {
                            Swal.fire(
                                'Not Delete!',
                                'Category not delete.',
                                'danger'
                            )
                        }
                    }
                })
            }
        })
    }

    $(document).ready(function(){
        var drake = dragula([document.getElementById('basic-list-group')]);
        drake.on('dragend', function () {
            var couponOrder = [];
            $('#basic-list-group li').each(function(index) {
                var couponId = $(this).data('id');
                couponOrder.push({ id: couponId, order: index+1 });
            });
            $.ajax({
                url: 'api/updateCouponOrder.api.php',
                method: 'POST',
                data: { couponOrder: couponOrder },
                success: function (response) {
                    console.log(response);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        });
    });

