<?php

class M_data_artikel extends CI_Model{

	function Get_artikel(){
		$query = $this->db->query('select * from blog');
		return $query->result();
	}

	function Get_single($id){
		$data = array();
		$options = array('id_blog' => $id);
		$Q = $this -> db -> get_where('blog',$options,1);
			if($Q->num_rows()>0){
				$data = $Q->row_array();
			}
		$Q ->free_result();
		return $data; 
	}
}