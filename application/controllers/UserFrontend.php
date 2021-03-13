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
        
        // echo "<pre>";
        // print_r($products);
        // echo "</pre>";
        // exit();

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
}

