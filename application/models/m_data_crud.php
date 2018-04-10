<?php

class M_data_crud extends CI_Model{

	function Get_crud(){
		$query = $this->db->query('select * from blog');
		return $query->result(); // Kode ini digunakan untuk mengembalikan hasil operasi $res menjadi sebuah array
	}
 
	function Insert($data){
		$this->db->insert('blog', $data); // Kode ini digunakan untuk memasukan record baru kedalam sebuah tabel
        
	}
	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
}