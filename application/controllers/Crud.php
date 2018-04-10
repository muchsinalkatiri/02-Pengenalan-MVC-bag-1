<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_data_crud');
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

	public	function tambah_aksi(){
		$now = 'aa';
    	$data = array(
     	   	'title' => $this->input->post('title'),
       		'content_artikel' => $this->input->post('content_artikel'),
        	'images' => $this->input->post('images'),
        	'tgl_posting' => date('Y-m-d')
        	 );
    	$this->m_data_crud->insert($data);
    	redirect('crud');
	}

}
