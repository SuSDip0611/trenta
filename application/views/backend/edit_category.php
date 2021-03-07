<?php
	$id = $cat_details->id;
	$base64_encode_id = base64_encode($id);
	$category_name = $cat_details->category_name;
	$category_image = $cat_details->category_image;
?>
<div class="forms">
	<div class="form-grids widget-shadow" data-example-id="basic-forms"> 
		<div class="form-title">
			<h4>Edit Category</h4>
		</div>
		<div class="form-body">
			<form action="javascript:void(0);" id="edit_category_form" name="edit_category_form" method="POST" enctype='multipart/form-data'> 
				<input type="hidden" name="cat_id" value="<?= $base64_encode_id ?>">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group"> 
							<label for="category_name">Category Name <span class="required-star">*</span></label> 
							<input type="text" class="form-control" id="category_name" name="category_name" placeholder="Category Name" value="<?= $category_name ?>" required> 
						</div>						
					</div>
					<div class="col-md-6">
						<div class="form-group row"> 
							<div class="col-md-12">
								<div class="col-md-6"> 
									<label for="category_image">Category Image </label> 
									<input type="file" class="form-control" id="imagefiles" name="category_image" required>
								</div>
								<div class="form-group col-md-6">
									<label for="myImg">Previous images </label>
									<div class="form-group old_img_div">
										<img id="myImg" class="imageThumb"
											src="<?php echo base_url().'assets/backend/images/category_image/'.$id.'/'.$category_image; ?>"
											alt="Category Image" width="50px" height="50px"
											style="margin: 2px;" 
										/>
									</div>
								</div>
							</div>
							<div class="col-md-12">

								<div class="preview_div clearfix">
									<label for="" id="screenshots"></label>
								</div>	
							</div>
						</div>
				</div>
				<button type="submit" class="btn common_btn_class btn-lg btn-block edit_category_btn">Submit</button>
			</form> 
		</div>
	</div>
</div>