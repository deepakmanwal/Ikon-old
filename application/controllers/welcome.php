<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('tank_auth');
		$this->load->model('tank_auth/users');
	}

	function index()
	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} else {
		redirect('welcome/dashboard');
			//$data['user_id']	= $this->tank_auth->get_user_id();
			//$data['username']	= $this->tank_auth->get_username();
			//$data['user'] = $this->users->get_fulldetails($data['user_id']);
			//$this->load->view('welcome', $data);
		}
	}
	
	
	function dashboard(){
		$user_id=$this->tank_auth->get_user_id();
		$data['user'] = $this->users->get_user_by_id($user_id, true);
		$this->load->view('auth/dashboard',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */