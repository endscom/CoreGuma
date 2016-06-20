<?php
class Menu_controller extends CI_Controller {
	public function __construct()
	{
		parent::__construct();	
		$this->load->library('session');
		$this->seguridad->estactivo($this->session->userdata('logged'));			
	}
    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/dashboardclean_View');
		$this->load->view('FRONT/Main');
		$this->load->view('templates/footer');
    }
}