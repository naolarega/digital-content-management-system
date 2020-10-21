<?php
class Home extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->helper(array('form','url','cookie','string', 'date'));
	}
	
	
	public function _remap($page, $action){
		$is_loged_in = $this->is_loged_in();
		
		if($page == 'video' or $page == 'music' or $page == 'image' or
			$page == 'app' or $page == 'book' or $page == 'index'){
			if($page == 'index'){
				$this->home('video', $action, $is_loged_in);
			}
			else{
				$this->home($page, $action, $is_loged_in);
			}
		}
		else if($page == 'view_creator'){
			$this->view_creator($action, $is_loged_in);
		}
		else if($page == 'sign_up'){
			$this->sign_up($action, $is_loged_in);
		}
		else if($page == 'log_in'){
			$this->log_in($action, $is_loged_in);
		}
		else if($page == 'log_out'){
			$this->log_out($action);
		}
		else if($page == 'delete_account'){
			$this->delete_account($action);
		}
		else if($page == 'about'){
			$this->load->view('pages/home/about');
			$this->load->view('templates/footer');
		}
		else if($page == 'ajax'){
			$this->ajax();
		}
		else{
			show_404();
		}
	}
	
	
	public function home($page, $action, $is_loged_in){
		$data['page'] = $page;
		$data['is_loged_in'] = $is_loged_in;
		if(count($action) == 0){
			$data['contents'] = $this->load_content($page, null, null, null, null, 'content_name', null);
			$this->load->view('templates/header',$data);
			$this->load->view('templates/tag');
			$this->load->view('pages/home/'.$page, $data);
			$this->load->view('templates/footer');
		}
		else if(count($action) > 0){
			if($action[0] == 'view'){
				$data['content'] = $this->load_content($page, null, $action[1], null, null, 'content_name', null);
				$this->db->where('content_id', $action[1]);
				$data['comments'] = $this->db->get('comment');
				$this->load->view('templates/header',$data);
				$this->load->view('templates/tag');
				if($page == 'video'){
					$this->load->view('pages/home/video_view', $data);
				}
				else if($page == 'music'){
					$this->load->view('pages/home/music_view', $data);
				}
				else if($page == 'image'){
					$this->load->view('pages/home/image_view', $data);
				}
				else if($page == 'app'){
					$this->load->view('pages/home/app_view', $data);
				}
				else if($page == 'book'){
					$this->load->view('pages/home/book_view', $data);
				}
				$this->load->view('templates/footer');
			}
			if($action[0] == 'search'){
				$search = $this->input->post('search', true);
				$data['contents'] = $this->load_content($page, $search, null, null, null, 'content_name', null);
				$this->load->view('templates/header',$data);
				$this->load->view('templates/tag');
				$this->load->view('pages/home/'.$page, $data);
				$this->load->view('templates/footer');
			}
			if($action[0] == 'sort'){
				$sort = '';
				if($action[1] == 'alphabet'){
					$sort = 'content_name';
				}
				else if($action[1] == 'rate'){
					$sort = 'rating';
				}
				$data['contents'] = $this->load_content($page, null, null, null, null, $sort, null);
				$this->load->view('templates/header',$data);
				$this->load->view('templates/tag');
				$this->load->view('pages/home/'.$page, $data);
				$this->load->view('templates/footer');
			}
			if($action[0] == 'tag'){
				$data['contents'] = $this->load_content($page, null, null, null, null, 'content_name', $action[1]);
				$this->load->view('templates/header',$data);
				$this->load->view('templates/tag');
				$this->load->view('pages/home/'.$page, $data);
				$this->load->view('templates/footer');
			}
		}
	}
	
	
	public function load_content($type, $search_title = null, $specific_id = null, $amount = null, $offset = null, $sort_by = null, $tag = null){
		if($specific_id == null){
			if($amount != null){
				$this->db->limit($amount);
			}
			if($offset != null){
				$this->db->offset($offset);
			}
			if($sort_by != null){
				$this->db->order_by($sort_by, 'DESC');
			}
			if($search_title != null){
				$this->db->like('content_name', $search_title);
			}
			if($tag != null){
				$this->db->where('tag', $tag);
			}
			$query = $this->db->get_where('content', array('type' => $type));
			return $query;
		}
		else{
			$query = $this->db->get_where('content', array('content_id' => $specific_id, 'type' => $type));
			return $query;
		}
	}
	
	
	public function ajax(){
		$content_id = $this->input->post('content_id');
		$creator_id = $this->input->post('creator_id');
		$user_id = $this->input->post('user_id');
		$user = $this->db->get_where('user', array('user_id' => $user_id));
		$user = $user->result()[0];
		if($this->input->post('type') == 'favorite'){
			if($user->type == '1'){
				$customer = $this->db->get_where('customer', array('user_id' => $user_id));
				$customer = $customer->result()[0];
				$favorite = unserialize($customer->favorite);
				if(!in_array($content_id, $favorite)){
					array_push($favorite, $content_id);
					$favorite = serialize($favorite);
					$this->db->where('user_id', $user_id);
					$this->db->update('customer', array('favorite' => $favorite, 'download' => $favorite));
				}
			}
		}
		else if($this->input->post('type') == 'comment'){
			$comment = $this->input->post('comment');
			$user_id = $this->input->post('user_id');
			$content_id = $this->input->post('content_id');
			
			$comment_info = array(
				"comment_id" => random_string('alnum', 8),
				"user_id" => $user_id,
				"content_id" => $content_id,
				"comment_date" => mdate('%Y-%m-%j %H:%I:00'),
				"comment" => $comment
			);
			
			$this->db->insert('comment', $comment_info);
		}
		else if($this->input->post('type') == 'wishlist'){
			if($user->type == '1'){
				$customer = $this->db->get_where('customer', array('user_id' => $user_id));
				$customer = $customer->result()[0];
				$wishlist = unserialize($customer->wishlist);
				if(!in_array($content_id, $wishlist)){
					array_push($wishlist, $content_id);
					$wishlist = serialize($wishlist);
					$this->db->where('user_id', $user_id);
					$this->db->update('customer', array('wishlist' => $wishlist));
				}
			}
		}
		else if($this->input->post('type') == 'subscribe'){
			if($user->type == '1'){
				$customer = $this->db->get_where('customer', array('user_id' => $user_id));
				$customer = $customer->result()[0];
				$subscription = unserialize($customer->subscription);
				if(!in_array($creator_id, $subscription)){
					array_push($subscription, $creator_id);
					$subscription = serialize($subscription);
					$this->db->where('user_id', $user_id);
					$this->db->update('customer', array('subscription' => $subscription));
				}
			}
		}
	}


	public function view_creator($action, $is_loged_in){
		$data['page'] = 'view_creator';
		$data['is_loged_in'] = $is_loged_in;
		
		$data['creator_info'] = $this->db->get_where('user', array('user_id' => $action[0]));
		$data['creator_content'] = $this->db->get_where('content', array('user_id' => $action[0]));
		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/creator_view_sidemenu', $data);
		$this->load->view('pages/home/creator_view', $data);
		$this->load->view('templates/footer');
	}
	
	
	public function sign_up($action, $is_loged_in){
		$data['page'] = 'sign_up';
		$data['is_loged_in'] = $is_loged_in;
		$this->load->library('form_validation');
		
		$file_name = random_string('alnum', 16);
		$profile_config = array(
			'upload_path' => './dcms-content/images/user-profile/',
			'allowed_types' => 'gif|jpg|png',
			'file_name' => $file_name,
		);
		$this->load->library('upload', $profile_config);
		
		$this->form_validation->set_rules('username', 'username', 'required|is_unique[user.user_name]');
		$this->form_validation->set_rules('firstname', 'firstname', 'required');
		$this->form_validation->set_rules('lastname', 'lastname', 'required');
		$this->form_validation->set_rules('email', 'email', 'required|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('phonenumber', 'phonenumber', 'required');
		if(count($action) > 0 and $action[0] == 'user' or count($action) == 0){
			$this->form_validation->set_rules('preference', 'preference', 'required');
		}
		else if(count($action) > 0 and $action[0] == 'creator'){
			$this->form_validation->set_rules('description', 'description', 'required');
			$this->form_validation->set_rules('knownfor', 'knownfor', 'required');
		}
		$this->form_validation->set_rules('password', 'password', 'required');
		$this->form_validation->set_rules('confirm_password', 'confirm_password', 'required|matches[password]');

		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('templates/header', $data);
			if(count($action) > 0 and $action[0] == 'user' or count($action) == 0){
				$this->load->view('pages/home/sign_up_user', $data);
			}
			else if(count($action) > 0 and $action[0] == 'creator'){
				$this->load->view('pages/home/sign_up_creator', $data);
			}
			else if(count($action) > 0 and $action[0] == 'admin'){
				$this->load->view('pages/home/sign_up_admin', $data);
			}
			$this->load->view('templates/footer');
		}
		else
		{
			$user_id = random_string('alnum', 6);
			$user_info = array(
				'user_id' => $user_id,
				'user_name' => $this->input->post('username', true),
				'first_name' => $this->input->post('firstname', true),
				'last_name' => $this->input->post('lastname', true),
				'phone_number' => $this->input->post('phonenumber', true),
				'email' => $this->input->post('email', true),
				'password' => md5($this->input->post('password', true))
			);
			
			if(!$this->upload->do_upload('profileimage')){
				$user_info['profile_image'] = 'default-user-profile.jpg';
			}
			else{
				$user_info['profile_image'] = $this->upload->data('file_name');
			}
			
			$more_infor = array();
			$user_type = '';
			if(count($action) > 0 and $action[0] == 'user' or count($action) == 0){
				$user_info['type'] = '1';
				$more_info = array(
					'user_id' => $user_id,
					'preference' => $this->input->post('preference', true),
					'download' => serialize(array()),
					'subscription' => serialize(array()),
					'favorite' => serialize(array()),
					'wishlist' => serialize(array()),
					
				);
				$user_type = 'customer';
			}
			else if(count($action) > 0 and $action[0] == 'creator'){
				$user_info['type'] = '2';
				$more_info = array(
					'user_id' => $user_id,
					'description' => $this->input->post('description', true),
					'profession' => $this->input->post('knownfor', true)
				);
				$user_type = $action[0];
			}
			else if(count($action) > 0 and $action[0] == 'admin'){
				$user_info['type'] = '3';
				$access = array(
					'user',
					array_key_exists('commentaccess',$this->input->post()) ? ',comment' : '',
					array_key_exists('uploadaccess',$this->input->post()) ? ',upload' : '');
				$access = serialize($access);
				
				$more_info = array(
					'user_id' => $user_id,
					'access_level' => $access
				);
				$user_type = $action[0];
			}
			
			$this->db->insert('user',$user_info);
			$this->db->insert($user_type, $more_info);
			
			redirect('log_in/signed_in');
		}
	}
	
	
	public function log_in($action, $is_loged_in){
		$data['page'] = 'log_in';
		$data['signed_in'] =  false;
		$data['is_loged_in'] = $is_loged_in;
		$data['wrong_user_password'] = false;
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');
		
		if(count($action) > 0 and $action[0] == 'signed_in'){
			$data['signed_in'] = true;
			delete_cookie("dcms_username");
			delete_cookie("dcms_password");
			delete_cookie("dcms_type");
		}
		if (get_cookie('dcms_username', true) == null and $this->form_validation->run() == FALSE)
		{
			$this->load->view('templates/header',$data);
			$this->load->view('pages/home/log_in', $data);
			$this->load->view('templates/footer');
		}
		else
		{
			if(get_cookie('dcms_username', true) == null){
				$login_info = array(
					'user_name' => $this->input->post('username', true),
					'password' => md5($this->input->post('password', true))
				);
				$this->db->select('password, user_name, type');
				$login_query = $this->db->get_where('user',$login_info);
				if(count($login_query->result()) > 0){
					$cookie_setting = array(
						'name' => '',
						'value' => '',
						'expire' => 86400 * 30,
						'httponly' => true
					);
					$cookie_setting['name'] = 'dcms_username';
					$cookie_setting['value'] = $login_query->result()[0]->user_name;
					set_cookie($cookie_setting);
					$cookie_setting['name'] = 'dcms_password';
					$cookie_setting['value'] = $login_query->result()[0]->password;
					set_cookie($cookie_setting);
					$cookie_setting['name'] = 'dcms_type';
					$cookie_setting['value'] = $login_query->result()[0]->type;
					set_cookie($cookie_setting);
					$this->load_dashboard($login_query->result()[0]->type);
				}
				else{
					$data['wrong_user_password'] = true;
					$this->load->view('templates/header', $data);
					$this->load->view('pages/home/log_in', $data);
					$this->load->view('templates/footer');
				}
			}
			else{
				$cookie_values = array(
					'username' => get_cookie('dcms_username', true),
					'password' => get_cookie('dcms_password', true),
					'type' => get_cookie('dcms_type', true)
				);
				$login_info = array(
					'user_name' => $cookie_values['username'],
					'password' => $cookie_values['password']
				);
				$this->db->select('user_name', 'password');
				$login_query = $this->db->get_where('user',$login_info);
				
				if(count($login_query->result()) > 0){
					$this->load_dashboard($cookie_values['type']);
				}
			}
		}
	}
	
	
	public function load_dashboard($type){
		if($type == '1'){
			redirect('/user');
		}
		else if($type == '2'){
			redirect('/creator');
		}
		else if($type == '3'){
			redirect('/admin');
		}
	}
	
	
	public function log_out($action){
		if(get_cookie('dcms_username', true) != null){
			delete_cookie('dcms_username');
			delete_cookie('dcms_password');
			delete_cookie('dcms_type');
			
			redirect('');
		}
	}
	
	
	public function delete_account(){
		if(get_cookie('dcms_username', true) != null){
			$user = $this->db->get_where('user', array('user_name' => get_cookie('dcms_username', true)));
			delete_cookie('dcms_username');
			delete_cookie('dcms_password');
			delete_cookie('dcms_type');
			$user = $user->result()[0]->user_id;
			$this->db->where('user_id', $user);
			$this->db->delete('user');
			redirect('');
		}
	}
	
	
	public function is_loged_in(){
		if(get_cookie('dcms_username', true) == null){
			//redirect('log_in');
			return false;
		}
		else{
			return true;
		}
	}
}
?>