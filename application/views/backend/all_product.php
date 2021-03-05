
<!-- Main content -->
<div class="content-wrapper">
  <section class="content-header">
        <h1>
          <i class="fa fa-list"></i> <?= $pageTitle; ?>
          <a class="btn common_btn_class pull-right" href="<?php echo base_url('/admin/add_new_product'); ?>">
            <i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Add New Product
          </a>
        </h1>
      </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <!-- /.box-header -->
          <div class="box-body">
            <table class="table datatable">
              <thead>
                <tr>
                  <th class="text-center">#SL No.</th>
                  <th class="text-center">Product Name</th>
                  <th class="text-center">Description</th>
                  <th class="text-center">Rating</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $count = 0;
                  foreach ($all_products as $row => $product){
                  $count++;
                  $id = $product->id;
                  ?>
                  <tr>
                    <td class="text-center"><?php echo $count;?></td>
                    <td class="text-center"><?php echo $product->praduct_name;?></td>  
                    <td class="text-center"><?php echo $product->description;?></td>  
                    <td class="text-center"><?php echo $product->rating;?></td>
                    <td class="text-center">
                      <a href="<?= base_url('edit_product_page') ?>?id=<?php echo base64_encode($id); ?>" 
                        class="btn common_btn_class staff-edit" data-vid="<?php echo base64_encode($id);?>"
                      >
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                      </a>
                      <a href="javascript:void(0);" class="btn common_btn_class product-delete" data-product_id="<?php echo base64_encode($id);?>">
                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                      </a>
                    </td>
                  </tr>
                  <?php
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>