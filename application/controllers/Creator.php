<?php
class Creator extends CI_Controller{
	public function index($page = 'video'){
		if(!file_exists(APPPATH.'views/pages/dashboard/creator/'.$page.'.php')){
			show_404();
		}
		$data = array(
			'page' => $page
		);
		$this->load->view('templates/user_header');
		$this->load->view('templates/creator_sidemenu',$data);
		$this->load->view('pages/dashboard/creator/'.$page);
		$this->load->view('templates/footer');
	}
}
?>