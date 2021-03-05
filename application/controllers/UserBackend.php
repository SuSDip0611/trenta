<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require('BackendMain.php');

class UserBackend extends BackendMain {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('UserBackend_model');
        $this->isLoggedIn(); 
    }

	public function index() {

		echo "<pre>";
		print_r($this->isLoggedIn());
		echo "</pre>";
		exit();
        $this->loadViews('backend/dashboard');

    }


    public function add_new_product($value='')
    {
    	if($this->isAdmin() == FALSE) {
    		$this->index();
    	}else{
        	$this->loadViews('backend/add_new_product');
    	}
    }

    public function save_new_product()
    {
    	$flag = false;
        $stat = '';
        $msg = '';
        $res = array();

        $product_imgs = array();

        $size = $this->input->post('size');
        $color = $this->input->post('color');
        $rating = $this->input->post('rating');
        $comment = $this->input->post('comment');
        $description = $this->input->post('description');
        $praduct_name = $this->input->post('praduct_name');

        if ($size != 0 && $color != '' && $rating != '' && $comment != '' && $description != '' && $praduct_name != '') {
        	$flag = true;
        }else{$flag = false;}

        if ($flag) {

        	$product_data = array(
        		'size' => $size,
        		'color' => $color,
        		'is_deleted' => 0,
        		'rating' => $rating,
        		'comment' => $comment,
        		'description' => $description,
        		'praduct_name' => $praduct_name,
        		'created_at' => date('d-m-Y H:i:s')
        	);

        	$last_id = $this->UserBackend_model->save_new_product($product_data);

        	if ($last_id) {
        		
	        	$img_status = $this->upload_multiple_img($last_id);

	        	if ($img_status) {

	        		$prdt_images = array(
	        			'images' => serialize($img_status)
	        		);

	        		$status = $this->UserBackend_model->update_new_product($last_id, $prdt_images);

	        		if ($status) {
	        			$stat = true;
                        $msg = 'New Product Added';
                        $res['status'] = $stat;
                        $res['msg'] = $msg;
	        		}else{
	        			$stat = error;
		                $msg = 'Something went wrong, try again later';
		                $res['status'] = $stat;
		                $res['msg'] = $msg;
	        		}
	        	}else{
	        		$stat = false;
		            $msg = 'Please select image files to upload';
		            $res['status'] = $stat;
		            $res['msg'] = $msg;
	        	}
        	}else{
        		$stat = error;
                $msg = 'Something went wrong, try again later';
                $res['status'] = $stat;
                $res['msg'] = $msg;
        	}

        }else{
        	$stat= 'error';
        	$msg = 'All fields are requried';

        	$res['status'] = $star;
        	$res['msg'] = $msg;        	
        }

        echo json_encode($res);
        exit;
    }

    public function upload_multiple_img($last_id)
    {
    	if(!empty($_FILES['product_images']['name']) && count(array_filter($_FILES['product_images']['name'])) > 0){ 
            
            $pd_imgs = array();
            $filesCount = count($_FILES['product_images']['name']); 

            for($i = 0; $i < $filesCount; $i++){ 
                $_FILES['prd_img']['name']     = $_FILES['product_images']['name'][$i]; 
                $_FILES['prd_img']['type']     = $_FILES['product_images']['type'][$i]; 
                $_FILES['prd_img']['tmp_name'] = $_FILES['product_images']['tmp_name'][$i]; 
                $_FILES['prd_img']['error']     = $_FILES['product_images']['error'][$i]; 
                $_FILES['prd_img']['size']     = $_FILES['product_images']['size'][$i]; 
                
                
                // File upload configuration 
                $uploadPath = './assets/backend/images/product_images/'.$last_id; 

                //Create new folder if it is not exist
                if (!is_dir($uploadPath)) {
				    mkdir($uploadPath, 0777, TRUE);
				}

                $config['upload_path'] = $uploadPath; 
                $config['allowed_types'] = 'jpg|jpeg|png|gif'; 
                //$config['max_size']    = '100'; 
                //$config['max_width'] = '1024'; 
                //$config['max_height'] = '768'; 
                 
                // Load and initialize upload library 
                $this->load->library('upload', $config); 
                $this->upload->initialize($config); 
                 
                // Upload file to server 
                if($this->upload->do_upload('prd_img')){ 
                    // Uploaded file data 
                    $fileData = $this->upload->data();
                    $uploadData[$i]['file_name'] = $fileData['file_name']; 
                    $uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s"); 
                    // $uploadData['file_name'] = $fileData['file_name']; 
                    $pd_imgs[] = $fileData['file_name'];
                }else{ 
                    $errorUploadType .= $_FILES['product_images']['name'].' | ';   
                	return false; 
                } 
            } 
        }else{ 
            return false;
        }

        return $pd_imgs;
    }

    public function get_product_list($value='')
    {
    	if($this->isAdmin() == FALSE) {
    		$this->index();
    	}else{
	    	$data = $this->UserBackend_model->get_product_list();
	                
	        $all_products = array(
	            'all_products' => $data
	        );

	        $this->loadViews('backend/all_product', $all_products);
	    }
    }

    public function add_new_category($value='')
    {
    	if($this->isAdmin() == FALSE) {
    		$this->index();
    	}else{
	        $this->loadViews('backend/add_new_category');
	    }
    }

    public function save_new_category()
    {
    	$flag = false;
        $stat = '';
        $msg = '';
        $res = array();

        $category_name = $this->input->post('category_name');

        if ($category_name != '') {
        	$flag = true;
        }else{$flag = false;}

        if ($flag) {

        	$category_data = array(
        		'category_name' => $category_name,
        	);

        	$last_id = $this->UserBackend_model->save_new_category($category_data);

        	if ($last_id) {
	        	$stat = true;
                $msg = 'New Category Added';

                $res['status'] = $stat;
                $res['msg'] = $msg;
        	}else{
        		$stat = error;
                $msg = 'Something went wrong, try again later';

                $res['status'] = $stat;
                $res['msg'] = $msg;
        	}

        }else{
        	$stat= 'error';
        	$msg = 'All fields are requried';

        	$res['status'] = $star;
        	$res['msg'] = $msg;        	
        }

        echo json_encode($res);
        exit;
    }

    public function get_category_list($value='')
    {
    	if($this->isAdmin() == FALSE) {
    		$this->index();
    	}else{
	    	$data = $this->UserBackend_model->get_category_list();
	                
	        $all_categories = array(
	            'all_categories' => $data
	        );

	        /*echo "<pre>";
	    	print_r($all_categories);
	    	echo "</pre>";
	    	exit();*/

	        $this->loadViews('backend/all_categories', $all_categories);
	    }
    }
}