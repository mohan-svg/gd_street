<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminlogin extends CI_Controller {


	function __construct()
	 {
	   parent::__construct(); 
	   $this->load->model("Admin_model");	
	   $this->load->helper('cookie');
	 }

	public function index()
	{
		if($this->session->userdata('admin_in'))
		{
		  redirect('dashboard');

		 } else{
			
			$this->load->view('header');
			$this->load->view('admin/login');
			$this->load->view('js');
		 }
		
	}

	function verify_login()
	{
		$this->form_validation->set_rules('username', 'Email', 'required');
	    $this->form_validation->set_rules('password', 'Password', 'required');
	    
	    if ($this->form_validation->run())
  		{
  			
    			$username=$this->input->post('username');
				$password=$this->input->post('password');
				
				$status['result']=$this->Admin_model->login($username,$password);

			if($status['result']['status']=='true'){

				$newdata = array( 
						'id' =>  $status['result']['admin_data']['id'],
					   'name'  => $status['result']['admin_data']['name'], 
					   'email'     => $status['result']['admin_data']['username'], 
					   'admin_in' => 'true'
					);

				// print_r($newdata);
					$this->session->set_userdata($newdata);

					if(!empty($this->input->post('remember'))):
						setcookie('admin_login',$username,time()+(3*60*60));
						setcookie('admin_password',$password,time()+(3*60*60));
					else:
						delete_cookie('admin_login');
						delete_cookie('admin_password');
					endif;

					redirect('dashboard','refresh');
				} else{

					$this->session->set_flashdata('message', "<div class='alert alert-danger'>Invalid Logins </div>");
					redirect('signin','refresh');

			}//second else

     	    	
    	} else {

				$this->session->set_flashdata('message', "<div class='alert alert-danger'>".validation_errors()." </div>");
				redirect('signin');
			}//first else

	}//function


	public function logout(){

			$this->session->unset_userdata('id');
			$this->session->unset_userdata('name');
			$this->session->unset_userdata('email');
			$this->session->unset_userdata('admin_in');
			
			redirect('signin');
			
	}

	
	
}
