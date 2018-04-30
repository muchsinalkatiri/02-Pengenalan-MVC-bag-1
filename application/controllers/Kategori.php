<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

		// Load custom helper applications/helpers/MY_helper.php
		// $this->load->helper('MY');

		// Load semua model yang kita pakai
		$this->load->model('m_data_kategori');
		$this->load->model('m_data_crud');
	}

	public function index()
	{	

		// Judul Halaman
		$data['page_title'] = 'List Kategori';

		// Dapatkan semua kategori
		$data['kategori'] = $this->m_data_kategori->get_all_kategori();
		$this->load->view('header');
		$this->load->view('main_kategori',$data);
		$this->load->view('footer');
	}

	public function create()
    {
        // Judul Halaman
        $data['page_title'] = 'Buat Kategori';

	    $this->load->helper('form');
	    $this->load->library('form_validation');

        // Form validasi untuk Nama Kategori
        $this->form_validation->set_rules(
            'kat_name',
            'Nama Kategori',
            'required|is_unique[kategori.kat_name]',
            array(
                'required' => 'Kolom %s tidak boleh kosong.',
                'is_unique' => 'Judul ' . $this->input->post('kat_name') . ' sudah ada .'
            )
        );

        $this->form_validation->set_rules(
            'kat_description',
            'Deskripsi Kategori',
            'required',
            array(
                'required' => 'Kolom %s tidak boleh kosong.'
            )
        );
        if($this->form_validation->run() === FALSE){
            $this->load->view('header');
            $this->load->view('main_tambah_kategori', $data);
            $this->load->view('footer');
        } else {
            $this->m_data_kategori->create_kategori();
            redirect('kategori');
        }
    }

   	public function hapus($id_kategori){
		$this->m_data_kategori->hapus($id_kategori);
		redirect('kategori');
	}

	public function edit($id_kategori = NULL)
    {
        // Judul Halaman
        $data['page_title'] = 'Edit Kategori';

		$data['kategori'] = $this->m_data_kategori->get_kategori_by_id($id_kategori);

	    $this->load->helper('form');
	    $this->load->library('form_validation');

        // Form validasi untuk Nama Kategori
        $this->form_validation->set_rules(
            'kat_name',
            'Nama Kategori',
            'required',
            array(
                'required' => 'Kolom %s tidak boleh kosong.'
            )
        );

        $this->form_validation->set_rules(
            'kat_description',
            'Deskripsi Kategori',
            'required',
            array(
                'required' => 'Kolom %s tidak boleh kosong.'
            )
        );
        if($this->form_validation->run() === FALSE){
            $this->load->view('header');
            $this->load->view('main_edit_kategori', $data);
            $this->load->view('footer');
        } else {

			$id_kategori = $this->input->post('id_kategori');

        		$data = array(
	    	    'kat_name' => $this->input->post('kat_name'),
	    	    'kat_description' => $this->input->post('kat_description'),
	    	);

            $this->m_data_kategori->update($data, $id_kategori);
            redirect('kategori');
        }
    }

    public function artikel($id_kategori) 
    {

        // Menampilkan judul berdasar nama kategorinya
        $data['page_title'] = $this->m_data_kategori->get_kategori_by_id($id_kategori)->kat_name;

        // Dapatkan semua artikel dalam kategori ini
        $data['all_artikel'] = $this->m_data_crud->get_artikel_by_category($id_kategori);

        // Kita gunakan view yang sama pada controller Blog
        $this->load->view('header');
        $this->load->view('main_blog',$data);
        $this->load->view('footer');
    }

}