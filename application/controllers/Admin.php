<?php
class Admin extends CI_Controller{
	public function index($page = 'user'){
		if(!file_exists(APPPATH.'views/pages/dashboard/admin/'.$page.'.php')){
			show_404();
		}
		$data = array(
			'page' => $page
		);
		$this->load->view('templates/user_header');
		$this->load->view('templates/admin_sidemenu',$data);
		$this->load->view('pages/dashboard/admin/'.$page);
		$this->load->view('templates/footer');
	}
}
?>