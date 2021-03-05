<div class="forms">
	<div class="form-grids widget-shadow" data-example-id="basic-forms"> 
		<div class="form-title">
			<h4><?= $pageTitle; ?></h4>
		</div>
		<div class="form-body">
			<form action="javascript:void(0);" id="save_new_category_form" name="save_new_category_form" method="POST" enctype='multipart/form-data'> 
				<div class="form-group"> 
					<label for="category_name">Category Name</label> 
					<input type="text" class="form-control" id="category_name" name="category_name" placeholder="Category Name" required> 
				</div>
				<button type="submit" class="btn common_btn_class btn-lg btn-block save_new_category_btn">Submit</button>
			</form> 
		</div>
	</div>
</div>