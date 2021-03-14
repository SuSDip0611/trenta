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
            $unserImgs =  unserialize($value->images);
            
            $value->images = $unserImgs;
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
            $unserImgs =  unserialize($value->images);
            
            $value->images = $unserImgs;
        }

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
            $this->global['pageTitle'] = 'Product Details';
            $this->load_view('frontent/productsDetails', $this->global, NULL, NULL);
        }
    }
}

