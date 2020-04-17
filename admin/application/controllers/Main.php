<?php 

	defined("BASEPATH") OR exit('No direct script access allowed');

	class Main extends CI_Controller{

		var $data;

		function __construct(){
			parent::__construct();
			date_default_timezone_set( 'Asia/Jakarta');
			$this->load->model('m_data');
			$this->load->helper('tanggal');
			$this->data = array('main_site' => "https://pojokmedia.id/");
			//$this->data = array('main_site' => "http://localhost/pojokmedia/");
		}

		function index(){
			$data['title'] = "dashboard";
			$data['main_site'] = $this->data['main_site'];

			// echo $data['msg_cnt'];
			$this->load->view('v_head',$data);
			$where_msg = array('read' => 0);
			$this->load->view('v_side',$data);
			$this->load->view('v_index',$data);
			$this->load->view('v_foot',$data);
		}

		function login($status){
			$data['title'] = "Login";

			if ($status == 'failed') {
				$data['alert'] = "Login Gagal! Cek Kembali Username & Password Anda.";
				$data['alert_class'] = "alert-danger";
			}else if($status == 'unlogged'){
				$data['alert'] = "Anda Harus Login Terlebih Dahulu Untuk Mengakses Halaman Administrator";
				$data['alert_class'] = "alert-warning";
			}

			$this->load->view('v_head',$data);
			$this->load->view('v_login',$data);
			$this->load->view('v_foot',$data);
		}

		function login_process(){
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$where = array('username' => $username, 'password' => md5($password));

			$cek = $this->m_data->cek_login_admin($where)->num_rows();
			$userdata = $this->m_data->ambil_where("tb_user", $where)->row();

			if ($cek > 0) {
				$data_session = array(
					'username' => $username,
					'id_user' => $userdata->id_user,
					'name' => $userdata->full_name,
					'about' => $userdata->about,
					'admin' => $userdata->admin,
					'status' => 'login'
				);
				$this->session->set_userdata($data_session);
				redirect(base_url());
			}else{
				redirect(base_url('login/failed'));
			}
		}

		function logout(){
			$this->session->sess_destroy();
			redirect(base_url('login'));
		}

		function view($table){
			$data['main_site'] = $this->data['main_site'];

			$data['table'] = $table;
			$data['title'] = str_replace('_', ' ', $table);

			if ($table == 'article') {
				$data['result'] = $this->m_data->ambil_order_by('tb_article','id_article','desc')->result();
				$data['ctg'] = $this->m_data->ambil_order_by('tb_article_category','id_rubric','asc')->result();
				$data['usr'] = $this->m_data->ambil_order_by('tb_user','full_name','asc')->result();
			}elseif($table == 'article_old'){
				$data['result'] = $this->m_data->ambil_order_by('tb_article_old','id_article_old','asc')->result();
				$data['usr'] = $this->m_data->ambil_order_by('tb_user','full_name','asc')->result();
			}elseif($table == 'article_category'){
				$data['result'] = $this->m_data->ambil_join('tb_article_category', 'tb_rubric', 'id_rubric', 'id_rubric', 'id_article_category', 'desc')->result();
				$data['rbr'] = $this->m_data->ambil_data('tb_rubric')->result();
			}else{
				$data['result'] = $this->m_data->ambil_data('tb_'.$table)->result();
			}

			if ($this->session->userdata('crud_status') != '') {
				$status = $this->session->userdata('crud_status');
				$data['notification'] = $this->mylib->show_notification($status);
				$this->session->unset_userdata('crud_status');
			}

			$this->load->view('v_head',$data);
			$where_msg = array('read' => 0);
			$this->load->view('v_side',$data);
			$this->load->view('v_'.$table,$data);
			$this->load->view('v_foot',$data);
		}

		function view_edit($table, $id){
			$data['main_site'] = $this->data['main_site'];

			$data['table'] = $table;
			$data['title'] = str_replace('_', ' ', $table);

			if ($table == 'article') {
				$data['result'] = $this->m_data->ambil_order_by('tb_article','id_article','desc')->result();
				$data['ctg'] = $this->m_data->ambil_data('tb_article_category')->result();
			}elseif($table == 'article_old'){
				$data['result'] = $this->m_data->ambil_order_by('tb_article_old','id_article_old','asc')->result();
			}elseif($table == 'article_category'){
				$data['result'] = $this->m_data->ambil_join('tb_article_category', 'tb_rubric', 'id_rubric', 'id_rubric', 'id_article_category', 'desc')->result();
				$data['rbr'] = $this->m_data->ambil_data('tb_rubric')->result();
			}else if($table == 'about'){
				$data['field'] = 'page_'.$id;
				$data['field_caption'] = ucfirst(str_replace('_', ' ', $id));
				$data['result'] = $this->m_data->ambil_data('tb_'.$table)->result();
			}elseif($table == 'category_sub'){
				$data['result'] = $this->m_data->ambil_subkategori()->result();
				$data['ctg'] = $this->m_data->ambil_data('tb_category')->result();
			}elseif($table == 'order'){
				$data['result'] = $this->m_data->ambil_order()->result();
			}else{
				$data['result'] = $this->m_data->ambil_data('tb_'.$table)->result();
			}

			if ($table == 'about') {
				$data['edit_data'] = $data['result'];
			}else if($table == 'article_old'){
				$data['edit_data'] = $this->m_data->ambil_article_old($id)->result();
			}else{
				$where = array('id_'.$table => $id);
				$data['edit_data'] = $this->m_data->ambil_where('tb_'.$table, $where)->result();			}

			$this->load->view('v_head',$data);
			$where_msg = array('read' => 0);
			$this->load->view('v_side',$data);
			$this->load->view('v_'.$table,$data);
			$this->load->view('v_foot',$data);
		}

		function profile_settings(){
			$data['main_site'] = $this->data['main_site'];
			$data['title'] = "Profile Settings";
			$data['table'] = "admin";

			$data['profile_id'] = $this->session->userdata("id_user");
			$data['profile_name'] = $this->session->userdata("name");
			$data['profile_username'] = $this->session->userdata("username");
			$data['profile_about'] = $this->session->userdata("about");

			if ($this->session->userdata('crud_status') != '') {
				$status = $this->session->userdata('crud_status');
				$data['notification'] = $this->mylib->show_notification($status);
				$this->session->unset_userdata('crud_status');
			}

			$this->load->view('v_head',$data);
			$where_msg = array('read' => 0);
			$this->load->view('v_side',$data);
			$this->load->view('v_profile_settings',$data);
			$this->load->view('v_foot',$data);
		}

		function view_message($id){
			$data['main_site'] = $this->data['main_site'];
			$data['title'] = "Message";

			$where = array('id_message' => $id);
			$data['result'] = $this->m_data->ambil_where('tb_message', $where)->result();

			$this->load->view('v_head',$data);
			$where_msg = array('read' => 0);
			$this->load->view('v_side',$data);
			$this->load->view('v_View_message',$data);
			$this->load->view('v_foot',$data);
		}
	}
 ?>