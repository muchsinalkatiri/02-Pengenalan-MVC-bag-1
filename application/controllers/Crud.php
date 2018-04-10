<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_data_crud');
		$this->gallery_path = realpath(APPPATH . '../Asset/image/');
        $this->gallery_path_url = base_url() . 'Asset/image/';
	}

	public function index()
	{
		$data['query'] = $this->m_data_crud->Get_crud();
		$this->load->view('header');
		$this->load->view('main_crud', $data);
	}

	public function tambah()
	{
		$this->load->view('header');
		$this->load->view('main_tambah_artikel');
	}

	public	function tambah_aksi($upload){

		$config['upload_path'] = $this->gallery_path;
	    $config['allowed_types'] = 'jpg|png|jpeg';
	    $config['max_size']  = '2048';
	    $config['remove_space'] = TRUE;

		$this->load->library('upload', $config);
		$this->upload->do_upload('images');

    	$data = array(
     	   	'title' => $this->input->post('title'),
       		'content_artikel' => $this->input->post('content_artikel'),
        	'images' => $this->upload->file_name,
        	'tgl_posting' => date('Y-m-d')
        	 );
    	$this->m_data_crud->insert($data);
    	redirect('crud');
	}


}
