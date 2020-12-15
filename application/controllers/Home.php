<?php
class Home extends CI_Controller{
	//constructor function to load codeigniter helpers
	function __construct(){
		parent::__construct();
		$this->load->helper(array('form','url','cookie','string', 'date'));
	}
	
	//function to redirect url to a specific function
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
		else if($page == 'forgot_password'){
			$this->forgot_password();
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
		else if($page == 'rate'){
			$this->rate();
		}
		else if($page == 'subscribe'){
			$this->subscribe();
		}
		else if($page == 'payment'){
			$this->payment();
		}
		else{
			show_404();
		}
	}
	
	//function to proccess rating through ajax
	public function rate(){
		$content_id = $this->input->post('content_id');
		$rating = $this->input->post('rating');
		
		if($content_id != null and $rating != null){
			$this->db->where('content_id', $content_id);
			$result = $this->db->get('content')->result()[0];
			$new_rating = $result->rating + $rating;
			$new_rating = (int)$new_rating/2;
			$this->db->set('rating', $new_rating);
			$this->db->where('content_id', $content_id);
			$this->db->update('content');
		}
		else{
			echo "error";
		}
	}
	
	//function to proccess subscription through ajax
	public function subscribe(){
		$creator = $this->input->post('creator');
		$user = $this->input->post('user');
		if($user != null and $creator != null){
			$this->db->where('user_id', $user);
			$result = $this->db->get('customer');
			$result = $result->result()[0];
			$subscription = $result->subscription;
			$subscription = unserialize($subscription);
			if(!in_array($creator, $subscription)){
				array_push($subscription, $creator);
				$subscription = serialize($subscription);
				$this->db->where('user_id', $user);
				$this->db->update('customer', array('subscription' => $subscription));
				echo 'subscribed';
			}
			else{
				echo 'already subscribed';
			}
		}
	}
	
	//function to take care of forgotten password
	public function forgot_password(){
			$data['page'] = '';
			$data['is_loged_in'] = false;
			$ajax = $this->input->post('is_ajax');
			$values = array();
			if($ajax != null and $ajax){
				$values = $this->input->post();
				if($values['type'] == 'email'){
					$this->db->where('email', $values['email']);
					$result = $this->db->get('user')->result();
					if(count($result) > 0){
						$code = random_string('numeric', 5);
						$message = 'here is your password reset code: '.$code;
						$this->db->set('reset_code', (int)$code);
						$this->db->where('user_id', $result[0]->user_id);
						$this->db->update('user');
						$this->load->helper('email');
						//send_mail($value['value'], 'dcms password reset', $massage);
						$response = array(
							"message" => $message,
							"error_code" => "email_success"
						);
						echo json_encode($response);
					}
				}
				else if($values['type'] == 'code'){
					$this->db->where('email', $values['email']);
					$result = $this->db->get('user')->result();
					if(count($result) > 0){
						if($result[0]->reset_code == $values['code']){
							$response = array(
								"message" => "code",
								"error_code" => "code_success"
							);
							echo json_encode($response);
						}
						else{
							$response = array(
								"message" => "code",
								"error_code" => "code_fail"
							);
							echo json_encode($response);
						}
					}
				}
				else if($values['type'] == 'new_password'){
					$this->db->where('email', $values['value']);
					$result = $this->db->get('user')->result();
					if(count($result) > 0){
						$password = md5($value['new_password']);
						$this->db->set('password', $password);
						$this->db->where('user_id', $result[0]->user_id);
						$this->db->update('user');
						$response = array(
							"message" => "password",
							"error_code" => "password_success"
						);
						echo json_encode($response);
						redirect('log_in');
					}
				}
			}
			else{
				$this->load->view('templates/header',$data);
				$this->load->view('pages/home/forgot_password');
				$this->load->view('templates/footer');
			}
	}
	
	//function to display contents to home page
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
				if($data['content']->result()[0]->price > 0){
					if(get_cookie('dcms_username') == null){
						redirect('log_in');
					}
				}
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
	
	//function to process payment
	function payment(){
		$content_id = $this->input->post('content_id');
		$user_id = $this->input->post('user_id');
		$creator_id = $this->input->post('creator_id');
		$platform_account_id = 'LbxCFo';
		$json = array();
		if($content_id != null and $user_id != null){
			$this->db->where('user_id', $user_id);
			$user = $this->db->get('user')->result()[0];
			$this->db->where('content_id', $content_id);
			$content = $this->db->get('content')->result()[0];
			if($user->balance > $content->price){
				$customer_balance = $user->balance - $content->price;
				
				$creator_balance = $this->db->get_where('user', array('user_id' => $creator_id))->result();
				$creator_balance = $creator_balance[0]->balance;
				$creator_balance = $creator_balance + ($content->price * 70)/100;
				
				$platform_balance = $this->db->get_where('user', array('user_id' => $platform_account_id))->result();
				$platform_balance = $platform_balance[0]->balance;
				$platform_balance = $platform_balance + ($content->price * 30)/100;
				
				$payed_content = $this->db->get_where('customer',array('user_id'=>$user_id));
				$payed_content = $payed_content->result()[0];
				$payed_content = unserialize($payed_content->payed_content);
				if($payed_content == false){
					$payed_content = array();
				}
				array_push($payed_content, $content_id);
				$json['payed'] = $payed_content;
				$payed_content = serialize($payed_content);
				
				$this->db->set('payed_content', $payed_content);
				$this->db->where('user_id', $user_id);
				$this->db->update('customer');
				
				$this->db->set('balance', $customer_balance);
				$this->db->where('user_id', $user_id);
				$this->db->update('user');
				
				$this->db->set('balance', $creator_balance);
				$this->db->where('user_id', $creator_id);
				$this->db->update('user');
				
				$this->db->set('balance', $platform_balance);
				$this->db->where('user_id', $platform_account_id);
				$this->db->update('user');
				$json['status'] = 'success';
				$json['file_name'] = $content->file_name;
				$json['type'] = $content->type;
			}
			else{
				$json['status'] = 'low balance';
			}
		}
		else{
			$json['status'] = 'failed';
		}
		echo json_encode($json);
	}
	
	//function to fetch content from database
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
					echo json_encode(array('status' => 'added', 'message' => 'added to wishlist'));
				}
				else{
					echo json_encode(array('status' => 'not_added', 'message' => 'already in wishlist'));
				}
			}
			else{
				echo json_encode(array('status' => 'not_user', 'message'=> 'you are not a customer'));
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
					echo json_encode(array('status' => 'subscribed', 'message' => 'already subscribed'));
				}
				else{
					echo json_encode(array('status' => 'not_subscribed', 'message' => 'already subscribed'));
				}
			}
			else{
				echo json_encode(array('status' => 'not_user', 'message' => 'you are not a customer'));
			}
		}
	}

	//function to view the content creator for the user
	public function view_creator($action, $is_loged_in){
		$data['page'] = 'view_creator';
		$data['is_loged_in'] = $is_loged_in;
		
		$data['creator_info'] = $this->db->get_where('user', array('user_id' => $action[0]));
		$data['creator_content'] = $this->db->get_where('content', array('user_id' => $action[0]));
		$this->load->view('templates/header', $data);
		$this->load->view('templates/creator_view_sidemenu', $data);
		$this->load->view('pages/home/creator_view', $data);
		$this->load->view('templates/footer');
	}
	
	//sign up function to proccess and manage sign up
	public function sign_up($action, $is_loged_in){
		$data['page'] = 'sign_up';
		$data['is_loged_in'] = $is_loged_in;
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="alert alert-warning">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			', '</div>');
		
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
		$this->form_validation->set_rules('phonenumber', 'phonenumber', 'required|regex_match["^(09)[0-9]{8}"]');
		if(count($action) > 0 and $action[0] == 'user' or count($action) == 0){
			$this->form_validation->set_rules('preference', 'preference', 'required');
			$this->form_validation->set_rules('deposit', 'deposit', 'required|greater_than_equal_to[50]');
		}
		else if(count($action) > 0 and $action[0] == 'creator'){
			$this->form_validation->set_rules('description', 'description', 'required');
			$this->form_validation->set_rules('knownfor', 'knownfor', 'required');
		}
		$this->form_validation->set_rules('password', 'password', 'required|min_length[8]');
		$this->form_validation->set_rules('confirm_password', 'confirm password', 'required|matches[password]');

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
				'password' => md5($this->input->post('password', true)),
				'status' => 'new user',
				'balance' => 0
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
				$user_type['balance'] = $this->input->post('deposit', true);
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
					array_key_exists('commentaccess',$this->input->post()) ? 'comment' : '',
					array_key_exists('uploadaccess',$this->input->post()) ? 'content' : '');
				$access = serialize($access);
				
				$more_info = array(
					'user_id' => $user_id,
					'access_level' => $access
				);
				$user_type = $action[0];
			}
			
			$this->db->insert('user',$user_info);
			$this->db->insert($user_type, $more_info);
			if($action[0] == 'admin'){
				redirect('admin');
			}
			else if($action[0] == 'creator' or $action[0] == 'user'){
				redirect('log_in/signed_in');
			}
		}
	}
	
	//function to proccess login functionality
	public function log_in($action, $is_loged_in){
		$data['page'] = 'log_in';
		$data['signed_in'] =  false;
		$data['is_loged_in'] = $is_loged_in;
		$data['wrong_user_password'] = false;
		$data['status'] = "";
		
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
				$this->db->select('password, user_name, type, status');
				$login_query = $this->db->get_where('user',$login_info)->result();
				if(count($login_query) > 0){
					if($login_query[0]->status == 'approved'
						or $login_query[0]->status == 'warned'){
						$cookie_setting = array(
							'name' => '',
							'value' => '',
							'expire' => 86400 * 30,
							'httponly' => true
						);
						$cookie_setting['name'] = 'dcms_username';
						$cookie_setting['value'] = $login_query[0]->user_name;
						set_cookie($cookie_setting);
						$cookie_setting['name'] = 'dcms_password';
						$cookie_setting['value'] = $login_query[0]->password;
						set_cookie($cookie_setting);
						$cookie_setting['name'] = 'dcms_type';
						$cookie_setting['value'] = $login_query[0]->type;
						set_cookie($cookie_setting);
						$this->load_dashboard($login_query[0]->type);
					}
					else if($login_query[0]->status == 'new user'
						or $login_query[0]->status == 'banned'){
						$data['status'] = $login_query[0]->status;
						$this->load->view('templates/header', $data);
						$this->load->view('pages/home/log_in', $data);
						$this->load->view('templates/footer');
					}
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
				$login_query = $this->db->get_where('user',$login_info)->result();
				
				if(count($login_query) > 0){
					$this->load_dashboard($cookie_values['type']);
				}
			}
		}
	}
	
	//function to direct user to their dashboards
	public function load_dashboard($type){
		if($type == '1'){
			redirect('');
		}
		else if($type == '2'){
			redirect('/creator');
		}
		else if($type == '3'){
			redirect('/admin');
		}
	}
	
	//function for the user to logout
	public function log_out($action){
		if(get_cookie('dcms_username', true) != null){
			delete_cookie('dcms_username');
			delete_cookie('dcms_password');
			delete_cookie('dcms_type');
			
			redirect('');
		}
	}
	
	//function for the user to delete their account
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
	
	// checks whether user is loged in or not
	public function is_loged_in(){
		if(get_cookie('dcms_username',  true) != null){
			$user = $this->db->get_where('user', array('user_name' => get_cookie('dcms_username', true)));
			$user = $user->result();
			if(count($user) > 0){
				if($user[0]->password != get_cookie('dcms_password', true)){					
					delete_cookie("dcms_username");
					delete_cookie("dcms_password");
					delete_cookie("dcms_type");
					return false;
				}
				else{
					return true;
				}
			}
			else{									
				delete_cookie("dcms_username");
				delete_cookie("dcms_password");
				delete_cookie("dcms_type");
				return false;
			}
		}
		else{
			return false;
		}
	}
}
?>