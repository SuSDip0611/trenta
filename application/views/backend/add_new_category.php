<div class="forms">
	<div class="form-grids widget-shadow" data-example-id="basic-forms"> 
		<div class="form-title">
			<h4><?= $pageTitle; ?></h4>
		</div>
		<div class="form-body">
			<form action="javascript:void(0);" id="save_new_category_form" name="save_new_category_form" method="POST" enctype='multipart/form-data'> 
				<div class="row">
					<div class="col-md-6">
						<div class="form-group"> 
							<label for="category_name">Category Name <span class="required-star">*</span></label> 
							<input type="text" class="form-control" id="category_name" name="category_name" placeholder="Category Name" required> 
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group row"> 
							<div class="col-md-6">
								<label for="category_image">Category Image <span class="required-star">*</span></label> 
								<input type="file" class="form-control" id="imagefiles" name="category_image" required>
							</div>
							<div class="col-md-6">
								<div class="preview_div clearfix">
									<label for="" id="screenshots"></label>
								</div>
							</div>
						</div>
					</div>
				</div>
				<button type="submit" class="btn common_btn_class btn-lg btn-block save_new_category_btn">Submit</button>
			</form> 
		</div>
	</div>
</div>