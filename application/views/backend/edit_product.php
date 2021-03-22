<?php
    $id = $prod_details['id'];
	$product_name = $prod_details['product_name'];
	$category = $prod_details['category'];
	$description = $prod_details['description'];
	$price = $prod_details['price'];
?>
<div class="forms">
	<div class="form-grids widget-shadow" data-example-id="basic-forms"> 
		<div class="form-title">
			<h4><?= $pageTitle; ?></h4>
		</div>
		<div class="form-body">
			<form action="javascript:void(0);" id="edit_product_form" name="edit_product_form" method="POST" enctype='multipart/form-data'> 
                <input type="hidden" name="prod_id" value="<?= base64_encode($id) ?>">
				
				<div class="row">
					<div class="col-md-6">
						<div class="form-group"> 
							<label for="praduct_name">Product Name <span class="required-star">*</span></label> 
							<input type="text" class="form-control" id="praduct_name" name="praduct_name" value="<?= $product_name ?>" placeholder="Product Name" required> 
						</div> 
					</div>
					<div class="col-md-6">
						<div class="form-group"> 
							<label for="description">Description <span class="required-star">*</span></label> 
							<textarea class="form-control" id="description" name="description" placeholder="Description" required><?php echo $description ?></textarea>
						</div> 
					</div>
				</div>


				<div class="row">
					<div class="col-md-6">
						<div class="form-group"> 
							<label for="price">Price <span class="required-star">*</span></label> 
							<input type="number" class="form-control" id="price" name="price" value="<?= $price; ?>" placeholder="Product Price" required> 
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group"> 
							<label for="description">Product Category <span class="required-star">*</span></label>
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
					</div>									
				</div>

				<div class="row prd_dtl_div">
					<i class="fa fa-plus-circle" aria-hidden="true" id='add_new_div_btn' title='Add new details'></i>
					<?php
						if (!empty($prod_details['details'])) {
							$tab_index = '';
							foreach ($prod_details['details'] as $dt_key => $dtl) {
								$color=$dtl['color'];
								$stock=$dtl['stock'];
								$size=$dtl['size'];
								$size_id=$dtl['size_id'];
								$images=$dtl['images'];
								$image_id=$dtl['image_id'];
								$color_id=$dtl['color_id'];
								$tab_index = count($size);
							    
					?>
								<div class="my_box" id="box_loop_<?= $dt_key+1 ?>">
									<input type="hidden" name="size_id_<?= $dt_key+1 ?>" value="<?= $size_id ?>">
									<input type="hidden" name="color_id_<?= $dt_key+1 ?>" value="<?= $color_id ?>">
									<input type="hidden" name="image_id_<?= $dt_key+1 ?>" value="<?= $image_id ?>">
									<div class="col-md-12 ">
										<div class="row">
											<div class="col-md-11 text-center details_header" >
												<label> Product Details Part <?php echo ($dt_key+1); ?></label>
											</div>
											<div class="col-md-1 tsk-btn">
												<div class="add_step" style="cursor: pointer;font-size: 25px;">
													<i class="fa fa-minus-circle old_btns" 
														aria-hidden="true" 
														data-index="<?= ($dt_key+1); ?>" 
														id='remove_new_div_btn' 
														title='Remove new details'

														data-edit_mode="true" 
														data-product_id="<?= base64_encode($id); ?>"
														data-color_id="<?= $color_id; ?>"
														data-image_id="<?= $image_id; ?>"
														data-size_id="<?= $size_id; ?>"
													>
													</i>
												</div>
											</div>
										</div>
										<div class="details_div">
											<div class="col-md-11 p_dtl_div">
												<div class="row">
													<div class="col-md-6">
														<div class="form-group" > 
															<label for="color">Choose color <span class="required-star">*</span></label> 
															<input type="color" class="form-control" id="color" value="<?= $color; ?>" name="product_color[]" placeholder="Enter color" required> 
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group" > 
															<label for="imagefiles">Product Image </label>
															<input type="file"
																id="imagefiles"
																class="form-control file-control file-input" 
																accept="image/*"
																name="product_image_<?= $dt_key+1; ?>[]"
																multiple
															> 
															<div class="clearfix screenshots_div">
																<label for="" id="screenshots_1"></label>
															</div>
														</div>
														<?php if(count($images) > 0){ ?>
										                    <div class="form-group ">
										                        <label for="myImg">Previous images </label>
										                        <div class="form-group old_img_div">
										                            <?php foreach ($images as $img_key => $img){ ?>
										                                <img id="myImg" class="upload_img_<?php echo $img_key; ?> imageThumb"
										                                    src="<?php echo base_url().'assets/backend/images/product_images/'.$id.'/'.$color_id.'/'.$img; ?>"
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
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group" > 
															<label for="size">Size <span class="required-star">*</span></label>
															<i class="fa fa-plus-circle" aria-hidden="true" id='add_new_size_btn' data-tab_index="<?= ($dt_key+1) ?>" title='Add new details' style="cursor: pointer;"></i>
															<div class="row size_div_<?= ($dt_key+1) ?>">
																<?php 
																	if (count($size)) {
																		foreach ($size as $s_key => $sz) 
																		{
																?>
																		<div id="size_box_loop_<?= $s_key+1 ?>">
																			<div class="col-md-4 ">
																				<input type="number" class="form-control ipt" value="<?= $sz; ?>"  name="product_size[]" placeholder="Enter size" required> 
																			</div>
																			<div class="col-md-1" style="cursor: pointer;"> 
																                <i 
																                	class="fa fa-minus-circle rmv_btn_size_<?= ($dt_key+1) ?>" 
																                	aria-hidden="true" 
																                	data-edit_mode="false" 
																                	data-tab_index="<?= ($dt_key+1) ?>" 
																                	data-product_id="<?= base64_encode($id); ?>"
																                	data-size_id="<?= $size_id ?>"
																                	data-size_value="<?= $sz ?>"
																                	id='remove_new_size_btn' 
																                	data-size_edit_mode="true"
																                	title='Remove new details' 
																                ></i>
																	        </div>				
																		</div>
																<?php 
																		} 
																	} 
																?>
															</div> 
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group" > 
															<label for="size">Stock <span class="required-star">*</span></label> 
															<input type="number" class="form-control " value="<?= $stock?>" name="product_stock[]" placeholder="Enter stock" required> 
														</div>
													</div>
													<input type="hidden" Id="tab_count_<?= $dt_key+1 ?>" value="<?= $tab_index; ?>"> 
												</div>
												
											</div>
										</div>
									</div>
								</div>
					<?php
							}
						}
					?>		
				</div>
				<input type="hidden" id="box_count" value="<?= count($prod_details['details']) ?>"> 
				<button type="submit" class="btn common_btn_class btn-lg btn-block edit_product_btn">Save</button> 
		</div>
	</div>
</div>