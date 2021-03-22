<section class="productsContainer dfrw mt-5">

    <?php
    if(!empty($result) && count($result)>0){
        foreach ($result as $key => $singleProduct) {
            // echo "<pre>";
            // print_r($result);
            // echo "</pre>";
            // exit();
            # code...
            $id = isset($singleProduct->id) && $singleProduct->id != '' ? $singleProduct->id : '';
            $product_name = isset($singleProduct->product_name) && $singleProduct->product_name != '' ? $singleProduct->product_name : '';
            $category = isset($singleProduct->category) && $singleProduct->category != '' ? $singleProduct->category : '';
            $comment = isset($singleProduct->comment) && $singleProduct->comment != '' ? $singleProduct->comment : '';
            $images = isset($singleProduct->images) && $singleProduct->images != '' ? $singleProduct->images : '';
            // $unseImage = unserialize($images);
            $color = isset($singleProduct->color) && $singleProduct->color != '' ? $singleProduct->color : '';
            $price = isset($singleProduct->price) && $singleProduct->price != '' ? $singleProduct->price : '';

            $imagesPath = base_url().'assets/backend/images/product_images/'.$id.'/'.$color.'/'.$images;
            

            ?>
                <a href="<?= base_url()?>productsDetails?id=<?php echo base64_encode($id) ?> " class="productCard p-2 wfc card">
                    <div class="productImage">
                        <img class="" src="<?= $imagesPath ?>">
                    </div>
                    <div class="productText text-center">
                        <h7 class="productName"><?= $product_name; ?></h7>
                        <p class="productColor"><?= $comment; ?></p>
                        <div class="productPricing">
                            <p class="productPrice">₹ <?= $price; ?></p>
                            <p class="productMrp ml-2">₹ <?= $price; ?></p>
                            <!-- <p class="productDiscount green ml-2">64% off</p> -->
                        </div>
                    </div>
                </a>
            <?php
        }
    }else{
        ?>
            <h1>Products Not available</h1>
        <?php
    }
    ?>
    
</section>