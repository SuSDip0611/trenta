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
                                                <img class="default-img" src="`+ baseurl + `assets/backend/images/product_images/` + element.id + `/`+element.color+'/'+ element.images + `" alt="Images">
                                                <img class="hover-img" src="`+ baseurl + `assets/backend/images/product_images/` + element.id + `/`+element.color+'/'+ element.images + `" alt="Images">
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

                    } else {
                        $('.prodDiv').html('');
                        $('.prodDiv').append('No product added for this category');
                    }

                }

            }
        })
    });
});


$(document).ready(function () {
    $("#content-slider").lightSlider({
        loop: true,
        keyPress: true,
        thumbItem: 9,
        pager: false,
        prevHtml: '<span><img src="../images/icons/leftW.png"></span> ',
        nextHtml: '<span><img src="../images/icons/rightW.png"></span>',
    });
  
});

// Product show
$(document).ready(function () {
    });
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
      $(document).ready(function () {
        $(".block__pic").imagezoomsl({
            zoomrange: [3, 3]
        });
    });
    