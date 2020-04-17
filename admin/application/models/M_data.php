<?php 
	class M_data extends CI_Model{

		function cek_login_admin($where){
			return $this->db->get_where("tb_user", $where);
		}
		function ambil_data($table){
			return $this->db->get($table);
		}
		function ambil_where($table, $where){
			return $this->db->get_where($table, $where);
		}
		function ambil_order_by($table, $by, $sort){
			$this->db->from($table);
			$this->db->order_by($by, $sort);
			return $this->db->get();
		}
		function ambil_join($table1, $table2, $table1key, $table2key, $sortid, $sort){
			$sql = "SELECT * FROM $table1, $table2 WHERE ".$table1.".".$table1key." = ".$table2.".".$table2key." ORDER BY ".$sortid." ".$sort;
			return $this->db->query($sql);
			// return $sql;
		}
		function ambil_kategori(){
			$sql = "SELECT tb_article_category.id_article_category as id_category, tb_category.name as category_name, tb_category.image as image, tb_service.name as service_name FROM tb_category, tb_service WHERE tb_category.id_service = tb_service.id_service";
			return $this->db->query($sql);
		}
		function ambil_subkategori(){
			$sql = "SELECT tb_category_sub.id_category_sub as id_category_sub, tb_category_sub.name as category_sub_name, tb_category.name as category_name FROM tb_category_sub, tb_category WHERE tb_category_sub.id_category = tb_category.id_category";
			return $this->db->query($sql);
		}

		function ambil_article_old($id){

			$sql = "SELECT * FROM tb_article_old, tb_tim WHERE tb_article_old.id_kontributor = tb_tim.id_tim AND tb_article_old.id_article_old = ".$id;
			return $this->db->query($sql);
			// return $sql;
		}

		function count_order(){
			$sql = "SELECT COUNT(*) as count FROM tb_order WHERE diproses = 0 ORDER BY id_order DESC";
			return $this->db->query($sql);
		}

		function tambah_data($table, $data){
			$this->db->insert($table, $data);
		}

		function update_data($table, $data, $where){
			$this->db->where($where);
			$this->db->update($table, $data);
		}

		function hapus_data($table, $where){
			$this->db->where($where);
			$this->db->delete($table);
		}
	}
 ?>