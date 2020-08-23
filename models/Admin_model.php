<?php
Class Admin_model extends CI_Model
{

  // function __construct()
  //  {
  //    parent::__construct();
  //    $this->load->database();
  //    // $this->load->helper('url');
  //    $this->load->model("student_model");
  //    $this->load->helper('array');
     
  //  }
function login($username, $password)
{



    $this->db->where('username', $username);
    $this->db->where('password', $password);
    $this->db->limit(1);
    $query = $this->db->get('admin');


    if($query->num_rows()==1){
        $admin=$query->row_array();
        if($admin['username']!=''){

          return array('status'=>'true', 'admin_data'=>$admin);
        }
        else{
          return array('status'=>'false','message'=>'Invalid Logins');
        }
    }

    else{
      return array('status'=>'false','message'=>'Invalid Logins');
    }


}

function get_university_details(){
  
    
    $this->db->join('benefit','benefit.b_id=university.benefit_id');
    $this->db->join('univ_image','univ_image.u_image_id=university.img_id');
    $this->db->order_by('university.u_name');
    $query=$this->db->get('university');

    return $query->result_array();

}
 
  function get_university_list()
  {

      $query=$this->db->get('university');

      if($query){

        return $query->result_array();

      }

      else {

        return 'false';

      }
      

  }


function get_univ_name()
  {
      $this->db->order_by('university_name','ASC');
      $query=$this->db->get('university_name');
        return $query->result_array();
        

  }

  function get_university_by_id($id){
  	
    $this->db->where('u_name_id',$id);
    $query=$this->db->get('university_name');
    return $query->result_array();
}

  function get_student_name(){
    $this->db->order_by('stud_fname','ASC');
    $query=$this->db->get('student_details');

    return $query->result_array();
  }

function get_student_by_id($id){
    $this->db->where('stud_id',$id);
    $query=$this->db->get('student_details');
    return $query->result_array();
}

  function university_list()
  {

  		$query=$this->db->query("select * from university join course on university.course_id=course.id join benefit on university.benefit_id=benefit.b_id
	 ");
      $this->db->join('co');
      $query = $this->db->get('university');
  		return $query->result_array();


  }

  function get_university($u_id)
  {

  		$query=$this->db->query("select * from university	where u_id = $u_id");

     
  		return $query->row_array();

  }

function get_student_apps(){
  
    // $this->db->limit($limit, $start);
    $this->db->join('university_name','university_name.u_name_id=submitted_applications.university_id');
    $this->db->join('student_details','student_details.stud_id=submitted_applications.stud_id');
    $this->db->order_by('student_details.stud_fname');
    
    $query=$this->db->get('submitted_applications');

    return $query->result_array();

}

function get_student_apps_by_id($app_id){

    $this->db->join('university','university.u_id=submitted_applications.university_id');
    $this->db->join('student_details','student_details.stud_id=submitted_applications.stud_id');
    $this->db->order_by('student_details.stud_fname');
    $this->db->where('app_id',$app_id);
    $query=$this->db->get('submitted_applications');

    return $query->row_array();

}

function update_student_apps_by_id($app_id){

  $arraydata = array('course_1' => $this->input->post('course1'),
  'specialization_1' => $this->input->post('specialization_1'),
  'course_2' => $this->input->post('course2'),
  'specialization_2' => $this->input->post('specialization_2'),
  'term' => $this->input->post('term'),
  'app_status' => $this->input->post('application_status'),
  'decision' => $this->input->post('decision')
  );

    
    $this->db->where('app_id',$app_id);
    $query=$this->db->update('submitted_applications',$arraydata);

   return ($this->db->affected_rows()>0) ? true : false;
}


function delete_student_status($id){

  $this->db->where('app_id',$id);
  $this->db->delete('submitted_applications');
  return ($this->db->affected_rows()>0) ? true : false;

}

function count_applications(){

  return $this->db->count_all("submitted_applications");

}

function count_university(){

  $this->db->join('benefit','benefit.b_id=university.benefit_id');
    $this->db->join('univ_image','univ_image.u_image_id=university.img_id');
   
    $query=$this->db->get('university')->result_array();

  return count($query);

}


function admin_list(){

  $admin = $this->db->get('admin');

  if($admin){

      return $admin->result_array();
  }
  
  else{

      return 'false';
  }

}


  function insert_user()
  {

      
      $userdata=array(
        'username'=>$this->input->post('email'),
        'name'=>$this->input->post('name'),
        'password'=>$this->input->post('password')
        
      );

      // $email = $this->input->post('email');

      // echo $email;

      //     $data=array(
      //                   'email'=>$email
      //               );


      $this->db->insert('admin', $userdata);

      
      
//Added code - start  emailing code

// if($this->db->insert('student_details', $userdata1)){

      
//     $this->load->library('email');


//     if($this->config->item('protocol')=="smtp"){
//       $config['protocol'] = 'smtp';
//       $config['smtp_host'] = $this->config->item('smtp_hostname');
//       $config['smtp_user'] = $this->config->item('smtp_username');
//       $config['smtp_pass'] = $this->config->item('smtp_password');
//       $config['smtp_port'] = $this->config->item('smtp_port');
//       $config['smtp_timeout'] = $this->config->item('smtp_timeout');
//       $config['mailtype'] = $this->config->item('smtp_mailtype');
//       $config['starttls']  = $this->config->item('starttls');
//        $config['newline']  = $this->config->item('newline');
      
//       $this->email->initialize($config);
//     }
//       $fromemail=$this->config->item('fromemail');
//       $fromname=$this->config->item('fromname');
//       $subject=$this->config->item('activation_subject');
//       $message=$this->config->item('activation_message');
//       $message=str_replace('[first_name]',$this->input->post('fname'),$message);

//       $message=str_replace('[email]',$this->input->post('email'),$message);
//       $message=str_replace('[password]',$this->input->post('password'),$message);
//       $toemail=$this->input->post('email');
       
//       $this->email->to($toemail);
//       $this->email->from($fromemail, $fromname);
//       $this->email->subject($subject);
//       $this->email->message($message);
//       if(!$this->email->send()){
//        print_r($this->email->print_debugger());
//       exit;
//       } 

//Added code - end

      return($this->db->affected_rows()>0)? true : false;
  }//function



  function update_user($id)
  {
      
      
      $userdata=array(
        'username'=>$this->input->post('email'),
        'name'=>$this->input->post('name'),
        'password'=>$this->input->post('password')
        
      );

      $this->db->where('id',$id);
      $this->db->update('admin', $userdata);

      return ($this->db->affected_rows()>0) ? true : false;


  }

  function delete_user($id)
  {
             
      $this->db->where('id',$id);
      $this->db->delete('admin');
      return ($this->db->affected_rows()>0) ? true : false;


  }


function insert_university_name($userdata){
 

   $this->db->insert('university_name', $userdata);

      return ($this->db->affected_rows() != 1) ? false : true;

}


function update_university_name($university_id ){
    $userdata = array(      
      'campus' =>ucwords(strtolower($this->input->post('campus'))),
      'location'=>ucwords(strtolower($this->input->post('location'))),
      'description'=>$this->input->post('university_details'),
      'tuition_fees'=>$this->input->post('tuition_fees')      
    );
  $this->db->where('u_name_id',$university_id );
   $this->db->update('university_name', $userdata);

      return ($this->db->affected_rows() != 1) ? false : true;
}

function delete_univ_name($university_id){
  $this->db->where('u_name_id',$university_id);
  return ($this->db->delete('university_name')) ? true : false;
}

function insert_course_name(){

  $userdata = array(

      'course_name' => $this->input->post('cname')
      
    );

   if($this->db->insert('course_name', $userdata)){

       return true;
          
    } else{
      
      return false;
    }

}



function insert_university(){

  $userdata = array(

      'u_name' => $this->input->post('uname'),
      'u_address' => $this->input->post('uaddress'),
      'u_details' => $this->input->post('univ_details'),
      'gre_score' => $this->input->post('gre_score'),
      'quants_score' => $this->input->post('quants_score'),
      'verbal_score' => $this->input->post('verbal_score'),
      'toefl_score' => $this->input->post('toefl_score'),
      'ielts_score' => $this->input->post('ielts_score'),
      'gpa' => $this->input->post('gpa')

    );

   if($this->db->insert('university', $userdata)){

       return true;
          
    } else{
      
      return false;
    }

}

function show_university_images(){

  $this->db->join('university_name','univ_image.university_id=university_name.u_name_id');

  $query = $this->db->get('univ_image');
 
    return $query->result_array();


}


function insert_images(){

        $arraydata = array('main_img' => $this->upload_file('img2')['file_name'],
                            'logo' => $this->upload_file('img1')['file_name'],
                            'img1' => $this->upload_file('img3')['file_name'],
                            'img2' => $this->upload_file('img4')['file_name'],
                            'img3' => $this->upload_file('img5')['file_name'],
                            'img4' => $this->upload_file('img6')['file_name'],
                            'img5' => $this->upload_file('img7')['file_name'],
                            'university_id' => $this->input->post('university_name')
                             );
        
    $this->db->insert('univ_image', $arraydata);

    return($this->db->affected_rows()>0)? true : false;

}

function upload_file($i)
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


function update_images($id,$main_img,$logo,$sl_image_1,$sl_image_2, $sl_image_3, $sl_image_4, $sl_image_5){
     

        $arraydata = array('main_img' => $main_img,
                            'logo' => $logo,
                            'img1' => $sl_image_1,
                            'img2' => $sl_image_2,
                            'img3' => $sl_image_3,
                            'img4' => $sl_image_4,
                            'img5' => $sl_image_5                           
                             );
    $this->db->where('u_image_id',$id);
    $this->db->update('univ_image', $arraydata);

    return($this->db->affected_rows()>0)? true : false;

}

function delete_univ_image($id){
  $this->db->where('u_image_id',$id);
  $this->db->delete('univ_image');
  return($this->db->affected_rows()>0)? true : false;
}



function show_benefits(){

    $this->db->join('university_name','university_name.u_name_id=benefit.university_id');
    $query = $this->db->get('benefit');

    if($query){

        return $query->result_array();
    }
    else{

        return 'false';
    }


}

function insert_benefits(){
 

        $arraydata = array('b_univ_fees' => $this->input->post('appFees'), 
                            'app_fees_free' => $this->input->post('application_fees'),
                            'b_app_process_fees' => $this->input->post('process_fees'),
                            'app_process_free' => $this->input->post('processing_fees'),
                            'university_id' => $this->input->post('university_name')
                             );
        

          return($this->db->insert('benefit', $arraydata)) ? 'true' : 'false';

}//function

function update_benefits($id){
 
        $arraydata = array('b_univ_fees' => $this->input->post('appFees'), 
                            'app_fees_free' => $this->input->post('application_fees'),
                            'b_app_process_fees' => $this->input->post('process_fees'),
                            'app_process_free' => $this->input->post('processing_fees')
                             );
        $this->db->where('b_id',$id);
        $this->db->update('benefit', $arraydata);

        return($this->db->affected_rows()>0) ? true : false;
        
}//function

function delete_benefits($id){
    $this->db->where('b_id',$id);
    return($this->db->delete('benefit')) ? true : false;
}

// Course Group Table
public function get_course_group(){
  $this->db->order_by('course_group_name','ASC');
  return $this->db->get('course_group')->result_array();
}

function insert_course_group($arraydata){
    $this->db->insert('course_group',$arraydata);

    return($this->db->affected_rows()>0)? true : false;

   }//function

function update_course_group($id){
  $arraydata = array(
          'course_group_name'=>$this->input->post('course_name'),
          'course_group_details'=>$this->input->post('course_details')
        );

    $this->db->where('course_group_id',$id);
    $this->db->update('course_group',$arraydata);

    return($this->db->affected_rows()>0) ? true : false;

}

function delete_course_group($id){
    $this->db->where('course_group_id',$id);
    return($this->db->delete('course_group')) ? true : false;
}


// Course Table

public function get_course_name(){
  $this->db->order_by('course_name','ASC');
  return $this->db->get('course_name')->result_array();
}

function insert_courses($arraydata){
    $this->db->insert('course_name',$arraydata);

    return($this->db->affected_rows()>0)? true : false;

   }//function

function update_courses($id){
  $arraydata = array(
          'course_name'=>$this->input->post('course_name'),
          'course_description'=>$this->input->post('course_details')
        );

    $this->db->where('c_name_id',$id);
    $this->db->update('course_name',$arraydata);

    return($this->db->affected_rows()>0) ? true : false;

}

function delete_course($id){
    $this->db->where('c_name_id',$id);
    return($this->db->delete('course_name')) ? true : false;
}

   function insert_admit_rejects($arraydata){
    
      return($this->db->insert('admit_rejects', $arraydata)) ? true : false;
    
   }//function

   function update_admit_rejects(){
    
        $id = $this->input->post('id');

        $arraydata = array( 'student_name' => ucwords(strtolower($this->input->post('student_name'))),
                            'university_name' => ucwords(strtolower($this->input->post('university_name'))),
                            'course_name' => ucwords(strtolower($this->input->post('course_name'))),
                            'term' => $this->input->post('term'),
                            'gre' => $this->input->post('gre'),
                            'eng_test_name' => strtoupper($this->input->post('eng_test_name')),
                            'eng_test_score' => $this->input->post('eng_test_score'),
                            'ug_cgpa' => $this->input->post('ug_cgpa'),

                            'work_exp' => $this->input->post('work_exp'),
                            'ar_status' => $this->input->post('status')
                             );
        
        $this->db->where('admit_reject_id',$id);

          if($this->db->update('admit_rejects', $arraydata)){

           
             return 'true';
                
          } else{
          
          return 'false';
        }

   }//function
  

function get_admit_reject(){

  $query = $this->db->get('admit_rejects');

  if($query){

    return $query->result_array();
  }

  else{

    return 'false';
  }
  
}

function delete_admit_reject($id){

      $this->db->where('admit_reject_id',$id);

      $query= $this->db->delete('admit_rejects');

      $afftectedRows = $this->db->affected_rows();

      if($afftectedRows>0){

        return 'true';

      }

      else{

        return 'false';
      }

 }



function get_news(){

  $query = $this->db->get('news');

  if($query){

    return $query->result_array();
  }

  else{

    return 'false';
  }
  
}


function insert_news(){

      

        $arraydata = array('news_title' => $this->input->post('title'),
                            'content' => $this->input->post('content'),
                            'news_image' => $this->upload_news('news_image')['file_name'],
                            'posting_date' => $this->input->post('posting_date')                           
                             );
        

          if($this->db->insert('news', $arraydata)){

         
          // echo $qs;
             return 'true';
                
          } else{
          
          return 'false';
        }

   

}//function


function upload_news($i)
 {
 
    $config['upload_path'] = 'universityImages/news/';
    $config['allowed_types'] = 'jpg|jpeg|png|gif';
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


function show_university_details(){
  $this->db->join('university_name','university_name.u_name_id=university_details.university_name_id');
  $this->db->join('course_group','course_group.course_group_id=university_details.course_group_id');
  $query = $this->db->get('university_details');

    return $query->result_array();

}

function insert_university_data(){

    $entry = implode("," , $this->input->post('entry_terms'));
  
  $arraydata = array('university_name_id' => $this->input->post('university_name'),
                      'course_group_id' => $this->input->post('course_group'),
                      'course_name' => $this->input->post('course_name'),
                      'entry_terms' => $entry,
                      'deadline' => $this->input->post('deadline'),
                      'gre_total' => $this->input->post('gre_total') ,
                      'gre_quants ' => $this->input->post('gre_quants') ,
                      'gre_verbal' => $this->input->post('gre_verbal'),
                      'ielts' => $this->input->post('ielts_total'),
                      'ielts_subscores' => $this->input->post('ielts_min'),
                      'toefl' => $this->input->post('toefl_total'),
                      'toefl_subscore' => $this->input->post('toefl_min'),
                      'gpa' => $this->input->post('gpa'),
                      'work_exp'=> $this->input->post('work-exp'));

  $this->db->insert('university_details',$arraydata);

  return($this->db->affected_rows()>0)? true : false;
}


function update_university_data($id){

  $arraydata = array('university_name_id' => $this->input->post('university_name'),
                      'course_group_id' => $this->input->post('course_group'),
                      'course_name' => $this->input->post('course_name'),
                      'entry_terms' => $this->input->post('entry_terms'),
                      'deadline' => $this->input->post('deadline'),
                      'gre_total' => $this->input->post('gre_total') ,
                      'gre_quants ' => $this->input->post('gre_quants') ,
                      'gre_verbal' => $this->input->post('gre_verbal'),
                      'ielts' => $this->input->post('ielts_total'),
                      'ielts_subscores' => $this->input->post('ielts_min'),
                      'toefl' => $this->input->post('toefl_total'),
                      'toefl_subscore' => $this->input->post('toefl_min'),
                      'gpa' => $this->input->post('gpa'),
                      'work_exp'=> $this->input->post('work-exp'));
  $this->db->where('university_details_id',$id);

  $this->db->update('university_details',$arraydata);

  return($this->db->affected_rows()>0)? true : false;
}

function delete_university_data($id){
 
  $this->db->where('university_details_id',$id);

  $this->db->delete('university_details');

  return($this->db->affected_rows()>0)? true : false;
}
 
}
?>
