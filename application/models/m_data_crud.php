<?php

class M_data_crud extends CI_Model{

	function Get_crud($limit = FALSE, $offset = FALSE){
	// Jika variable $limit ada pada parameter maka kita limit query-nya
		if ( $limit ) {
		$this->db->limit($limit, $offset);
		}
		// Urutkan berdasar tanggal
		$this->db->order_by('blog.tgl_posting', 'DESC');
		// Inner Join dengan table Categories
		$this->db->join('kategori', 'kategori.id_kategori = blog.id_kategori');

		$query = $this->db->get('blog');
		// Return dalam bentuk object
		return $query->result();
	}
	
	public function get_total()
	{
	 // Dapatkan jumlah total artikel
	 return $this->db->count_all("blog");
	}
 
	function Insert($data,$table){
		$this->db->insert($table, $data); 
        
	}
	function hapus_data($id_blog){

		$row = $this->db->where('id_blog',$id_blog)->get('blog')->row();

		$this->db->where('id_blog', $id_blog);

		// $path = realpath(APPPATH . '../assert(assertion)et/image/'.$images);

		unlink('Asset/image/'.$row->images);

		$this->db->delete('blog', array('id_blog' => $id_blog));
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

	function edit($where,$table){  
	 return $this->db->get_where($table,$where);
	}

	function update($where,$data,$table){
	  $this->db->where($where);
	  $this->db->update($table,$data);
	 } 

	function hapus_gambar_saja($id_blog){

		$row = $this->db->where('id_blog',$id_blog)->get('blog')->row();

		$this->db->where('id_blog', $id_blog);

		// $path = realpath(APPPATH . '../assert(assertion)et/image/'.$images);

		unlink('Asset/image/'.$row->images);
	}

	public function get_artikel_by_category($id_kategori)
    {

        $this->db->order_by('blog.id_blog', 'DESC');

        $this->db->join('kategori', 'kategori.id_kategori = blog.id_kategori');
        $query = $this->db->get_where('blog', array('blog.id_kategori' => $id_kategori));
  
        return $query->result();
    }
}