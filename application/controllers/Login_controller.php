<?php
class Login_controller extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
        $this->load->library('session');
		//$this->seguridad->estactivo($this->session->userdata('logged'));
	}

    public function index()
    {
        /*$this->load->view('templates/header');
		$this->load->view('FRONT/login_view');        
		$this->load->view('templates/footer');*/
        $this->load->view('header_login');
        $this->load->view('Login2');
        $this->load->view('footer_login');
            
        

    }


    
    public function salir(){        
        $this->session->sess_destroy();
        $sessiondata = array(
                'logged' => 0
        );

        $this->session->unset_userdata($sessiondata);
        $this->index();
        
	}
    public function Acreditar(){
    	$this->form_validation->set_rules('txtUsuario', 'Usuario', 'required');
		$this->form_validation->set_rules('txtpassword', 'Contraseña', 'required');
    	if ($this->form_validation->run()== FALSE) {
    		 redirect('index.php?error=1'); 
    	} else {
    		$name = $this->input->get_post('txtUsuario');
			$pass = $this->input->get_post('txtpassword');
			$data['user'] = $this->users_model->login($name, $pass);
            
    		if ($data['user'] == 0) {
    			redirect('index.php?error=2'); 
    		} else {
                $sessiondata = array(
                            'IdUS' => $data['user'][0]['SlpCode'],
                            'SlpName' => $data['user'][0]['SlpName'],
                            'SlpEmpresa' => $data['user'][0]['IdEM'],
                            'Permiso' => $data['user'][0]['Privilegio'],
                            'logged' => 1
                    );
                $this->session->set_userdata($sessiondata);               
                
    			redirect('index.php/dashboard'); 
    		}
    		
    	}
    	
    }
}
