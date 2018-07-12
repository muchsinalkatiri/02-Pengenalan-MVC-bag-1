<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Datatables extends CI_Controller {
	public function index()
	{
		 $this->load->model('m_data_crud');
		 $artikel['data'] = $this->m_data_crud->get_crud();
		 $this->load->view("header");
		 $this->load->view('dt_view', $artikel);
		 $this->load->view("footer");
	}
}