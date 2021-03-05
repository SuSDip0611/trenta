<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Login (LoginController)
 * Login class to control to authenticate user credentials and starts user's session.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class LoginBackend extends CI_Controller {
	public function index()
    {
        // $this->load->view('login');
        // $this->isLoggedIn();
        $this->load->view('backend/login');
    }
}