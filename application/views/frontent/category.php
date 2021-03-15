
<section class="productsContainer dfrw mb-5 mt-5">
    <?php
        if(!empty($result) && count($result) > 0) {
           foreach ($result as $key => $singleResult) {
               # code...
           
            $id = isset($singleResult->id) && $singleResult->id != '' ? $singleResult->id : '';
            $category_name = isset($singleResult->category_name) && $singleResult->category_name != '' ? $singleResult->category_name : '';
            $category_image = isset($singleResult->category_image) && $singleResult->category_image != '' ? $singleResult->category_image : '';
            $category_image_path = base_url().'assets/backend/images/category_image/'.$id.'/'.$category_image;
           ?>
                <a class="productCatCard mr-5 mt-3 p-2 card" href="<?= base_url() ?>products?id=<?php echo base64_encode($id);?>">
                    <div class="productCatImage">
                        <img class="img_responsive" src="<?= $category_image_path ?>">
                    </div>
                    <div class="productText py-2 text-center">
                        <h7 class="productCategory"><?= $category_name; ?></h7>
                        <!-- <p class="productColor">Blue , Golden</p> -->
                    </div>
                </a>
           <?php
           }
        }
    ?>
    
</section>