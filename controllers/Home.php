<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct(){
		parent::__construct();

		$this->load->model('University_model');

	}

	public function index()

	{

		$data['news']=$this->University_model->get_news();
		$data['faqs']=$this->University_model->get_faqs();
		
		$this->load->view('header');
		$this->load->view('home',$data);
		$this->load->view('footer');
		$this->load->view('js');
		
	}

	public function newscontent(){

		$id=$this->uri->segment(2);
		$this->load->model("University_model");	
		$data['news']=$this->University_model->get_news();
		$data['snews']=$this->University_model->get_single_news($id);

		$this->load->view('header');
		$this->load->view('newsmain',$data);
		$this->load->view('footer');
		$this->load->view('js');

	}
}
