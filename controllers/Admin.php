<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {


	function __construct()
	 {
	   parent::__construct();
	   
	   $this->load->model("Admin_model");
	   $this->load->helper('array');
	   $this->load->library('pagination');

	 }

	public function index()
	{
		if($this->session->userdata('admin_in')=='true')
		{
			
			redirect('student_status');
			
		 } else{

			redirect('signin','refresh');
		}
		
	}
 
 function search_university_status(){
 	if($this->session->userdata('admin_in')=='true'){
 		$data['university'] = $this->Admin_model->get_univ_name(); 

 		if(isset($_POST['search'])){
    		
	    	$data['universityids']=$this->Admin_model->get_university_by_id($this->input->post('university_id'));
	    	$this->load->view('admin/admin_header');
			$this->load->view('admin/admin_sidebar');
			$this->load->view('admin/search_univ_status',$data);
			$this->load->view('admin/admin_js');

	    	} else if(isset($_POST['view_all'])) {

			    	
			    	$data['universityids']=$this->Admin_model->get_univ_name();
			    	$this->load->view('admin/admin_header');
					$this->load->view('admin/admin_sidebar');
					$this->load->view('admin/search_univ_status',$data);
					$this->load->view('admin/admin_js');

	    	} else{
	    			
			    	$data['universityids']=$this->Admin_model->get_univ_name();
			    	$this->load->view('admin/admin_header');
					$this->load->view('admin/admin_sidebar');
					$this->load->view('admin/search_univ_status',$data);
					$this->load->view('admin/admin_js');
	    	}

 	} else{
 		redirect('signin','refresh');
 	}
 } 

  function search_student_status(){
 	if($this->session->userdata('admin_in')=='true'){
 		
 		$data['student_name'] = $this->Admin_model->get_student_name(); 
 			
			if(isset($_POST['search'])){

    		
	    	$data['studentids']=$this->Admin_model->get_student_by_id($this->input->post('student_id'));
	    	$this->load->view('admin/admin_header');
			$this->load->view('admin/admin_sidebar');
			$this->load->view('admin/search_stud_status',$data);
			$this->load->view('admin/admin_js');

	    	} else if(isset($_POST['view_all'])) {

			    	
			    	$data['studentids']=$this->Admin_model->get_student_name();
			    	$this->load->view('admin/admin_header');
					$this->load->view('admin/admin_sidebar');
					$this->load->view('admin/search_stud_status',$data);
					$this->load->view('admin/admin_js');

	    	} else{
	    			
			    	$data['studentids']=$this->Admin_model->get_student_name();
			    	$this->load->view('admin/admin_header');
					$this->load->view('admin/admin_sidebar');
					$this->load->view('admin/search_stud_status',$data);
					$this->load->view('admin/admin_js');
	    	}




 	} else{
 		redirect('signin','refresh');
 	}
 } 


	function student_status(){

		if($this->session->userdata('admin_in')=='true')
		{
						

			$data["result"] = $this->Admin_model->get_student_apps();
						
			$this->load->view('admin/admin_header');
			$this->load->view('admin/admin_sidebar');
			$this->load->view('admin/status',$data);
			$this->load->view('admin/admin_js');
		} else{

			redirect('signin','refresh');
		}
	}


	function update_student_status(){

    if($this->session->userdata('admin_in')=='true')
		{
			
			$this->load->library('form_validation');
			$this->form_validation->set_rules('stud_name', 'Student Name', 'required');
			$this->form_validation->set_rules('university_name', 'University Name', 'required');
		    $this->form_validation->set_rules('course1', 'Course Preference 1', 'required');
		    $this->form_validation->set_rules('term', 'Course Preference 1', 'required');
		    $this->form_validation->set_rules('application_status', 'Application Status', 'required');
		    $this->form_validation->set_rules('decision', 'Decision', 'required');

		    
		    if($this->form_validation->run()){

		    	$app_id = $this->input->post('app_id');


		    	$status=$this->Admin_model->update_student_apps_by_id($app_id);

		    	if($status){

		    			$this->session->set_flashdata('success','Application Status Updated Succesfully');
		    			if(isset($_POST['univer'])){
		    				redirect('search_university_status','refresh');
		    			} else if(isset($_POST['studi'])){
		    				redirect('search_student_status','refresh');
		    			}

		    	} else{
     //updated or not
		    			$this->session->set_flashdata('error','Error in Updating Application Status, Try Again');
		    			if(isset($_POST['univer'])){
		    				redirect('search_university_status','refresh');
		    			} else if(isset($_POST['studi'])){
		    				redirect('search_student_status','refresh');
		    			}

		    	}

		    		

		    } else{
//form validation check()

		    	$this->session->set_flashdata('error',''. validation_errors());
		    	if(isset($_POST['univer'])){
		    				redirect('search_university_status','refresh');
		    			} else if(isset($_POST['studi'])){
		    				redirect('search_student_status','refresh');
		    			}

		    }
			
		} else{
//logged in check

			redirect('signin','refresh');
		}

	}


	function delete_student_status(){

		if($this->session->userdata('admin_in')=='true')
		{
			$id = $this->input->post('app_id');
			$status = $this->Admin_model->delete_student_status($id);

			if($status){

		    			$this->session->set_flashdata('success','Application Status Deleted Succesfully');
		    				
		    	} else{
     //updated or not
		    			$this->session->set_flashdata('error','Error in Deleting Application Status, Try Again');
		    			
		    	}

		    	if(isset($_POST['del_univer'])){
		    				redirect('search_university_status','refresh');
		    			} else if(isset($_POST['del_studi'])){
		    				redirect('search_student_status','refresh');
		    			}

		} else{
			redirect('signin','refresh');
		}

	}

	function add_university_name(){

		if($this->session->userdata('admin_in')=='true')
		{

			$data['university']=$this->Admin_model->get_univ_name();

			$this->load->view('admin/admin_header');
			$this->load->view('admin/admin_sidebar');
			$this->load->view('admin/adduniv_name',$data);
			$this->load->view('admin/admin_js');
		} else{

			redirect('signin','refresh');
		}
	}


function insert_university_name(){

		if($this->session->userdata('admin_in')=='true')
		{

			$this->load->library('form_validation');

			$number = count($this->input->post('uname'));

			if($number>0){
				$counter = 0;
				for($i=0;$i<$number;$i++){

					$userdata = array(
				      'university_name' => ucwords(strtolower($_POST['uname'][$i])),
				      'campus' =>ucwords(strtolower($_POST['campus'][$i])),
				      'location'=>ucwords(strtolower($_POST['location'][$i])),
				      'description'=>$_POST['university_details'][$i],
				      'tuition_fees'=>$_POST['tuition_fees'][$i]      
				    );

					$status = $this->Admin_model->insert_university_name($userdata);
					if($status){
						$counter++;
					}
				}
			}
			if($number==$counter)
			{
						$this->session->set_flashdata('success', "University Details Added Succesfully");
							
			} else{

						 $this->session->set_flashdata('error', "Error in adding University Details Please Try Again");
				}//else

					redirect('add_university','refresh');
			
		 
		 } else{
	//1st if() logged in validation
					redirect('signin','refresh');
				}//1st else

	}//function




	function show_add_university(){

		if($this->session->userdata('admin_in')=='true')
		{
			redirect('/admin/add_university/','refresh');
		 } else{

			redirect('signin','refresh');
		}
	}

	function add_university(){

		if($this->session->userdata('admin_in')=='true')
		{

			$data['university']=$this->Admin_model->get_university_list();

			$this->load->view('admin/admin_header');
			$this->load->view('admin/admin_sidebar');
			$this->load->view('admin/adduni',$data);
			$this->load->view('admin/admin_js');
		} else{

			redirect('signin','refresh');
		}
	}




	function insert_university(){

		if($this->session->userdata('admin_in')=='true')
		{

			$this->load->library('form_validation');
			$this->form_validation->set_rules('uname', 'University Name', 'required');
			$this->form_validation->set_rules('uaddress', 'University Location', 'required');
		    $this->form_validation->set_rules('univ_details', 'University Details', 'required');
		    $this->form_validation->set_rules('gre_score', 'GRE Score', 'required');
		    $this->form_validation->set_rules('quants_score', 'GRE Score', 'required');
		    $this->form_validation->set_rules('verbal_score', 'GRE Score', 'required');
		    $this->form_validation->set_rules('toefl_score', 'TOEFL Score', 'required');
		    $this->form_validation->set_rules('ielts_score', 'IELTS Score', 'required');
		    $this->form_validation->set_rules('gpa', 'UG-GPA', 'required');
		   			

			if ($this->form_validation->run())
		  	{

		  		$status= $this->Admin_model->insert_university();


					if($status)
					{
						$this->session->set_flashdata('success', "University Added Succesfully");
							
					} else{

						 $this->session->set_flashdata('error', "Error in adding University Please Try Again");
					}//else
					redirect('/admin/add_university/','refresh');
			
		  		
		    }//2nd if

			else {

					$this->session->set_flashdata('error', validation_errors());
		     	  redirect('/admin/add_university/','refresh');
			
				}//2nd else




		 } else{
//1st if() logged in validation
					redirect('signin','refresh');
				}//1st else
	}//function


	function add_user(){

		if($this->session->userdata('admin_in')=='true')
		{

			$data['admin']=$this->Admin_model->admin_list();

			$this->load->view('admin/admin_header');
			$this->load->view('admin/admin_sidebar');
			$this->load->view('admin/adduser',$data);
			$this->load->view('admin/admin_js');

			} else{

			redirect('signin','refresh');
		}
	}


function insert_user(){
	if($this->session->userdata('admin_in')=='true')
		{

			$count = count($this->input->post('email'));

			$counter = 0;

			for($i=0;$i<$count;$i++){
				$username = $_POST['email'][$i];
				$name = $_POST['name'][$i];
				$password = $_POST['password'][$i];
				$password2 = $_POST['password2'][$i];
				if($password===$password2){

					$status = $this->Admin_model->insert_user();

					if($status){
						$counter++;
					}

				} else{
					$this->session->set_flashdata('error',"Password doesnot Match" );
					redirect('add_user');
				}
			}
		

		if($count==$counter)
					{
						$this->session->set_flashdata('success', "Data Added Succesfully");
							
					} else{

						 $this->session->set_flashdata('error', "First ".$counter." Users were Added Only");
					}//else

					redirect('add_user');

		} else{

			redirect('signin','refresh');
	}
	
}//function


function update_user(){
	if($this->session->userdata('admin_in')=='true')
		{
			
			$this->load->library('form_validation');

			$this->form_validation->set_rules('name','Name is required','required');
			$this->form_validation->set_rules('email','Email is required','required');
			$this->form_validation->set_rules('password','Password is required','required');

		if($this->form_validation->run()!=false){
			$id = $this->input->post('user_id');	
				
			$status = $this->Admin_model->update_user($id);

			if($status)
			{
					$this->session->set_flashdata('success', "Data Updated Succesfully");
								
			} else{

					$this->session->set_flashdata('error', "Error while updating User, Please Try Again");
				}//else

						 redirect('add_user');

		} else{
			$this->session->set_flashdata('error',validation_errors());
				 redirect('add_user');
		}	
			
		

		} else{

			redirect('signin','refresh');
	}
	
}//function


function delete_user(){

	if($this->session->userdata('admin_in')=='true'){
		$id = $this->input->post('user_id');
		$status = $this->Admin_model->delete_user($id);

		if($status){
			$this->session->set_flashdata('success','User Deleted Succesfully');

		} else{
			$this->session->set_flashdata('error','User not Deleted , Please Try Again');
		}

		redirect('add_user');

	} else{
		redirect('signin','refresh');
	}

}


function add_admit_rejects(){

		if($this->session->userdata('admin_in')=='true')
		{

			$data['admit_rejects']=$this->Admin_model->get_admit_reject();

			$this->load->view('admin/admin_header');
			$this->load->view('admin/admin_sidebar');
			$this->load->view('admin/add_admit_rejects',$data);
			$this->load->view('admin/admin_js');

			} else{

			redirect('signin','refresh');
		}
	}



function insert_admit_rejects(){
	if($this->session->userdata('admin_in')=='true')
		{

			$this->load->library('form_validation');

			$number = count($this->input->post('status'));

			if($number>0){
				$counter = 0;
				for($i=0;$i<$number;$i++){

					$arraydata = array( 'student_name' => ucwords(strtolower($_POST['student_name'][$i])),
                            'university_name' => ucwords(strtolower($_POST['university_name'][$i])),
                            'course_name' => ucwords(strtolower($_POST['course_name'][$i])),
                            'term' => ucwords(strtolower($_POST['term'][$i])),
                            'gre' => $_POST['gre'][$i],
                            'eng_test_name' => strtoupper($_POST['eng_test_name'][$i]),
                            'eng_test_score' => $_POST['eng_test_score'][$i],
                            'ug_cgpa' => $_POST['ug_cgpa'][$i],
                            'work_exp' => $_POST['work_exp'][$i],
                            'ar_status' => $_POST['status'][$i]
                             );

					$status = $this->Admin_model->insert_admit_rejects($arraydata);
					if($status){
						$counter++;
					}
				}
			}

				if($number==$counter)
					{
						$this->session->set_flashdata('success', "Data Added Succesfully");
							
					} else{

						 $this->session->set_flashdata('error', "Error in adding Admit Reject Data- Try Again ");
					}//else
					redirect('admit_reject_display','refresh');

		} else{

			redirect('signin','refresh');
		}
	
}//function


function update_admit_rejects(){
	if($this->session->userdata('admin_in')=='true')
		{

			$this->load->library('form_validation');
			$this->form_validation->set_rules('student_name', 'Student Name', 'required');
			$this->form_validation->set_rules('university_name', 'University Name', 'required');
			$this->form_validation->set_rules('course_name', 'Course Name', 'required');
			$this->form_validation->set_rules('term', 'Term', 'required');
			$this->form_validation->set_rules('gre', 'GRE Score', 'required');
			$this->form_validation->set_rules('eng_test_name', 'English Test name', 'required');
			$this->form_validation->set_rules('eng_test_score', 'English Test Score', 'required');
			$this->form_validation->set_rules('ug_cgpa', 'Under Grad-CGPA', 'required');
			$this->form_validation->set_rules('work_exp', 'Work Experience', 'required');
			$this->form_validation->set_rules('status', 'Status', 'required');

			

			if ($this->form_validation->run()==FALSE)
		  	{

		     	    	$this->session->set_flashdata('error', validation_errors());
		     	    
					redirect('admit_reject_display','refresh');
		    }//if

			else {
					$status = $this->Admin_model->update_admit_rejects();

					if($status)
					{
						$this->session->set_flashdata('success', "Data Updated Succesfully");
							
					} else{

						 $this->session->set_flashdata('error', "Error in Updating Admit Reject Data- Try Again ");
					}//else
					redirect('admit_reject_display','refresh');

				}//else

		} else{

			redirect('signin','refresh');
	}
	
}//function



function delete_admit_reject(){

	if($this->session->userdata('admin_in')=='true')
		{

			$id = $this->input->post('id');

			$delete = $this->Admin_model->delete_admit_reject($id);

			if ($delete =='false')
				  	{

				     	    	$this->session->set_flashdata('error', "Error in adding Admit Reject Data- Try Again ");
				     	    
							redirect('admit_reject_display','refresh');
				    }//if

					else {
								$this->session->set_flashdata('success', "Data Deleted Succesfully");
							
							redirect('admit_reject_display','refresh');

						}//else

		} else{

			redirect('signin','refresh');
	}


}

	function add_images(){

		if($this->session->userdata('admin_in')=='true')
		{

			$data['university_images'] = $this->Admin_model->show_university_images();

			$data['university_name']=$this->Admin_model->get_univ_name();

			$this->load->view('admin/admin_header');
			$this->load->view('admin/admin_sidebar');
			$this->load->view('admin/addimg',$data);
			$this->load->view('admin/admin_js');

			} else{

			redirect('signin','refresh');
		}
	}


function insert_images(){

if($this->session->userdata('admin_in')=='true')
	{	
	
		$status = $this->Admin_model->insert_images();
		if($status)
			{
						$this->session->set_flashdata('success', "<div class='alert alert-success'> Images Added Succesfully </div>");
							
			} else 
				{
							
							$this->session->set_flashdata('error', "<div class='alert alert-danger'>Error in adding Images Please Try Again </div>");
				}

				redirect('univ_images','refresh');
	} else{

			redirect('signin','refresh');
		}

}

function update_images(){

if($this->session->userdata('admin_in')=='true')
	{	
		$id = $this->input->post('image_id');

		if($_FILES['img21']['name']==''){
        $main_img = $this->input->post('img2');
      } else if($_FILES['img21']['name']!=''){
        $main_img = $this->upload_files('img21')['file_name'] ;
      }

       if($_FILES['img11']['name']==''){
        $logo = $this->input->post('img1');
      } else if($_FILES['img11']['name']!=''){
        $logo = $this->upload_files('img11')['file_name'] ;
      }

      if($_FILES['img31']['name']==''){
        $sl_image_1 = $this->input->post('img3');
      } else if($_FILES['img31']['name']!=''){
        $sl_image_1 = $this->upload_files('img31')['file_name'] ;
      }

      if($_FILES['img41']['name']==''){
        $sl_image_2 = $this->input->post('img4');
      } else if($_FILES['img41']['name']!=''){
        $sl_image_2 = $this->upload_files('img41')['file_name'] ;
      }

      if($_FILES['img51']['name']==''){
        $sl_image_3 = $this->input->post('img5');
      } else if($_FILES['img51']['name']!=''){
        $sl_image_3 = $this->upload_files('img51')['file_name'] ;
      }

      if($_FILES['img61']['name']==''){
        $sl_image_4 = $this->input->post('img6');
      } else if($_FILES['img61']['name']!=''){
        $sl_image_4 = $this->upload_files('img61')['file_name'] ;
      }

      if($_FILES['img71']['name']==''){
        $sl_image_5 = $this->input->post('img7');
      } else if($_FILES['img71']['name']!=''){
        $sl_image_5 = $this->upload_files('img71')['file_name'] ;
      }
	
		$status = $this->Admin_model->update_images($id,$main_img,$logo,$sl_image_1,$sl_image_2, $sl_image_3, $sl_image_4, $sl_image_5);
		if($status)
			{
						$this->session->set_flashdata('success', "<div class='alert alert-success'> Images Updated Succesfully </div>");
							
			} else 
				{
						$this->session->set_flashdata('error', "<div class='alert alert-danger'>Error in updating Images Please Try Again </div>");
				}

				 redirect('univ_images','refresh');
	} else{

			redirect('signin','refresh');
		}

}

function delete_images(){
	if($this->session->userdata('admin_in')=='true')
	{	
		$id = $this->input->post('image_id');
	
		$status = $this->Admin_model->delete_univ_image($id);
		if($status)
			{
						$this->session->set_flashdata('success', "<div class='alert alert-success'> Images Deleted Succesfully </div>");
							
			} else 
				{
						$this->session->set_flashdata('error', "<div class='alert alert-danger'>Error in Deleting Images Please Try Again </div>");
				}

				redirect('univ_images','refresh');
	} else{

			redirect('signin','refresh');
		}
}

function upload_files($i)
 {
 
    $config['upload_path'] = 'universityImages';
    $config['allowed_types'] = 'jpg|jpeg|png|gif|webp';
    $this->load->library('upload', $config);
    // if($this->upload->do_upload('img'.$i))
    if($this->upload->do_upload($i))
    {
      return $this->upload->data();   
    }
    else
    {
      return $this->upload->display_errors();
    }
 }

function show_update_stud_status(){

		if($this->session->userdata('admin_in')=='true')
		{
			redirect('/admin/update_stud_status/','refresh');
		 } else{

			redirect('signin','refresh');
		}
	}

	
	function update_stud_status(){

		if($this->session->userdata('admin_in')=='true')
		{

			$this->load->view('admin/admin_header');
			$this->load->view('admin/admin_sidebar');
			$this->load->view('admin/updatestatus');
			$this->load->view('admin/admin_js');

			} else{

			redirect('signin','refresh');
		}
	}


function show_add_news(){

		if($this->session->userdata('admin_in')=='true')
		{
			redirect('/admin/add_news/','refresh');
		 } else{

			redirect('signin','refresh');
		}
	}

	
	function add_news(){

		if($this->session->userdata('admin_in')=='true')
		{

			$data['news']=$this->Admin_model->get_news();

			$this->load->view('admin/admin_header');
			$this->load->view('admin/admin_sidebar');
			$this->load->view('admin/addnews',$data);
			$this->load->view('admin/admin_js');

			} else{

			redirect('signin','refresh');
		}
	}

function insert_news(){

if($this->session->userdata('admin_in')=='true')
	{	
	
		$status = $this->Admin_model->insert_news();
		if($status=='true')
					{
						$this->session->set_flashdata('message', "<div class='alert alert-success'> News Added Succesfully </div>");
							
					} else 
					{
							
							$this->session->set_flashdata('message', "<div class='alert alert-danger'>Error in adding News Please Try Again </div>");
					}

					
					redirect('/admin/add_news/','refresh');
	}
	else{

			redirect('signin','refresh');
		}

}//function


	
	function add_benefits(){

		if($this->session->userdata('admin_in')=='true')
		{
			$data['benefits']=$this->Admin_model->show_benefits();
			$data['university_name']=$this->Admin_model->get_univ_name();

			$this->load->view('admin/admin_header');
			$this->load->view('admin/admin_sidebar');
			$this->load->view('admin/addbenefits',$data);
			$this->load->view('admin/admin_js');

			} else{

			redirect('signin','refresh');
		}
	}

function insert_benefits(){

if($this->session->userdata('admin_in')=='true')
	{	
	
		$status = $this->Admin_model->insert_benefits();
		if($status=='true')
					{
						$this->session->set_flashdata('success', "<div class='alert alert-success'> Benefits Added Succesfully </div>");
							
					} else if($status=='false')
					{
							
							$this->session->set_flashdata('error', "<div class='alert alert-danger'>Error in adding Benefits Please Try Again </div>");
					}

					else{
							$this->session->set_flashdata('error', "<div class='alert alert-danger'> Benefits already added for this University</div>");
						 
					}//else
					redirect('benefits','refresh');
	}
	else{

			redirect('signin','refresh');
		}

}


function update_benefits(){

if($this->session->userdata('admin_in')=='true')
	{	
		
		$id = $this->input->post('benefit_id');
		$status = $this->Admin_model->update_benefits($id);
		if($status)
			{
						$this->session->set_flashdata('success', "<div class='alert alert-success'> Benefits Added Succesfully </div>");
							
			} else{
							
							$this->session->set_flashdata('error', "<div class='alert alert-danger'>Error in adding Benefits Please Try Again </div>");
					}

					
					redirect('benefits');
	} else{

			redirect('signin','refresh');
		}

}


function delete_benefits(){
	if($this->session->userdata('admin_in')=='true'){
		$id = $this->input->post('benefit_id');
		$status = $this->Admin_model->delete_benefits($id);

		if($status){
			$this->session->set_flashdata('success','Benefits Deleted Successfully');
		} else{
			$this->session->set_flashdata('error','Error in Deleting Benefits');
		}
		redirect('benefits','refresh');

	} else{
		redirect('signin','refresh');
	}
}


function add_course_group(){

		if($this->session->userdata('admin_in')=='true')
		{
			$data['course_group'] = $this->Admin_model->get_course_group();

			$this->load->view('admin/admin_header');
			$this->load->view('admin/admin_sidebar');
			$this->load->view('admin/addcourse_group',$data);
			$this->load->view('admin/admin_js');

		} else{

			redirect('signin','refresh');
		}
}

function insert_course_group(){

if($this->session->userdata('admin_in')=='true')
	{	
		
		$number = count($this->input->post('course_name'));
		if($number>0){
			$counter=0;
			for($i=0;$i<$number;$i++){
				$arraydata = array(
					'course_group_name'=>$_POST['course_name'][$i],
					'course_group_details'=>$_POST['course_details'][$i]
				);

				$status = $this->Admin_model->insert_course_group($arraydata);
				if($status){
					$counter++;
				}
			}
		

		if($counter==$number)
					{
						$this->session->set_flashdata('success', "Course Added Succesfully");
							
					} else 
					{							
						$this->session->set_flashdata('error', "Error in adding Courses Please Try Again");
					}
		}// if($number>0)
					
			redirect('add_course_group','refresh');

	} else{

			redirect('signin','refresh');
		}

}//function



function update_course_group(){
	if($this->session->userdata('admin_in')=='true')
	{	
		$id=$this->input->post('course_id');
		$status = $this->Admin_model->update_course_group($id);

		if($status){
			$this->session->set_flashdata('success','Updated Successfully');
		} else{
			$this->session->set_flashdata('error','Error in Updating Course Group');
		}

		redirect('add_course_group','refresh');
		
	} else{

		redirect('signin','refresh');
	}
	
}

function delete_course_group(){
	if($this->session->userdata('admin_in')=='true'){
		$id = $this->input->post('course_id');
		$status = $this->Admin_model->delete_course_group($id);

		if($status){
			$this->session->set_flashdata('success','Course Group Deleted Successfully');
		} else{
			$this->session->set_flashdata('error','Error in Deleting Course Name');
		}
		redirect('add_course_group','refresh');

	} else{
		redirect('signin','refresh');
	}
}



	
function add_courses(){

		if($this->session->userdata('admin_in')=='true')
		{
			$data['course'] = $this->Admin_model->get_course_name();

			$this->load->view('admin/admin_header');
			$this->load->view('admin/admin_sidebar');
			$this->load->view('admin/addcourse',$data);
			$this->load->view('admin/admin_js');

		} else{

			redirect('signin','refresh');
		}
}

function insert_courses(){

if($this->session->userdata('admin_in')=='true')
	{	
		
		$number = count($this->input->post('course_name'));
		if($number>0){
			$counter=0;
			for($i=0;$i<$number;$i++){
				$arraydata = array(
					'course_name'=>$_POST['course_name'][$i],
					'course_description'=>$_POST['course_details'][$i]
				);

				$status = $this->Admin_model->insert_courses($arraydata);
				if($status){
					$counter++;
				}
			}
		

		if($counter==$number)
					{
						$this->session->set_flashdata('success', "Course Added Succesfully");
							
					} else 
					{							
						$this->session->set_flashdata('error', "Error in adding Courses Please Try Again");
					}
		}// if($number>0)
					
			redirect('add_course','refresh');

	} else{

			redirect('signin','refresh');
		}

}//function



function update_courses(){
	if($this->session->userdata('admin_in')=='true')
	{	
		$id=$this->input->post('course_id');
		$status = $this->Admin_model->update_courses($id);

		if($status){
			$this->session->set_flashdata('success','Updated Successfull');
		} else{
			$this->session->set_flashdata('error','Error in Updating Course');
		}

		redirect('add_course','refresh');
		
	} else{

		redirect('signin','refresh');
	}
	
}

function delete_course(){
	if($this->session->userdata('admin_in')=='true'){
		$id = $this->input->post('course_id');
		$status = $this->Admin_model->delete_course($id);

		if($status){
			$this->session->set_flashdata('success','Course Deleted Successfully');
		} else{
			$this->session->set_flashdata('error','Error in Deleting Course Name');
		}
		redirect('add_course','refresh');

	} else{
		redirect('signin','refresh');
	}
}



function update_university_name(){
	if($this->session->userdata('admin_in')=='true')
	{	
		$this->load->library('form_validation');

		$this->form_validation->set_rules('university_name','University Name','required');
		$this->form_validation->set_rules('university_details','Description','required');
		$this->form_validation->set_rules('location','Location','required');
		$this->form_validation->set_rules('campus','Campus','required');
		$this->form_validation->set_rules('tuition_fees','Tuition Fees','required');

		if($this->form_validation->run()){
			$this->load->model('Admin_model');
			$university_id = $this->input->post('university_id');
			$status = $this->Admin_model->update_university_name($university_id );

			if($status)
					{
						$this->session->set_flashdata('success', "University Details Updated Succesfully");
							
					} else{

						 $this->session->set_flashdata('error', "Error in Updating University Details Please Try Again");
					}//else

					redirect('add_university','refresh');

		} else{
			$this->session->set_flashdata('error', validation_errors());
		     	    
			redirect('add_university','refresh');
		}

	} else{
		redirect('signin','refresh');
	}

}

function delete_university_name(){
	if($this->session->userdata('admin_in')=='true')
	{	
		$this->load->model('Admin_model');
		$university_id = $this->input->post('university_id');


		$status = $this->Admin_model->delete_univ_name($university_id);

		if($status)
					{
						$this->session->set_flashdata('success', "University Details Deleted Succesfully");
							
					} else{

						 $this->session->set_flashdata('error', "Error in Deleting University Details Please Try Again");
					}//else

					redirect('add_university','refresh');


	} else{
		redirect('signin','refresh');
	}

}


function add_university_complete_details(){

		if($this->session->userdata('admin_in')=='true')
		{
			$data['university_details']=$this->Admin_model->show_university_details();
			$data['university_name']=$this->Admin_model->get_univ_name();
			$data['course_group']=$this->Admin_model->get_course_group();

			$this->load->view('admin/admin_header');
			$this->load->view('admin/admin_sidebar');
			$this->load->view('admin/group_all_info',$data);
			$this->load->view('admin/admin_js');

			} else{

			redirect('signin','refresh');
		}
	}

	function insert_university_complete_details(){
		if($this->session->userdata('admin_in')=='true')
		{ 
			$status = $this->Admin_model->insert_university_data();

			if($status){
				$this->session->set_flashdata('success','University Data Inserted Succesfully');
			} else {
				$this->session->set_flashdata('error','Error while Inserting Data, Please Try Again');

			}

			redirect('univ_details');

		} else{
			redirect('signin','refresh');
		}


	}

	function update_university_complete_details(){
		if($this->session->userdata('admin_in')=='true')
		{ 
			$id = $this->input->post('univ_detail_id');
			$status = $this->Admin_model->update_university_data($id);

			if($status){
				$this->session->set_flashdata('success','University Data Updated Succesfully');
			} else{
				$this->session->set_flashdata('error','Error while Updating Data, Please Try Again');

			}

			redirect('univ_details');

		} else{
			redirect('signin','refresh');
		}


	} 

	function delete_university_complete_details(){
		if($this->session->userdata('admin_in')=='true')
		{ 
			$id = $this->input->post('univ_detail_id');
			$status = $this->Admin_model->delete_university_data($id);

			if($status){
				$this->session->set_flashdata('success','University Data Deleted Succesfully');
			} else {
				$this->session->set_flashdata('error','Error while Deleting Data, Please Try Again');

			}

			redirect('univ_details');

		} else{
			redirect('signin','refresh');
		}

	}

	
}//class
