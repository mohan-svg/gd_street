<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// $route['Admin/student_status/(:num)'] = 'Admin/student_status/';
// $route['Admin/(:num)'] = 'Admin/';
$route['uni_course_wise/(:any)'] = 'University/university_course_wise/';
$route['newscontent/(:num)'] = 'Home/newscontent/';
// $route['delete_admit_reject/(:num)'] = 'Admin/delete_admit_reject/';
$route['apply_to_univesity/(:any)'] = 'University/apply';

//Front End side

$route['verify'] = 'Login/verify_login';
$route['admit_rejects'] = 'University/admit_rejects';
$route['ms_finders'] = 'University/grad_schoolfinder';
$route['sign_up'] = 'Student/signup';
$route['view_profile'] = 'Student/view_profile';
$route['user_logout'] = 'Login/logout';
$route['verify'] = 'Login/verify_login';
$route['create_account'] = 'Student/account_step1';
$route['verify_account'] = 'Student/account_verification';
$route['check_account'] = 'Student/account_step2';

$route['forgot_password'] = "Login/forgot_password_step1";
$route['forgot_password2'] = "Login/forgot_password_step2";
$route['forgot_password3'] = "Login/forgot_password_step3";
$route['verify_otp'] = "Login/forgot_password_step4";
$route['password_changes'] = "Login/change_password";
$route['reset_password'] = "Login/password_reset";

//Admin Panel

$route['add_university'] = 'Admin/add_university_name/';
$route['insert_university'] = 'Admin/insert_university_name';
$route['update_univ_details'] = 'Admin/update_university_name';
$route['delete_university_name'] = 'Admin/delete_university_name';

$route['admit_reject_display'] = 'Admin/add_admit_rejects/';
$route['admit_rejects_data_insert']='Admin/insert_admit_rejects/';
$route['admit_rejects_data_update'] = 'Admin/update_admit_rejects';
$route['admit_rejects_data_delete'] = 'Admin/delete_admit_reject';

$route['add_course_group'] = 'Admin/add_course_group';
$route['insert_course_group'] = 'Admin/insert_course_group';
$route['update_course_group'] = 'Admin/update_course_group';
$route['delete_course_group']= 'Admin/delete_course_group';


$route['add_course'] = 'Admin/add_courses/';
$route['insert_course'] = 'Admin/insert_courses';
$route['update_course_name'] = 'Admin/update_courses';
$route['delete_course_name']= 'Admin/delete_course';


$route['benefits'] = 'Admin/add_benefits/';
$route['insert_benefits_data'] = 'Admin/insert_benefits/';
$route['update_benefits_data'] = 'Admin/update_benefits';
$route['delete_benefits_data']= 'Admin/delete_benefits';	

$route['univ_images'] = 'Admin/add_images/';
$route['insert_images_data'] = 'Admin/insert_images/';
$route['update_images_data'] = 'Admin/update_images';
$route['delete_images_data']= 'Admin/delete_images';

$route['univ_details'] = 'Admin/add_university_complete_details';
$route['update_univ_details'] = 'Admin/update_university_complete_details';
$route['insert_univ_details'] = 'Admin/insert_university_complete_details';
$route['delete_univ_details'] = 'Admin/delete_university_complete_details';

$route['add_user'] = 'Admin/add_user/';
$route['insert_user'] = 'Admin/insert_user';
$route['update_user'] = 'Admin/update_user';
$route['delete_user']= 'Admin/delete_user';

$route['student_status']= 'Admin/student_status';
$route['update_student_status']= 'Admin/update_student_status';
$route['delete_student_status']= 'Admin/delete_student_status';

$route['search_student_status']= 'Admin/search_student_status';
$route['search_university_status']= 'Admin/search_university_status';

//Admin Login

$route['signin'] = 'Adminlogin/index';
$route['verify_admin'] = 'Adminlogin/verify_login';
$route['dashboard'] = 'Admin/index';
$route['logout'] = 'Adminlogin/logout';


$route['save_education_details'] = 'Student/insert_education_details';
$route['save_test_score'] = 'Student/insert_test_scores';
$route['save_work_experience'] = 'Student/insert_work_experience';

$route['showAllEducationDetails'] = 'Student/showAllEducationDetails_by_id';


