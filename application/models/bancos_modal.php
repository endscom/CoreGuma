<?php
/**
* 
*/
class Bancos_modal extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
    public function AllMV($f){
        $this->db->where('FechaM', $f);
        $this->db->where('IdUS', $_SESSION['IdUS']);
        $query = $this->db->get('View_MTMV');        
        if($query->num_rows() <> 0){            
            return $query->result_array();
        }
        return 0;
    }
    public function DetalleMovimiento($P1,$P2,$P3){
        
        $this->db->where('IdDB', $P1);
        $this->db->where('FechaM', $P2);
        $this->db->where('Tipo', $P3);
        $query = $this->db->get('movimientos');
               //print_r($query->result_array());  
      if($query->num_rows() <> 0){    
             
           return $query->result_array();
        }
        return 0;
        
    }
    public function DetalleCuenta($P1){
        
        $this->db->where('IdDB', $P1);        
        $query = $this->db->get('dbanco');        
        if($query->num_rows() <> 0){            
            return $query->result_array();
        }
        return 0;
    }
     public function AllMVf($f,$emp){
        $this->db->where('IDEmp', $emp);
        $this->db->where('FechaM', $f);
        $this->db->order_by('Orden','asc');
        $query = $this->db->get('View_MTMV');        
        if($query->num_rows() <> 0){            
            // print_r($query->num_rows());
           return $query->result_array();
        }
        return 0;
    }
     public function idcts($id){        
        $this->db->where('CtaClear', $id);
        $query = $this->db->get('view_dbanco');        
        if($query->num_rows() <> 0){
            foreach ($query->result_array() as $key) {
                return $key['IdDB'];
            }
        }
        return 0;
    }
    public function idctsUS($id){        
        $this->db->where('CtaClear', $id);
        $query = $this->db->get('view_dbanco');        
        if($query->num_rows() <> 0){            
            $resultado = $query->row();
            $this->db->where('IdEM', $resultado->IdEM);
            $queryEMP = $this->db->get('oslp');        
            $R2 = $queryEMP->row();
            return $R2->SlpCode;
        }
        return 0;
    }
    public function allstatus(){ 
        $this->db->order_by('FechaM','desc');       
        $query = $this->db->get('view_status');        
        if($query->num_rows() <> 0){            
           return $query->result_array();
             //print_r($query->result_array());

        }
        return 0;
    }
	public function allbnk(){        
        $this->db->where('IdUS', $_SESSION['IdUS']); 

        //$this->db->or_where('IdEM', $_SESSION['SlpEmpresa']); 
        $this->db->order_by('FechaM', 'desc');
        $query = $this->db->get('View_movimiento');  


        if($query->num_rows() <> 0){            
           
            return $query->result_array();
        }
        return 0;
    }

    public function Fecha()
    {
        $this->db->select("distinct MONTH(FechaM)as Fecha,YEAR(FechaM) as año");
        $this->db->order_by('Fecha','desc');
        $query = $this->db->get('View_movimiento');
        if($query->num_rows() <> 0){            
            return $query->result_array();
            //print_r($query->result_array());
        }
        return 0;  
        

    }
	public function Guardar($IdDB,$SaldoLA,$FechaSLA,$MDIDP,$MDINC,$MDECHK,$MDIEND,$SaldoLF,$CHKF,$SaldoB,$DPD,$SaldoR,$FechaM,$US){
        
        $data = array(
        	'IdDB' =>  $IdDB,
            'IdUS' =>  $US,
            'SaldoLA' => $SaldoLA ,
            'FechaSLA' => $FechaSLA ,
            'MDIDP' =>  $MDIDP,
            'MDINC' =>  $MDINC,
            'MDECHK' => $MDECHK,
            'MDIEND' =>  $MDIEND,
            'SaldoLF' =>  $SaldoLF,
            'CHKF' =>  $CHKF,
            'SaldoB' =>  $SaldoB,
            'DPD' =>  $DPD,
            'SaldoR' =>  $SaldoR,
            'FechaM' =>  $FechaM,
            'LastUpdate'=>date('Y-m-d h:i:s')
        );
        $insert= $this->db->insert('ingxser', $data);
        if($insert){
            return 1;
        }
        return 0;
    }
    public function GuardarDestalle($IdCNT,$Fecha,$FechaM,$nDocumento,$Nombre,$Concepto,$Monto,$Tipo){
        
        $data = array(
            'IdDB' =>  $IdCNT,
            'Fecha' =>  $Fecha,
            'FechaM' =>  $FechaM,
            'nDocumento' =>  $nDocumento,
            'Nombre' =>  $Nombre,
            'Concepto' =>  $Concepto,
            'Monto' =>  $Monto,            
            'Tipo' =>  $Tipo,            
            'User' => $_SESSION['IdUS'],
            'LastUpdate'=>date('Y-m-d h:i:s')
        );
        $insert= $this->db->insert('movimientos', $data);
        if($insert){
            return 1;
        }
        return 0;
    }
    public function update($IdDB,$SaldoLA,$MDIDP,$MDINC,$MDECHK,$MDIEND,$SaldoLF,$CHKF,$SaldoB,$DPD,$SaldoR){
        $data = array(                        
            'SaldoLA' => $SaldoLA ,            
            'MDIDP' =>  $MDIDP,
            'MDINC' =>  $MDINC,
            'MDECHK' => $MDECHK,
            'MDIEND' =>  $MDIEND,
            'SaldoLF' =>  $SaldoLF,
            'CHKF' =>  $CHKF,
            'SaldoB' =>  $SaldoB,
            'DPD' =>  $DPD,
            'SaldoR' =>  $SaldoR,
            'LastUpdate'=>date('Y-m-d h:i:s')
        );
        print_r($data);
        $this->db->where('IdIS', $IdDB);        
        $insert= $this->db->update('ingxser', $data);
        if($insert){
            return 1;
        }
        return 0;

    }
	
}