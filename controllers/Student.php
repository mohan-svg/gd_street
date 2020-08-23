<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {


	function __construct()
	 {
	   parent::__construct();
	   	   
	   $this->load->model("University_model");
	   $this->load->helper('cookie');
	  

	 }

	public function index(){
		$data['result']=$this->University_model->university_list();
		
		$this->load->view('header');
		$this->load->view('university_apply',$data);
		$this->load->view('js');
		$this->load->view('footer');
	}


	function signup(){
		$this->load->view('header');
		$this->load->view('signup');
		$this->load->view('js');
		$this->load->view('footer');
	}


	function account_step1(){
		
		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[student_details.email_id]|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
		$this->form_validation->set_rules('pswrepeat', 'Repeat Password', 'required|matches[password]');
		$this->form_validation->set_rules('fname', 'First Name', 'required');
		$this->form_validation->set_rules('lname', 'Last Name', 'required');
		$this->form_validation->set_rules('mobile', 'Mobile No', 'required|max_length[10]|min_length[10]|regex_match[/^[0-9]{10}$/]');
			

		if ($this->form_validation->run())
		  	{
		  		$verification_code=rand('1000000','9999999');
		  		$email_id = trim($this->input->post('email'));
				$fname = trim($this->input->post('fname'));

		  		if($this->Student_model->insert_student()){
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
					
					$subject= 'Registration Successful- GradStreet'; 		
					$htmlContent = "<div style='font-size:13px;'>Dear ".$fname.','."<br/><br/>";
					$htmlContent .= "Thank you for creating a GradStreet account for application purpose.<br/><br/>Username:  ".$email_id."<br/><br/>Please use the Verification code below to verify your account. <br/>";
					$htmlContent .= "<b>Verification Code: ".$verification_code."</b><br/><br/>";
					$htmlContent .= "<b>- GradStreet</b></div>";

					$this->email->subject($subject);
					$this->email->message($htmlContent);

					if($this->email->send()){

						$this->Student_model->insert_verification_code($email_id,$verification_code);

						$student_data = $this->Student_model->read_student_information($email_id);

						$session_data = array('stud_id'=> $student_data->stud_id,
											'email'=> $student_data->email_id);

						$this->session->set_userdata($session_data);

						$this->session->set_flashdata('success','Account Created Successfully, Please verify your account');
						redirect('verify_account');
					}

					else{

						show_error($this->email->print_debugger());	
						
					}


				} else{ //if student_details inserted()
							    
						$this->session->set_flashdata('error', "Error in Sign Up, Please Try Again");

						redirect('sign_up','refresh');
							
					}

		} else { //form validation

					$this->session->set_flashdata('error', validation_errors());
		     	  redirect('sign_up','refresh');
			
		}
	}

	function account_verification(){

		if($this->session->userdata('stud_id')){
				$this->load->view('header');
				$this->load->view('verification_page');
				$this->load->view('js');
				$this->load->view('footer');

		} else{
				$this->session->set_flashdata('error','You are not registered student, Please create your account');
				redirect('sign_up','refresh');
			}
		
	}

	function account_step2(){

		if($this->session->userdata('stud_id')){

				$this->form_validation->set_rules('activation_code','Verification Code','required');

				if($this->form_validation->run() == FALSE){

					$this->session->set_flashdata('error',validation_errors());
					redirect('verify_account','refresh');

				} else{

						$verification_code = trim($this->input->post('activation_code'));

						$query = $this->Student_model->verify_account($verification_code,$this->session->userdata('email'));

						if($query){

							$this->Student_model->activate_account($this->session->userdata('email'),$this->session->userdata('stud_id'));
							//Unset session
							$this->session->unset_userdata('email');
							$this->session->unset_userdata('stud_id');  

							$this->session->set_flashdata('success','Your Account Verification is completed, Please Login');
							redirect('login','refresh');

						} else{
							$this->session->set_flashdata('error','Wrong Verification Code, Please try again');
							redirect('verify_account','refresh');
						}

				} // form_validation()

			} else{ //stud_id present or not

				$this->session->set_flashdata('error','You are not registered');
				redirect('sign_up','refresh');
			}
	}


	function add_student(){
		
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('email', 'Email', 'valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|max_length[15]|min_length[8]');
		$this->form_validation->set_rules('pswrepeat', 'Repeat Password', 'required|matches[password]');
		$this->form_validation->set_rules('fname', 'First Name', 'required');
		$this->form_validation->set_rules('lname', 'Last Name', 'required');
		$this->form_validation->set_rules('mobile', 'Mobile No', 'required|max_length[10]|min_length[10]|regex_match[/^[0-9]{10}$/]');
		$this->form_validation->set_rules('gender', 'Gender', 'required');
		$this->form_validation->set_rules('address', 'Mailing Address', 'required');
		$this->form_validation->set_rules('city', 'City', 'required');
		$this->form_validation->set_rules('zipcode', 'Zip code', 'required|regex_match[/^[0-9]{6}$/]');

		if($this->input->post('greQues')=='yes'){

			$this->form_validation->set_rules('greTotal', 'GRE-Total Score', 'required|regex_match[/^[0-9]{3}$/]');
			$this->form_validation->set_rules('greQuants', 'Quants Score', 'required|regex_match[/^[0-9]{3}$/]');
			$this->form_validation->set_rules('greVerbal', 'Verbal Score', 'required|regex_match[/^[0-9]{3}$/]');
		}	

		
		if($this->input->post('ieltstoeflQues')=='yes'){

			$this->form_validation->set_rules('ielts', 'IELTS/TOEFL Score', 'required');
		}

		$this->form_validation->set_rules('ugCollege', 'UG-College Name', 'required');
		$this->form_validation->set_rules('ugCourse', 'UG-Course', 'required');
		$this->form_validation->set_rules('ugGpa', 'UG-GPA', 'required');
		$this->form_validation->set_rules('ugPy', 'UG-Passing Year', 'required');
		
		if($this->input->post('pgQues')=='yes'){

			$this->form_validation->set_rules('pgCollege', 'PG-College Name', 'required');
			$this->form_validation->set_rules('pgCourse', 'PG-Course', 'required');
			$this->form_validation->set_rules('pgGpa', 'PG-GPA', 'required');
			$this->form_validation->set_rules('pgPy', 'PG-Passing Year', 'required');
		}

		if($this->input->post('weQues')=='yes'){

			$this->form_validation->set_rules('company', 'Company Name', 'required');
			$this->form_validation->set_rules('position', 'Position/Profile', 'required');
			$this->form_validation->set_rules('tenure', 'Tenure', 'required');
		
		}
	

		if ($this->form_validation->run())
		  	{
		  		$alraedy_reg=$this->Student_model->get_student_login(trim($this->input->post('email')));

		  		if($alraedy_reg=='true'){ // checking if user has already registered or not

						$this->session->set_flashdata('message', "<div class='alert alert-danger'>Already Registered Please Login</div>");

							    redirect('sign_up','refresh');
					
				} else if($alraedy_reg=='false'){

						if($this->Student_model->insert_student()){

	                        $this->session->set_flashdata('message', "<div class='alert alert-success'> Your Details Added Succesfully <br> Please Login </div>");
	                        redirect('/login/','refresh');

						} else{
							    $this->session->set_flashdata('message', "<div class='alert alert-danger'>Error in Sign Up, Please Try Again </div>");

							    redirect('sign_up','refresh');
							
						}
					}

		} else {

					$this->session->set_flashdata('message', "<div class='alert alert-danger'>".validation_errors()." </div>");
		     	  redirect('sign_up','refresh');			
		}
	}


	function view_profile(){

		if($this->session->userdata('logged_in')){

		
		        $data['result'] = $this->University_model->get_applications($this->session->userdata('id'));
		        $data['stud_detail'] = $this->Student_model->get_student_detail(5,$this->session->userdata('id'));
		        $data['education'] = $this->Student_model->get_education_details($this->session->userdata('id'));
		        $data['gre'] = $this->Student_model->get_gre($this->session->userdata('id'));
		        $data['ielts_toefl'] = $this->Student_model->get_ielts_toefl($this->session->userdata('id'));
		        $data['work_experience'] = $this->Student_model->get_work_exp($this->session->userdata('id'));
		        			         		
		         		$this->load->view('header');
		         		$this->load->view('profile',$data);
		         		$this->load->view('js');
		         		$this->load->view('footer');

		   } else{
			
				redirect('/login/', 'refresh');
			}
		         		
	}//function 


	function showAllEducationDetails_by_id(){
		if($this->session->userdata('logged_in')){

			$result = $this->Student_model->showAllEducationDetails_by_id($this->session->userdata('id'));
			echo json_encode($result);
			
		}else{
			redirect('/login/', 'refresh');
		}
	}

	function insert_education_details(){
		if($this->session->userdata('logged_in')){

			$this->form_validation->set_rules('edu_type','Education Type','required');
			$this->form_validation->set_rules('college_name','College Name','required');
			$this->form_validation->set_rules('degree','Degree','required');
			$this->form_validation->set_rules('branch','Branch','required');
			$this->form_validation->set_rules('start_date','College Start Date','required');
			$this->form_validation->set_rules('end_date','College End Date','required');
			$this->form_validation->set_rules('cgpa','CGPA','required');

			if($this->form_validation->run()==true):

				$query=$this->Student_model->insert_education_details($this->session->userdata('id'));
				
				if($query!=false):
					$response['status']=1;
					$response['message']="<div class='alert alert-success'>Education Details saved</div>";

					$education = $this->Student_model->get_education_by_id($query);

					$response['row'] ='<div class="col-md-12 border-top border-bottom eduHead">
                          <span class="font-20">'. ucfirst($education->edu_type).'</span> 
                          <span class="pull-right"> 
                            <a href="javascript:void(0);" class="btn btn-info btn-sm" onclick="showDeleteEducation('.  $education->edu_id.')">
                              <i class="fa fa-pencil-square font-20" ></i>
                            </a> | <a href="javascript:void(0);" class="btn btn-danger btn-sm" onclick="showEditEducation('. $education->edu_id.')">
                              <i class="fa fa-trash font-20"></i>
                            </a>
                          </span>
                        </div>
                        <div class="row p-3">
                            <div class="col-md-9 col-xs-12 col-sm-12 mt-3">
                              <h4 class="font-weight-bold">'. $education->college.'</h4>
                              <div>'.$education->degree_name.'</div>
                              <div>'.$education->branch.'</div>
                            </div>
                            <div class="col-md-3 col-xs-12 col-sm-12 mt-3">
                              <div class="font-weight-bold">'.$education->starting_year.'-'.$education->ending_year.'</div>
                              <div><strong>CGPA:</strong>'.$education->cgpa.'</div>                          
                            </div>
                        </div>
                        <div class="text-center"><i class="fa fa-minus"></i><i class="fa fa-minus"></i><i class="fa fa-minus"></i></div>';

				else:
					$response['status']=2;
					$response['message']="<div class='alert alert-danger'>Education Details not saved, Please Try again</div>";
				endif;

			else:
					$response['status']=0;
					$response['edu_type'] = strip_tags(form_error('edu_type'));
					$response['college_name'] = strip_tags(form_error('college_name'));
					$response['degree'] = strip_tags(form_error('degree'));
					$response['branch'] = strip_tags(form_error('branch'));
					$response['start_date'] = strip_tags(form_error('start_date'));
					$response['end_date'] = strip_tags(form_error('end_date'));
					$response['cgpa'] = strip_tags(form_error('cgpa'));

			endif;

			echo json_encode($response);

		} else{
			redirect('/login/','refresh');
		}
	}

	function insert_test_scores(){
		if($this->session->userdata('logged_in')){


		} else{
			redirect('/login/','refresh');
		}
	}

	function insert_work_experience(){
		if($this->session->userdata('logged_in')){


		} else{

			redirect('/login/','refresh');

		}
	}
	
	
}// class
