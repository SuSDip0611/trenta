<?php
// echo "<pre>";
// print_r($result);
// echo "</pre>";
// exit();
?>
<!-- Main content -->
<div class="content-wrapper">
  <section class="content-header content-header-alignment">
    <h1>
      <i class="fa fa-list"></i> <?= $pageTitle; ?>
      <a class="btn common_btn_class pull-right" href="<?php echo base_url('/admin/add_new_category'); ?>">
        <i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Add New category
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
                  <th class="text-center">Tickets Comment</th>
                  <th class="text-center">Tickets Status</th>
                  <th class="text-center">Create At</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
               	<?php
               		$count = 0;
               		if(!empty($result) && count($result) > 0){
               			foreach ($result as $key => $singleResult) {
               			
               				$gloabal_status = '';
               				$count++;
               				
               				$id = isset($singleResult->id) && $singleResult->id !='' ? $singleResult->id : '';
               				$comment = isset($singleResult->comment) && $singleResult->comment !='' ? $singleResult->comment : '';
               				$created_at = isset($singleResult->created_at) && $singleResult->created_at !='' ? $singleResult->created_at : '';
               				$newDate = date("d-m-Y", strtotime($created_at));
               			
               				$status = isset($singleResult->status) && $singleResult->status !='' ? $singleResult->status : '';

               				if($status == 0){
               					$gloabal_status = "Not Active";
               				}else{
               					$gloabal_status = "Active";
               				}


               				?>
			                  <tr>
			                    <td class="text-center"><?= $count;?></td>
			                    <td class="text-center"><?= $comment; ?></td>
			                    <td class="text-center"><?= $gloabal_status; ?></td>
			                    <td class="text-center"><?= $newDate; ?></td>
			                    <td class="text-center">
			                      <a href="javascript:void(0);" 
			                        class="btn common_btn_class staff-edit" id="checkActive" data-tid="<?php echo base64_encode($id);?>">
			                        <i class="fa fa-thumbs-o-up" aria-hidden="true"  title="Approved Ticket"></i>
			                      </a>
			                      <a href="" class="btn btn-danger" id="checkrejected" data-tid="<?php echo base64_encode($id);?>">
			                        <i class="fa fa-times" aria-hidden="true"  title="Rejected Ticket"></i>
			                      </a>
			                    </td>
			                  </tr>
               				<?php
               			}
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