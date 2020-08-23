<?php
Class University_model extends CI_Model
{
 
   function university_list_with_image()
  {

      $this->db->join('univ_image','univ_image.university_id=university_name.u_name_id');
      $this->db->join('benefit','benefit.university_id=university_name.u_name_id');
      $query = $this->db->get('university_name');

      return $query->result_array();

  }

  function university_list()
  {

 
      $this->db->join('benefit','benefit.university_id=university_name.u_name_id');
      $query = $this->db->get('university_name');

  		return $query->result_array();

  }

  function get_university_name($u_id)
  {
      $this->db->where('u_name_id',$u_id);
  		      
  		return $this->db->get('university_name')->row();

  }

function get_university_images($u_id)
  {
      $this->db->where('university_id',$u_id);
         
      return $this->db->get('univ_image')->row();

  }


  function get_benefits($u_id)
  {
      $this->db->where('university_id',$u_id);
         
      return $this->db->get('benefit')->row();

  }

function course_name($u_id)
{
    $this->db->where('university_name_id',$u_id);
      $this->db->get('university_details');      
      return $this->db->get('university_details')->result_array();
}

 
  function submit_form()
  {

   // if($this->db->insert('student_details', $userdata1)){ 

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
      $fromemail=$this->config->item('fromemail');
      $fromname=$this->config->item('fromname');
      $subject=$this->config->item('activation_subject');
      $message=$this->config->item('activation_message');
      $message=str_replace('[first_name]',$this->input->post('fname'),$message);

      $message=str_replace('[email]',$this->input->post('email'),$message);
      $message=str_replace('[password]',$this->input->post('password'),$message);
      $toemail=$this->input->post('email');
       
      $this->email->to('aabc54591@gmail.com');
      $this->email->from($fromemail, $fromname);
      $this->email->subject($subject);
      $this->email->message($message);
      if(!$this->email->send()){
       print_r($this->email->print_debugger());
      exit;
      } 

//Added code - end

      return true;
          
    // } else{
      
    //   return false;

    // }//else

  }//function 



  function upload_file()
 {
  $config['upload_path'] = 'uploads/';
  $config['allowed_types'] = 'doc|docx|pdf';
  $this->load->library('upload', $config);
  if($this->upload->do_upload('resume'))
  {
   return $this->upload->data();   
  }
  else
  {
   return $this->upload->display_errors();
  }
 }

function update_submitted_university($u_id,$stud_id)
{

// echo "  " .$u_id."  " .$stud_id;


  // To update multiple times with single value in the field submited university - student_details without replacing old value


  // getting old value of submited_university
    
    $this->db->where('stud_id',$stud_id);
    $query=$this->db->get('student_details');

    $result=$query->row_array();

    $suid = $result['submited_university'];

    echo "submited_university :  ".$suid;

// checking if submited_university is empty or not
    if($suid==""){

      $uid=$u_id;
    }

    else{

// adding new id with old ids in submited_university
      $uid=$suid.",".$u_id;

    }


    $uids= array(  
      'submited_university'=>$uid
    );

// updating finally submited_university

    $this->db->where('stud_id',$stud_id);
    $query = $this->db->update('student_details',$uids);

    if($query){

      return true;

    }

    else {
      return "Error Try Again";
    }
}


function insert_application($u_id,$stud_id)
{

  $arraydata= array('stud_id' =>$stud_id,
    'university_id' =>$u_id,
    'university_name' =>$this->input->post('uname'),
    'course_1' =>$this->input->post('course1'),
    'specialization_1' =>$this->input->post('specialization1'),
    'course_2' =>$this->input->post('course2'),
    'specialization_2' =>$this->input->post('specialization2'),
    'term' =>$this->input->post('term')

   );

  // $insert = $this->db->insert('submitted_applications',$arraydata);

  if($this->db->insert('submitted_applications',$arraydata)){

    return true;
  }

  else{

    return "application not submitted";
  }

}


function get_applications($stud_id){

  $this->db->where('stud_id',$stud_id);
  $arraydata = $this->db->get('submitted_applications');

  if($arraydata !='')
  {
    return $arraydata->result_array();
  }

  else{

    return "Not fetched submitted_applications";
  }

}



function get_news(){

  $this->db->order_by('news_id','desc');
  $query=$this->db->get('news');
  if($query){

      return $query->result_array();

  }

    else{

        return 'false';

    }   

}


function get_single_news($id){

  $this->db->where('news_id',$id);
  $query=$this->db->get('news');
  if($query){

      return $query->result_array();

  }

    else{

        return 'false';

    }   

}

function get_faqs(){
  $this->db->order_by('faqs_id','desc');
  $this->db->limit(7);
  return $this->db->get('faqs')->result_array();
}



function grad_school_result($course){

  $this->db->join('course','university.u_id=course.university_id');
  // $this->db->where('course.c_name',$course);
  $this->db->order_by('gre_score','asc');


  $query=$this->db->get('university');
  if($query){

      return $query->result_array();

  }

    else{

        return 'false';

    }   

}

function university_course_wise($course){

$this->db->join('course','university.u_id=course.university_id');
$this->db->join('univ_image','university.u_id=univ_image.university_id');
$this->db->where('course.c_name',$course);
$query = $this->db->get('university');

if($query){
  
  return $query->result_array();

}
else{

  return 'false';
}

}

  function  get_course_name_by_id($course_id){

    $this->db->where('course_list_id',$course_id);
    $query = $this->db->get('course_list');

    return $query->row_array();

  }


function get_univ_name(){

  $query=$this->db->query("select university_name from university_name");
  return $query->result_array();
}


function get_course_name(){

  $query=$this->db->query("select course_name from course_name");
  return $query->result_array();
}

function get_a_r_result($univ,$course,$status){

  $this->db->where('university_name',$univ);
  $this->db->where('course_name',$course);
  $this->db->where('ar_status',$status);
  $query=$this->db->get('admit_rejects');

  if($query){

    return $query->result_array();

  }
  else{

    return 'false';
  }
  


}

}//class
?>





  