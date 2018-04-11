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

	public function hapus($id_blog){
		$this->m_data_crud->hapus_data($id_blog);
		redirect('crud');
	}

	public function edit(){
		$data['data'] = $this->m_data_crud->Get_single($this->uri->segment(3));
		$this->load->view('header');
		$this->load->view('main_edit',$data);
	}

	public function edit_aksi(){
		$config['upload_path'] = $this->gallery_path;
	    $config['allowed_types'] = 'jpg|png|jpeg';
	    $config['max_size']  = '2048';
	    $config['remove_space'] = TRUE;

		$this->load->library('upload', $config);
		$this->upload->do_upload('images');

		$id_blog = $this->input->post('id_blog');

		$data = array(
     	   	'title' => $this->input->post('title'),
       		'content_artikel' => $this->input->post('content_artikel'),
        	'images' => $this->upload->file_name,
        	'tgl_posting' => date('Y-m-d')
        	 );

		$where = array(
  			'id_blog' => $id_blog
 		);

 		$this->m_data_crud->update($where,$data,'blog');
 		redirect('crud');
	}
	public function detail(){
		$data['data'] = $this->m_data_crud->Get_single($this->uri->segment(3));
		$this->load->view('header');
		$this->load->view('main_detail',$data);
	}
}
