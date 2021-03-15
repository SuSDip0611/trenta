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
	<div class="form-grids widget-shadow" id="app" data-example-id="basic-forms"> 
		<div class="form-title">
			<h4><?= $pageTitle; ?></h4>
		</div>
		<div class="form-body">
			<form action="javascript:void(0);" id="save_new_product_form" name="save_new_product_form" method="POST" enctype='multipart/form-data'> 
				<div class="row">
					<div class="col-md-4">
						<div class="form-group"> 
							<label for="praduct_name">Product Name <span class="required-star">*</span></label> 
							<input type="text" class="form-control" id="praduct_name" name="praduct_name" placeholder="Product Name" required> 
						</div> 
					</div>
					<div class="col-md-4">
						<div class="form-group"> 
							<label for="description">Description <span class="required-star">*</span></label> 
							<textarea class="form-control" id="description" name="description" placeholder="Description" required></textarea>
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
				</div>

				<div v-for="(dtl, index) in Details" class="row prd_dtl_div">
					<div class="col-md-12 ">
						<div class="row">
							<div class="col-md-11 text-center" style="margin-top: 5px;">
								<label>{{index+1}} Product Details</label>
							</div>
							<div class="col-md-1 tsk-btn">
								<div class="add_step" style="cursor: pointer;font-size: 25px;" v-if="index==0">
									<i class="fa fa-plus-circle" aria-hidden="true" v-on:click="addMoreDetails(index)" title='Add new step'></i>
								</div>
								<div class="add_step" style="cursor: pointer; font-size: 25px;" v-if="index > 0" >
									<i class="fa fa-minus-circle" aria-hidden="true" v-on:click="removeDetails(index)" title='Remove this step'></i>
								</div>
							</div>
						</div>
						<!-- <div class="col-md-1 add_new_div">
							<div class="button_box">
								<button type="button" class="btn btn-primary btn-block" name='submit' id='add_new_div_btn' ><i class="fa fa-plus"></i></button>
							</div>					
						</div> -->
						<div class="details_div">
							<div class="col-md-11 p_dtl_div">
								<div class="col-md-4">
									<div class="form-group"> 
										<label for="imagefiles">Product Image <span class="required-star">*</span></label>
										<input type="file" class="form-control file-control file-input" id="imagefiles" name="product_images[]" accept="image/*" multiple required> 
										<div class="preview_div clearfix">
											<label for="" id="screenshots"></label>
										</div>
									</div>									
								</div>
								<div class="col-md-4">
									<div class="form-group"> 
										<label for="size">Size <span class="required-star">*</span></label> 
										<input type="number" class="form-control" id="size" name="product_size" placeholder="Enter size" required> 
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group"> 
										<label for="color">Choose color <span class="required-star">*</span></label> 
										<input type="color" class="form-control" id="color" name="product_color" placeholder="Enter color" required> 
									</div>
								</div>
							</div>
						</div>					
					</div>					
				</div>
				<div class="col-md-12 form-group">
					<button type="submit" v-on:click="saveProductDetails" class="btn common_btn_class btn-lg btn-block save_new_product_btn">Submit</button> 
				</div>
			</form> 
		</div>
	</div>
</div>