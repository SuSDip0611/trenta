$(document).ready(function () {

    $(document).on("click", ".getDetailsByCatId", function (e) {

        e.preventDefault();
        var category_id = $(this).data("category_id");

        $('.category-button li a.active').removeClass('active');
        $(this).addClass('active');

        jQuery.ajax({
            type: "POST",
            dataType: "json",
            url: baseurl + "/get_category_products",
            data: {
                category_id: category_id,
            },

            success: function (data) {

                if (data.success = true) {

                    if (data.result.length > 0) {

                        $('.prodDiv').html('');

                        var html = '';
                        $.each(data.result, function (index, element) {

                            html = `
                                <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a href="#" class="">
                                                <img class="default-img" src="`+ baseurl + `assets/backend/images/product_images/` + element.id + `/` + element.color + '/' + element.images + `" alt="Images">
                                                <img class="hover-img" src="`+ baseurl + `assets/backend/images/product_images/` + element.id + `/` + element.color + '/' + element.images + `" alt="Images">
                                            </a>
                                            <div class="button-head">
                                                <div class="product-action">
                                                    <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                                    <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                                    <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
                                                </div>
                                                <div class="product-action-2">
                                                    <a title="Add to cart" href="#">Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <h3><a href="#">`+ element.product_name + `</a></h3>
                                            <div class="product-price">
                                                <span>$29.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `;

                            $('.prodDiv').append(html);

                        });

                        $('#see_more').html('');
                        var see_more_html = '<a href="'+baseurl+'/products?id='+ btoa(category_id) +'">See more</a>';
                        $('#see_more').append(see_more_html);


                    } else {
                        $('.prodDiv').html('');
                        $('.prodDiv').append('No product added for this category');
                    }

                }

            }
        })
    });
    
    $("#content-slider").lightSlider({
        loop: true,
        keyPress: true,
        thumbItem: 3,
        item: 3,
        pager: true,
        prevHtml: `<div style="height:30px; width: 30px"><img style="width:100%" src="` + baseurl + `assets/frontent/images/icons/leftW.png"></div>`,
        nextHtml: `<div style="height:30px; width: 30px"><img style="width:100%" src="` + baseurl + `assets/frontent/images/icons/rightW.png"></div>`,
    });

    // Product show
    $(".prdct_thumb")
        .on("mouseenter", function (event) {
            $(".prdct_img").removeClass("active");
            productTarget = event.target.id;

            console.log(productTarget);
            $('[data-product=' + productTarget + ']').addClass('active');
        })
        .on("mouseleave", function () {
        }, false);
    

    //   Hover Zoom
    $(".block__pic").imagezoomsl({
        zoomrange: [3, 3]
    });
    
    //Change Img on color click
    $(document).on("click", ".product_color_btn", function (e) {
        e.preventDefault();

        var color_id = $(this).data('color_id');
        var product_id = $(this).data('product_id');

        jQuery.ajax({
            type: "POST",
            dataType: "json",
            url: baseurl + "/get_product_imgs_by_color",
            data: {
                color_id: color_id,
                product_id: product_id
            }
        }).done(function (data) {

            if (data.status == true) {

                $('.productImgContainer').html('');
                $('#sizeSelector').html('');

                var html = `<div class="productThumb">`;

                if (data.images.length > 0) {

                    $.each(data.images, function (index, image) {
                        html += `
                            <img 
                                class="prdct_thumb" 
                                id="pr`+ (index + 2) + `" 
                                data-product="pr`+ (index + 2) + `"
                                src="`+ baseurl + `assets/backend/images/product_images/` + atob(product_id) + `/` + color_id + `/` + image + ` " 
                            />
                        `;
                    });

                    html += '</div>';

                    html += '<div class="productImg">';

                    html += `
                        <img 
                            class="prdct_img block__pic active" 
                            id="pr1" 
                            data-product="pr1"
                            src="`+ baseurl + `assets/backend/images/product_images/` + atob(product_id) + `/` + color_id + `/` + data.images[0] + ` " 
                        />
                    `;

                    $.each(data.images, function (index, image) {
                        html += `
                            <img 
                                class="prdct_img block__pic"
                                id="pr`+ (index + 2) + `" 
                                data-product="pr`+ (index + 2) + `"
                                src="`+ baseurl + `assets/backend/images/product_images/` + atob(product_id) + `/` + color_id + `/` + image + ` " 
                            />
                        `;
                    });

                    html += '</div>';


                    $('.productImgContainer').append(html);

                }

                if (data.sizes.length > 0) {

                    var size_html = '<h6 class="mr-4">Available Sizes</h6>';

                    $.each(data.sizes, function (indx, size) {
                        size_html += `<button class="btnSelect">` + size + `</button>`;
                    });

                    $('#sizeSelector').append(size_html);
                }


            } else {
                swal({
                    title: "Product Details",
                    text: 'Somthing went wrong, try again later',
                    icon: "error",
                });
            }
        });

    });

    $("#owl-example").owlCarousel();
    items: 3;
});