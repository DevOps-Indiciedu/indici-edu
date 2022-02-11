<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
//session_start();
class Noticeboards extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        if($_SESSION['user_login']!= 1)
            redirect(base_url() . 'login');

    }
   
    public function index()
    {
        if ($_SESSION['user_login']!= 1)
            redirect(base_url() . 'login');
        if ($_SESSION['user_login'] == 1)
            redirect(base_url() . 'admin/dashboard');
    }

    /***MANAGE EVENT / NOTICEBOARD, WILL BE SEEN BY ALL ACCOUNTS DASHBOARD**/
    function noticeboard($param1 = '', $param2 = '', $param3 = '')
    {
        if ($_SESSION['user_login'] != 1)
            redirect(base_url());
        if ($param1 == 'create')
        {
            $data['notice_title']=$this->input->post('notice_title');
            $data['notice']= $this->input->post('notice');
            $title = $this->input->post('notice_title');
            $notice = $this->input->post('notice');

            $data['create_timestamp'] = date('Y-m-d',strtotime($this->input->post('create_timestamp')));

            $data['school_id'] = $_SESSION['school_id'];
            $data['type']=$this->input->post('notice_type');
            $data['is_active']=$this->input->post('is_active');

            $this->db->insert(get_school_db().'.noticeboard', $data);
            $this->session->set_flashdata('club_updated', get_phrase('record_saved_successfully'));
            $insert_id=$this->db->insert_id();

            $school_teachers = get_school_teachers();
            foreach($school_teachers as $teacher){
                $device_id  =   get_user_device_id(3 , $teacher['user_login_detail_id'] , $_SESSION['school_id']);
                $title      =   "New Noticeboard";
                $message    =   "A Noticeboard Has been Created By Admin.";
                $link       =    base_url()."teacher/noticeboard";
                sendNotificationByUserId($device_id, $title, $message, $link , $teacher['user_login_detail_id'] , 3);
            }
            
            $this->load->helper('message');
            $message = $title . ": " . $notice;
            if(isset($_POST['send_message']) && $_POST['send_message']!="") {
                $ur=$this->db->query("select s.student_id, s.mob_num from ".get_school_db().".student s")->result_array();
                $number_array = array();
                foreach($ur as $r){
                    $number_array[] = $r['mob_num'];
                }
                $number_array = json_encode($number_array);
                
                $url = "https://srv1.indiciedu.com.pk/sms/sms_service_multiple.php?phoneno=".urlencode($number_array)."&message=".urlencode($message);
                
                $curl = curl_init();        
                curl_setopt($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_USERAGENT, 'api');
                curl_setopt($curl, CURLOPT_TIMEOUT, 1); 
                curl_setopt($curl, CURLOPT_HEADER, 0);
                curl_setopt($curl,  CURLOPT_RETURNTRANSFER, false);
                curl_setopt($curl, CURLOPT_FORBID_REUSE, true);
                curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 1);
                curl_setopt($curl, CURLOPT_DNS_CACHE_TIMEOUT, 10); 
                curl_setopt($curl, CURLOPT_FRESH_CONNECT, true);
                curl_exec($curl);   
                
                $errors = curl_error($curl);
                $response = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            
                curl_close($curl);
            }

            if(isset($_POST['send_email']) && $_POST['send_email']!="") {
                $email_layout = get_email_layout($message);
                email_to_all($email_layout,'Circular Announced');
            }
            //email Ends here

            redirect(base_url() . 'noticeboards/noticeboard/');
        }
        
        if ($param1 == 'do_update') {

            $data['notice_title']=$this->input->post('notice_title');
            $data['notice']=$this->input->post('notice');
            $data['type'] = $this->input->post('type_edit');
            $data['is_active'] = $this->input->post('is_active_edit');
            $data['create_timestamp'] = date('Y-m-d',strtotime($this->input->post('create_timestamp')));

            //$data['create_timestamp'] = $date_due;
            $this->db->where('school_id',$_SESSION['school_id']);
            $this->db->where('notice_id', $param2);
            $this->db->update(get_school_db().'.noticeboard', $data);
            ///sms start

            $this->load->helper('message');
            $message="New Notice: ".$data['notice_title']." From ".date('d-m-y'). " To ". date('d-m-y',strtotime($date_due))."";

            if(isset($_POST['send_message']) && $_POST['send_message']!="") {
                sms_to_all($message);
                $data_status['sms_status']=1;
                $this->db->where('notice_id',$param2);
                $this->db->update(get_school_db().'.noticeboard',$data_status);
            }
            //Email Setting here
            if(isset($_POST['send_email']) && $_POST['send_email']!="") {
                $email_layout = get_email_layout($message);
                email_to_all($email_layout,get_phrase('circular_announced'));
            }
                //email Ends here
            $this->session->set_flashdata('club_updated', get_phrase('record_updated_successfully'));
            redirect(base_url() . 'noticeboards/noticeboard/');
        }
        
        else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where(get_school_db().'.noticeboard', array(
                'notice_id' => $param2,
                'school_id' =>$_SESSION['school_id']
            ))->result_array();
        }

        if ($param1 == 'delete') {
            $this->db->where('school_id',$_SESSION['school_id']);
            $this->db->where('notice_id', $param2);
            $this->db->delete(get_school_db().'.noticeboard');
            $this->session->set_flashdata('club_updated', get_phrase('notice_deleted_successfully'));
            redirect(base_url() . 'noticeboards/noticeboard/');
        }
        
        $date_query="";
        $type_arr="";
        $is_active_arr="";
        $start_date=$this->input->post('starting');
        $end_date=$this->input->post('ending');
        $type_category=$this->input->post('type_category');
        $is_active=$this->input->post('is_active');
        
        
        if($start_date!='')
        {
        	$start_date_arr=explode("/",$start_date);
        	$start_date=$start_date_arr[2].'-'.$start_date_arr[1].'-'.		$start_date_arr[0];
        }
        
        if($end_date!='')
        {
        	$end_date_arr=explode("/",$end_date);
        	$end_date=$end_date_arr[2].'-'.$end_date_arr[1].'-'.$end_date_arr[0];
        }

        $per_page = 10;
        $apply_filter = $this->input->post('apply_filter', TRUE);
        $std_search = $this->input->post('std_search', TRUE);
        $std_search = trim(str_replace(array("'", "\""), "", $std_search));
        
        if (!isset($start_date) || $start_date == "") {
             $start_date = $this->uri->segment(3);
        }
        
        if (!isset($start_date) || $start_date == "") {
            $start_date = 0;
        } 
        
        if (!isset($end_date) || $end_date == "") {
            $end_date = $this->uri->segment(4);
        }
        
        if (!isset($end_date) || $end_date == "") {
            $end_date = 0;
        }
        
        if (!isset($type_category) || $type_category == "") {
            $type_category = $this->uri->segment(5);
        }

        if (!isset($type_category) || $type_category == "") {
            $type_category = 'none';
        }
                
        if (!isset($is_active) || $is_active == "") {
            $is_active = $this->uri->segment(6);
        }
        
        if (!isset($is_active) || $is_active == "") {
            $is_active = 'none';
        }        
        
        if (!isset($std_search) || $std_search == "") {
            $std_search = $this->uri->segment(7);
        }
        
        if (!isset($std_search) || $std_search == "") {
            $std_search = 0;
        } 
        
        $page_num = $this->uri->segment(8);
        
        if (!isset($page_num) || $page_num == "") {
            $page_num = 0;
            $start_limit = 0;
        } 
        else {
            $start_limit = ($page_num - 1) * $per_page;
        }                          
         
        if(($start_date!='') && ($start_date > 0))
        {
        	$date_query=" AND create_timestamp >= '".$start_date."'";
        	$page_data['filter'] = true;
        }
        
        if(($end_date!='') && ($end_date>0))
        {
        	$date_query=" AND create_timestamp <= '".$end_date."'";
        	$page_data['filter'] = true;
        }
        
        if(($start_date!='') && ($start_date > 0) && ($end_date!='') && ($end_date > 0))
        {
        	$date_query=" AND create_timestamp >= '".$start_date."' AND create_timestamp <= '".$end_date."' ";
        	$page_data['filter'] = true;
        }

        if(isset($type_category) && ($type_category >= 0) && ($type_category!="") && ($type_category!=='none'))
        {
        	$type_arr = " AND type=$type_category";
        	$page_data['filter'] = true;
        }
        
        if(isset($type_category) && ($type_category == "all") && ($type_category!="") && ($type_category!=='none'))
        {
        	$type_arr = " AND (type=1 OR type=2)";
        	$page_data['filter'] = true;
        }
        
        if(isset($is_active) && ($is_active >= 0) && ($is_active!="") && ($is_active!='none'))
        {
        	$is_active_arr=" AND is_active=$is_active";
        	$page_data['filter'] = true;
        }

        if(isset($is_active) && ($is_active == "all") && ($is_active!="") && ($is_active!='none'))
        {
        	$is_active_arr=" AND (is_active=0 OR is_active=1)";
        	$page_data['filter'] = true;
        }
        
        $std_query = "";
        if (isset($std_search) && !empty($std_search))
        {
            
        	$std_query = " AND (
                                    notice_title LIKE '%" . $std_search . "%' OR 
                                    notice LIKE '%" . $std_search . "%' 
                                )";
            $page_data['filter'] = true;
            
        }

        $q="SELECT *
		FROM ".get_school_db().".noticeboard
		WHERE school_id=".$_SESSION['school_id'].$date_query. $type_arr. $is_active_arr.$std_query." order by notice_id desc";
		$notices = $this->db->query($q)->result_array();
		
		/*
		$notice_count = $this->db->query($q)->result_array();   	
		$total_records = count($notice_count);
        $quer_limit = $q . " limit " . $start_limit . ", " . $per_page . "";
        $notices = $this->db->query($quer_limit)->result_array();
        */
		
	    /*
		$config['base_url']   = base_url() . "noticeboards/noticeboard/" . $start_date . "/". $end_date . "/". $type_category ."/" . $is_active."/".$std_search;
		$config['total_rows'] = $total_records;
        $config['per_page']   = $per_page;

        $config['uri_segment'] = 8;
        $config['num_links']   = 2;
        $config['use_page_numbers'] = TRUE;
        $this->pagination->initialize($config);
        
        $pagination = $this->pagination->create_links();
        */
        
        $page_data['notices'] =$notices;
        $page_data['start_limit'] = $start_limit;
        $page_data['apply_filter'] = $apply_filter;
        $page_data['total_records'] = $total_records;
        //$page_data['pagination'] = $pagination;
		$page_data['start_date']=$start_date;
        $page_data['end_date']=$end_date;
        $page_data['type_category']=$type_category;
        $page_data['is_active']=$is_active;
        $page_data['std_search']=$std_search;
        
        $page_data['page_name']  = 'noticeboard';
        $page_data['page_title'] = get_phrase('manage_noticeboard');
        $this->load->view('backend/index', $page_data);
    }
    
    
    function get_year_term()
    {
        if($this->input->post('acad_year')!="")
        {
            echo $yearly_term=yearly_terms_option_list($this->input->post('acad_year'));
        }

    }
    function get_year_term2()
    {
        if($this->input->post('acad_year')!="")
        {
            echo $yearly_term=yearly_terms_option_list($this->input->post('acad_year'),'',1);
        }
    }
    /*function notice_generator()
    {
        $page_data['start_date']=date_slash($this->input->post('start_date'));
        $page_data['end_date']=date_slash($this->input->post('end_date'));
        $page_data['type_category']=$this->input->post('type_category');
        $page_data['is_active']=$this->input->post('is_active');
        $this->load->view('backend/admin/ajax/get_notice.php',$page_data);
    }*/

    function term_date_range()
    {
        if(!empty($this->input->post('date1')))
        {
            echo term_date_range($this->input->post('term_id'),$this->input->post('date1'),'');
        }

    }
}