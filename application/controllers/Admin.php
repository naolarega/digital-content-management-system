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
	

	public function setting($page, $action){
		$data['page'] = 'setting';
		$data['type'] = 'admin';
		
		$this->load->library('form_validation');
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
			}
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