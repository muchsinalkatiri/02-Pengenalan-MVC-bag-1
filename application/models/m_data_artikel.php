<?php

class M_data_artikel extends CI_Model{

	function Get_artikel(){
        $this->db->order_by('blog.tgl_posting', 'DESC');

        // Inner Join dengan table Categories
        $this->db->join('kategori', 'kategori.id_kategori = blog.id_kategori');
        
        $query = $this->db->get('blog');

    	// Return dalam bentuk object
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