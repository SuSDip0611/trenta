<?php
defined('BASEPATH') or exit('No direct script access allowed');
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

require('FrontendMain.php');

class UserFrontend extends FrontendMain
{
	public function __construct()
    {
        parent::__construct();
        $this->load->model('UserBackend_model');
        $this->load->model('UserFrontend_model');
    }

	public function index()
	{
        $categories = $this->UserBackend_model->get_category_list();

        $first_key = $categories[0]->id;

        $products = $this->UserFrontend_model->get_category_products($first_key);

        foreach ($products as $key => $value) {

            // $unserImgs =  unserialize($value->images);
            $unserImgs =  $this->UserFrontend_model->get_product_imgs($value->id);

            $unserialize_imgs = unserialize($unserImgs->images);
            

            $value->color = $unserImgs->product_color_id;
            $value->images = $unserialize_imgs[0];
        }
       
        $this->global['pageTitle'] = 'Home';
    	$this->global['products'] = $products;
    	$this->global['categories'] = $categories;


		$this->load_view('frontent/home', $this->global, NULL, NULL);
	}

    public function get_category_products()
    {
        $category_id = $this->input->post('category_id');

        $products = $this->UserFrontend_model->get_category_products($category_id);

        foreach ($products as $key => $value) {
            $unserImgs =  $this->UserFrontend_model->get_product_imgs($value->id);

            $unserialize_imgs = unserialize($unserImgs->images);
            

            $value->color = $unserImgs->product_color_id;
            $value->images = $unserialize_imgs[0];
        }

        /*echo "<pre>";
        print_r($products);
        echo "</pre>";
        exit();*/

        $res['status'] = 'success';
        $res['result'] = $products;

        echo json_encode($res);
        exit;
    }

    public function displayCategory(){
        // echo "string";
        if($this->isUser() == FALSE) {
            $this->index();
        }else{
            $result =  $this->UserFrontend_model->getAllCategory();
            $this->global['pageTitle'] = 'Category';
            $this->global['result'] = $result;
            $this->load_view('frontent/category', $this->global, NULL, NULL);
        }
    }

    public function displayProducts(){
        // echo "string";
        if($this->isUser() == FALSE) {
            $this->index();
        }else{

            $catId = $this->security->xss_clean(base64_decode($this->input->get('id')));
            // $result = $this->UserFrontend_model->getAllProductBycategory($catId);
            $products = $this->UserFrontend_model->get_category_products($catId);

            foreach ($products as $key => $value) {

                // $unserImgs =  unserialize($value->images);
                $unserImgs =  $this->UserFrontend_model->get_product_imgs($value->id);

                $unserialize_imgs = unserialize($unserImgs->images);
                

                $value->color = $unserImgs->product_color_id;
                $value->images = $unserialize_imgs[0];
            }
            
            $this->global['pageTitle'] = 'Products';
            $this->global['result'] = $products;
            $this->load_view('frontent/products', $this->global, NULL, NULL);
        }
    }
    public function displayProductDetails(){
        // echo "string";

        if($this->isUser() == FALSE) {
            $this->index();
        }else{

            $product_id = $this->security->xss_clean(base64_decode($this->input->get('id')));

            $product_data = $this->UserBackend_model->get_product_details($product_id);
            
            $product_colors = $this->UserBackend_model->get_colors($product_id);
            $product_all_sizes = $this->UserFrontend_model->get_product_all_sizes($product_id, $product_colors[0]->id);
    
            $product_imgs = $this->UserFrontend_model->get_product_imgs_by_color($product_id, $product_colors[0]->id);
            $unserialize_imgs = unserialize($product_imgs->images);

            $i_count = count($unserialize_imgs);
            for ($i=0; $i < $i_count; $i++) { 
                $images[] = $unserialize_imgs[$i];
            }

            
            $current_product_color = $product_colors[0]->colors;
            $current_product_sizes = $this->UserFrontend_model->get_product_sizes_by_color($product_id, $product_colors[0]->id);
            
            $c_count = count($product_colors);
            for ($i=1; $i < $c_count; $i++) { 
                $colors[] = $product_colors[$i]->colors;
            }
            
            $p_count = count($product_all_sizes);
            for ($i=0; $i < $p_count; $i++) { 
                $sizes[] = $product_all_sizes[$i]->size;
            }
            
            // echo"<pre>";
            // print_r($sizes);
            // echo"</pre>";
            // exit;
            
            $product_array['id'] = $product_data->id;
            $product_array['name'] = $product_data->product_name;
            $product_array['rating'] = $product_data->rating;
            $product_array['description'] = $product_data->description;
            $product_array['image'] = $unserialize_imgs[0];
            $product_array['price'] = $product_data->price;
            $product_array['size'] = $current_product_sizes->size;
            $product_array['color'] = $current_product_color;
            $product_array['color_id'] = $product_colors[0]->id;
            $product_array['all_images'] = $images;
            $product_array['colors'] = $colors;
            $product_array['sizes'] = $sizes;
            
            

            $this->global['pageTitle'] = 'Product Details';
            $this->global['product_details'] = $product_array;
            $this->load_view('frontent/productsDetails', $this->global, NULL, NULL);
        }
    }
}

