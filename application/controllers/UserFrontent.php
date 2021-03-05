<?php
defined('BASEPATH') or exit('No direct script access allowed');
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

require('FrontentMain.php');

class UserFrontent extends FrontentMain
{
	public function index()
	{
		$this->load_view('frontent/home');
	}
}

