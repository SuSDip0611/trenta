<?php
    $id = $prod_details->id;
    $product_name = $prod_details->product_name;
    $category = $prod_details->category;
    $description = $prod_details->description;
    $comment = $prod_details->comment;
    $rating = $prod_details->rating;
    $color = $prod_details->color;
    $size = $prod_details->size;
    $images = unserialize($prod_details->images);

	$ratting = array(
		"5" => '5',
		"4" => '4',
		"3" => '3',
		"2" => '2',
		"1" => '1',
	);
?>
<div class="forms">
	<div class="form-grids widget-shadow" data-example-id="basic-forms"> 
		<div class="form-title">
			<h4><?= $pageTitle; ?></h4>
		</div>
		<div class="form-body">
			<form action="javascript:void(0);" id="edit_product_form" name="edit_product_form" method="POST" enctype='multipart/form-data'> 
                <input type="hidden" name="prod_id" value="<?= base64_encode($id) ?>">
				<div class="form-group"> 
					<label for="praduct_name">Product Name</label> 
					<input type="text" class="form-control" id="praduct_name" name="praduct_name" value="<?= $product_name ?>" placeholder="Product Name" required> 
				</div> 
				<div class="form-group"> 
					<label for="description">Description</label> 
					<textarea class="form-control" id="description" name="description" placeholder="Description" required><?php echo $description ?></textarea>
				</div>
                <div class="form-group"> 
					<label for="description">Product Category</label>
					<select class="form-control" name="category" required>
						<option value="0">Select category...</option>
						<?php
							foreach ($categories as $key => $value) {
						?>
							<option value="<?= $value->id ?>" <?php if ($value->id == $category) { ?> selected="selected" <?php } ?> ><?php echo $value->category_name ?></option>
						<?php
							}
						?>
					</select>
				</div> 
				<div class="form-group"> 
					<label for="description">Rating</label>
					<select class="form-control" name="rating" required>
						<option value="0">Select rating...</option>
						<?php
							foreach ($ratting as $key => $value) {
						?>
							<option value="<?= $key ?>" <?php if ($rating == $key) { ?> selected="selected" <?php } ?> ><?php echo $value ?></option>
						<?php
							}
						?>
					</select>
				</div> 
				<div class="form-group"> 
					<label for="description">Comment</label> 
					<textarea class="form-control" id="comment" name="comment" placeholder="Comment" required><?php echo $comment ?></textarea>
				</div> 
				<div class="form-group"> 
					<label for="imagefiles">Product Image</label>
					<input type="file" class="form-control file-control file-input" id="imagefiles" name="product_images[]" accept="image/*" multiple> 
					<div class="preview_div clearfix">
		                <label for="" id="screenshots"></label>
		            </div>
				</div>
                <?php if(count($images) > 0){ ?>
                    <div class="form-group ">
                        <label for="myImg">Previous images </label>
                        <div class="form-group old_img_div">
                            <?php foreach ($images as $img_key => $img){ ?>
                                <img id="myImg" class="upload_img_<?php echo $img_key; ?> imageThumb"
                                    src="<?php echo base_url().'assets/backend/images/product_images/'.$id.'/'.$img; ?>"
                                    alt="Selected Image" width="50px" height="50px"
                                    style="margin: 2px;" 
                                />
                                <lable class="btn img_deselect_product" 
                                    data-img_name="<?php echo $img; ?>"
                                    data-uploadid="<?php echo $img_key; ?>"
                                    data-prod_id="<?php echo base64_encode($id); ?>"
                                >
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                </lable>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
				<div class="form-group"> 
					<label for="size">Size</label> 
					<input type="number" class="form-control" id="size" name="size" value="<?= $size ?>" placeholder="Enter size" required> 
				</div>
				<div class="form-group"> 
					<label for="color">Choose color</label> 
					<input type="color" class="form-control" id="color" name="color" value="<?= $color ?>" placeholder="Enter color" required> 
				</div>
				<button type="submit" class="btn common_btn_class btn-lg btn-block edit_product_btn">Save</button> 
		</div>
	</div>
</div>