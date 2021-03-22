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
				<div class="row">
					<div class="col-md-6">
						<div class="form-group"> 
							<label for="praduct_name">Product Name <span class="required-star">*</span></label> 
							<input type="text" class="form-control" id="praduct_name" name="praduct_name" placeholder="Product Name" required> 
						</div> 
					</div>
					<div class="col-md-6">
						<div class="form-group"> 
							<label for="description">Description <span class="required-star">*</span></label> 
							<textarea class="form-control" id="description" name="description" placeholder="Description" required></textarea>
						</div> 
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group"> 
							<label for="price">Price <span class="required-star">*</span></label> 
							<input type="number" class="form-control" id="price" name="price" placeholder="Product Price" required> 
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group"> 
							<label for="description">Product Category <span class="required-star">*</span></label>
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
					</div>
					<div class="col-md-4">	
					<div class="form-group" style="display: flex; justify-content: space-around;"> 
						<label for="description">Is Product Returnable <span class="required-star">*</span></label>
						<input type="radio" name="returnable" value="0" id="no"><label for="no">No</label>
						<input type="radio" name="returnable" value="1" id="yes"><label for="yes">Yes</label>
					</div>									
					</div>									
				</div>
				<div class="row prd_dtl_div">
					<div class="col-md-12 ">
						<div class="row">
							<div class="col-md-11 text-center details_header">
								<label> Product Details Part 1</label>
							</div>
							<div class="col-md-1 tsk-btn">
								<div style="cursor: pointer;font-size: 25px;">
									<i class="fa fa-plus-circle" aria-hidden="true" id='add_new_div_btn' title='Add new details'></i>
								</div>
							</div>
						</div>
						<div class="details_div">
							<div class="col-md-11 p_dtl_div">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group" > 
											<label for="color">Choose color <span class="required-star">*</span></label> 
											<input type="color" class="form-control" id="color" name="product_color[]" placeholder="Enter color" required> 
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group" > 
											<label for="imagefiles">Product Image <span class="required-star">*</span></label>
											<input type="file"
												id="imagefiles"
												class="form-control file-control file-input" 
												accept="image/*"
												name="product_image_1[]"
												multiple 
												required
											> 
											<div class="clearfix screenshots_div">
												<label for="" id="screenshots_1"></label>
											</div>
										</div>									
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group" > 
											<label for="size">Size <span class="required-star">*</span></label> 
											<div class="row size_div_1">
												<div class="col-md-4 ">
													<input type="number" class="form-control ipt" name="product_size_1[]" placeholder="Enter size" required> 
												</div>
												<div class="col-md-1" style="cursor: pointer;">
													<i class="fa fa-plus-circle" aria-hidden="true" id='add_new_size_btn' data-tab_index = "1" title='Add new details'></i>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group" > 
											<label for="size">Stock <span class="required-star">*</span></label> 
											<input type="number" class="form-control" name="product_stock[]" placeholder="Enter stock" required> 
										</div>
									</div>
									<input type="hidden" id="tab_count_1" value="1"> 
								</div>
								
							</div>
						</div>				
					</div>					
				</div>
				<div class="col-md-12 form-group">
					<button type="submit" class="btn common_btn_class btn-lg btn-block save_new_product_btn">Submit</button> 
				</div>
				<input type="hidden" Id="box_count" value="1">
			</form> 
		</div>
	</div>
</div>