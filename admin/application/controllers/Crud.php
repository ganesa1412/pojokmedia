<?php 

	defined("BASEPATH") OR exit('No direct script access allowed');

	class Crud extends CI_Controller{

		var $data;

		function __construct(){
			parent::__construct();
			date_default_timezone_set( 'Asia/Jakarta');
			$this->load->model('m_data');
			$this->load->helper(
				array('tanggal', 'permalink')
			);
			$this->data = array('main_site' => "https://pojokmedia.id/");
			//$this->data = array('main_site' => "http://localhost/pojokmedia/");
		}

		// INSERT & UPDATE
		function action($act, $table, $id){
			$img_upload = 0;
			$about_field = '';

			switch ($table) {
				case 'rubric':
					$rubric_name = $this->input->post('rubric_name');

					$data = array(
						'rubric_name' => $rubric_name
					);

					$img_upload = 0;
					break;
				case 'article_category':
					$category_name = $this->input->post('category_name');
					$id_rubric = $this->input->post('id_rubric');
	
					$data = array(
						'category_name' => $category_name,
						'id_rubric' => $id_rubric
					);

					$img_upload = 0;
					break;
				case 'event_category':
					$category_name = $this->input->post('category_name');
	
					$data = array(
						'category_name' => $category_name
					);

					$img_upload = 0;
					break;
				
				case 'about':
					$field = $this->input->post('field');
					if ($field == 'page_contact') {
						$phone = $this->input->post('phone');
						$email = $this->input->post('email');
						$facebook = $this->input->post('facebook');
						$instagram = $this->input->post('instagram');
	
						$data = array(
							'phone' => $phone,
							'email' => $email,
							'facebook' => $facebook,
							'instagram' => $instagram
						);
					}else{
						$value = $this->input->post('value');

						echo "'$field' => $value";

						$data = array(
							$field => $value,
						);
					}

					$about_field = str_replace('page_', '', $field);
					$img_upload = 0;
					break;
				case 'user':
					$full_name = $this->input->post('full_name');
					$username = $this->input->post('username');
					if ($act == "add") {
						$password = md5($this->input->post('password'));
					}else{
						$password = $this->input->post('password');
					}
					$about = $this->input->post('about');
					$admin = $this->input->post('admin');
					

					$data = array(
						'full_name' => $full_name,
						'username' => $username,
						'password' => $password,
						'about' => $about,
						'admin' => $admin
					);

					$img_upload = 0;
					break;
				case 'order':
					$diproses = 1;
					
					$data = array(	
						'diproses' => $diproses
					);
					$img_upload = 0;
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
						$table = ($table=="user"?"profile_settings":$table);
						redirect(base_url($table));
					}else{
						$img_delete_res = $this->m_data->ambil_where('tb_'.$table, array('id_'.$table => $id))->row();
						$img_delete = $img_delete_res->image;
						unlink($config['upload_path'].$img_delete);

						$where = array('id_'.$table => $id);
						$this->m_data->update_data('tb_'.$table, $data, $where);

						$this->session->set_userdata('crud_status', 'edit_success');
						$table = ($table=="user"?"profile_settings":$table);
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

					if ($table == 'about') {
						redirect(base_url('about/'.$about_field));
					}else{
						redirect(base_url($table));
					}
					
				}
			}
		}

		function add_article(){
			$data['main_site'] = $this->data['main_site'];
			$title = $this->input->post('title');
			
			$content = array();
			$image = array();
			$fin_content = "";
			$len = $this->input->post('counter');
			for ($i=0; $i <= $len; $i++) { 
				if ($this->input->post('type'.$i) == "ctn") {
					$content[$i] = "<!-- --><!-- ctn -->";
					$content[$i] .= $this->input->post('content'.$i);
					$fin_content .= $content[$i];
				}else if($this->input->post('type'.$i) == "img"){
					$image[$i] = "article_".date('YmdHis').$i.".png";
					$content[$i] = "<!-- --><!-- img -->";
					$content[$i] .= "<img src='".$data['main_site']."assets/img/news/".$image[$i]."' width='100%'>";
					$content[$i] .= "<!-- capt --><br><p><i>".$this->input->post('caption'.$i).". </i></p>";


					$config['upload_path'] = "../assets/img/news/";
					$config['allowed_types'] = 'gif|jpg|png';
					$config['overwrite'] = true;
					$config['file_name'] = $image[$i];

					$this->load->library('upload', $config);
					$this->upload->initialize($config);

					if (! $this->upload->do_upload('image'.$i)) {
						$error = $this->upload->display_errors()."<br> (".$config['upload_path'].")";
						$this->session->set_userdata('crud_status', $error);
						$image[$i] = "error.png";
						$content[$i] = "<!-- --><!-- img -->";
						$content[$i] .= "<img src='".$data['main_site']."assets/img/news/".$image[$i]."' width='100%'>";
						$content[$i] .= "<!-- capt --><br><p><i>".$this->input->post('caption'.$i)." </i></p>";
					}

					$fin_content .= $content[$i];
				}
			}

			$id_article_category = $this->input->post('id_article_category');
			$keyword = $this->input->post('keyword');

			$old = $this->input->post('old-post');
			if ($old == 1) {
				$date_created = $this->input->post('date_created');
				$id_user = $this->input->post('id_user');
			}else{
				$date_created = date('Y-m-d');
				$id_user = $this->session->userdata('id_user');
			}

			//echo $this->input->post('id_user');
			//echo "ajg";
			
			$permalink = set_permalink($title);

			$data = array(
				'title' => $title,
				'content' => $fin_content,
				'id_user' => $id_user,
				'id_article_category' => $id_article_category,
				'keyword' => $keyword,
				'show' => 1,
				'date_created' => $date_created,
				'image' => $image[1],
				'permalink' => $permalink
			);

			$this->m_data->tambah_data('tb_article', $data);
			$this->session->set_userdata('crud_status', 'add_success');
			redirect(base_url('article'));
			
		}

		// ==============================================================================================
		function edit_article($id){
			$data['main_site'] = $this->data['main_site'];
			$content = array();
			$img = array();
			$fin_content = "";
			$len = $this->input->post('counter2');
			for ($i=0; $i <= $len; $i++) { 
				if ($this->input->post('type'.$i) == "ctn") {
					$content[$i] = "<!-- --><!-- ctn -->";
					$content[$i] .= $this->input->post('content'.$i);
					$fin_content .= $content[$i];
				}else if($this->input->post('type'.$i) == "img"){
					if (empty($_FILES['image'.$i]['name'])) {
						$img[$i] = $this->input->post('previmg'.$i);
					}else{
						$img[$i] = "article_".date('YmdHis').$i.".png";
						$config['upload_path'] = "../assets/img/news/";
						$config['allowed_types'] = 'gif|jpg|png';
						$config['overwrite'] = true;
						$config['file_name'] = $img[$i];

						$this->load->library('upload', $config);
						$this->upload->initialize($config);

						if (! $this->upload->do_upload('image'.$i)) {
							$error = "[ID ".$i."] ".$this->upload->display_errors()."<br> (".$config['upload_path'].")";
							$this->session->set_userdata('crud_status', $error);
							$img[$i] = "error.png";
						}else{
						}
					}

					$content[$i] = "<!-- --><!-- img -->";
					$content[$i] .= "<img src='".$data['main_site']."assets/img/news/".$img[$i]."' width='100%'>";
					$content[$i] .= "<!-- capt --><br><p><i>".$this->input->post('caption'.$i)." </i></p>";
					$fin_content .= $content[$i];
				}
			}

			$id_article_category = $this->input->post('id_article_category');
			$keyword = $this->input->post('keyword');
			$title = $this->input->post('title');

			$old = $this->input->post('old-post');
			if ($old == 1) {
				$date_created = $this->input->post('date_created');
				$id_user = $this->input->post('id_user');
			}else{
				$date_created = date('Y-m-d');
				$id_user = $this->session->userdata('id_user');
			}
			    
			$permalink = set_permalink($title);

			$data = array(
				'title' => $title,
				'content' => $fin_content,
				'id_user' => $id_user,
				'id_article_category' => $id_article_category,
				'keyword' => $keyword,
				'date_created' => $date_created,
				'image' => $img[1],
				'permalink' => $permalink
			);

			$where = array('id_article' => $id);
			$this->m_data->update_data('tb_article', $data, $where);
			$this->session->set_userdata('crud_status', 'edit_success');
			redirect(base_url('article'));
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
					$full_name = $this->input->post('full_name');
					$username = $this->input->post('username');
					$about = $this->input->post('about');
					$image = $id.".jpg";

					$data = array(
						'full_name' => $full_name,
						'username' => $username,
						'about' => $about
					);

					$this->session->set_userdata($data);

					if (!empty($_FILES['image']['name'])) {
						$config['upload_path'] = "assets/images/user/";
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
							$where = array('id_user' => $id);
							$this->m_data->update_data('tb_user', $data, $where);

							$this->session->set_userdata('crud_status', 'edit_success');
							redirect(base_url('profile_settings'));
						}
					}else{
						$where = array('id_user' => $id);
						$this->m_data->update_data('tb_user', $data, $where);

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

					$pass_check = $this->m_data->ambil_where('tb_user', array('id_user'=>$id))->row();
					$pass_old = $pass_check->password;

					if ($old_password != $pass_old) {
						$this->session->set_userdata('crud_status', 'wrong_password');
						redirect(base_url('profile_settings'));
					}else{
						if ($password1 != $password2) {
							$this->session->set_userdata('crud_status', 'unmatch_password');
							redirect(base_url('profile_settings'));	
						}else{
							$where = array('id_user' => $id);
							$this->m_data->update_data('tb_user', $data, $where);

							$this->session->set_userdata('crud_status', 'edit_success');
							redirect(base_url('profile_settings'));
						}
					}
					break;
			}

		}

		function upload($filename, $format, $table){
			$config['upload_path'] = "../assets/images/";
			$config['allowed_types'] = 'gif|jpg|png';
			$config['overwrite'] = true;
			$config['file_name'] = $filename.".".$format;

			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if (! $this->upload->do_upload('image')) {
				$error = $this->upload->display_errors()."<br> (".$config['upload_path'].")";
				$this->session->set_userdata('crud_status', $error);
				redirect(base_url($table));
			}else{
				redirect(base_url($table));
			}
		}

		function set_all_permalink(){
			$res = $this->m_data->ambil_data('tb_article')->result();
			foreach ($res as $r) {
				echo $r->title." <br>";
				$permalink = set_permalink($r->title);

				$data = array(
					'permalink' => $permalink
				);

				$where = array('id_article' => $r->id_article);
				$this->m_data->update_data('tb_article', $data, $where);
				}
		}


		function view_message($id){
			$where = array('id_message' => $id);
			$data = array(
				'read' => 1
			);
			$this->m_data->update_data('tb_message', $data, $where);

			redirect(base_url('view_message/'.$id));
		}
	}
 ?>