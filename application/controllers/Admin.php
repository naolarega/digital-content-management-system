<?php
class Admin extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->helper(array('url','cookie'));
	}
	
	
	public function _remap($page, $action){
		$this->is_logedin();
		if($page == 'user' or $page == 'comment' or $page == 'content' or $page == 'index'){
			if($page == 'index'){
				$this->admin('user', $action);
			}
			else{
				$this->admin($page, $action);
			}
		}
		else if($page == 'setting'){
			$this->setting($page, $action);
		}
		else{		
			show_404();
		}
	}
	
	
	public function admin($page, $action){
		$data['page'] = $page;
		$data['type'] = 'admin';
		if(count($action) == 0){
			$data['queries'] = $this->db->get($page);
			$this->load->view('templates/user_header', $data);
			$this->load->view('templates/admin_sidemenu',$data);
			$this->load->view('pages/dashboard/admin/'.$page);
			$this->load->view('templates/footer');
		}
	}
	

	public function setting($page, $action){
		$data['page'] = 'setting';
		$data['type'] = 'admin';
		if(count($action) == 0){
			$this->load->view('templates/user_header', $data);
			$this->load->view('templates/admin_sidemenu',$data);
			$this->load->view('pages/dashboard/admin/setting');
			$this->load->view('templates/footer');
		}
	}
	
	
	public function is_logedin(){
		/* if(get_cookie('dcms_username', true) == null){
			redirect('/log_in');
		}
		else if(get_cookie('dcms_type', true) != '1'){
			redirect('/log_in');
		} */
	}
}
?>