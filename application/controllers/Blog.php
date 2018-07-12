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

	 // Dapatkan data dari model Blog dengan pagination
	 // Jumlah artikel per halaman
	 $limit_per_page = 9;
	 // URI segment untuk mendeteksi "halaman ke berapa" dari URL
	 $start_index = ( $this->uri->segment(3) ) ? $this->uri->segment(3) : 0;
	 // Dapatkan jumlah data
	 $total_records = $this->m_data_artikel->get_total();


	if ($total_records > 0) {
	 // Dapatkan data pada halaman yg dituju
	 $data["all_artikel"] = $this->m_data_artikel->get_artikel($limit_per_page, $start_index);

	 // Konfigurasi pagination
	 $config['base_url'] = base_url() . 'blog/index';
	 $config['total_rows'] = $total_records;
	 $config['per_page'] = $limit_per_page;
	 $config["uri_segment"] = 3;

	 $this->pagination->initialize($config);

	 // Buat link pagination
	 $data["links"] = $this->pagination->create_links();
	}

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
