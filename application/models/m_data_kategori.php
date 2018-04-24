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
}