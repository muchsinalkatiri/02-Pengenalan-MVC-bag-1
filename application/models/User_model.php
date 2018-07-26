<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{

    public function __construct() 
    {
        parent::__construct();
    }

    public function get_all_user()
    {
        // Urutkan berdasar abjad
        $this->db->order_by('user_id');

        $query = $this->db->get('users');
        return $query->result();
    }


    // Dapatkan kategori berdasar ID
    public function get_user_by_id($id)
    {
        $query = $this->db->get_where('users', array('user_id' => $id));
        return $query->row();
    }

    public function update_user($data, $id) 
    {
        if ( !empty($data) && !empty($id) ){
            $update = $this->db->update( 'users', $data, array('user_id'=>$id) );
            return $update ? true : false;
        } else {
            return false;
        }
    }

    public function hapus_user($id)
    {
        if ( !empty($id) ){
            $delete = $this->db->delete('users', array('user_id'=>$id) );
            return $delete ? true : false;
        } else {
            return false;
        }
    }

    //---------------------------------------------------------------------------------------------------
    //---------------------------------------------------------------------------------------------------

    public function registeradmin($data){

        // Insert user
        return $this->db->insert('users', $data);
    }

    public function register($enc_password){
        // Array data user 
        $data = array(
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'username' => $this->input->post('username'),
            'alamat' => $this->input->post('alamat'),
            'nohp' => $this->input->post('nohp'),
            'password' => $enc_password,
            'kodepos' => $this->input->post('kodepos'),
            'fk_level_id' => $this->input->post('membership'),
            'avatar' => 'default.jpg'
        );

        // Insert user
        return $this->db->insert('users', $data);
    }


    public function update($enc_password){
        // Array data user 
        $data = array(
            'nama' => $this->update->post('nama'),
            'email' => $this->update->post('email'),
            'username' => $this->update->post('username'),
            'alamat' => $this->update->post('alamat'),
            'nohp' => $this->update->post('nohp'),
            'password' => $enc_password,
            'kodepos' => $this->input->post('kodepos'),
            'fk_level_id' => $this->input->post('membership'),
            'avatar' => 'default.jpg'
        );

        // Insert user
        return $this->db->insert('users', $data);
    }
    // Proses login user
    public function login($username, $password){
        // Validasi
        $this->db->where('username', $username);
        $this->db->where('password', $password);

        $result = $this->db->get('users');


        if($result->num_rows() == 1){
            return $result->row(0)->user_id;
        } else {
            return false;
        }
    }

    // Mendapatkan level user
    function get_user_level($user_id)
    {
        // Dapatkan data user berdasar $user_id
        $this->db->select('fk_level_id');
        $this->db->where('user_id', $user_id);

        $result = $this->db->get('users');

        if($result->num_rows() == 1){
            return $result->row(0)->fk_level_id;
        } else {
            return false;
        }
    }


    function get_user_details($user_id)
    {
        $this->db->join('levels', 'levels.level_id = users.fk_level_id', 'left');
        $this->db->where('user_id', $user_id);

        $result = $this->db->get('users');

        if($result->num_rows() == 1){
            return $result->row();
        } else {
            return false;
        }
    }

         public function get_users_by_id($id)
        {
             // Inner Join dengan table brand
            $this->db->select ( '*' );
            // $this->db->join('brand', 'brand.brand_id = gadget_table.fk_brand_id');
            $id = $this->session->userdata('user_id') ;

            $query = $this->db->get_where('users', array('users.user_id' => $id));
                        
            return $query->row();
        }
}
