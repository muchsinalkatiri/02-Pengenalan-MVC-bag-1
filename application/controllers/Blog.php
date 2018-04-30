<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_data_artikel');
	}

	public function index()
	{
		$data['page_title'] = 'List Artikel'; 
		
		// Dapatkan data dari model Blog
		$data['all_artikel'] = $this->m_data_artikel->Get_artikel();
		$this->load->view('header');
		$this->load->view('main_blog', $data);
		$this->load->view('footer');
	}

	public function detail(){
		$data['data'] = $this->m_data_artikel->Get_single($this->uri->segment(3));
		$this->load->view('header');
		$this->load->view('detail',$data);
		$this->load->view('footer');
	}
}
