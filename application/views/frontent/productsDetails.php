<section class="mainBody max_width mt-4 mb-4">
    <div class="productDetail d-flex flex-row flex-wrap">
        <div class="productImageSection col-sm-10 col-md-4 col-lg-4">
            <div class="productImgContainer">
                <div class="productThumb">
                    <?php 
                        if (count($product_details['all_images']) >0) {
                            // echo "<pre>";
                            // print_r($product_details);
                            // echo "</pre>";
                            // exit();
                            foreach ($product_details['all_images'] as $key => $img) 
                            {
                    ?>
                                <img class="prdct_thumb" data-product="pr<?php echo ($key+2) ?>" id="pr<?php echo ($key+2) ?>" src="<?= base_url() ?>assets/backend/images/product_images/<?php echo $product_details['id'] ?>/<?php echo $product_details['color_id'] ?>/<?php echo $img ?>" alt="" />
                    <?php
                            }
                        }
                    ?>
                    <!-- <img class="prdct_thumb" id="pr2" src="<?= base_url() ?>assets/frontent/images/pDetails/2.jpeg" alt="" />
                    <img class="prdct_thumb" id="pr3" src="<?= base_url() ?>assets/frontent/images/pDetails/3.jpeg" alt="" />
                    <img class="prdct_thumb" id="pr4" src="<?= base_url() ?>assets/frontent/images/pDetails/4.jpeg" alt="" />
                    <img class="prdct_thumb" id="pr5" src="<?= base_url() ?>assets/frontent/images/pDetails/5.jpeg" alt="" />
                    <img class="prdct_thumb" id="pr6" src="<?= base_url() ?>assets/frontent/images/pDetails/6.jpeg" alt="" /> -->
                </div>
                <div class="productImg">
                    <img class="prdct_img block__pic active" data-product="pr1" id="pr1" src="<?= base_url() ?>assets/backend/images/product_images/<?php echo $product_details['id'] ?>/<?php echo $product_details['color_id'] ?>/<?php echo $product_details['image'] ?>" alt="" />
                    <?php 
                        if (count($product_details['all_images']) >0) {
                            foreach ($product_details['all_images'] as $key => $img) 
                            {
                    ?>
                                <img class="prdct_img block__pic" data-product="pr<?php echo ($key+2) ?>" id="pr<?php echo ($key+2) ?>" src="<?= base_url() ?>assets/backend/images/product_images/<?php echo $product_details['id'] ?>/<?php echo $product_details['color_id'] ?>/<?php echo $img ?>" alt="" />
                    <?php
                            }
                        }
                    ?>
                    <!-- <img class="prdct_img block__pic active" data-product="pr1" src="<?= base_url() ?>assets/frontent/images/pDetails/1.jpeg" alt="" />
                    <img class="prdct_img block__pic" data-product="pr2" src="<?= base_url() ?>assets/frontent/images/pDetails/2.jpeg" alt="" />
                    <img class="prdct_img block__pic" data-product="pr3" src="<?= base_url() ?>assets/frontent/images/pDetails/3.jpeg" alt="" />
                    <img class="prdct_img block__pic" data-product="pr4" src="<?= base_url() ?>assets/frontent/images/pDetails/4.jpeg" alt="" />
                    <img class="prdct_img block__pic" data-product="pr5" src="<?= base_url() ?>assets/frontent/images/pDetails/5.jpeg" alt="" />
                    <img class="prdct_img block__pic" data-product="pr6" src="<?= base_url() ?>assets/frontent/images/pDetails/6.jpeg" alt="" /> -->
                </div>
            </div>
        </div>
        <div class="productDetailSection col-sm-10 col-md-6 col-lg-8">
            <div class="productDname">
                <h6><?php echo $product_details['name']?></h6>
            </div>
            <div class="productPrice mt-3">
                <h6>₹ <?php echo $product_details['price']?></h6>
            </div>
            <div class="productRating d-flex flex-row align-items-center mt-3">
                <span class="startRating">
                    <p class="checked"><?php echo $product_details['rating']?> <span class="fa fa-star checked"></span></p>
                </span>

            </div>
            <div class="productOffer mt-4">
                <h6 class="mr-4">Available offers</h6>
                <p><strong>Bank Offer</strong>10% off on ICICI Bank Cards, up to ₹300. On orders of ₹150 and above</p>
                <p><strong>Bank Offer</strong>20% off on HDFC Bank Cards, up to ₹100. On orders of ₹750 and above</p>
                <p><strong>Bank Offer</strong>50% off on KOTAK Bank Cards, up to ₹30. On orders of ₹50 and above</p>
                <p><strong>Bank Offer</strong>15% off on SBI Bank Cards, up to ₹300. On orders of ₹15 and above</p>
                <p><strong>Bank Offer</strong>10% off on DIGIBANK Bank Cards, up to ₹300. On orders of ₹175 and above</p>
            </div>
            <div class="productOffer mt-4">
                <h6 class="mr-4">Product Spacification</h6>
                <strong><?php echo $product_details['description']?></strong>
            </div>
            <div class="productColor d-flex flex-row flex-wrap align-items-center mt-4">
                <h6 class="mr-4">Color</h6>
                <ul class="list-group d-flex flex-row">
                    <?php foreach ($product_details['colors'] as $color_id => $av_color) { ?>
                        <a 
                            href="javascript:void(0);" 
                            class="product_color_btn" 
                            data-color_id="<?php echo $color_id; ?>" 
                            data-product_id="<?php echo base64_encode($product_details['id']); ?>"
                        >
                            <li class="list-group-item" style="background-color: <?php echo $av_color; ?> ">
                                <!-- <a href="#" class="text-center">
                                    <input type="color" value="<?= $av_color; ?>" name="" disabled>
                                    <p>Black</p>
                                </a> -->
                            </li> 
                        </a>
                    <?php } ?>
                    <!-- <li class="list-group-item">
                        <a href="#" class="text-center">
                            <img src="<?= base_url() ?>assets/frontent/images/pDetails/black.jpg" alt="" />
                            <p>Black</p>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a href="#" class="text-center">
                            <img src="<?= base_url() ?>assets/frontent/images/pDetails/pink.jpg" alt="" />
                            <p>Pink</p>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a href="#" class="text-center">
                            <img src="<?= base_url() ?>assets/frontent/images/pDetails/green.jpg" alt="" />
                            <p>Green</p>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a href="#" class="text-center">
                            <img src="<?= base_url() ?>assets/frontent/images/pDetails/red.jpg" alt="" />
                            <p>Red</p>
                        </a>
                    </li> -->
                </ul>
            </div>
            <div class="productSize mt-4">
                <div id="sizeSelector" class="d-flex align-items-center">
                    <h6 class="mr-4">Available Sizes</h6>
                    <!-- <button class="btnSelect size_select"><?php echo $product_details['size']; ?></button> -->
                    <?php 
                        if (count($product_details['sizes']) >0) {
                            foreach ($product_details['sizes'] as $key => $sz) 
                            {
                    ?>
                                <button class="btnSelect"><?php echo $sz; ?></button>
                    <?php
                            }
                        }
                    ?>
                    <!-- <button class="btnSelect">3</button>
                    <button class="btnSelect">4</button>
                    <button class="btnSelect">5</button> -->
                </div>
            </div>
            <div class="mt-4">
                <button type="submit" class="btn btn-success" style="border-radius: 10px">BUY NOW</button>
            </div>
        </div>
    </div>
<div class="item mt-5 lowerSlider">
        <div class="text-center">
            <h6>You may also like this</h6>
        </div>
        <ul id="content-slider" class="content-slider mt-3">
            <li>
                <a><img src="<?= base_url() ?>assets/frontent/images/pDetails/1.jpeg" alt="" /></a>
            </li>
            <li>
                <a><img src="<?= base_url() ?>assets/frontent/images/pDetails/2.jpeg" alt="" /></a>
            </li>
            <li>
                <a><img src="<?= base_url() ?>assets/frontent/images/pDetails/3.jpeg" alt="" /></a>
            </li>
            <li>
                <a><img src="<?= base_url() ?>assets/frontent/images/pDetails/4.jpeg" alt="" /></a>
            </li>
            <li>
                <a><img src="<?= base_url() ?>assets/frontent/images/pDetails/5.jpeg" alt="" /></a>
            </li>
            <li>
                <a><img src="<?= base_url() ?>assets/frontent/images/pDetails/6.jpeg" alt="" /></a>
            </li>
            <li>
                <a><img src="<?= base_url() ?>assets/frontent/images/pDetails/1.jpeg" alt="" /></a>
            </li>
            <li>
                <a><img src="<?= base_url() ?>assets/frontent/images/pDetails/2.jpeg" alt="" /></a>
            </li>
            <li>
                <a><img src="<?= base_url() ?>assets/frontent/images/pDetails/3.jpeg" alt="" /></a>
            </li>
            <li>
                <a><img src="<?= base_url() ?>assets/frontent/images/pDetails/4.jpeg" alt="" /></a>
            </li>
            <li>
                <a><img src="<?= base_url() ?>assets/frontent/images/pDetails/5.jpeg" alt="" /></a>
            </li>
            <li>
                <a><img src="<?= base_url() ?>assets/frontent/images/pDetails/6.jpeg" alt="" /></a>
            </li>
        </ul>
    </div>
</section>