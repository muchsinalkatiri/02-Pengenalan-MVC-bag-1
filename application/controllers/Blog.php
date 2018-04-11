<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct(){
		parent::__construct();
		$this->load->model('m_data_artikel');
	}

	public function index()
	{
		$data1['query'] = $this->m_data_artikel->Get_artikel();
		$this->load->view('header');
		$this->load->view('main_blog', $data1);
		$this->load->view('footer');
	}

	public function detail(){
		$data['data'] = $this->m_data_artikel->Get_single($this->uri->segment(3));
		$this->load->view('header');
		$this->load->view('detail',$data);
		$this->load->view('footer');
	}
}
