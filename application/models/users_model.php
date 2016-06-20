<?php
/**
 *
 * User: Marangelo
 * Date: 04/02/2016
 * Time: 03:14 pm
 */
class Users_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function login($name , $pass ){
        if($name != FALSE && $pass != FALSE){

            $this->db->where('SlpName', $name);
            $this->db->where('SlpPassword', $pass);
            $query = $this->db->get('view_clem');
            if($query->num_rows() == 1){
                return $query->result_array();
            }
            return 0;
        }
    }
    public function Guardar($name,$Contraseña,$empresa,$Permisos){
        $data = array(
            'SlpName' => $name ,
            'SlpPassword' => $Contraseña ,
            'Privilegio' =>  $Permisos,
            'IdEM' =>  $empresa,
            'Fecha_Creacion' => date('Y-m-d')
        );
        $insert= $this->db->insert('oslp', $data);
        if($insert){
            return 1;
        }
        return 0;
    }
    public function del($id){
        $this->db->where('SlpCode', $id);
        $delete= $this->db->delete('oslp');
        if($delete){
            return 1;
        }
        return 0;
    }
    public function allUser(){        
        $query = $this->db->get('view_clem');        
        if($query->num_rows() <> 0){            
            return $query->result_array();
        }
        return 0;
    }
    public function AllEmp(){
     $query = $this->db->get('empresa');        
        if($query->num_rows() <> 0){            
            return $query->result_array();
        }
        return 0;   
    }
}