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
		$content_id = $this->input->post('content_id');
		$type = $this->input->post('type');
		$user_id = $this->db->get_where('user', array('user_name' => get_cookie('dcms_username', true)));
		$user_id = $user_id->result()[0]->user_id;
		if($type == 'download'){
			$download = $this->db->get_where('customer', array('user_id' => $user_id));
			$download = $download->result()[0]->download;
			$download = unserialize($download);
			$index = array_search($content_id, $download);
			unset($download[$index]);
			sort($download);
			$download = serialize($download);
			$this->db->where('user_id', $user_id);
			$this->db->update('customer', array('download' => $download));
		}
		else if($type == 'favorite'){
			$favorite = $this->db->get_where('customer', array('user_id' => $user_id));
			$favorite = $favorite->result()[0]->download;
			$favorite = unserialize($favorite);
			$index = array_search($content_id, $favorite);
			unset($favorite[$index]);
			sort($favorite);
			$favorite = serialize($favorite);
			$this->db->where('user_id', $user_id);
			$this->db->update('customer', array('favorite' => $favorite));
		}
		else if($type == 'subscription'){
			$subscription = $this->db->get_where('customer', array('user_id' => $user_id));
			$subscription = $subscription->result()[0]->download;
			$subscription = unserialize($subscription);
			$index = array_search($content_id, $subscription);
			unset($subscription[$index]);
			sort($subscription);
			$subscription = serialize($subscription);
			$this->db->where('user_id', $user_id);
			$this->db->update('customer', array('subscription' => $subscription));
		}
		else if($type == 'wishlist'){
			$wishlist = $this->db->get_where('customer', array('user_id' => $user_id));
			$wishlist = $wishlist->result()[0]->download;
			$wishlist = unserialize($wishlist);
			$index = array_search($content_id, $wishlist);
			unset($wishlist[$index]);
			sort($wishlist);
			$wishlist = serialize($wishlist);
			$this->db->where('user_id', $user_id);
			$this->db->update('customer', array('wishlist' => $wishlist));
		}
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