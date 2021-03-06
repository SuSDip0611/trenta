<?php
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
			<form action="javascript:void(0);" id="save_new_product_form" name="save_new_product_form" method="POST" enctype='multipart/form-data'> 
				<div class="form-group"> 
					<label for="praduct_name">Product Name</label> 
					<input type="text" class="form-control" id="praduct_name" name="praduct_name" placeholder="Product Name" required> 
				</div> 
				<div class="form-group"> 
					<label for="description">Description</label> 
					<textarea class="form-control" id="description" name="description" placeholder="Description" required></textarea>
				</div> 
				<div class="form-group"> 
					<label for="description">Product Category</label>
					<select class="form-control" name="category" required>
						<option value="0">Select category...</option>
						<?php
							foreach ($categories as $key => $value) {
						?>
							<option value="<?= $value->id ?>"><?php echo $value->category_name ?></option>
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
							<option value="<?= $key ?>"><?php echo $value ?></option>
						<?php
							}
						?>
					</select>
				</div> 
				<div class="form-group"> 
					<label for="description">Comment</label> 
					<textarea class="form-control" id="comment" name="comment" placeholder="Comment" required></textarea>
				</div> 
				<div class="form-group"> 
					<label for="imagefiles">Product Image</label>
					<input type="file" class="form-control file-control file-input" id="imagefiles" name="product_images[]" accept="image/*" multiple required> 
					<div class="preview_div clearfix">
		                <label for="" id="screenshots"></label>
		            </div>
				</div>
				<div class="form-group"> 
					<label for="size">Size</label> 
					<input type="number" class="form-control" id="size" name="size" placeholder="Enter size" required> 
				</div>
				<div class="form-group"> 
					<label for="color">Choose color</label> 
					<input type="color" class="form-control" id="color" name="color" placeholder="Enter color" required> 
				</div>
				<button type="submit" class="btn common_btn_class btn-lg btn-block save_new_product_btn">Submit</button> 
			</form> 
		</div>
	</div>
</div>