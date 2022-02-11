<?php
    if (!defined('BASEPATH')) exit('No direct script access allowed');
    class Api extends CI_Controller
    {
        function __construct()
    	{
    		parent::__construct();
    		$this->load->database();
    		$this->load->library("indicieduapi");
        }
        
        // Get Location Api Fetch Data
        public function api_location_list()
    	{
    	    $data = array();
            $school_id = $this->input->post('school_id');
    	    $school_db = $this->input->post('school_db');
    	    $user_login_detail_id = $this->input->post('user_login_detail_id');
            $posted_token = $this->input->post('token');
            $loc_country   =  $this->input->post('loc_country');
            $loc_province  =  $this->input->post('loc_province');
            $loc_city      =  $this->input->post('loc_city');

    	    if($school_id == "" || empty($school_id) && $school_db == "" || empty($school_db)){
    	       // $data['code'] = '204';
    	       // $data['status'] = false;
                // 	$data['message'] = 'School Id Or School DB Is Empty';
                // 	$data['data'] = array();   
                // 	echo json_encode($data); 
                // 	exit;
            	echo $this->indicieduapi->api_response("204",false,"School Id Or School DB Is Empty",array());
            	exit;
    	    }
     	    
     	    
     	    if($user_login_detail_id == "" || empty($user_login_detail_id) && $posted_token == "" || empty($posted_token)){
     	        $data['code'] = '204';
    	        $data['status'] = false;
            	$data['message'] = 'User Login Detail Id Or Token Is Empty';
            	$data['data'] = array();   
            	echo json_encode($data); 
            	exit;
     	    }
     	    // Check Token Authorization
    	    $token_data = $this->get_user_session_token($user_login_detail_id,$school_id,$posted_token);
    	    if(!$token_data){
    	        $data['code'] = '203';
            	$data['status'] = false;
            	$data['message'] = 'Token Mismatched';
            	$data['data'] = array();   
            	echo json_encode($data);
    	        exit;
    	    }
    	    
    	    // Filters Input
    	    $filter="";
    	    if(isset($loc_country) && $loc_country!=""){
            	$filter .= " AND c.country_id = $loc_country";
            }
            
            if(isset($loc_province) && $loc_province!=""){
            	$filter .= " AND p.province_id = $loc_province";
            }
            
            if(isset($loc_city) && $loc_city!=""){
            	$filter .= " AND cty.city_id = $loc_city";
            }
            
        	$sql="SELECT cl.location_id, cl.title,  cl.status, c.title as country, p.title as province, cty.title as city FROM ".$school_db.".city_location cl 
                  INNER JOIN  ".SYSTEM_DB.".city cty ON cl.city_id = cty.city_id 
                  INNER JOIN ".SYSTEM_DB.".province p ON cty.province_id = p.province_id
                  INNER JOIN ".SYSTEM_DB.".country c ON p.country_id = c.country_id 
                  WHERE cl.school_id='$school_id' ".$filter."  ";
    	    $query_result = $this->db->query($sql)->result_array();
    	    
    	    // Response
    	    echo $this->indicieduapi->api_response("200",true,"Data Return Successfully",$query_result);
    	}
    	
        // 	Location Insertion
    	function api_location_insert()
    	{
    	    $data = array();
    	    $this->load->helper('location');
            // Posted Fields
            $posted_token = $this->input->post('token');
            $school_id = $this->input->post('school_id');
    	    $school_db = $this->input->post('school_db');
    	    $user_login_detail_id = $this->input->post('user_login_detail_id');

            $post_data = array(
                'school_id'            =>  $this->input->post('school_id'),
                'city_id'              =>  $this->input->post('city_id'),
                'title'                =>  $this->input->post('title'),
                'status'               =>  $this->input->post('status'),   
            );
            
            // Form Validation
            foreach ($_POST as $field => $error) {
                if(empty($_POST[$field])) {
                    $data['code'] = '204';
        	        $data['status'] = false;
                	$data['message'] = ucfirst($field) . ' is Empty';
                	$data['data'] = array();   
                	echo json_encode($data);
                    exit;
                }
            }
            
    	    // Check Token Authorization
    	    $token_data = $this->get_user_session_token($user_login_detail_id,$school_id,$posted_token);
    	    if(!$token_data){
    	        $data['code'] = '203';
            	$data['status'] = false;
            	$data['message'] = 'Token Mismatched';
            	$data['data'] = array();   
            	echo json_encode($data);
    	        exit;
    	    }
        	$this->db->insert($school_db.'.city_location', $post_data);
        	$location_id = $this->db->insert_id();
        	school_location_archive($location_id,1,$school_db,$user_login_detail_id);	
    		
            // Response
    		$data['code'] = '200';
        	$data['status'] = true;
        	$data['message'] = 'Record Saved Successfully';
        	$data['data'] = array();   
        	echo json_encode($data);
    	}
    	
        // 	Location Deleteion
        function api_location_delete()
        {
            $data = array();
    	    $this->load->helper('location');
            // Posted Fields
            $posted_token = $this->input->post('token');
            $school_id = $this->input->post('school_id');
    	    $school_db = $this->input->post('school_db');
    	    $user_login_detail_id = $this->input->post('user_login_detail_id');
    	    $location_id = $this->input->post('location_id');
    	    
    	    if($school_id == "" || empty($school_id) && $school_db == "" || empty($school_db)){
    	        $data['code'] = '204';
    	        $data['status'] = false;
            	$data['message'] = 'School Id Or School DB Is Empty';
            	$data['data'] = array();   
            	echo json_encode($data); 
            	exit;
    	    }
    	    
    	    if($location_id == "" || empty($location_id)){
    	        $data['code'] = '204';
    	        $data['status'] = false;
            	$data['message'] = 'Location Id Is Empty';
            	$data['data'] = array();   
            	echo json_encode($data); 
            	exit;
    	    }
     	    
     	    if($user_login_detail_id == "" || empty($user_login_detail_id) && $posted_token == "" || empty($posted_token)){
     	        $data['code'] = '204';
    	        $data['status'] = false;
            	$data['message'] = 'User Login Detail Id Or Token Is Empty';
            	$data['data'] = array();   
            	echo json_encode($data); 
            	exit;
     	    }
     	    
    	    // Check Token Authorization
    	    $token_data = $this->get_user_session_token($user_login_detail_id,$school_id,$posted_token);
    	    if(!$token_data){
    	        $data['code'] = '203';
            	$data['status'] = false;
            	$data['message'] = 'Token Mismatched';
            	$data['data'] = array();   
            	echo json_encode($data);
    	        exit;
    	    }
    	    
        	// Check Location Exist In School Table
    	    $qur = $this->db->query("SELECT location_id from ".$school_db.".school WHERE school_id=".$school_id." and  location_id = $location_id")->result_array();	
    	    if(count($qur)>0)
    	    {
    	        $data['code'] = '406';
            	$data['status'] = false;
            	$data['message'] = 'Deletion Failed Record Already In Use';
            	$data['data'] = array();   
            	echo json_encode($data);
    	        exit;
    	    }
    	    // Check Location Exist In Staff Table
    	    $qur = $this->db->query("SELECT location_id from ".$school_db.".staff WHERE school_id=".$school_id." and  location_id = $location_id")->result_array();	
    	    if(count($qur)>0)
    	    {
    	        $data['code'] = '406';
            	$data['status'] = false;
            	$data['message'] = 'Deletion Failed Record Already In Use';
            	$data['data'] = array();   
            	echo json_encode($data);
    	        exit;
    	    }
    	    // Check Location Exist In Student Table
    	    $qur = $this->db->query("SELECT location_id from ".$school_db.".student WHERE school_id=".$school_id." and  location_id = $location_id")->result_array();	
    	    if(count($qur)>0)
    	    {
    	        $data['code'] = '406';
            	$data['status'] = false;
            	$data['message'] = 'Deletion Failed Record Already In Use';
            	$data['data'] = array();   
            	echo json_encode($data);
    	        exit;
    	    }
    	    
    	    school_location_archive($location_id,3,$school_db,$user_login_detail_id);
            $this->db->where('school_id',$school_id);
            $this->db->where('location_id', $location_id);
            $this->db->delete($school_db.'.city_location');
            // Response
            $data['code'] = '200';
        	$data['status'] = true;
        	$data['message'] = 'Record Deleted Successfully';
        	$data['data'] = array();   
        	echo json_encode($data);
        }
        
        // 	Location Edit Fetch Data
        function api_location_edit()
        {
            $data = array();
    	    $this->load->helper('location');
            // Posted Fields
            $posted_token = $this->input->post('token');
            $school_id = $this->input->post('school_id');
    	    $school_db = $this->input->post('school_db');
    	    $user_login_detail_id = $this->input->post('user_login_detail_id');
    	    $location_id = $this->input->post('location_id');
    	    
    	    if($school_id == "" || empty($school_id) && $school_db == "" || empty($school_db)){
    	        $data['code'] = '204';
    	        $data['status'] = false;
            	$data['message'] = 'School Id Or School DB Is Empty';
            	$data['data'] = array();   
            	echo json_encode($data); 
            	exit;
    	    }
    	    
    	    if($location_id == "" || empty($location_id)){
    	        $data['code'] = '204';
    	        $data['status'] = false;
            	$data['message'] = 'Location Id Is Empty';
            	$data['data'] = array();   
            	echo json_encode($data); 
            	exit;
    	    }
    	    
    	    if($user_login_detail_id == "" || empty($user_login_detail_id) && $posted_token == "" || empty($posted_token)){
     	        $data['code'] = '204';
    	        $data['status'] = false;
            	$data['message'] = 'User Login Detail Id Or Token Is Empty';
            	$data['data'] = array();   
            	echo json_encode($data); 
            	exit;
     	    }
     	    
    	    // Check Token Authorization
    	    $token_data = $this->get_user_session_token($user_login_detail_id,$school_id,$posted_token);
    	    if(!$token_data){
    	        $data['code'] = '203';
            	$data['status'] = false;
            	$data['message'] = 'Token Mismatched';
            	$data['data'] = array();   
            	echo json_encode($data);
    	        exit;
    	    }
    	    
    	    $q="select cl.location_id, cl.title, cl.status, cty.city_id, p.province_id, c.country_id, 
            	p.title as province, cty.title as city 
            	FROM ".$school_db.".city_location cl 
            	INNER JOIN ".SYSTEM_DB.".city cty ON cl.city_id = cty.city_id
            	INNER JOIN ".SYSTEM_DB.".province p ON cty.province_id = p.province_id
            	INNER JOIN ".SYSTEM_DB.".country c ON p.country_id = c.country_id
            	WHERE cl.school_id=".$school_id." AND cl.location_id = $location_id
            	ORDER BY cl.location_id DESC";
            $res = $this->db->query($q)->result_array();
    	    
    	    $data['code'] = '200';
        	$data['status'] = true;
        	$data['message'] = 'Data Get Successfully';
        	$data['data'] = $res;   
        	echo json_encode($data);
        }
        
        // Location Data Update
        function api_location_update()
        {
            $data = array();
    	    $this->load->helper('location');
            // Posted Fields
            $posted_token = $this->input->post('token');
            $school_id = $this->input->post('school_id');
    	    $school_db = $this->input->post('school_db');
    	    $user_login_detail_id = $this->input->post('user_login_detail_id');
    	    $location_id = $this->input->post('location_id');
    	    
    	    $update_data = array(
    	        'city_id'   =>  $this->input->post('city_id'),
    	        'title'     =>  $this->input->post('title'),
    	        'status'    =>  $this->input->post('status'),
    	    );
    	    
    	    if($school_id == "" || empty($school_id) && $school_db == "" || empty($school_db)){
    	        $data['code'] = '204';
    	        $data['status'] = false;
            	$data['message'] = 'School Id Or School DB Is Empty';
            	$data['data'] = array();   
            	echo json_encode($data); 
            	exit;
    	    }
    	    
    	    if($location_id == "" || empty($location_id)){
    	        $data['code'] = '204';
    	        $data['status'] = false;
            	$data['message'] = 'Location Id Is Empty';
            	$data['data'] = array();   
            	echo json_encode($data); 
            	exit;
    	    }
    	    
    	    if($user_login_detail_id == "" || empty($user_login_detail_id) && $posted_token == "" || empty($posted_token)){
     	        $data['code'] = '204';
    	        $data['status'] = false;
            	$data['message'] = 'User Login Detail Id Or Token Is Empty';
            	$data['data'] = array();   
            	echo json_encode($data); 
            	exit;
     	    }
     	    
    	    // Check Token Authorization
    	    $token_data = $this->get_user_session_token($user_login_detail_id,$school_id,$posted_token);
    	    if(!$token_data){
    	        $data['code'] = '203';
            	$data['status'] = false;
            	$data['message'] = 'Token Mismatched';
            	$data['data'] = array();   
            	echo json_encode($data);
    	        exit;
    	    }
    	    
            $this->db->where('school_id',$school_id);
    		$this->db->where('location_id', $location_id );
    		$this->db->update($school_db.'.city_location', $update_data);
    		school_location_archive($location_id,2,$school_db,$user_login_detail_id);
            // Response
    		$data['code'] = '200';
        	$data['status'] = true;
        	$data['message'] = 'Record Updated Successfully';
        	$data['data'] = array();   
        	echo json_encode($data);
        }
    	
        //Token Insertion & Update Api
    	function api_set_session_data()
    	{
    	    $data = array();
    	    $school_id = $this->input->post('school_id');
    	    $user_login_detail_id = $this->input->post('user_login_detail_id');

    	    if($school_id == "" || empty($school_id) && $user_login_detail_id == "" || empty($user_login_detail_id)){
    	        $data['code'] = '204';
    	        $data['status'] = false;
            	$data['message'] = 'School Id Or User Login Detail Id Is Empty';
            	$data['data'] = array();   
            	echo json_encode($data); 
            	exit;
    	    }
    	    $device_id = $this->input->post('device_id');
    	    $device = $this->input->post('device');
    	    if($device == "")
    	    {
    	        $device = "Post Man";
    	    }
    	    $token = md5("Y&*T&T&*FGF*&^THG*&".$user_login_detail_id.$school_id.rand(10,1000));
	        $last_login = date('Y-m-d h:i:s a');
    	   // Check Record Already Exist
    	    $check_record_exist = $this->db->where('user_login_detail_id',$user_login_detail_id)->where('school_id',$school_id)->get(SYSTEM_DB.'.user_session');
    	    if($check_record_exist->num_rows() == 0)
    	    {
    	        $this->db->query("INSERT INTO ".SYSTEM_DB.".user_session (`user_login_detail_id`, `school_id`, `token`, `last_login`, `device`) VALUES('$user_login_detail_id','$school_id','$token','$last_login','$device') ");
            	$data['message'] = 'Session Data Inserted';
            	$data['data'] = $token;
    	    }else{
    	        $this->db->query("UPDATE ".SYSTEM_DB.".user_session SET token = '$token',last_login = '$last_login', device = '$device' WHERE user_login_detail_id = '$user_login_detail_id' AND school_id = '$school_id' ");
    	        $data['message'] = 'Session Data Updated';
    	        $data['data'] = $token;
    	    }
    	    
    	    $data['code'] = '200';
    	    $data['status'] = true;
            echo json_encode($data);
    	}
    	
        //Get Token Api From DB
    	function get_user_session_token($user_login_detail_id,$school_id,$posted_token,$format = 'array')
        {
            $data = array();
            $details = $this->db->query("SELECT token from ".SYSTEM_DB.".user_session WHERE user_login_detail_id = $user_login_detail_id AND school_id = $school_id")->row();
            $token = $details->token;
            if($token != $posted_token || empty($posted_token)){
                if($format == "json")
                {
                    $data['code'] = '203';
                	$data['status'] = false;
                	$data['message'] = 'Token Mismatched';
                	$data['data'] = array();   
                	echo json_encode($data);
                }
                return false;
            }else
            {
                if($format == "json")
                {
                    $data['code'] = '200';
                	$data['status'] = true;
                	$data['message'] = 'Token Matched';
                	$data['data'] = array();   
                	echo json_encode($data);
                }
                return true;
            }
        }
    }