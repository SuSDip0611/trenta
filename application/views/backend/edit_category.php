<?php
	$id = base64_encode($cat_details->id);
	$category_name = $cat_details->category_name;
?>
<div class="forms">
	<div class="form-grids widget-shadow" data-example-id="basic-forms"> 
		<div class="form-title">
			<h4>Edit Category</h4>
		</div>
		<div class="form-body">
			<form action="javascript:void(0);" id="edit_category_form" name="edit_category_form" method="POST" enctype='multipart/form-data'> 
				<input type="hidden" name="cat_id" value="<?= $id ?>">
				<div class="form-group"> 
					<label for="category_name">Category Name</label> 
					<input type="text" class="form-control" id="category_name" name="category_name" placeholder="Category Name" value="<?= $category_name ?>" required> 
				</div>
				<button type="submit" class="btn common_btn_class btn-lg btn-block edit_category_btn">Submit</button>
			</form> 
		</div>
	</div>
</div>