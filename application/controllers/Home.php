<?php
class Home extends CI_Controller{
	public function _remap($page, $action){
		if($page === 'video'){
			$this->video($action);
		}
		else if($page === 'music'){
			$this->music($action);
		}
		else if($page === 'image'){
			$this->image($action);
		}
		else if($page === 'app'){
			$this->app($action);
		}
		else if($page === 'book'){
			$this->book($action);
		}
		else if($page === 'view_creator'){
			$this->view_creator($action);
		}
		else if($page === 'index'){
			$this->video($action);
		}
		else{
			echo $page;
			show_404();
		}
	}
	public function video($action){
		$header['page'] = 'video';
		if(count($action) == 0){
			$this->load->view('templates/header',$header);
			$this->load->view('templates/tag');
			$this->load->view('pages/home/video');
			$this->load->view('templates/footer');
		}
		else if($action[0] === 'watch'){
			$this->load->view('templates/header',$header);
			$this->load->view('templates/tag');
			$this->load->view('pages/home/video_watch');
			$this->load->view('templates/footer');
		}
	}
	public function music($action){
		$header['page'] = 'music';
		if(count($action) == 0){
			$this->load->view('templates/header',$header);
			$this->load->view('templates/tag');
			$this->load->view('pages/home/music');
			$this->load->view('templates/footer');
		}
		else if($action[0] === 'listen'){
			$this->load->view('templates/header',$header);
			$this->load->view('templates/tag');
			$this->load->view('pages/home/music_listen');
			$this->load->view('templates/footer');
		}
	}
	public function image($action){
		$header['page'] = 'image';
		if(count($action) == 0){
			$this->load->view('templates/header',$header);
			$this->load->view('templates/tag');
			$this->load->view('pages/home/image');
			$this->load->view('templates/footer');
		}
		else if($action[0] === 'display'){
			$this->load->view('templates/header',$header);
			$this->load->view('templates/tag');
			$this->load->view('pages/home/image_display');
			$this->load->view('templates/footer');
		}
	}
	public function app($action){
		$header['page'] = 'app';
		
		$this->load->view('templates/header',$header);
		$this->load->view('templates/tag');
		$this->load->view('pages/home/app');
		$this->load->view('templates/footer');
	}
	public function book($action){
		$header['page'] = 'book';
		
		$this->load->view('templates/header',$header);
		$this->load->view('templates/tag');
		$this->load->view('pages/home/book');
		$this->load->view('templates/footer');
	}
	public function view_creator(){
		$this->load->view('templates/user_header');
		$this->load->view('templates/creator_view_sidemenu');
		$this->load->view('pages/home/creator_view');
		$this->load->view('templates/footer');
	}
}
?>