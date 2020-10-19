<?php
class User extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->helper(array('url','cookie'));
	}
	
	
	public function _remap($page, $action){
		$this->is_logedin();
		switch($page){
			case 'download':
				$this->download($action);
				break;
			case 'subscription':
				$this->subscription($action);
				break;
			case 'favorite':
				$this->favorite($action);
				break;
			case 'wishlist':
				$this->wishlist($action);
				break;
			case 'setting':
				$this->setting($action);
				break;
			case 'index':
				$this->download($action);
				break;
			default:
				show_404();
		}
	}
	
	
	public function download($action){
		$data['page'] = 'download';
		$data['type'] = 'user';
		
		if(count($action) == 0){
			$this->load->view('templates/user_header', $data);
			$this->load->view('templates/user_sidemenu', $data);
			$this->load->view('pages/dashboard/user/download');
			$this->load->view('templates/footer');
		}
	}
	
	
	public function subscription($action){
		$data['page'] = 'subscription';
		$data['type'] = 'user';
		
		if(count($action) == 0){
			$this->load->view('templates/user_header', $data);
			$this->load->view('templates/user_sidemenu',$data);
			$this->load->view('pages/dashboard/user/subscription');
			$this->load->view('templates/footer');
		}
	}
	
	
	public function favorite($action){
		$data['page'] = 'favorite';
		$data['type'] = 'user';
		
		if(count($action) == 0){
			$this->load->view('templates/user_header', $data);
			$this->load->view('templates/user_sidemenu',$data);
			$this->load->view('pages/dashboard/user/favorite');
			$this->load->view('templates/footer');
		}
	}
	public function wishlist($action){
		$data['page'] = 'wishlist';
		$data['type'] = 'user';
		if(count($action) == 0){
			$this->load->view('templates/user_header');
			$this->load->view('templates/user_sidemenu',$data);
			$this->load->view('pages/dashboard/user/wishlist');
			$this->load->view('templates/footer');
		}
	}
	
	
	public function setting($action){
		$data['page'] = 'setting';
		$data['type'] = 'user';
		if(count($action) == 0){
			$this->load->view('templates/user_header', $data);
			$this->load->view('templates/user_sidemenu',$data);
			$this->load->view('pages/dashboard/user/setting');
			$this->load->view('templates/footer');
		}
	}
	
	
	public function is_logedin(){
		$this->load->helper(array('url','cookie'));
		if(get_cookie('dcms_username', true) == null){
			redirect('/log_in');
		}
		else if(get_cookie('dcms_type', true) != '1'){
			redirect('/log_in');
		}
	}
}
?>