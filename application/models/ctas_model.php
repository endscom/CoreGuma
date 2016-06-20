<?php
class Ctas_model extends CI_Model{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function allcts(){
        
        $this->db->where('IdEM', intval($_SESSION['SlpEmpresa']));
	 	$this->db->where('Activo', 0);
        $this->db->order_by('NCuenta','desc');
        $query = $this->db->get('dbanco');        
        if($query->num_rows() <> 0){            
            return $query->result_array();
        }
        return 0;
    }
    public function del($id){
         $data = array(
            'Activo' => 1
        );
        $this->db->where('IdDB', $id);
       	$up =  $this->db->update('dbanco', $data);
       	if($up){
            return 1;
        }
        return 0;
    }
    public function Update($Campo,$Valor,$Id){
         
         switch ($Campo) {
            case 0:
                $data = array(
                    'Orden' => $Valor
                );
            break;
            case 1:
                $data = array(
                    'NCuenta' => $Valor
                );
            break;
            case 2:
                $data = array(
                    'MTipo' => $Valor
                );
            break;
            case 3:
                $data = array(
                    'Banco' => $Valor
                );
            break;
         }
        $this->db->where('IdDB', $Id);
        $up = $this->db->update('dbanco', $data);
        if($up){
            return 1;
        }
        return 0;
    }
	public function Guardar($name,$Moneda,$Banco){
        
        $data = array(
            'IdEM' =>  intval($_SESSION['SlpEmpresa']),
            'NCuenta' => trim($name) ,
            'MTipo' =>  $Moneda,
            'Banco' =>  $Banco,
            'Activo' => 0
        );
        $insert= $this->db->insert('dbanco', $data);
        if($insert){
            return 1;
        }
        return 0;
    }
}