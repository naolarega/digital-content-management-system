<?php
class User extends CI_Controller{
	public function index($page = 'download'){
		if(!file_exists(APPPATH.'views/pages/dashboard/user/'.$page.'.php')){
			show_404();
		}
		$data = array(
			'page' => $page
		);
		$this->load->view('templates/user_header');
		$this->load->view('templates/user_sidemenu',$data);
		$this->load->view('pages/dashboard/user/'.$page);
		$this->load->view('templates/footer');
	}
}
?>