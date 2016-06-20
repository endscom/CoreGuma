<?php
	class Cuentas_controller extends CI_controller{
		public function __construct()
		{
			parent::__construct();	
			$this->load->library('session');				
        	$this->seguridad->estactivo($this->session->userdata('logged'));
        	require_once(APPPATH.'libraries/Excel/reader.php');
		}

		public function Cargardor(){
			$this->load->view('templates/header');
        	$this->load->view('templates/dashboardclean_View');        
        	$this->load->view('BACK/viewcargador');
        	$this->load->view('templates/footer_admin');
		}
		public function DetalleMovimiento($Cuenta,$Fecha,$TIPO){
			
			$this->load->view('templates/header');
        	$this->load->view('templates/dashboardclean_View');        

        	$data['Movimientos']=$this->bancos_modal->DetalleMovimiento($Cuenta,$Fecha,$TIPO);        	
        	$data['InfoCuenta']=$this->bancos_modal->DetalleCuenta($Cuenta);
        	$this->load->view('BACK/DetalleMovimiento_view',$data);

        	$this->load->view('templates/footer');

        	
		}
		public function ProcesarCargador(){			
			$data = new Spreadsheet_Excel_Reader();
			$data->setOutputEncoding('CP-1251');
			$data->read($_FILES["file"]['tmp_name']);
			error_reporting(E_ALL ^ E_NOTICE);
			//ANALISIS DE LA HOJA DE DISPONIBILIDAD BANCARIA RESUMEN
			echo $data->boundsheets[0]['name'].'<br>';
			for ($i=0; $i <= 20; $i++) { 
				$Cuenta = (@ereg_replace("[^0-9]", "", $data->sheets[0]['cells'][$i][1]));	
				if ($Cuenta<>0) {

						$IdDB       = $this->bancos_modal->idcts($Cuenta);
						$IdUS       = $this->bancos_modal->idctsUS($Cuenta);

			           	$SaldoLA    = number_format($data->sheets[0]['cells'][$i][4],2, '.', '');
			            $FechaSLA   = $this->input->get_post('FechaLibro');
			            $MDIDP      = number_format($data->sheets[0]['cells'][$i][5],2, '.', '');
			            $MDINC      = number_format($data->sheets[0]['cells'][$i][6],2, '.', '');
			            $MDECHK     = number_format($data->sheets[0]['cells'][$i][7],2, '.', '');
			            $MDIEND     = number_format($data->sheets[0]['cells'][$i][8],2, '.', '');
			            $CHKF       = number_format($data->sheets[0]['cells'][$i][10],2, '.', '');
			            $DPD        = number_format($data->sheets[0]['cells'][$i][12],2, '.', '');
			            $FechaM     = $this->input->get_post('FechaM');

			            $SaldoLF    = number_format($data->sheets[0]['cells'][$i][9],2, '.', '');
			            $SaldoB     = number_format($data->sheets[0]['cells'][$i][11],2, '.', '');
			            $SaldoR     = number_format($data->sheets[0]['cells'][$i][13],2, '.', '');

			          	//echo 'Cuenta:'.$Cuenta.' Usuario:'.$IdUS.'<br>';  
			            

			            echo $IdDB.'-'.$SaldoLA.'-'.$MDIDP.'-'.$MDINC.'-'.$MDECHK.'-'.$MDIEND.'-'.$SaldoLF.'-'.$CHKF.'-'.$SaldoB.'-'.$DPD.'-'.$SaldoR.'<br>';
			            //$OK         = $this->bancos_modal->Guardar($IdDB,$SaldoLA,$FechaSLA,$MDIDP,$MDINC,$MDECHK,$MDIEND,$SaldoLF,$CHKF,$SaldoB,$DPD,$SaldoR,$FechaM,$IdUS);
				}
				
			}
			echo "<br>";

			for ($R=1; $R < count($data->boundsheets); $R++) { 
				echo $data->boundsheets[$R]['name'].':<br>';	
				
				//$Tipo = substr($data->boundsheets[$R]['name'],(strpos($data->boundsheets[$R]['name'], "("))+1,3);
				
				for ($Fila=1; $Fila <=$data->sheets[$R]['numRows'] ; $Fila++) { 									
					
					
					if (substr(strtoupper($data->sheets[$R]['cells'][$Fila][1]),0,6)=='CUENTA') {							
						$Cuenta =  (@ereg_replace("[^0-9]", "", $data->sheets[$R]['cells'][$Fila][3]));
					}
					if (strtoupper($data->sheets[$R]['cells'][$Fila][1])=='FECHA') {
						$X = $Fila+1;						
						do{
							if ($data->sheets[$R]['cells'][$X][1]!='') {



								$IdCNT       	= $this->bancos_modal->idcts($Cuenta);
								$Fecha 		 	= $data->sheets[$R]['cells'][$X][1];
								$Fecha 			= date("Y-m-d",strtotime(str_replace("/","-",$data->sheets[$R]['cells'][$X][1])));
								$FechaM 	    = $this->input->get_post('FechaM');
								$nDocumento		= $data->sheets[$R]['cells'][$X][2];
								$Tipo		= $data->sheets[$R]['cells'][$X][3];
								$Nombre		 	= utf8_decode($data->sheets[$R]['cells'][$X][4]);
								$Concepto		= $data->sheets[$R]['cells'][$X][5];								
								$Monto		 	= number_format($data->sheets[$R]['cells'][$X][6],2, '.', '');
								//$Monto		 = $data->sheets[$R]['cells'][$X][6];

								echo $Fecha.'_'.$nDocumento.'_'.$Nombre.'_'.$Concepto.'_'.$Monto.'_'.$Tipo.'<br>';
								

								//$ready         = $this->bancos_modal->GuardarDestalle($IdCNT,$Fecha,$FechaM,$nDocumento,$Nombre,$Concepto,$Monto,$Tipo);
								
							}							
							
							$X++;
						}while ($data->sheets[$R]['cells'][$X][1] != '');
						
					}
				}
				echo "<br>";
			}

		
		
			if ($OK==1) {
               	//redirect('index.php/Bandeja');
            }
	
		}
		public function index(){
			$this->load->view('templates/header');
        	$this->load->view('templates/dashboardclean_View');        
        	$data['MTBN']=$this->Ctas_model->allcts();
        	$this->load->view('BACK/tablasdecuentas',$data);
        	$this->load->view('templates/footer_admin');
		}
		public function Eliminar(){			
			$Cta = $this->input->post('id');		
			$data = $this->Ctas_model->del($Cta);
		}
		public function Update(){
			$Campo = $this->input->post('columnId');
			$Valor = $this->input->post('value');
			$Id    = $this->input->post('id');
			$OK = $this->Ctas_model->Update($Campo,$Valor,$Id);
		}
		public function Guardar(){	
		$name=$_POST['Cuenta'];
        $Moneda =$_POST['Moneda'];
        $Banco = $_POST['Banco'];
    

          $OK = $this->Ctas_model->Guardar($name,$Moneda,$Banco);
          if ($OK==1) {
				 redirect(base_url().'index.php/Cuentas','refresh');
			}
          

		}
	}
