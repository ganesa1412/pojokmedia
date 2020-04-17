<?php 

	defined("BASEPATH") OR exit('No direct script access allowed');

	class Main extends CI_Controller{

		function __construct(){
			parent::__construct();
			date_default_timezone_set( 'Asia/Jakarta');
			$this->load->model('m_data');
			$this->load->helper('tanggal');
			$this->load->library('mylib');
		}

		function index(){
			$data['title'] = "PojokMedia.id";
			$data['description'] = "PojokMedia.id";
			$data['keywords'] = "pojokmedia, media kreatif, media budaya populer, informasi budaya populer, informasi industri kreatif";
			$data['author'] = "PojokMedia.id";

			$data['homepage'] = true;
			$data['isReadPage'] = false;

			$jumlah_data = $this->m_data->ambil_total('tb_article');
			$this->load->library('pagination');
			$config['base_url'] = base_url();
			$config['total_rows'] = $jumlah_data;
			$config['per_page'] = 15;
			$from = $this->uri->segment(1);
			$this->pagination->initialize($config);

			$data['article_res'] = $this->m_data->ambil_article(0,0, $config['per_page'], $from)->result();
			$data['rubric_res'] = $this->m_data->ambil_data('tb_rubric')->result();
			$data['slider_res'] = $this->m_data->ambil_slider()->result();
			$data['popular_res'] = $this->m_data->ambil_popular()->result();
			$data['random_res'] = $this->m_data->ambil_random()->result();

			$data['rubcolor'] = array(
				'Entertainment' => 'orange',
				'Technology' => 'blue',
				'Travel & Culinary' => 'red'
			);

			// $data['featured_res'] = $this->m_data->ambil_featured()->result();
			// $data['bnr_home'] = $this->m_data->ambil_banner("Homepage")->row();
			// $data['bnr_side'] = $this->m_data->ambil_banner("Sidebar")->row();
			// $data['popular_article'] = $this->m_data->popular_article()->result();

			$this->load->view('v_head',$data);
			$this->load->view('v_index',$data);
			$this->load->view('v_side',$data);
			$this->load->view('v_foot',$data);
		}


		function view($page, $id){
			$data['homepage'] = false;
			$data['rubric_res'] = $this->m_data->ambil_data('tb_rubric')->result();
			$data['isReadPage'] = false;

			switch ($page) {
				case 'article':
					$where = array('permalink' => $id);
					$true_id = $this->m_data->ambil_where('tb_article', $where)->row()->id_article;

					$data['isReadPage'] = true;

					$data['rubcolor'] = array(
						'Entertainment' => 'orange',
						'Technology' => 'blue',
						'Travel & Culinary' => 'red'
					);
					
					$this->mylib->insstat($true_id);
					$data['article_res'] = $this->m_data->ambil_article($true_id,0,0,0)->row();
					$data['tags'] = explode(', ', $data['article_res']->keyword);

					$data['title'] = $data['article_res']->title." | PojokMedia.id";
					$data['keywords'] = $data['article_res']->keyword.", PojokMedia.id";
                    $data['share_img'] = $data['article_res']->image;
                    $data['share_url'] = $data['article_res']->permalink;

					$content_arr = explode("<!-- -->", $data['article_res']->content);
					$content = strip_tags($content_arr[2]);	
					$position = stripos ($content, "."); //find first dot position

				    if($position) { 
				        $offset = $position + 1;
				        $position2 = stripos ($content, ".", $offset);
				        $data['description'] = substr($content, 0, $position2);
				    }

				    $data['author'] = $data['article_res']->full_name." | PojokMedia.id";
				    $currid = $data['article_res']->id_article;
				    $catid = $data['article_res']->id_article_category;

				    $data['related_res'] = $this->m_data->ambil_related($currid, $catid)->result();
					break;
				case 'rubric':
					$data['rubcolor'] = array(
						'Entertainment' => 'orange',
						'Technology' => 'blue',
						'Travel & Culinary' => 'red'
					);

					$data['rubric'] = ucwords(str_replace('-', ' ', str_replace('and', '&', $id)));
					$where = array('rubric_name' => $data['rubric']);
					$getcat = $this->m_data->ambil_where('tb_rubric', $where)->row();
					$id_rubric = $getcat->id_rubric;

					$data['title'] = $data['rubric']." | PojokMedia.id";
					$data['description'] = $data['rubric']." | PojokMedia.id";
					$data['keywords'] = "pojokmedia";
					$data['author'] = "PojokMedia.id";

					$jumlah_data = $this->m_data->ambil_total('tb_article');
					$this->load->library('pagination');
					$config['base_url'] = base_url();
					$config['total_rows'] = $jumlah_data;
					$config['per_page'] = 15;
					$from = $this->uri->segment(1);
					$this->pagination->initialize($config);

					$data['article_res'] = $this->m_data->ambil_article(0,$id_rubric,$config['per_page'],$from)->result();
					break;
				case 'search':
					$data['keyword'] = $this->input->post('keyword');
					$data['article_res'] = $this->m_data->ambil_search($data['keyword'])->result();

					$data['title'] = "Hasil pencarian untuk '".$data['keyword']."' | PojokMedia.id";
					$data['description'] = "PojokMedia.id | PojokMedia.id";
					$data['keywords'] = "makanabis, media kuliner, informasi kuliner";
					$data['author'] = "PojokMedia.id";
					break;
				default:
					# code...
					break;
			}

				// $data['bnr_home'] = $this->m_data->ambil_banner("Homepage")->row();
				// $data['bnr_side'] = $this->m_data->ambil_banner("Sidebar")->row();
				$data['popular_res'] = $this->m_data->ambil_popular()->result();
				$data['random_res'] = $this->m_data->ambil_random()->result();

				$this->load->view('v_head',$data);
				$this->load->view('v_'.$page,$data);
				$this->load->view('v_side',$data);
				$this->load->view(	'v_foot',$data);
			
		}

		function notfound(){
			
		}

	}
 ?>