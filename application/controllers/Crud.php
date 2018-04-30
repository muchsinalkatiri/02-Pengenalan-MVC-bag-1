<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller {

	function __construct(){
		parent::__construct();

		$this->load->model('m_data_kategori');
		$this->load->model('m_data_crud');
		$this->gallery_path = realpath(APPPATH . '../Asset/image/');
        $this->gallery_path_url = base_url() . 'Asset/image/';
	}

	public function index()
	{
		
		$data['query'] = $this->m_data_crud->Get_crud();
		$this->load->view('header');
		$this->load->view('main_crud', $data);
		$this->load->view('footer');
	}

	public function tambah()
	{
		$this->load->view('header');
		$this->load->view('main_tambah_artikel');
		$this->load->view('footer');
	}

	public	function tambah_aksi(){

		$data['mode'] = 'tambah_aksi';

		$this->load->model('m_data_crud');

	    $this->load->helper('form');
	    $this->load->library('form_validation');
		$data['kategori'] = $this->m_data_kategori->generate_cat_dropdown();

		$aturan = array(
		        array(
		                'field' => 'author',
		                'label' => 'penulis',
		                'rules' => 'required',
		                'errors' => array(
		                        'required' => 'Kolom %s tidak boleh kosong.',
		                ),
		        ),
		        array(
		                'field' => 'email_author',
		                'label' => 'Email',
		                'rules' => 'required',
		                'errors' => array(
		                        'required' => 'Kolom %s tidak boleh kosong.',
		                ),
		        ),
		        array(
		                'field' => 'sumber',
		                'label' => 'sumber',
		                'rules' => 'required',
		                'errors' => array(
		                        'required' => 'Kolom %s tidak boleh kosong.',
		                ),
		        ),
		);

		$this->form_validation->set_rules($aturan);
		$this->form_validation->set_rules('title', 'Judul', 'required|is_unique[blog.title]',
			array(
				'required' 		=> 'Kolom %s tidak boleh kosong.',
				'is_unique' 	=> 'Judul ' .$this->input->post('title'). ' sudah ada, gunakan judul yang lain.'
			));

		$this->form_validation->set_rules('content_artikel', 'Konten', 'required|min_length[8]',
			array(
				'required' 		=> 'Kolom %s tidak boleh kosong.',
				'min_length' 	=> 'Isi kontent %s kurang panjang .',
			));

		if (empty($_FILES['images']['name']))
		{
    		$this->form_validation->set_rules('images', 'Gambar', 'required',		
    		array(
				'required' 		=> 'Kolom %s tidak boleh kosong.'
			));
		}

		if ($this->form_validation->run() === FALSE){
			$this->load->view('header');
			$this->load->view('main_tambah_artikel',$data);
			$this->load->view('footer');

	    }else{

			$config['upload_path'] = $this->gallery_path;
		    $config['allowed_types'] = 'jpg|png|jpeg';
		    $config['max_size']  = '2048';
		    $config['remove_space'] = TRUE;

			$this->load->library('upload', $config);
			$this->upload->do_upload('images');

	    	$data = array(
	     	   	'author' => $this->input->post('author'),
				'id_kategori' => $this->input->post('id_kategori'),
	     	   	'email_author' => $this->input->post('email_author'),
	     	   	'title' => $this->input->post('title'),
	     	   	'sumber' => $this->input->post('sumber'),
	       		'content_artikel' => $this->input->post('content_artikel'),
	        	'images' => $this->upload->file_name,
	        	'tgl_posting' => date('Y-m-d')
	        	 );
	    	$this->m_data_crud->insert($data, 'blog');
	    	redirect('blog');
	    }

	}

	public function hapus($id_blog){
		$this->m_data_crud->hapus_data($id_blog);
		redirect('crud');
	}



	public function edit_aksi($id = NULL){
		$data['mode'] = 'Edit_aksi';

		$this->load->model('m_data_crud');

		$this->load->helper('form');
	    $this->load->library('form_validation');



		$data['data'] = $this->m_data_crud->Get_single($id);

		$data['kategori'] = $this->m_data_kategori->generate_cat_dropdown();

		$aturan = array(
		        array(
		                'field' => 'author',
		                'label' => 'penulis',
		                'rules' => 'required',
		                'errors' => array(
		                        'required' => 'Kolom %s tidak boleh kosong.',
		                ),
		        ),
		        array(
		                'field' => 'email_author',
		                'label' => 'Email',
		                'rules' => 'required',
		                'errors' => array(
		                        'required' => 'Kolom %s tidak boleh kosong.',
		                ),
		        ),
		        array(
		                'field' => 'sumber',
		                'label' => 'sumber',
		                'rules' => 'required',
		                'errors' => array(
		                        'required' => 'Kolom %s tidak boleh kosong.',
		                ),
		        ),
		        array(
		                'field' => 'title',
		                'label' => 'judul',
		                'rules' => 'required',
		                'errors' => array(
		                        'required' => 'Kolom %s tidak boleh kosong.',
		                ),
		        )
		);

		$this->form_validation->set_rules($aturan);


		$this->form_validation->set_rules('content_artikel', 'Konten', 'required|min_length[8]',
			array(
				'required' 		=> 'Kolom %s tidak boleh kosong.',
				'min_length' 	=> 'Isi kontent %s kurang panjang .',
			));

		if (empty($_FILES['images']['name']))
		{
    		$this->form_validation->set_rules('images', 'Gambar', 'required',		
    		array(
				'required' 		=> 'Kolom %s tidak boleh kosong.'
			));
		}
		

		if ($this->form_validation->run() === FALSE){
			$this->load->view('header');
			$this->load->view('main_edit',$data);
			$this->load->view('footer');

	    }else{
			$id_blog = $this->input->post('id_blog');

			$this->m_data_crud->hapus_gambar_saja($id_blog);

			$config['upload_path'] = $this->gallery_path;
		    $config['allowed_types'] = 'jpg|png|jpeg';
		    $config['max_size']  = '2048';
		    $config['remove_space'] = TRUE;

			$this->load->library('upload', $config);
			$this->upload->do_upload('images');


			$data = array(
		 	   	'author' => $this->input->post('author'),
		 	   	'email_author' => $this->input->post('email_author'),
				'id_kategori' => $this->input->post('id_kategori'),
		 	   	'title' => $this->input->post('title'),
		 	   	'sumber' => $this->input->post('sumber'),
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
	}
	public function detail(){
		$data['data'] = $this->m_data_crud->Get_single($this->uri->segment(3));
		$this->load->view('header');
		$this->load->view('main_detail',$data);
		$this->load->view('footer');
	}
}
