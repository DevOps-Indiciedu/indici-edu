<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller']     =  'login';
$route['404_override']           =  'user/error404';
$route['translate_uri_dashes']   =   FALSE;
$route['forgot-password']        =  'login/forgot_password';
$route['forgot-password-mobile'] =  'login/forgot_password_mobile';
$route['my_testing']             =  'admin/dashboard';
$route['sms_testing']            =  "login/opensms";
$route['sms_testing_trigger']    =  "login/smstesting";
$route['email_testing']          =  "login/openemail";
$route['institute/(:any)']       =  "login/institute_page/$1";
$route['email_testing_trigger']  =  "login/email_testing";
$route['std_dashboard']          =  "student/parents/dashboard";
$route['error/server'] = 'Error_Controller/error_server';
