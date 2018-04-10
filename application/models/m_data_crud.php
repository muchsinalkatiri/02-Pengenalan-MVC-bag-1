<?php

class M_data_crud extends CI_Model{

	function Get_crud(){
		$query = $this->db->query('select * from blog');
		return $query->result(); // Kode ini digunakan untuk mengembalikan hasil operasi $res menjadi sebuah array
	}
 
	function Insert($data){
		$this->db->insert('blog', $data); // Kode ini digunakan untuk memasukan record baru kedalam sebuah tabel
        
	}
	function hapus_data($id_blog){

		$row = $this->db->where('id_blog',$id_blog)->get('blog')->row();

		$this->db->where('id_blog', $id_blog);

		// $path = realpath(APPPATH . '../assert(assertion)et/image/'.$images);

		unlink('Asset/image/'.$row->images);

		$this->db->delete('blog', array('id_blog' => $id_blog));
	}
}