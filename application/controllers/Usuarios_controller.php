<?php

class Usuarios_controller extends CI_Controller
{	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->seguridad->estactivo($this->session->userdata('logged'));
	}
	public function index(){
		$this->Bandeja();
	}
	public function Crear(){
		$this->load->view('templates/header_home');
        $this->load->view('templates/dashboardclean_View');
        $data['EMP']=$this->users_model->AllEmp();
		$this->load->view('BACK/frmcrearusuario_view',$data);
		$this->load->view('templates/footer');
	}
	public function Bandeja(){
		$this->load->view('templates/header_home');
        $this->load->view('templates/dashboardclean_View');
        $data['MTUS']=$this->users_model->allUser();                
		$this->load->view('BACK/tabladeusuario_view',$data);
		$this->load->view('templates/footer');	
	}
	public function Eliminar($cod){		
		$data = $this->users_model->del($cod);
        if($data)
        {
            redirect('index.php/Usuarios');
        }        
	}
	public function Guardar(){
		$this->form_validation->set_rules('txtNombreUsuario', 'Campo', 'required');
		$this->form_validation->set_rules('txtpassword', 'Campo', 'required');
		
		if ($this->form_validation->run()== FALSE) {
			$this->Crear();
		} else {
			$name = $this->input->get_post('txtNombreUsuario');
			$Contraseña = $this->input->get_post('txtpassword');
			$empresa = $this->input->get_post('Empresa');			
			$Permisos = $this->input->get_post('P1');
			$OK = $this->users_model->Guardar($name,$Contraseña,$empresa,$Permisos);
			if ($OK==1) {
				redirect('index.php/Usuarios');
			}			
		}
	}
}
