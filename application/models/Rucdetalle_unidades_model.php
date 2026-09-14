<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rucdetalle_unidades_model extends CI_Model {

	
	public function getRuc_unidades($id){
		
	}

	
	public function save($data) {
        if(empty($data)){
            return false;
        }
        
        // Insertar directamente sin verificar resultado complejo
        $this->db->insert('rucdetalle_unidades', $data);
        
        // Verificar si afectó alguna fila
        if($this->db->affected_rows() > 0){
            return true;
        }
        
        return false;
   
    }
	public function unidades_cursa($id_solicitud){
        $this->db->select('suc.codigo_unidad as codigo, suc.nombre_unidad, suc.trimestre, suc.uc aS creditos');
        $this->db->from('rucdetalle_unidades suc')    ;
        $this->db->where('suc.id_solicitud', $id_solicitud);       
        $this->db->where('suc.tipo_programa','cursa' );       
        $resultados = $this->db->get();
      // 	var_dump($this->db->queries);
        return $resultados->result();
    }

    public function 	unidades_cursadas($id_solicitud){
        // Obtener unidades CURSADAS que solicita reconocimiento
        $this->db->select('suc.codigo_unidad as codigo, suc.nombre_unidad, suc.trimestre, suc.uc aS creditos');
        $this->db->from('rucdetalle_unidades suc')       ;
        $this->db->where('suc.id_solicitud', $id_solicitud);       
        $this->db->where('suc.tipo_programa','cursado' );       
        $resultados = $this->db->get();
        return $resultados->result();
    }

	public function update($id_solicitud,$data){
	
		//var_dump($data);
		$this->db->where("id_solicitud",$id_solicitud);
     //   var_dump($this->db->queries);
		return $this->db->update("rucdetalle_unidades",$data);
	}
	
	
}
?>
