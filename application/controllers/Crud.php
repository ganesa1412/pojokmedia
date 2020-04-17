<?php 

	defined("BASEPATH") OR exit('No direct script access allowed');

	class Crud extends CI_Controller{

		var $data;

		function __construct(){
			parent::__construct();
			date_default_timezone_set( 'Asia/Jakarta');
			$this->load->model('m_data');
			$this->load->helper('tanggal');
		}

		// INSERT MESSAGE
		function insert_message(){
			$name = $this->input->post('name');
			$email = $this->input->post('email');
			$subject = $this->input->post('subject');
			$message = $this->input->post('message');

			$data = array(
				'name' => $name,
				'email' => $email,
				'subject' => $subject,
				'message' => $message
			);

			$this->m_data->tambah_data('tb_message', $data);
			redirect(base_url('contact'));
		}

		// INSERT & UPDATE
		function action($act, $table, $id = ''){
			$img_upload = 0;

			switch ($table) {
				case 'message':
					$name = $this->input->post('name');
					$email = $this->input->post('email');
					$subject = $this->input->post('subject');
					$description = $this->input->post('description');

					$data = array(
						'name' => $name,
						'email' => $email,
						'subject' => $subject,
						'message' => $message
					);
					break;
				default:
					# code...
					break;
			}

			if ($img_upload == 1 && !empty($_FILES['image']['name'])){
				$config['upload_path'] = "../assets/images/".$table."/";
				$config['allowed_types'] = 'gif|jpg|png';
				$config['overwrite'] = true;
				$config['file_name'] = $image;

				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if (! $this->upload->do_upload('image')) {
					$error = $this->upload->display_errors()."<br> (".$config['upload_path'].")";
					$this->session->set_userdata('crud_status', $error);
					redirect(base_url($table));
				}else{
					if ($act == 'add') {
						$this->m_data->tambah_data('tb_'.$table, $data);
						$this->session->set_userdata('crud_status', 'add_success');
						$table = ($table=="admin"?"profile_settings":$table);
						redirect(base_url($table));
					}else{
						$img_delete_res = $this->m_data->ambil_where('tb_'.$table, array('id_'.$table => $id))->row();
						$img_delete = $img_delete_res->image;
						unlink($config['upload_path'].$img_delete);

						$where = array('id_'.$table => $id);
						$this->m_data->update_data('tb_'.$table, $data, $where);

						$this->session->set_userdata('crud_status', 'edit_success');
						$table = ($table=="admin"?"profile_settings":$table);
						redirect(base_url($table));
					}
				}
			}else{
				if ($act == 'add') {
					$this->m_data->tambah_data('tb_'.$table, $data);
					$this->session->set_userdata('crud_status', 'add_success');
					redirect(base_url($table));
				}else{
					$where = array('id_'.$table => $id);
					$this->m_data->update_data('tb_'.$table, $data, $where);

					$this->session->set_userdata('crud_status', 'edit_success');
					redirect(base_url($table));
				}
			}
		}


		// Delete
		function delete($table, $id){
			if ($table == "works") {
				$img_delete_res = $this->m_data->ambil_where('tb_'.$table, array('id_'.$table => $id))->row();
				$img_delete = $img_delete_res->image;
				unlink("../assets/images/".$table."/".$img_delete);
			}

			$where = array('id_'.$table => $id);
			$this->m_data->hapus_data('tb_'.$table, $where);

			$this->session->set_userdata('crud_status', 'del_success');
			redirect(base_url($table));
		}

		function settings($type, $id){

			switch ($type) {
				case 'profile':
					$name = $this->input->post('name');
					$username = $this->input->post('username');
					$image = $id.".jpg";

					$data = array(
						'name' => $name,
						'username' => $username
					);

					$this->session->set_userdata($data);

					if (!empty($_FILES['image']['name'])) {
						$config['upload_path'] = "assets/images/admin/";
						$config['allowed_types'] = 'gif|jpg|png';
						$config['overwrite'] = true;
						$config['file_name'] = $image;

						$this->load->library('upload', $config);
						$this->upload->initialize($config);

						if (! $this->upload->do_upload('image')) {
							$error = $this->upload->display_errors()."<br> (".$config['upload_path'].")";
							$this->session->set_userdata('crud_status', $error);
							redirect(base_url('profile_settings'));
						}else{
							$where = array('id_admin' => $id);
							$this->m_data->update_data('tb_admin', $data, $where);

							$this->session->set_userdata('crud_status', 'edit_success');
							redirect(base_url('profile_settings'));
						}
					}else{
						$where = array('id_admin' => $id);
						$this->m_data->update_data('tb_admin', $data, $where);

						$this->session->set_userdata('crud_status', 'edit_success');
						redirect(base_url('profile_settings'));
					}
					break;
				case 'password':
					$old_password = md5($this->input->post('old_password'));
					$password1 = md5($this->input->post('password1'));
					$password2 = md5($this->input->post('password2'));

					$data = array(
						'password' => $password1
					);

					$pass_check = $this->m_data->ambil_where('tb_admin', array('id_admin'=>$id))->row();
					$pass_old = $pass_check->password;

					if ($old_password != $pass_old) {
						$this->session->set_userdata('crud_status', 'wrong_password');
						redirect(base_url('profile_settings'));
					}else{
						if ($password1 != $password2) {
							$this->session->set_userdata('crud_status', 'unmatch_password');
							redirect(base_url('profile_settings'));	
						}else{
							$where = array('id_admin' => $id);
							$this->m_data->update_data('tb_admin', $data, $where);

							$this->session->set_userdata('crud_status', 'edit_success');
							redirect(base_url('profile_settings'));
						}
					}
					break;
			}

		}

	}

 ?>