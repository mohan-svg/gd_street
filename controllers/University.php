<?php
defined('BASEPATH') OR exit('No direct script access allowed');

ini_set('max_execution_time', 0); 
ini_set('memory_limit','2048M');



class University extends CI_Controller {


	function __construct()
	 {
	   parent::__construct();
	   
	   $this->load->model("University_model");
	   
	   
	 }

	public function index()

	{
		$data['result']=$this->University_model->university_list_with_image();
		
		$this->load->view('header');
		$this->load->view('university_apply',$data);
		
		$this->load->view('footer');
		$this->load->view('js');
	}

	function news(){

		$data['result']=$this->University_model->university_list();
		
		$this->load->view('header');
		$this->load->view('university_apply',$data);
		$this->load->view('js');
		$this->load->view('footer');
	}


	function apply()

	{ 

		$u_id_string = substr($this->uri->segment(2), 4);		
		$u_id = intval($u_id_string );

		$data['university_name']=$this->University_model->get_university_name($u_id);
		$data['university_images']=$this->University_model->get_university_images($u_id);
		$data['course'] = $this->University_model->course_name($u_id);
		$data['benefit'] = $this->University_model->get_benefits($u_id);
		// print_r($data);
		
		$this->load->view('header');
		$this->load->view('university_page',$data);
		$this->load->view('js');
		$this->load->view('footer');
	}

	function app_submit($u_id)
	{



		if($this->session->userdata('logged_in')){
				$data['result']=$this->University_model->get_university($u_id);
				$statuss = $this->student_model->update_inprocess_university($u_id,$this->session->userdata('id'));

				$data['students']=$this->student_model->get_student_detail($u_id, $this->session->userdata('id'));
					// print_r($data['students']);

					// echo $statuss;

				$this->load->view('header');
				$this->load->view('university_application_submit',$data);
				// $this->load->view('apps_submit',$data);
				$this->load->view('js');
				$this->load->view('footer');
		}

		else{
			$this->session->set_userdata('university_id',$u_id);
			$this->session->set_userdata('page_set','app_submit');
			redirect('login', 'refresh');

		}
	}

	function app_submited()
	{

		$u_id = $this->session->userdata('university_id');
		
		if($this->session->userdata('logged_in')){
				$data['result']=$this->University_model->get_university($u_id);

				$statuss = $this->student_model->update_inprocess_university($u_id, $this->session->userdata('id'));

				$data['students']=$this->student_model->get_student_detail($u_id, $this->session->userdata('id'));
				// print_r($data['students']);

				$this->load->view('header');
				// $this->load->view('apps_submit',$data);
				$this->load->view('university_application_submit',$data);
				$this->load->view('js');
				$this->load->view('footer');
		}

		else{
			$this->session->set_userdata('university_id',$u_id);
			$this->session->set_userdata('page_set','app_submit');
			redirect('login');

		}
	}




function submit_application()
{

if($this->session->userdata('logged_in')){	

		$uid = $this->input->post('uid');
		$name = $this->input->post('fname')." ".$this->input->post('lname');
		$address = $this->input->post('address').",".$this->input->post('city').",".$this->input->post('zipcode');
		$gre = "Total Score: ".$this->input->post('greTotal')."  Quants: ".$this->input->post('greQuants')." Verbal: ".$this->input->post('greVerbal');

		  	$this->load->library('email');

				if($this->config->item('protocol')=="smtp"){
				      $config['protocol'] = 'smtp';
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


				// $this->load->library('email', $configmail);
				// $this->email->set_newline("\r\n");
				$this->email->from('enquiry@shahgre.com');
				$this->email->to('asuglobal40@gmail.com');

				$subject=$this->config->item('docs_received');
				$subject=str_replace('[university_name]',$this->input->post('uname'),$subject);
				$message=$this->config->item('send_docs');
				$message=str_replace('[name]',$name,$message);

				$message=str_replace('[email]',$this->input->post('email'),$message);
				$message=str_replace('[mobile]',$this->input->post('mobile'),$message);
				$message=str_replace('[address]',$address,$message);
				$message=str_replace('[gre]',$gre,$message);
				$message=str_replace('[ielts_toefl]',$this->input->post('toefl_ielts'),$message);
				$message=str_replace('[ug_college]',$this->input->post('ugCollege'),$message);
				$message=str_replace('[ug_gpa]',$this->input->post('ugGpa'),$message);
				$message=str_replace('[ug_duration]',$this->input->post('ugPy'),$message);
				$message=str_replace('[pg_college]',$this->input->post('pgCollege'),$message);
				$message=str_replace('[pg_gpa]',$this->input->post('pgGpa'),$message);
				$message=str_replace('[pg_duration]',$this->input->post('pgPy'),$message);
				$message=str_replace('[company]',$this->input->post('company'),$message);
				$message=str_replace('[position]',$this->input->post('position'),$message);
				$message=str_replace('[tenure]',$this->input->post('tenure'),$message);



				$this->email->subject($subject);
				$this->email->message($message);

						for($i=1;$i<=12;$i++){

						$file_data = $this->upload_file($i);

				// echo $i;
							 // print_r($file_data);


						if(is_array($file_data))
						  {

						  	$this->email->attach($file_data['full_path']);
						 }

						}//for

				  	if($this->email->send())
				         {
				          // if(delete_files($file_data['file_path']))
				          // {
				          //  $this->session->set_flashdata('message', 'Application Sended');
				          //  redirect('sendemail');
				          // }
				         	echo "Email sent";

				         	$updated= $this->University_model->update_submitted_university($uid,$this->session->userdata['id']);
				         	if ($updated) {
				         		
				         		$this->load->view('header');
				         		$this->load->view('profile');
				         		$this->load->view('js');
				         		$this->load->view('footer');
				         	}

				         	else{

				         		echo $updated;
				         	}

				         	
				         }
				         else
				         {
				          // if(delete_files($file_data['file_path']))
				          // {
				          //  $this->session->set_flashdata('message', 'There is an error in email send');
				          //  redirect('sendemail');

				         	echo "Email Not sent";
				          // }
				         }

	 }//logged in check

		   else{
			
			redirect('/login/', 'refresh');

		}


}


//for temporary use only

function single_file()
{

  if($this->session->userdata('logged_in')){	
  				$uid = $this->input->post('uid');

				$this->load->library('form_validation');

				$this->form_validation->set_rules('degreeType', 'Degree Type', 'required');
				$this->form_validation->set_rules('course1', 'Course Preference 1', 'required');
				$this->form_validation->set_rules('course2', 'Course Preference 2', 'required');
				$this->form_validation->set_rules('term', 'Term', 'required');


				$this->form_validation->set_rules('email', 'Email', 'required');
				$this->form_validation->set_rules('email', 'Email', 'valid_email');
				
				$this->form_validation->set_rules('fname', 'First Name', 'required');
				$this->form_validation->set_rules('lname', 'Last Name', 'required');
				$this->form_validation->set_rules('mobile', 'Mobile No', 'required|max_length[10]|min_length[10]|regex_match[/^[0-9]{10}$/]');
				
				$this->form_validation->set_rules('address', 'Mailing Address', 'required');
				$this->form_validation->set_rules('city', 'City', 'required');
				$this->form_validation->set_rules('zipcode', 'Zip code', 'required|regex_match[/^[0-9]{6}$/]');

				if($this->input->post('greQues')=='yes'){

					$this->form_validation->set_rules('greTotal', 'GRE-Total Score', 'required|regex_match[/^[0-9]{3}$/]');
					$this->form_validation->set_rules('greQuants', 'Quants Score', 'required|regex_match[/^[0-9]{3}$/]');
					$this->form_validation->set_rules('greVerbal', 'Verbal Score', 'required|regex_match[/^[0-9]{3}$/]');
				}	

				
				if($this->input->post('ieltstoeflQues')=='yes'){

					$this->form_validation->set_rules('toefl_ielts', 'IELTS/TOEFL Score', 'required');
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

						
						$name = $this->input->post('fname')."_".$this->input->post('lname');
						$address = $this->input->post('address').",".$this->input->post('city').",".$this->input->post('zipcode');
						$gre = "Total Score: ".$this->input->post('greTotal')."  Quants: ".$this->input->post('greQuants')." Verbal: ".$this->input->post('greVerbal');

						$this->load->library('email');

						if($this->config->item('protocol')=="smtp"){
								      $config['protocol'] = 'smtp';
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


							// $this->load->library('email', $configmail);
							// $this->email->set_newline("\r\n");
							$this->email->from('enquiry@shahgre.com');
							$this->email->to('asuglobal40@gmail.com');

							$subject=$this->config->item('docs_received');
							$subject=str_replace('[university_name]',$this->input->post('uname'),$subject);
							$message=$this->config->item('send_docs');
							$message=str_replace('[name]',$name,$message);

							$message=str_replace('[course1]',$this->input->post('course1'),$message);
							$message=str_replace('[specialization1]',$this->input->post('specialization1'),$message);
							$message=str_replace('[course2]',$this->input->post('course2'),$message);
							$message=str_replace('[specialization2]',$this->input->post('specialization2'),$message);
							$message=str_replace('[term]',$this->input->post('term'),$message);
							$message=str_replace('[email]',$this->input->post('email'),$message);
							$message=str_replace('[mobile]',$this->input->post('mobile'),$message);
							$message=str_replace('[address]',$address,$message);
							$message=str_replace('[gre]',$gre,$message);
							$message=str_replace('[ielts_toefl]',$this->input->post('toefl_ielts'),$message);
							$message=str_replace('[ug_college]',$this->input->post('ugCollege'),$message);
							$message=str_replace('[ug_course]',$this->input->post('ugCourse'),$message);
							$message=str_replace('[ug_gpa]',$this->input->post('ugGpa'),$message);
							$message=str_replace('[ug_duration]',$this->input->post('ugPy'),$message);
							$message=str_replace('[pg_college]',$this->input->post('pgCollege'),$message);
							$message=str_replace('[pg_course]',$this->input->post('pgCourse'),$message);
							$message=str_replace('[pg_gpa]',$this->input->post('pgGpa'),$message);
							$message=str_replace('[pg_duration]',$this->input->post('pgPy'),$message);
							$message=str_replace('[company]',$this->input->post('company'),$message);
							$message=str_replace('[position]',$this->input->post('position'),$message);
							$message=str_replace('[tenure]',$this->input->post('tenure'),$message);



							$this->email->subject($subject);
							$this->email->message($message);

					//Number of documents to upload and send via email

							$filename = array(1 => '_passport',
							 	2 => '_gre_sc',
							 	3 => '_ielts_toefl_sc',
							 	4 => '_lors',
							 	5 => '_sop',
							 	6 => '_resume',
							 	7 => '_ug_transcript', 
							 	8 => '_ug_degree',
							 	9 => '_ug_marksheets',
							 	10 => '_pg_transcript', 
							 	11 => '_pg_degree',
							 	12 => '_pg_marksheets'
							 );



							$nodocs = 12;

						for($i=1; $i<=$nodocs; $i++){

							$fname = $name."_".$filename[$i];
						
							$file_data = $this->upload_file($i,$fname);

									if(is_array($file_data))
									  {

										$this->email->attach($file_data['full_path']);
									 }

							}//for

							  	if($this->email->send())
							         {
							          // if(delete_files($file_data['file_path']))
							          // {
							          //  $this->session->set_flashdata('message', 'Application Sended');
							          //  redirect('sendemail');
							          // }
							         	echo "Email sent";
							         	echo "nodocs:". $nodocs;

							         	$updated= $this->University_model->update_submitted_university($uid,$this->session->userdata['id']);
							         	$application = $this->University_model->insert_application($uid,$this->session->userdata['id']);
							         	if ($updated) {

									         		if($application){

									         			$data['result'] = $this->University_model->get_applications($this->session->userdata['id']);
									         			$data['stud_detail'] = $this->student_model->get_student_detail($uid,$this->session->userdata['id']);


									         			// print_r($data['result']);
									         		
									         		

											         		$this->load->view('header');
											         		$this->load->view('profile',$data);
											         		$this->load->view('js');
											         		$this->load->view('footer');
									         		} else {

									         			echo $application;
									         		}

							         	} else {

							         		echo $updated;
							         		}

							         	
							         } else {
						//mail sending

							          $this->email->error();

							         	echo $this->email->error()."  Email Not sent";
							          // }
							         }


				}  else {
//validation checking
								$this->session->set_flashdata('message', "<div class='alert alert-danger'>".validation_errors()." </div>");

								$this->session->set_userdata('university_id',$uid);


					     	  	redirect('/university/app_submited/','refresh');
						
					}				         

	}//logged in check

		   else{
			
			redirect('/login/', 'refresh');

		}


}//function



function upload_file($i,$filename)
 {
 	 
  $config['upload_path'] = 'uploads/';
  $config['allowed_types'] = 'doc|docx|pdf';
  //$config['max_size'] = '999999';
  $config['file_name'] = $filename;
  $this->load->library('upload', $config);
  if($this->upload->do_upload('doc'.$i))
  { 
    return $this->upload->data();   
  }
  else
  {
    return $this->upload->display_errors();
  }
 
 }//function


 function grad_schoolfinder(){

 	$this->load->view('header');
	$this->load->view('gradschool_finder');
	$this->load->view('js');
	$this->load->view('footer');
 }

function grad_school_finder_result(){

	$data['result']=$this->University_model->grad_school_result($this->input->post('course'));
	$data['grad_data']= array('course' =>$this->input->post('course') ,
								'gre_verbal' =>$this->input->post('gre_verbal_score') ,
								'gre_quants' =>$this->input->post('quant_score'),
								'eng_test' =>$this->input->post('en_test') ,
								'eng_test_score' =>$this->input->post('en_exam_score') ,
								'ug_score' =>$this->input->post('ug_exam_score') ,
								'work_exp' =>$this->input->post('work_experience_months')
	 );

	if($data['grad_data']['course']==''&& $data['grad_data']['ug_score']==''&& $data['grad_data']['eng_test']==''){

		redirect('grad_schoolfinder', 'refresh');
	}

 	$this->load->view('header');
	$this->load->view('grad_finder_result',$data);
	$this->load->view('js');
	$this->load->view('footer');
 }

 function university_course_wise(){

 	$course_id=$this->uri->segment(2);


 	$course_name = $this->University_model->get_course_name_by_id($course_id);

 	$data['uni_course'] = $this->University_model->university_course_wise($course_name['course_name']);


 	$this->load->view('header');
	$this->load->view('university_course_wise',$data);
	$this->load->view('js');
	$this->load->view('footer');
 }


 function admit_rejects(){

 	$data['uname'] = $this->University_model->get_univ_name();
 	$data['cname'] = $this->University_model->get_course_name();

 	$this->load->view('header');
	$this->load->view('admit_rejects',$data);
	$this->load->view('js');
	$this->load->view('footer');
 }

function admit_reject_result(){

	$univ = $this->input->post('university_name');
	$course = $this->input->post('course_name');
	$status = $this->input->post('status');

	$data['admit_rejects']=$this->University_model->get_a_r_result($univ,$course,$status);


}


}//class