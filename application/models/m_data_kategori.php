<?php

class M_data_kategori extends CI_Model{

   public function create_kategori()
   {
       $data = array(
           'kat_name'          => $this->input->post('kat_name'),
           'kat_description'   => $this->input->post('kat_description')
       );

       return $this->db->insert('kategori', $data);
   }

   	public function hapus($id_kategori){

		$row = $this->db->where('id_kategori',$id_kategori)->get('kategori')->row();

		$this->db->where('id_kategori', $id_kategori);

		$this->db->delete('kategori', array('id_kategori' => $id_kategori));
	}

    public function update($data, $id_kategori) 
    {
        if ( !empty($data) && !empty($id_kategori) ){
            $update = $this->db->update( 'kategori', $data, array('id_kategori'=>$id_kategori) );
            return $update ? true : false;
        } else {
            return false;
        }
    }

   	function Get_single($id_kategori){
		$data = array();
		$options = array('id_kategori' => $id_kategori);
		$Q = $this -> db -> get_where('kategori',$options,1);
			if($Q->num_rows()>0){
				$data = $Q->row_array();
			}
		$Q ->free_result();
		return $data; 
	}

    public function get_all_kategori()
    {
        // Urutkan berdasar abjad
        $this->db->order_by('kat_name');

        $query = $this->db->get('kategori');
        return $query->result();
    }

    public function get_kategori_by_id($id_kategori)
    {
        $query = $this->db->get_where('kategori', array('id_kategori' => $id_kategori));
        return $query->row();
    }

    public function generate_cat_dropdown()
    {

        // Mendapatkan data ID dan nama kategori saja
        $this->db->select ('
            kategori.id_kategori,
            kategori.kat_name
        ');

        // Urut abjad
        $this->db->order_by('kat_name');

        $result = $this->db->get('kategori');
        
        // bikin array
        // please select berikut ini merupakan tambahan saja agar saat pertama
        // diload akan ditampilkan text please select.
        $dropdown[''] = 'Please Select';

        if ($result->num_rows() > 0) {
            
            foreach ($result->result_array() as $row) {
                // Buat array berisi 'value' (id kategori) dan 'nama' (nama kategori)
                $dropdown[$row['id_kategori']] = $row['kat_name'];
            }
        }

        return $dropdown;
    }
}