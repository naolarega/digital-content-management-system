<?php
class Creator extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->helper(array('url','cookie','form','string', 'date'));
	}
	
	
	public function _remap($page, $action){
		$this->is_logedin();
		if($page == 'video' or $page == 'music' or $page == 'image' or 
			$page == 'app' or $page == 'book' or $page == 'index'){
			if($page == 'index'){
				$this->creator('video', $action);
			}
			else{
				$this->creator($page, $action);
			}
		}
		else if($page == 'setting'){
			$this->setting($action);
		}
		else{
			show_404();
		}
	}
	
	
	public function creator($page, $action){
		$data['page'] = $page;
		$data['type'] = 'creator';
		$creator_id = $this->db->get_where('user', array('user_name' => get_cookie('dcms_username', true)));
		$creator_id = $creator_id->result()[0]->user_id;

		if(count($action) == 0){
			$data['contents'] = $this->db->get_where('content', array('type' => $page, 'user_id' => $creator_id));
			
			$this->load->view('templates/user_header', $data);
			$this->load->view('templates/creator_sidemenu', $data);
			$this->load->view('pages/dashboard/creator/'.$page, $data);
			$this->load->view('templates/footer');
		}
		if(count($action) > 0){
			if($action[0] == 'uploaded'){
				$data['error'] = 'uploaded successfuly';
				
				$this->load->view('templates/user_header', $data);
				$this->load->view('templates/creator_sidemenu', $data);
				$this->load->view('pages/dashboard/creator/'.$page, $data);
				$this->load->view('templates/footer');
			}		
			else if($action[0] == 'upload'){
				$this->upload($page);
			}
		}
	}
	
	public function setting($action){
		$data['page'] = 'setting';
		$data['type'] = 'creator';

		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/creator_sidemenu', $data);
		$this->load->view('pages/dashboard/creator/setting');
		$this->load->view('templates/footer');
	}
	
	public function upload($page){
		$data['page'] = $page;
		$data['type'] = 'creator';
		
		$this->load->library('form_validation');
		
		$file_name = random_string('alnum', 32);
		$allowed_type = '';
		if($page == 'video'){
			$allowed_type = 'mp4|webm|ogg';
		}
		if($page == 'music'){
			$allowed_type = 'mp3|wav|ogg';
		}
		if($page == 'image'){
			$allowed_type = 'gif|jpg|png';
		}
		if($page == 'app'){
			$allowed_type = 'zip';
		}
		if($page == 'book'){
			$allowed_type = 'pdf|docx|epub';
		}
		$file_config = array(
			'upload_path' => './dcms-content/user-content/'.$page.'s/',
			'allowed_types' => $allowed_type,
			'file_name' => $file_name
		);
		$file_name = random_string('alnum', 32);
		$thumbnail_config = array(
			'upload_path' => './dcms-content/images/content-thumbnail/',
			'allowed_types' => 'gif|jpg|png',
			'file_name' => $file_name
		);
		$this->load->library('upload', $file_config);
		
		$this->form_validation->set_rules('title', 'title', 'required');
		if($page == 'book'){
			$this->form_validation->set_rules('author', 'author', 'required');
		}
		
		if($this->form_validation->run() == false){
			$this->load->view('templates/user_header', $data);
			$this->load->view('pages/dashboard/creator/upload', $data);
			$this->load->view('templates/footer');
		}
		else{
			$this->db->select('user_id');
			$user_id = $this->db->get_where('user',
				array('user_name' => get_cookie('dcms_username', true)));
			$content_id = random_string('alnum', 7);
			$upload_info = array(
				'content_id' => $content_id,
				'content_name' => $this->input->post('title', true),
				'release_date' => mdate('%Y-%m-%j %H:%I:00'),
				'thumbnail' => '',
				'description' => $this->input->post('description', true),
				'price' => $this->input->post('price' ,true),
				'user_id' => $user_id->result()[0]->user_id,
				'file_name' => '',
				'rating' => 0,
				'tag' => $this->input->post('tags', true),
				'type' => $page
			);
			$extra_info = array(
				'content_id' => $content_id
			);
			$data['error'] = '';
			if(!$this->upload->do_upload('file')){
				$data['error'] = $this->upload->display_errors('<div class="alert alert-warning">','</div>');
				$this->load->view('templates/user_header', $data);
				$this->load->view('pages/dashboard/creator/upload', $data);
				$this->load->view('templates/footer');
			}
			else{
				$upload_info['file_name'] = $this->upload->data('file_name');
				$this->upload->initialize($thumbnail_config);
				if(!$this->upload->do_upload('thumbnail')){
					$upload_info['thumbnail'] = 'default_'.$page.'_thumbnail.jpg';
				}
				else{
					$upload_info['thumbnail'] = $this->upload->data('file_name');
				}
			
				if($page == 'book'){
					$extra_info['author'] = $this->input->post('author', true);
				}
				
				$this->db->insert('content', $upload_info);
				$this->db->insert($page, $extra_info);
				
				$data['error'] = 'uploaded successfuly';
				redirect('creator/'.$page.'/uploaded/');
			}
		}
	}
	
	
	public function is_logedin(){
		/* if(get_cookie('dcms_username', true) == null){
			redirect('/log_in');
		}
		else if(get_cookie('dcms_type', true) != '2'){
			redirect('/log_in');
		} */
	}
}
?>