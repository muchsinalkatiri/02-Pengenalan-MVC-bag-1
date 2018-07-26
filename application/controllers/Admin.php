<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		// Supaya lebih efisien, kita dapat me-load model, library, helper 
		// yang sering digunakan pada class ini pada __construct sehingga
		// dapat dipanggil oleh semua method yang ada pada class ini
		$this->load->helper('MY');
		$this->load->model('gadget_model');
		$this->load->model('brand_model');
		$this->load->model('user_model');
		$this->load->model('transaksi_model');
		$this->load->model('stockprice_model');
	}

	public function index()
	{
		$level = $this->session->userdata('fk_level_id');
		if(!$this->session->userdata('logged_in')){
			if($level == '2'){
			redirect('home');
			}
		}
		$this->load->view("templates/v_admin_header");
		$this->load->view('admin/v_dashboard');
		$this->load->view("templates/v_admin_footer");
	}

	public function user(){
		$data['page_title'] = 'User List'; 

		$data['all_user'] = $this->user_model->get_all_user();

		$this->load->view("templates/v_admin_header");
		$this->load->view('admin/user_view',$data);
		$this->load->view("templates/v_admin_footer");
	}

	public function gadget(){
		$data['page_title'] = 'Gadget List'; 

		$data['all_gadget'] = $this->gadget_model->get_all_gadget();

		$this->load->view("templates/v_admin_header");
		$this->load->view('admin/gadget_view',$data);
		$this->load->view("templates/v_admin_footer");
	}

	public function brand(){
		$data['page_title'] = 'Brand List'; 

		$data['all_brand'] = $this->brand_model->get_all_brand();

		$this->load->view("templates/v_admin_header");
		$this->load->view('admin/brand_view',$data);
		$this->load->view("templates/v_admin_footer");
	}

	public function stockprice(){
		$data['page_title'] = 'Stock and Price Gadget'; 

		$data['all_stockprice'] = $this->stockprice_model->get_all_stockprice();

		$this->load->view("templates/v_admin_header");
		$this->load->view('admin/stockprice_view',$data);
		$this->load->view("templates/v_admin_footer");
	}

	public function stockprice_create() 
	{
		// Judul Halaman
		$data['page_title'] = 'ADD STOCK and PRICE';

		// Kita butuh helper dan library berikut
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['stockprice'] = $this->gadget_model->generate_gadget_dropdown();

		$this->form_validation->set_rules(
			'fk_tipe', 'tipe','is_unique[stockprice.fk_tipe]',
			array(
				'is_unique' => 'Tipe ini sudah diberi harga.'
			)
		);

		if($this->form_validation->run() === FALSE){
			$this->load->view('templates/v_header');
			$this->load->view('admin/stockprice_create', $data);
			$this->load->view('templates/v_footer');
		} else {
			$this->stockprice_model->create_stockprice();
			redirect('admin/stockprice');
		}
	}

	public function stockprice_delete($id)
	{
		$this->stockprice_model->delete_stockprice($id);
		redirect('admin/stockprice');

	}

	public function magazine(){
		$data['page_title'] = 'Magazine'; 
		
		// Dapatkan data dari model Blog
		$this->load->model('artikel');
		$data['artikel'] = $this->artikel->get_artikel();

		$this->load->view("templates/v_admin_header");
		$this->load->view('admin/magazine_view',$data);
		$this->load->view("templates/v_admin_footer");
	}

	public function transaksi(){
		$data['page_title'] = 'Transaksi'; 
		
		// Dapatkan data dari model Blog
		$this->load->model('transaksi_model');
		$data['transaksi'] = $this->transaksi_model->get_transaksi();

		$this->load->view("templates/v_admin_header");
		$this->load->view('admin/transaksi_view',$data);
		$this->load->view("templates/v_admin_footer");
	}

	public function transaksi_kurang_stock($id){
		$data['page_title'] = 'Transaksi'; 
		
		// Dapatkan data dari model Blog
		$this->load->model('transaksi_model');
		$data['transaksi'] = $this->transaksi_model->get_transaksi();
		$data['ganti'] = $this->transaksi_model->get_kurang_stock($id);

		redirect('admin/transaksi');
	}

	public function transaksi_delete($id)
	{
		$this->transaksi_model->delete_transaksi($id);
		redirect('admin/transaksi');
	}

	public function user_create()
	{
		$data['page_title'] = 'Tambah user'; 
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('password2', 'Konfirmasi Password', 'matches[password]');

		if ($this->form_validation->run()==FALSE) {
			$this->load->view('templates/v_admin_header');
			$this->load->view('admin/user_create',$data);
			$this->load->view('templates/v_admin_footer');
		} 	
		else{
				if ( isset($_FILES['thumbnail']) && $_FILES['thumbnail']['size'] > 0 )
    		{
    			// Konfigurasi folder upload & file yang diijinkan
    			// Jangan lupa buat folder uploads di dalam ci3
    			$config['upload_path']          = './uploads/';
    	        $config['allowed_types']        = 'gif|jpg|png';
    	        $config['max_size']             = 2048;
    	        // Load library upload
    	        $this->load->library('upload', $config);
    	        // Apakah file berhasil diupload?
    	        if ( ! $this->upload->do_upload('thumbnail'))
    	        {
    	        	$data['upload_error'] = $this->upload->display_errors();
    	        	$post_image = '';
    	        	// Kita passing pesan error upload ke view supaya user mencoba upload ulang
					$this->load->view('templates/v_admin_header');
					$this->load->view('admin/user_create',$data);
					$this->load->view('templates/v_admin_footer');
    	        } else {
    	        	// Simpan nama file-nya jika berhasil diupload
    	            $img_data = $this->upload->data();
    	            $post_image = $img_data['file_name'];
    	        	
    	        }
    		} else {
    			// User tidak upload gambar, jadi kita kosongkan field ini
    			$post_image = '';
    		}
    		$enc_password = md5($this->input->post('password'));
	    	// Memformat slug sebagai alamat URL, 
	    	// Misal judul: "Hello World", kita format menjadi "hello-world"
	    	// Nantinya, URL blog kita menjadi mudah dibaca 
	    	// http://localhost/ci3-course/blog/hello-world
	    	$post_data = array(
				'nama' => $this->input->post('nama'),
	            'email' => $this->input->post('email'),
	            'username' => $this->input->post('username'),
	            'alamat' => $this->input->post('alamat'),
	            'nohp' => $this->input->post('nohp'),
	            'password' => $enc_password,
	            'kodepos' => $this->input->post('kodepos'),
	            'fk_level_id' => $this->input->post('membership'),
	            'avatar' => $post_image,
	    	);
	    	// Jika tidak ada error upload gambar, maka kita insert ke database via model Blog 
	    	if( empty($data['upload_error']) ) {
		        $this->user_model->registeradmin($post_data);
				redirect('admin');
	    	}
		}

	}

	public function user_edit($id = NULL)
	{
		$data['page_title'] = 'Edit User';
		// Get artikel dari model berdasarkan $id
		$data['user'] = $this->user_model->get_user_by_id($id);
		// Jika id kosong atau tidak ada id yg dimaksud, lempar user ke halaman blog
		if ( empty($id) || !$data['user'] ) redirect('user');
		// Kita simpan dulu nama file yang lama
		$old_image = $data['user']->avatar;
		// Kita butuh helper dan library berikut
	    $this->load->helper('form');
	    $this->load->library('form_validation');
	    // Kita validasi input sederhana, sila cek http://localhost/ci3/user_guide/libraries/form_validation.html
		$this->form_validation->set_rules('username', 'username', 'required',
			array(
				'required' 		=> 'Isi %s donk, males amat.'
			));
	    // Cek apakah input valid atau tidak
	    if ($this->form_validation->run() === FALSE)
	    {
			$this->load->view('templates/v_admin_header');
			$this->load->view('admin/user_edit',$data);
			$this->load->view('templates/v_admin_footer');
	    } else {
    		// Apakah user upload gambar?
    		if ( isset($_FILES['thumbnail']) && $_FILES['thumbnail']['size'] > 0 )
    		{
    			// Konfigurasi folder upload & file yang diijinkan
    			// Jangan lupa buat folder uploads di dalam ci3-course
    			$config['upload_path']          = './uploads/';
    	        $config['allowed_types']        = 'gif|jpg|png';
    	        $config['max_size']             = 2048;
    	        $config['max_width']            = 1000;
    	        $config['max_height']           = 2000;
    	        // Load library upload
    	        $this->load->library('upload', $config);
    	        // Apakah file berhasil diupload?
    	        if ( ! $this->upload->do_upload('thumbnail'))
    	        {
    	        	$data['upload_error'] = $this->upload->display_errors();
    	        	$post_image = '';
    	        	// Kita passing pesan error upload ke view supaya user mencoba upload ulang
					$this->load->view('templates/v_admin_header');
					$this->load->view('admin/user_edit',$data);
					$this->load->view('templates/v_admin_footer'); 
    	        } else {
    	        	// Hapus file image yang lama jika ada
    	        	if( !empty($old_image) ) {
    	        		if ( file_exists( './uploads/'.$old_image ) ){
    	        		    unlink( './uploads/'.$old_image );
    	        		} else {
    	        		    echo 'File tidak ditemukan.';
    	        		}
    	        	}
    	        	// Simpan nama file-nya jika berhasil diupload
    	            $img_data = $this->upload->data();
    	            $post_image = $img_data['file_name'];
    	        	
    	        }
    		} else {
    			// User tidak upload gambar, jadi kita kosongkan field ini, atau jika sudah ada, gunakan image sebelumnya
    			$post_image = ( !empty($old_image) ) ? $old_image : '';
    		}
    		$enc_password = md5($this->input->post('password'));
	    	$post_data = array(
	    	    'nama' => $this->input->post('nama'),
	            'email' => $this->input->post('email'),
	            'username' => $this->input->post('username'),
	            'alamat' => $this->input->post('alamat'),
	            'nohp' => $this->input->post('nohp'),
	            'password' => $enc_password,
	            'kodepos' => $this->input->post('kodepos'),
	            'fk_level_id' => $this->input->post('membership'),
	            'avatar' => $post_image,
	    	);
	    	// Jika tidak ada error upload gambar, maka kita update datanya 
	    	if( empty($data['upload_error']) ) {
	    		// Update artikel sesuai post_data dan id-nya
		        $this->user_model->update_user($post_data, $id);
		        redirect('admin');
	    	}
	    }
	}

	public function user_delete($id)
	{
		$this->user_model->hapus_user($id);
		redirect('admin/user');
	}
}
