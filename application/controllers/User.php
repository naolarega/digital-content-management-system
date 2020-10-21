<?php
class User extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->helper(array('url','cookie'));
	}
	
	
	public function _remap($page, $action){
		$this->is_logedin();
		if($page == 'download' or $page == 'subscription' or $page == 'favorite' or
			$page == 'wishlist' or $page == 'index'){
			if($page == 'index'){
				$this->user('download', $action);
			}
			else{
				$this->user($page, $action);
			}
		}
		else if($page == 'setting'){
			$this->setting($action);
		}
		else if($page == 'ajax'){
			$this->ajax();
		}
		else{
			show_404();
		}
	}
	
	
	public function user($page, $action){
		$data['page'] = $page;
		$data['type'] = 'user';
		
		if(count($action) == 0){
			$query = $this->db->get_where('user', array('user_name' => get_cookie('dcms_username', true)));
			$query = $query->result()[0]->user_id;
			$query = $this->db->get_where('customer', array('user_id' => $query));
			if($page == 'download' and count($query->result()) > 0){
				$query = unserialize($query->result()[0]->download);
				if(count($query) > 0){
					$this->db->where_in('content_id', $query);
					$data['download'] = $this->db->get('content');
				}
			}
			else if($page == 'subscription' and count($query->result()) > 0){
				$query = unserialize($query->result()[0]->subscription);
				if(count($query) > 0){
					$this->db->where_in('user_id', $query);
					$data['subscription'] = $this->db->get('user');
				}
			}
			else if($page == 'favorite' and count($query->result()) > 0){
				$query = unserialize($query->result()[0]->favorite);
				if(count($query) > 0){
					$this->db->where_in('content_id', $query);
					$data['favorite'] = $this->db->get('content');
				}
			}
			else if($page == 'wishlist' and count($query->result()) > 0){
				$query = unserialize($query->result()[0]->wishlist);
				if(count($query) > 0){
					$this->db->where_in('content_id', $query);
					$data['wishlist'] = $this->db->get('content');
				}
			}
			
			$this->load->view('templates/user_header', $data);
			$this->load->view('templates/user_sidemenu', $data);
			$this->load->view('pages/dashboard/user/'.$page, $data);
			$this->load->view('templates/footer');
		}
	}
	
	public function ajax(){
		
	}
	
	public function setting($action){
		$data['page'] = 'setting';
		$data['type'] = 'user';
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'username', 'is_unique[user.user_name]');
		if($this->form_validation->run() == false){
			$this->load->view('templates/user_header', $data);
			$this->load->view('templates/user_sidemenu',$data);
			$this->load->view('pages/dashboard/user/setting');
			$this->load->view('templates/footer');
		}
		else{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$preference = $this->input->post('preference');
						
			$cookie_setting = array(
				'name' => '',
				'value' => '',
				'expire' => 86400 * 30,
				'httponly' => true
			);
			$user_info = array();
			$customer_info = array(
				'preference' => $preference
			);
			if($username != null){
				$user_info['user_name'] = $username;
				$cookie_setting['name'] = 'dcms_username';
				$cookie_setting['value'] = $user_info['user_name'];
				set_cookie($cookie_setting);
			}
			if($password != null){
				$user_info['password'] = md5($password);
				$cookie_setting['name'] = 'dcms_password';
				$cookie_setting['value'] = $user_info['password'];
				set_cookie($cookie_setting);
			}
			$this->db->where('user_name', get_cookie('dcms_username', true));
			$user_id = $this->db->get('user');
			$user_id = $user_id->result()[0]->user_id;
			if($username != null or $password != null){
				$this->db->where('user_id', $user_id);
				$this->db->update('user', $user_info);
			}
			$this->db->where('user_id', $user_id);
			$this->db->update('customer', $customer_info);
		}
	}
	
	
	public function is_logedin(){
		$this->load->helper(array('url','cookie'));
		/* if(get_cookie('dcms_username', true) == null){
			redirect('/log_in');
		}
		else if(get_cookie('dcms_type', true) != '1'){
			redirect('/log_in');
		} */
	}
}
?>