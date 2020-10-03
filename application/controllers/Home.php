<?php
class Home extends CI_Controller{
	public function _remap($page){
		if($page === 'video'){
			$this->video();
		}
		else if($page === 'music'){
			$this->music();
		}
		else if($page === 'image'){
			$this->image();
		}
		else if($page === 'app'){
			$this->app();
		}
		else if($page === 'book'){
			$this->book();
		}
		else if($page === 'view_creator'){
			$this->view_creator();
		}
		else if($page === 'index'){
			$this->video();
		}
		else{
			echo $page;
			show_404();
		}
	}
	public function video(){
		$header['page'] = 'video';
		
		$this->load->view('templates/header',$header);
		$this->load->view('templates/tag');
		$this->load->view('pages/home/video');
		$this->load->view('templates/footer');
	}
	public function music(){
		$header['page'] = 'music';
		
		$this->load->view('templates/header',$header);
		$this->load->view('templates/tag');
		$this->load->view('pages/home/music');
		$this->load->view('templates/footer');
	}
	public function image(){
		$header['page'] = 'image';
		
		$this->load->view('templates/header',$header);
		$this->load->view('templates/tag');
		$this->load->view('pages/home/image');
		$this->load->view('templates/footer');
	}
	public function app(){
		$header['page'] = 'app';
		
		$this->load->view('templates/header',$header);
		$this->load->view('templates/tag');
		$this->load->view('pages/home/app');
		$this->load->view('templates/footer');
	}
	public function book(){
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