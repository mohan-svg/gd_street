<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {


	function __construct()
	 {
	   parent::__construct();
	   $this->load->helper('cookie');
	 
	 }

	public function index()

	{
		
		if($this->session->userdata('logged_in'))
		{
			redirect('university');

		} else{

			$this->load->view('header');
			$this->load->view('login');
			$this->load->view('js');
		}
		
	}

	function verify_login()

	{
		
		$this->form_validation->set_rules('username', 'Email', 'required');
	    $this->form_validation->set_rules('password', 'Password', 'required');
	    
	    if ($this->form_validation->run())
  		{

		$username=trim($this->input->post('username'));
		$password=trim($this->input->post('password'));
		
		$status['result']=$this->Student_model->login($username,$password);

		// print_r($status['result']);

		if($status['result']['status']=='true'){

			$newdata = array( 
					'id' =>  $status['result']['student']['stud_id'],
				   'name'  => $status['result']['student']['stud_fname'], 
				   'email'     => $status['result']['student']['email_id'], 
				   'logged_in' => 'true'
				);

			// print_r($newdata);
			$this->session->set_userdata($newdata);
			if(!empty($this->input->post('remember'))){

				set_cookie('user_login',$username,time() + (3*60*60));
				set_cookie('user_password',$password,time() + (3*60*60));

			} else{

				delete_cookie('user_login');
				delete_cookie('user_password');

			}
			
			
			//$this->load->view('header');
				if($this->session->userdata('page_set')!= ''){

					$this->session->unset_userdata('page_set');

					redirect('university/app_submit'.'ed');

				} else{
					redirect('home');
				}

			//$this->load->view('js');

		}// 2nd if()

		else{

					$this->session->set_flashdata('error', "Invalid Logins");
					redirect('login','refresh');

		}//2nd else{}

	}  else {

   //if()						
				$this->session->set_flashdata('error', validation_errors());
				redirect('login','refresh');
			}//first else


	}


	function logout(){
		
			$this->session->unset_userdata('id');
			$this->session->unset_userdata('name');
			$this->session->unset_userdata('email');
			$this->session->unset_userdata('logged_in');
			if(($this->session->unset_userdata('id') =='') && ($this->session->unset_userdata('name') =='') && ($this->session->unset_userdata('email') =='') && ($this->session->unset_userdata('logged_in') =='')){

					redirect('login','refresh');

			}
	}



	function forgot_password_step1(){

				$this->load->view('header');
				$this->load->view('forgot_password_page');
				$this->load->view('js');
				$this->load->view('footer');
	}
	

	function forgot_password_step2(){

		$this->form_validation->set_rules('email','Username','required|valid_email');

				if($this->form_validation->run() == FALSE){

					$this->session->set_flashdata('error',validation_errors());
					redirect('forgot_password','refresh');

				} else{

						$email_id = trim($this->input->post('email'));
						$query = $this->Student_model->check_username($email_id);											

							if($query)
							{	
								$student_info = $this->Student_model->read_student_information($email_id);
								$fname = $student_info->stud_fname;

								$otp=rand('100000','999999');	
								$this->load->library('email');

								if($this->config->item('protocol')=="smtp"){
									
								      $config['protocol'] = "smtp";
								      $config['smtp_host'] = $this->config->item('smtp_hostname');
								      $config['smtp_user'] = $this->config->item('smtp_username');
								      $config['smtp_pass'] = $this->config->item('smtp_password');
								      $config['smtp_port'] = $this->config->item('smtp_port');
								      $config['smtp_timeout'] = $this->config->item('smtp_timeout');
								      $config['mailtype'] = $this->config->item('smtp_mailtype');
								      $config['starttls']  = $this->config->item('starttls');
								      $config['newline']  = $this->config->item('newline');
								      
								      $this->email->initialize($config);
								      
								    }
									
									$this->email->from('no-reply@gradstreet.in','GradStreet | Password Reset');
									$this->email->to($email_id);
									// $this->email->to('apps.shahgre@gmail.com');

									$subject= 'OTP for Password Reset - GradStreet'; 				
									

									$htmlContent = "<div style='font-size:13px;'>Dear ".$fname.','."<br/><br/>";
									$htmlContent .= "You have requested for Password change<br/><br/>Username:  ".$email_id."<br/><br/>Please use the below One Time Password to change your password. <br/>";
									$htmlContent .= "<b>One Time Password(OTP): ".$otp."</b><br/><br/>";
									$htmlContent .= "- GradStreet</div>";

									$this->email->subject($subject);
									$this->email->message($htmlContent);

									if($this->email->send()){

										$this->Student_model->update_verification_code($email_id,$otp);						

										$session_data = array('stud_id'=> $student_info->stud_id,
															'email'=> $student_info->email_id);

										$this->session->set_userdata($session_data);
										
										redirect('forgot_password3','refresh');
									}

									else{ 

										show_error($this->email->print_debugger());	
										$this->session->set_flashdata('error','Error while sending otp, please try again');
										redirect('forgot_password','refresh');
									}

								} else{ //if($query)

									$this->session->set_flashdata('error','You are not registered student, Please Signup');
									redirect('forgot_password','refresh');

								}

					} //form validation()
	
	}

	function forgot_password_step3(){
			if($this->session->userdata('stud_id')){
				
				$this->load->view('header');
				$this->load->view('enter_otp_page');
				$this->load->view('js');
				$this->load->view('footer');

			} else{

					$this->session->set_flashdata('error','You are not registered, Please Signup');
					redirect('forgot_password');
				}
	}
	
	function forgot_password_step4(){
			if($this->session->userdata('stud_id')){

					$this->form_validation->set_rules('otp','One Time Password','required');

					if($this->form_validation->run() == FALSE){

						$this->session->set_flashdata('error',validation_errors());
						redirect('forgot_password3');

					} else{

							$otp = trim($this->input->post('otp'));

							$query = $this->Student_model->verify_account($otp,$this->session->userdata('email'));

							if($query){
								
								$session_data = array('change_password'=> 'true');														

								$this->session->set_userdata($session_data);

								redirect('password_changes');

							} else{
								$this->session->set_flashdata('error','Wrong One Time Password, Please check OTP');
								redirect('forgot_password3');
							}
					}//form validation()

				} else{

					$this->session->set_flashdata('error','You are not registered');
					redirect('forgot_password3');
				}
	}

	function change_password(){
			if($this->session->userdata('change_password') && $this->session->userdata('stud_id')){
				
				$this->load->view('header');
				$this->load->view('change_password');
				$this->load->view('js');
				$this->load->view('footer');

			} else{

					$this->session->set_flashdata('error','You are not registered, Please Signup');
					redirect('login','refresh');
				}
	}

	function password_reset(){
			if($this->session->userdata('change_password') && $this->session->userdata('stud_id')){
				
					$this->form_validation->set_rules('password','Password','required|min_length[8]');
					$this->form_validation->set_rules('pswrepeat','Retype Password','required|matches[password]');

					if($this->form_validation->run() == FALSE){

						$this->session->set_flashdata('error',validation_errors());
						redirect('password_changes','refresh');
					} else{ 

						$query = $this->Student_model->update_password(trim($this->input->post('password')),$this->session->userdata('stud_id'),$this->session->userdata('email'));

						if($query){

										$email_id = $this->session->userdata('email');

										$this->load->library('email');

										if($this->config->item('protocol')=="smtp"){
											
										      $config['protocol'] = "smtp";
										      $config['smtp_host'] = $this->config->item('smtp_hostname');
										      $config['smtp_user'] = $this->config->item('smtp_username');
										      $config['smtp_pass'] = $this->config->item('smtp_password');
										      $config['smtp_port'] = $this->config->item('smtp_port');
										      $config['smtp_timeout'] = $this->config->item('smtp_timeout');
										      $config['mailtype'] = $this->config->item('smtp_mailtype');
										      $config['starttls']  = $this->config->item('starttls');
										      $config['newline']  = $this->config->item('newline');
										      
										      $this->email->initialize($config);
										      
										    }
											
											$this->email->from('no-reply@gradstreet.in','GradStreet');
											$this->email->to($email_id);
											// $this->email->to('apps.shahgre@gmail.com');

											$subject= 'Password Changed - GradStreet'; 				
											

											$htmlContent = "<div style='font-size:13px;'>Dear Student,"."<br/><br/>";
											$htmlContent .= "Password has been changed successfully<br/><br/>Username:  ".$email_id."<br/><br/>you can now login your account here <a href ='http://localhost/CodeIgniter-3.1.10/login' target='_blank'>GradStreet | Student Login</a> <br/><br/>";
											$htmlContent .= "-GradStreet</div>";

											$this->email->subject($subject);
											$this->email->message($htmlContent);

											if($this->email->send()){

												//Unset Sessions
											$this->session->unset_userdata('stud_id');
											$this->session->unset_userdata('email');
											$this->session->unset_userdata('change_password');
																						
											

											} else{ 

													show_error($this->email->print_debugger());	
													// $this->session->set_flashdata('error','Error while sending otp, please try again');
													// redirect('forgot_password','refresh');
												}
										$this->session->set_flashdata('success','Password Changed Successfully, Please Login');
											redirect('login');
											

						} else{
							$this->session->set_flashdata('error','Error while changing password, please try again');
							redirect('password_changes','refresh');
						}

					}

			} else{

					$this->session->set_flashdata('error','You are not registered, Please Signup');
					redirect('login','refresh');
				}
	}
}
