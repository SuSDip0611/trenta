<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require('BackendMain.php');

class UserBackend extends BackendMain {

	public function index() {
        $this->loadViews('backend/dashboard');
    }
}