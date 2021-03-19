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

		$this->global['pageTitle'] = 'Dashboard';
        $this->loadViews('backend/dashboard', $this->global, NULL , NULL);

    }

    public function add_new_product()
    {
    	if($this->isAdmin() == FALSE) {
    		$this->index();
    	}else{

            $categories = $this->UserBackend_model->get_category_list();
    		$this->global['pageTitle'] = 'Add Product';
    		$this->global['categories'] = $categories;
        	$this->loadViews('backend/add_new_product', $this->global, NULL , NULL);
    	}
    }

    public function save_new_product()
    {
    	$flag = false;
        $stat = '';
        $msg = '';
        $res = array();
        
        // $status = '';
        $price = $this->input->post('price');
        $category = $this->input->post('category');
        $description = $this->input->post('description');
        $praduct_name = $this->input->post('praduct_name');


        if ($price != '' && $description != '' && $praduct_name != '' && $category != 0) {
        	$flag = true;
        }else{$flag = false;}

        if ($flag) {

        	$product_data = array(
        		'is_deleted' => 0,
        		'price' => $price,
        		'category' => $category,
        		'description' => $description,
        		'product_name' => $praduct_name,
        		'created_at' => date('d-m-Y H:i:s'),
        	);

        	$last_id = $this->UserBackend_model->save_new_product($product_data);

        	if ($last_id) {

                $status = '';
                $color_arr = $this->input->post('product_color');
                $size_arr = $this->input->post('product_size');

                foreach ($color_arr as $cl_key => $color) {
                    
                    $last_color_id = $this->UserBackend_model->save_product_color($last_id, $color);

                    if ($last_color_id) {
                        
                        $last_size_id = $this->UserBackend_model->save_product_size($last_id, $last_color_id, $size_arr[$cl_key]);
                        
                        $img_status = $this->upload_multiple_img(($cl_key+1), $last_color_id, $last_id);
        
                        if ($img_status) {
    
                            $s_tat = $this->UserBackend_model->save_product_images($last_id, $last_color_id, serialize($img_status));
        
                        }else{
                            $stat = false;
                            $msg = 'Please select image files to upload on details part '.($cl_key+1);
                            $res['status'] = $stat;
                            $res['msg'] = $msg;
                            exit;
                        }

                    }

                    $status = true;
                }
                
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

    public function edit_product()
    {
        $prod_id = $this->input->get('id');
        
        $prod_id_base64decode = base64_decode($prod_id);

        $categories = $this->UserBackend_model->get_category_list();

        $data = $this->UserBackend_model->get_product_details($prod_id_base64decode);

        $colors = $this->UserBackend_model->get_colors($prod_id_base64decode);
        
        $f_array = array();

        $f_array['id'] = $data->id;
        $f_array['product_name'] = $data->product_name;
        $f_array['category'] = $data->category;
        $f_array['description'] = $data->description;
        $f_array['price'] = $data->price;

        if (count($colors) > 0) {
            foreach ($colors as $c_key => $color) {
                
                $main_arr = array();

                $images = $this->UserBackend_model->get_color_images($color->id, $prod_id_base64decode);
                $sizes = $this->UserBackend_model->get_product_sizes($color->id, $prod_id_base64decode);

                // echo "<pre>";
                // print_r($sizes->id);
                // echo "</pre>";
                
                $main_arr['image_id'] = $images->id;
                $main_arr['images'] = unserialize($images->images);
                $main_arr['size_id'] = $sizes->id;
                $main_arr['size'] = $sizes->size;
                $main_arr['color_id'] = $color->id;
                $main_arr['color'] = $color->colors;
                
                
                
                $f_array['details'][] = $main_arr;
            }
        }else{
            $f_array['details'] = array();
        }
        
        $this->global['pageTitle'] = 'Edit Product';
        $this->global['categories'] = $categories;
        $this->global['prod_details'] = $f_array;

        $this->loadViews('backend/edit_product', $this->global, NULL , NULL);
    }

    public function remove_product_details()
    {
        /*$res['status'] = true;
        echo json_encode($res);
        exit;*/

        $size_id = $this->input->post('size_id');
        $color_id = $this->input->post('color_id');
        $image_id = $this->input->post('image_id');
        $product_id = base64_decode($this->input->post('product_id'));

        $data = $this->UserBackend_model->delete_product_color($product_id, $color_id);

        if ($data) {
            $s_status = $this->UserBackend_model->delete_product_sizes($size_id, $product_id, $color_id);
            $c_status = $this->UserBackend_model->delete_product_color_images($image_id, $product_id, $color_id);
        }

        if ($s_status && $c_status) {
            $res['status'] = true;            
        }else{
            $res['status'] = false;                        
        }


        echo json_encode($res);
        exit;
    }

    public function update_product()
    {
        $flag = false;
        $stat = '';
        $msg = '';
        $res = array();
        
        $price = $this->input->post('price');
        $category = $this->input->post('category');
        $description = $this->input->post('description');
        $id = base64_decode($this->input->post('prod_id'));
        $praduct_name = $this->input->post('praduct_name');

        
        $prod_details = $this->UserBackend_model->get_product_details($id);

        if ($price != '' && $description != '' && $praduct_name != '' && $category != 0) {
            $flag = true;
        }else{$flag = false;}

        if ($flag) {

            $product_data = array(
                'price' => $price,
                'category' => $category,
                'description' => $description,
                'product_name' => $praduct_name,
            );


        	$status = $this->UserBackend_model->update_product($id, $product_data);

        	if ($status) {

                $color_arr = $this->input->post('product_color');
                $size_arr = $this->input->post('product_size');

                /*echo "<pre>";
                print_r($color_arr);
                echo "</pre>";*/
                

                if (!empty($color_arr)) {

                    foreach ($color_arr as $cl_key => $color) {


                        $size_id = $this->input->post('size_id_'.($cl_key+1));
                        $image_id = $this->input->post('image_id_'.($cl_key+1));
                        $color_id = $this->input->post('color_id_'.($cl_key+1));

                        /*echo "<pre>";
                        echo "size_id ".($cl_key+1).": ";
                        print_r($size_id);
                        echo "<br>";
                        echo "image_id ".($cl_key+1).": ";
                        print_r($image_id);
                        echo "<br>";
                        echo "color_id ".($cl_key+1).": ";
                        print_r($color_id);
                        echo "<br>";
                        print_r($_FILES['product_image_'.($cl_key+1)]);
                        echo "</pre>";*/

                        if ($color_id && $image_id && $size_id)
                        {
                            $color_update_status = $this->UserBackend_model->update_product_color($id, $color_id, $color);

                            $last_size_id = $this->UserBackend_model->update_product_size($id, $color_id, $size_id, $size_arr[$cl_key]);

                            if(
                                !empty($_FILES['product_image_'.($cl_key+1)]['name']) 
                                && 
                                count(array_filter($_FILES['product_image_'.($cl_key+1)]['name'])) > 0
                            ){
                                $img_status = $this->upload_multiple_img(($cl_key+1), $color_id, $id);
                                
                                if ($img_status) {
            
                                    $stat = $this->UserBackend_model->update_product_images($id, $color_id, $image_id, $img_status);
                                }
                            }

                        }else{

                            $last_color_id = $this->UserBackend_model->save_product_color($id, $color); 

                            echo "<pre>";
                            print_r($last_color_id);
                            echo "</pre>";

                            if ($last_color_id) {
                                
                                $last_size_id = $this->UserBackend_model->save_product_size($id, $last_color_id, $size_arr[$cl_key]);
                                
                                $img_status = $this->upload_multiple_img(($cl_key+1), $last_color_id, $id);

                                if ($img_status) {
        
                                    $s_tat = $this->UserBackend_model->save_product_images($id, $last_color_id, serialize($img_status));
                
                                }else{
                                    $stat = false;
                                    $msg = 'Please select image files to upload on details part '.($cl_key+1);
                                    $res['status'] = $stat;
                                    $res['msg'] = $msg;
                                    
                                    echo json_encode($res);
                                    exit;
                                }                           
                            }
                            
                        }

                        $status = true;
                    }
                    
                    if ($status) {
                        $stat = true;
                        $msg = 'Product updated successfully';
                        $res['status'] = $stat;
                        $res['msg'] = $msg;
                        
                        echo json_encode($res);
                        exit;
                    }else{
                        $stat = error;
                        $msg = 'Something went wrong, try again later';
                        $res['status'] = $stat;
                        $res['msg'] = $msg;

                        echo json_encode($res);
                        exit;
                    }
                }else{
                    $msg = 'No details entered. Please enter details';
                    $res['status'] = 'error';
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

        /*echo "<pre>";
        print_r($res);
        echo "</pre>";
        exit();*/

        echo json_encode($res);
        exit;
    }

    public function deselect_image(Type $var = null)
    {
        $prod_id = base64_decode($this->input->post('prod_id'));
        $img_name = $this->input->post('img_name');

        $data = $this->UserBackend_model->deselect_image($prod_id, $img_name);

        if ($data == 1) {
            $res = true;
        }else {
            $res = false;            
        }

        echo json_encode($res);
        exit;
    }

    public function delete_product()
    {
        $prod_id = base64_decode($this->input->post('prod_id'));

        $prod_data = array(
            'is_deleted' => 1
        );

        $status = $this->UserBackend_model->delete_product($prod_id, $prod_data);

        if ($status) {
            $stat = true;
            $msg = 'Product deleted successfully';

            $res['status'] = $stat;
            $res['msg'] = $msg;
        }else{
            $stat = error;
            $msg = 'Something went wrong, try again later';

            $res['status'] = $stat;
            $res['msg'] = $msg;
        }

        echo json_encode($res);
        exit;

    }

    public function upload_multiple_img($index, $color_id, $last_id)
    {
        if(!empty($_FILES['product_image_'.$index]['name']) && count(array_filter($_FILES['product_image_'.$index]['name'])) > 0){ 
            
            $pd_imgs = array();
            $filesCount = count($_FILES['product_image_'.$index]['name']); 

            for($i = 0; $i < $filesCount; $i++){ 

                if ($_FILES['product_image_'.$index]['name'][$i] != '') {
                    
                    $_FILES['prd_img']['name']     = $_FILES['product_image_'.$index]['name'][$i]; 
                    $_FILES['prd_img']['type']     = $_FILES['product_image_'.$index]['type'][$i]; 
                    $_FILES['prd_img']['tmp_name'] = $_FILES['product_image_'.$index]['tmp_name'][$i]; 
                    $_FILES['prd_img']['error']     = $_FILES['product_image_'.$index]['error'][$i]; 
                    $_FILES['prd_img']['size']     = $_FILES['product_image_'.$index]['size'][$i]; 
                    
                    
                    // File upload configuration 
                    $uploadPath = './assets/backend/images/product_images/'.$last_id.'/'.$color_id; 

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

                        $errorUploadType .= $_FILES['product_image_'.$index]['name'].' | ';   
                    	return false; 
                    } 
                }
            } 
        }else{ 
            return false;
        }

        return $pd_imgs;
    }

    public function get_product_list()
    {
    	if($this->isAdmin() == FALSE) {
    		$this->index();
    	}else{
	    	$data = $this->UserBackend_model->get_product_list();
	                
	        $all_products = array(
	            'all_products' => $data
	        );

	        $this->global['pageTitle'] = 'Product List';
	        $this->global['all_products'] = $data;

	        $this->loadViews('backend/all_product', $this->global, NULL , NULL);
	    }
    }

    public function add_new_category()
    {
    	if($this->isAdmin() == FALSE) {
    		$this->index();
    	}else{
    		$this->global['pageTitle'] = 'Add Category';
	        $this->loadViews('backend/add_new_category', $this->global, NULL , NULL);
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
        // echo "<pre>";
        // print_r($last_id);
        // echo "</pre>";
        // exit();

            if ($last_id) {
                $img_save_status = $this->upload_single_image($last_id);
                // echo "<pre>";
                // print_r($img_save_status);
                // echo "</pre>";
                // exit();

                if ($img_save_status) {

                    $category_data = array(
                        'category_image' => $img_save_status,
                    );

                    $status = $this->UserBackend_model->update_category($last_id, $category_data);

                    if ($status) {
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

                }else {
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

    public function get_category_list()
    {
    	if($this->isAdmin() == FALSE) {
    		$this->index();
    	}else{
	    	$data = $this->UserBackend_model->get_category_list();

	    	$this->global['pageTitle'] = 'Category List';
	    	$this->global['all_categories'] = $data;
	        $this->loadViews('backend/all_categories', $this->global, NULL , NULL);
	    }
    }

    public function edit_category_view()
    {
        $cat_id = $this->input->get('id');
        
        $cat_id_base64decode = base64_decode($cat_id);

        $data = $this->UserBackend_model->get_category_details($cat_id_base64decode);

        $this->global['pageTitle'] = 'Edit Category';
        $this->global['cat_details'] = $data;

        $this->loadViews('backend/edit_category', $this->global, NULL , NULL);
    }

    public function update_category()
    {
        $flag = false;
        $stat = '';
        $msg = '';
        $res = array();

        $cat_id = base64_decode($this->input->post('cat_id'));
        $category_name = $this->input->post('category_name');


        if ($category_name != '') {
            $flag = true;
        }else{$flag = false;}

        if ($flag) {

            $category_data = array(
                'category_name' => $category_name,
            );

            $status = $this->UserBackend_model->update_category($cat_id, $category_data);

            if ($status) {

                if(!empty($_FILES['category_image']['name'])){

                    $img_save_status = $this->upload_single_image($cat_id);
    
                    if ($img_save_status) {
    
                        $category_data = array(
                            'category_image' => $img_save_status,
                        );
    
                        $status = $this->UserBackend_model->update_category($cat_id, $category_data);
    
                        if ($status) {
                            $stat = true;
                            $msg = 'Category updated successfully';
    
                            $res['status'] = $stat;
                            $res['msg'] = $msg;
                        }else{
                            $stat = error;
                            $msg = 'Something went wrong, try again later';
            
                            $res['status'] = $stat;
                            $res['msg'] = $msg;
                        }
    
                    }else{
                        $stat = error;
                        $msg = 'Something went wrong, try again later';
        
                        $res['status'] = $stat;
                        $res['msg'] = $msg;
                    }

                }

                $stat = true;
                $msg = 'Category updated successfully';

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

    public function delete_category()
    {
        $cat_id = base64_decode($this->input->post('cat_id'));

        $cat_data = array(
            'is_deleted' => 1
        );

        $status = $this->UserBackend_model->delete_category($cat_id, $cat_data);

        if ($status) {
            $stat = true;
            $msg = 'Category deleted successfully';

            $res['status'] = $stat;
            $res['msg'] = $msg;
        }else{
            $stat = error;
            $msg = 'Something went wrong, try again later';

            $res['status'] = $stat;
            $res['msg'] = $msg;
        }

        echo json_encode($res);
        exit;

    }

    public function upload_single_image($id)
    {
        // $errorUploadType = '';
        if(!empty($_FILES['category_image']['name'])){
            
            $cat_imgs = '';

            // File upload configuration 
            $uploadPath = './assets/backend/images/category_image/'.$id; 

            //Create new folder if it is not exist
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, TRUE);
            }

            $config= array(
                'upload_path' => $uploadPath,
                'allowed_types' => "gif|jpg|png|jpeg|pdf",
                'encrypt_name' => TRUE,
                // 'max_size' => "12352048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
            );



            // $config['upload_path'] = $uploadPath; 
            // $config['allowed_types'] = 'jpg|jpeg|png|gif'; 
            // $config['max_size']    = '100'; 
            // $config['max_width'] = '1024'; 
            // $config['max_height'] = '768'; 
             
            // Load and initialize upload library 
            $this->load->library('upload', $config); 
            $this->upload->initialize($config); 
             
            // Upload file to server 
            if($this->upload->do_upload('category_image')){ 
                $fileData = $this->upload->data();
                $uploadData['uploaded_on'] = date("Y-m-d H:i:s"); 
                $cat_imgs = $fileData['file_name'];
            }else{ 
                $errorUploadType .= $_FILES['category_image']['name'].' | ';   
                return false;
            }
        }else {
            return false;            
        }

        return $cat_imgs;
    }
    
}