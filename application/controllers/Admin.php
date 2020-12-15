<?php
class Admin extends CI_Controller{
	//constructor function to load codeigniter helpers
	function __construct(){
		parent::__construct();
		$this->load->helper(array('url','cookie'));
	}
	
	//function to redirect url to a specific function
	public function _remap($page, $action){
		$this->is_logedin();
		$access_level = $this->access_level();
		if($page == 'user' or $page == 'comment' or $page == 'content' or $page == 'index'){
			if($page == 'index' or $page == 'user' and $access_level['user']){
				$this->admin('user', $action, $access_level);
			}
			if($page == 'comment' and $access_level['comment']){
				$this->admin('comment', $action, $access_level);
			}
			if($page == 'content' and $access_level['content']){
				$this->admin('content', $action, $access_level);
			}
		}
		else if($page == 'setting'){
			$this->setting($page, $action, $access_level);
		}
		else{		
			show_404();
		}
	}
	
	//
	public function access_level(){
		$admin = $this->db->get_where('user', array('user_name' => get_cookie('dcms_username', true)))->result();
		$access_level = array(
			'user' => false,
			'comment' => false,
			'content' => false
		);
		if(count($admin) > 0){
			$admin = $this->db->get_where('admin', array('user_id' => $admin[0]->user_id))->result();
			$admin = unserialize($admin[0]->access_level);
			if(in_array("user", $admin)){
				$access_level['user'] = true;
			}
			if(in_array("comment", $admin)){
				$access_level['comment'] = true;
			}
			if(in_array("content", $admin)){
				$access_level['content'] = true;
			}
		}
		return $access_level;
	}
	
	//function to control user comment and content
	public function admin($page, $action, $access_level){
		$data['page'] = $page;
		$data['type'] = 'admin';
		$data['access_level'] = $access_level;
		if($this->input->post('filter-user') != null){
			$user_type = $this->input->post('user-type-filter');
			$status = $this->input->post('status-filter');
			if($user_type != '0'){
				$this->db->where('type', $user_type);
			}
			if($status != 'all'){
				$this->db->where('status', $status);
			}
		}
		if($this->input->post('filter-comment') != null){
			$user = $this->input->post('user-filter');
			$content = $this->input->post('content-filter');
			if($user != 'user-all'){
				$this->db->where('user_id', $user);
			}
			if($content != 'content-all'){
				$this->db->where('content_id', $content);
			}
		}
		if($this->input->post('filter-content') != null){
			$content_type = $this->input->post('content-type-filter');
			$creator = $this->input->post('creator-filter');
			if($content_type != 'content-type-all'){
				$this->db->where('type', $content_type);
			}
			if($creator != 'creator-all'){
				$this->db->where('user_id', $creator);
			}
		}
		$data['queries'] = $this->db->get($page);
		$this->load->library('form_validation');
		if(count($action) == 0){
			$this->load->view('templates/user_header', $data);
			$this->load->view('templates/admin_sidemenu',$data);
			$this->load->view('pages/dashboard/admin/'.$page);
			$this->load->view('templates/footer');
		}
		else{
			if($page == 'comment'){
				if($action[0] == 'approval'){
					if($this->input->post('approve') != null){
						foreach($this->input->post() as $post){
							$this->db->where('comment_id', $post);
							$this->db->update('comment', array('approved' => 1));
						}
					}
					if($this->input->post('disapprove') != null){
						foreach($this->input->post() as $post){
							$this->db->where('comment_id', $post);
							$this->db->update('comment', array('approved' => 0));
						}
					}
					redirect('/admin/comment');
				}
			}
			else if($page == 'user'){
				if($action[0] == 'manage'){
					if($this->input->post('approve') != null){
						foreach($this->input->post() as $post){
							$this->db->where('user_id', $post);
							$this->db->update('user', array('status' => 'approved'));
						}
					}
					if($this->input->post('ban') != null){
						foreach($this->input->post() as $post){
							$this->db->where('user_id', $post);
							$this->db->update('user', array('status' => 'banned'));
						}
					}
					if($this->input->post('warn') != null){
						foreach($this->input->post() as $post){
							$this->db->where('user_id', $post);
							$this->db->update('user', array('status' => 'warned'));
						}
					}
					if($this->input->post('remove') != null){
						foreach($this->input->post() as $post){
							$this->db->where('user_id', $post);
							$this->db->delete('user');
						}
					}
					redirect('/admin/user');
				}
			}
			else if($page == 'content'){
				if($action[0] == 'approval'){
					if($this->input->post('approve') != null){
						foreach($this->input->post() as $post){
							$this->db->where('content_id', $post);
							$this->db->update('content', array('approved' => 1));
						}
					}
					if($this->input->post('disapprove') != null){
						foreach($this->input->post() as $post){
							$this->db->where('content_id', $post);
							$this->db->update('content', array('approved' => 0));
						}
					}
					redirect('/admin/content');
				}
			}
		}
	}
	
	//setting function to update admin information
	public function setting($page, $action, $access_level){
		$data['page'] = 'setting';
		$data['type'] = 'admin';
		$data['access_level'] = $access_level;
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="alert alert-warning">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			', '</div>');
		$this->form_validation->set_rules('username', 'username', 'is_unique[user.user_name]');
		if($this->form_validation->run() == false){
			$this->load->view('templates/user_header', $data);
			$this->load->view('templates/admin_sidemenu',$data);
			$this->load->view('pages/dashboard/admin/setting');
			$this->load->view('templates/footer');
		}
		else{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$timeout = $this->input->post('timeout');
						
			$cookie_setting = array(
				'name' => '',
				'value' => '',
				'expire' => 86400 * 30,
				'httponly' => true
			);
			$user_info = array();
			if($timeout != null){
				
			}
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
			$user_id = $user->result()[0]->user_id;
			if($username != null or $password != null){
				$this->db->where('user_id', $user_id);
				$this->db->update('user', $user_info);
				$cookie_setting['name'] = 'dcms_username';
				$cookie_setting['value'] = $user_info['user_name'];
				set_cookie($cookie_setting);
			}
			redirect('admin/setting');
		}
	}
	
	// checks whether admin is loged in or not
	public function is_logedin(){
		if(get_cookie('dcms_username', true) != null){
			$user = $this->db->get_where('user', array('user_name' => get_cookie('dcms_username', true)));
			$user = $user->result();
			if(count($user) > 0){
				if($user[0]->password != get_cookie('dcms_password', true)){					
					delete_cookie("dcms_username");
					delete_cookie("dcms_password");
					delete_cookie("dcms_type");
					redirect('/log_in');
				}
				else if($user[0]->type != 3){
					delete_cookie("dcms_username");
					delete_cookie("dcms_password");
					delete_cookie("dcms_type");
					redirect('/log_in');
				}
			}
			else{									
				delete_cookie("dcms_username");
				delete_cookie("dcms_password");
				delete_cookie("dcms_type");
				redirect('/log_in');
			}
		}
		else{
			redirect('/log_in');
		}
	}
}
?>