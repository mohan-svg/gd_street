<?php
Class Student_model extends CI_Model
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

    $this->db->where('email_id', $username);
    $this->db->where('password', md5($password));
    $this->db->where('account_status', 1);
    $this->db->limit(1);
    $query = $this->db->get('student_details');

    if($query->num_rows()==1){
        $student=$query->row_array();
        return array('status' => 'true', 'student'=>$student);

    } else{
        return array('status'=>'false','message'=>'Invalid Login');
    }


}

  function check_username($email_id){
      $this->db->where('email_id',$email_id);
      $query = $this->db->get('student_details');
      return ($query->num_rows()>0)? true : false ;
  }
 
  function university_list()
  {

      $this->db->join('course','course.id=university.course_id');
      $this->db->join('benefit','benefit.b_id=university.benefit_id');
      $query = $this->db->get('university');
  		return $query->result_array();

  }

  function get_university($u_id)
  {
  		
      $this->db->where('u_id',$u_id);
      $query = $this->db->get('university');

  		return $query->row_array();

  }

  function insert_student()
  {
              
      $userdata=array(
        
        'stud_fname'=>trim($this->input->post('fname')),
        'stud_lname'=>trim($this->input->post('lname')),
        'email_id'=>trim($this->input->post('email')),
        'password'=>trim(md5($this->input->post('password'))),
        'mobile1'=>trim($this->input->post('mobile'))
        
      );
      
      $query = $this->db->insert('student_details', $userdata);

      return ($this->db->affected_rows()>0)? true : false;

  }

    function insert_verification_code($email_id,$verification_code){
          $arraydata = array('verification_medium'=>$email_id,
                              'codes' =>$verification_code);
          $query = $this->db->insert('verification_codes',$arraydata);

          return($this->db->affected_rows()>0)? true : false;

    }

    function update_verification_code($email_id,$otp){
          $arraydata = array('codes' =>$otp);
          $this->db->where('verification_medium',$email_id);
          $query = $this->db->update('verification_codes',$arraydata);

          return($this->db->affected_rows()>0)? true : false;
    }

    function read_student_information($email_id){

        $this->db->where('email_id', $email_id);
        $query = $this->db->get('student_details');
        return $query->row();
    }

    function verify_account($verification_code,$email)
    {
      $this->db->where('verification_medium',$email);
      $this->db->where('codes',$verification_code);
      $query = $this->db->get('verification_codes');

      return ($query->num_rows()>=1)? true:false;
    }

    function activate_account($email,$stud_id){
      $arraydata = array('account_status' => 1 );
      $this->db->where('email_id',$email);
      $this->db->where('stud_id',$stud_id);
      $query = $this->db->update('student_details',$arraydata);

      return($this->db->affected_rows()>0)? true : false;

    }

    function update_password($new_password,$stud_id,$email){
      $arraydata = array('password' => md5($new_password) );
      $this->db->where('email_id',$email);
      $this->db->where('stud_id',$stud_id);
      $query = $this->db->update('student_details',$arraydata);
      
      return($this->db->affected_rows()>0)? true : false;
    }

  function get_student_detail($u_id,$stud_id){

    $this->db->where('stud_id', $stud_id);
    
    $this->db->limit(1);
    $query = $this->db->get('student_details');

    if($query->num_rows()==1){
        $student=$query->row_array();

          return $student;

      } else{
          return array('status'=>'false','message'=>'Invalid Login');
      }
  }

  function update_inprocess_university($u_id,$stud_id)
  {
    
    $arraydata = array('in_process_university' => $u_id);
    $this->db->where('stud_id',$stud_id);
    $query = $this->db->update('student_details',$arraydata);

    if($query){

      return "updated";

    } else {
      return "Error";
    }
  }

  function get_student_login($username){

    $this->db->where('email_id', $username);

    $query=$this->db->get('student_details');

    return ($query->num_rows()>=1)? true : false;

  }

  function get_education_details($stud_id){
    $this->db->where('student_id',$stud_id);
    return $this->db->get('education_details')->result_array();

  }

  function get_gre($stud_id){
    $this->db->where('student_id',$stud_id);
    return $this->db->get('gre_score')->result_array();

  }

  function get_ielts_toefl($stud_id){
    $this->db->where('student_id',$stud_id);
    return $this->db->get('ielts_toefl')->result_array();

  }

  function get_work_exp($stud_id){
    $this->db->where('student_id',$stud_id);
    return $this->db->get('work_experience')->result_array();
  }

/**
* Inseting Details From User Profile Section
*/

  function insert_education_details($stud_id){
    
      $arrayData = array('student_id' =>$stud_id,
      'edu_type'=>$this->input->post('edu_type'),
      'degree_name'=>$this->input->post('degree'),
      'branch'=>$this->input->post('branch'),
      'college'=>$this->input->post('college_name'),
      'starting_year'=>$this->input->post('start_date'),
      'ending_year'=>$this->input->post('end_date'),
      'cgpa'=>$this->input->post('cgpa'));
      
      $query = $this->db->insert('education_details',$arrayData);

      return ($this->db->affected_rows()>0)? $this->db->insert_id() : false;
    
  }

  function get_education_by_id($edu_id){
    $this->db->where('edu_id',$edu_id);
    return $this->db->get('education_details')->row();
  }

  function showAllEducationDetails_by_id($stud_id){
      $this->db->where('student_id',$stud_id);
      return $this->db->get('education_details')->result_array();
  }
 
}
?>
