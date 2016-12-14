<?php
class Bancos_controller extends CI_Controller {
	public function __construct()
	{
		parent::__construct();		
        $this->load->library('session');
        $this->seguridad->estactivo($this->session->userdata('logged'));
        $this->load->library('MPDF57/mpdf');
	}


    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/dashboard_View');        
		$this->load->view('FRONT/DisponibleBancos_view');
		$this->load->view('templates/footer_clean');

    }
        /* GENERAR UN ARCHIVO PDF*/
    
    public function pdf(){    
       
        $mPDF = new mPDF('utf-8','Legal-L');

        $fecha=$_POST['fecha'];   
        $Empresas=$_POST['empresa'];    
        $data['empresa']=$Empresas;
        $data['MTMV'] = $this->bancos_modal->AllMVf($fecha,$Empresas); 
        $mPDF->writeHTML( $this->load->view('BACK/unimark_formato_view',$data,true));
        $mPDF->Output();
    }

   

    /*fin de pdf*/
    public function IngresarInfo(){        
    	$this->load->view('templates/header');
        $this->load->view('templates/dashboardclean_View');    
        $data['MTBN']=$this->Ctas_model->allcts();

		$this->load->view('BACK/frmingresobancos_view',$data);
		$this->load->view('templates/footer');
    }
    public function Bandeja(){
        
        $this->load->view('templates/header_home');
        $this->load->view('templates/dashboardclean_View');
        $Empresa= $_SESSION['SlpEmpresa'];
        //echo $Empresa;
        $data['empresa']=$Empresa;
        $data['AllM']=$this->bancos_modal->allbnk();                    
        $this->load->view('BACK/tabladeformatosdisponibles_view',$data);
        $this->load->view('templates/footer');
        
    }
    public function SendFormat(){
        $this->load->view('templates/header');
        $this->load->view('templates/dashboardclean_View');
        $data['fecha']=$this->bancos_modal->Fecha(); 
        $data['All']=$this->bancos_modal->allstatus(); 

        $this->load->view('FRONT/tablaingresos',$data);
        $this->load->view('templates/footer_admin');

    }
    public function Edit($f){
        $this->load->view('templates/header');
        $this->load->view('templates/dashboardclean_View');    
        $data['MTMV'] = $this->bancos_modal->AllMVf($f,$_SESSION['SlpEmpresa']);    
        $this->load->view('BACK/frmeditbancos_view',$data);
        $this->load->view('templates/footer');
    }
    public function ViewFormato($f){
        $this->load->view('templates/header');
        $this->load->view('templates/dashboardclean_View'); 
        $Empresa= $_SESSION['SlpEmpresa'];
        $data['empresa']=$Empresa;
        $data['MTMV'] = $this->bancos_modal->AllMVf($f,$Empresa);    
        $this->load->view('BACK/formato_view',$data);
        $this->load->view('templates/footer');
    }/**/
     
      public function ViewFormatoUNI($f){
        $this->load->view('templates/header');
        $this->load->view('templates/dashboardclean_View'); 
        $Empresa= $_SESSION['SlpEmpresa'];
        $data['empresa']=$Empresa;
        $data['MTMV'] = $this->bancos_modal->AllMVf($f,$Empresa);    
        $this->load->view('BACK/Empresas/UNI_view',$data);
        $this->load->view('templates/footer');
    }
      public function ViewFormatoUMA($f){
        $this->load->view('templates/header');
        $this->load->view('templates/dashboardclean_View'); 
        $Empresa= $_SESSION['SlpEmpresa'];
        $data['empresa']=$Empresa;
        $data['MTMV'] = $this->bancos_modal->AllMVf($f,$Empresa);    
        $this->load->view('BACK/Empresas/Uma_view',$data);
        $this->load->view('templates/footer');
    }
    public function ViewFormatoUMV($f){
        $this->load->view('templates/header');
        $this->load->view('templates/dashboardclean_View'); 
        $Empresa= $_SESSION['SlpEmpresa'];
        $data['empresa']=$Empresa;
        $data['MTMV'] = $this->bancos_modal->AllMVf($f,$Empresa);    
        $this->load->view('BACK/Empresas/Umavet_view',$data);
        $this->load->view('templates/footer');
    }
    public function ViewFormatoInn($f){
        $this->load->view('templates/header');
        $this->load->view('templates/dashboardclean_View'); 
        $Empresa= $_SESSION['SlpEmpresa'];
        $data['empresa']=$Empresa;
        $data['MTMV'] = $this->bancos_modal->AllMVf($f,$Empresa);    
        $this->load->view('BACK/Empresas/Innova_view',$data);
        $this->load->view('templates/footer');
    }
    public function ViewFormatoAglosa($f){
        $this->load->view('templates/header');
        $this->load->view('templates/dashboardclean_View'); 
        $Empresa= $_SESSION['SlpEmpresa'];
        $data['empresa']=$Empresa;
        $data['MTMV'] = $this->bancos_modal->AllMVf($f,$Empresa);    
        $this->load->view('BACK/Empresas/Aglosa_view',$data);
        $this->load->view('templates/footer');
    }
   /**/
    public function View_detalles($Empresa,$f){
        $this->load->view('templates/header');
        $this->load->view('templates/dashboardclean_View');    
        $data['empresa']=$Empresa;
        $data['MTMV'] = $this->bancos_modal->AllMVf($f,$Empresa);    
        $this->load->view('BACK/formato_view',$data);
        $this->load->view('templates/footer');
    }
    /*Vista por empresa*/
     
       public function View_detallesUNI($Empresa,$f){
        $this->load->view('templates/header');
        $this->load->view('templates/dashboardclean_View');    
        $data['empresa']=$Empresa;
        //echo $Empresa;
        $data['MTMV'] = $this->bancos_modal->AllMVf($f,$Empresa);    
        $this->load->view('BACK/Empresas/UNI_view',$data);
        $this->load->view('templates/footer');
      }

      public function View_detallesUMA($Empresa,$f){
        $this->load->view('templates/header');
        $this->load->view('templates/dashboardclean_View');    
        $data['empresa']=$Empresa;
        $data['MTMV'] = $this->bancos_modal->AllMVf($f,$Empresa);    
        $this->load->view('BACK/Empresas/Uma_view',$data);
        $this->load->view('templates/footer');
    }

     public function View_detallesUmaVet($Empresa,$f){
        $this->load->view('templates/header');
        $this->load->view('templates/dashboardclean_View');    
        $data['empresa']=$Empresa;
        $data['MTMV'] = $this->bancos_modal->AllMVf($f,$Empresa);    
        $this->load->view('BACK/Empresas/Umavet_view',$data);
        $this->load->view('templates/footer');
    }
    public function View_detallesInnova($Empresa,$f){
        $this->load->view('templates/header');
        $this->load->view('templates/dashboardclean_View');    
        $data['empresa']=$Empresa;
        $data['MTMV'] = $this->bancos_modal->AllMVf($f,$Empresa);    
        $this->load->view('BACK/Empresas/Innova_view',$data);
        $this->load->view('templates/footer');
    }
    public function View_detallesAglosa($Empresa,$f){
        $this->load->view('templates/header');
        $this->load->view('templates/dashboardclean_View');    
        $data['empresa']=$Empresa;
        $data['MTMV'] = $this->bancos_modal->AllMVf($f,$Empresa);    
        $this->load->view('BACK/Empresas/Aglosa_view',$data);
        $this->load->view('templates/footer');
    }
  /* */
    public function IngxEmpre(){        
        $json = array();
        $json['data'] = $this->bancos_modal->AllMVf($this->input->get('Fe'),$this->input->get('Empr'));    
        if (($json['data'])==0) {            
        } else {            
            echo json_encode($json);                   
        }        
    }
    public function toXLS(){
        header("Content-type: application/vnd.ms-excel; name='excel'");
        header("Content-Disposition: filename=File.xls");
        header("Pragma: no-cache");
        header("Expires: 0");
        echo $_POST['datos_a_enviar'];
    }
    public function Updatebanco(){
        $Cuentas = $this->input->get_post('txtCts');
        $porciones = explode(",", $Cuentas);
        foreach ($porciones as $key => $value) { 
            
            $IdDB       = $value;

            $SaldoLA    = $this->input->get_post('row-'.$value.'-1');            
            $MDIDP      = $this->input->get_post('row-'.$value.'-2');
            $MDINC      = $this->input->get_post('row-'.$value.'-3');
            $MDECHK     = $this->input->get_post('row-'.$value.'-4');
            $MDIEND     = $this->input->get_post('row-'.$value.'-5');
            $CHKF       = $this->input->get_post('row-'.$value.'-6');
            $DPD        = $this->input->get_post('row-'.$value.'-7');
            

            $SaldoLF    = $SaldoLA + $MDIDP + $MDINC - $MDECHK - $MDIEND;
            $SaldoB     = $SaldoLF + $CHKF;
            $SaldoR     = $SaldoLF - $DPD;

            //echo $IdDB.'-'.$SaldoLA.'-'.$MDIDP.'-'.$MDINC.'-'.$MDECHK.'-'.$MDIEND.'-'.$SaldoLF.'-'.$CHKF.'-'.$SaldoB.'-'.$DPD.'-'.$SaldoR.'<br>';
            $OK         = $this->bancos_modal->update($IdDB,$SaldoLA,$MDIDP,$MDINC,$MDECHK,$MDIEND,$SaldoLF,$CHKF,$SaldoB,$DPD,$SaldoR);
                
        }
         if ($OK==1) {
                redirect('index.php/Bandeja');
            }

    }
    public function SaveBank(){
        
        $Cuentas = $this->input->get_post('txtCts');
        $Fechas = $this->input->get_post('Fecha');
        //CONVERCION DE STRING TO ARRAY
        $porciones = explode(",", $Cuentas);
        
        foreach ($porciones as $key => $value) { 
            
            $IdDB       = $value;

            $SaldoLA    = $this->input->get_post('row-'.$value.'-1');
            $FechaSLA   = $this->input->get_post('FechaSLA');
            $MDIDP      = $this->input->get_post('row-'.$value.'-2');
            $MDINC      = $this->input->get_post('row-'.$value.'-3');
            $MDECHK     = $this->input->get_post('row-'.$value.'-4');
            $MDIEND     = $this->input->get_post('row-'.$value.'-5');
            $CHKF       = $this->input->get_post('row-'.$value.'-6');
            $DPD        = $this->input->get_post('row-'.$value.'-7');
            $FechaM     = $this->input->get_post('FechaM');

            $SaldoLF    = $SaldoLA + $MDIDP + $MDINC - $MDECHK - $MDIEND;
            $SaldoB     = $SaldoLF + $CHKF;
            $SaldoR     = $SaldoLF - $DPD;
            
            $OK         = $this->bancos_modal->Guardar($IdDB,$SaldoLA,$FechaSLA,$MDIDP,$MDINC,$MDECHK,$MDIEND,$SaldoLF,$CHKF,$SaldoB,$DPD,$SaldoR,$FechaM,$_SESSION['IdUS']);
                
        }

            if ($OK==1) {
                redirect('index.php/Bandeja');
            }
    }
}