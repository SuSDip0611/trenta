<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class LoginBackend extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('LoginModel');
    }

	public function index() {
        $this->isLoggedIn();
        // $this->load->view('backend/login');
    }

    public function isLoggedIn(){
    	$isLoggedIn = $this->session->userdata('isLoggedIn');

    	if(!isset($isLoggedIn) || $isLoggedIn != TRUE){
    		$this->load->view('backend/login');
    	}else{
    		redirect('/admin/dashboard');
    	}
    }

    public function logedIn(){
    	// $2y$10$34gjgswMKq0OzaAi2cSEL.ZoQUNUBMv/UlXXniF1UfYq79E/35nbW
    	// $test = password_hash($password, PASSWORD_BCRYPT);
    	$res = array();
    	$status = '';
    	$msg = '';
    	$email = strtolower($this->security->xss_clean($this->input->post('email')));
    	$password = $this->security->xss_clean($this->input->post('password'));

    	
    	if($email === '' && $password === ''){    		
    		$status = false;
    		$msg = "Email and password are required";
    	}elseif($email === ''){    		
    		$status = false;
    		$msg = "Email is required";
    	}elseif($password === ''){
    		$status = false;
    		$msg = "Password is required";
    	}else{
    		
    		$result = $this->LoginModel->loginMe($email, $password);
    		

    		if(!empty($result)){
    			$status = true;
    			$msg = 'Login Successfull';

    			$sessionArray = array('userId'=>$result->userId,                    
                                        'role'=>$result->roleId,
                                        'roleText'=>$result->role,
                                        'name'=>$result->name,
                                        'isLoggedIn' => TRUE
                                );


    			
    			$this->session->set_userdata($sessionArray);
    			unset($sessionArray['userId'], $sessionArray['isLoggedIn'], $sessionArray['lastLogin']);
    		}else{
    			$status = false;
    			$msg = "Userid and password not matched";
    		}
    	}

    	

    	$res = array(
    		'status' => $status,
    		'msg' => $msg,
    	);
    	
    	echo json_encode($res);
    	
    }




    public function logout() {
		
		$this->session->sess_destroy ();
		
		redirect('/admin');
	}
}