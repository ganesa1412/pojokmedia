<?php 
	class M_data extends CI_Model{
		
		function cek_login_admin($where){
			return $this->db->get_where("tb_user", $where);
		}

		function ambil_data($table){
			return $this->db->get($table);
		}
		function ambil_order_by($table, $by, $sort){
			$this->db->from($table);
			$this->db->order_by($by, $sort);
			return $this->db->get();
		}
		function ambil_where($table, $where){
			return $this->db->get_where($table, $where);
		}
		function ambil_total($table){
			return $this->db->get($table)->num_rows();
		}

		function ambil_join($table1, $table2, $table1key, $table2key){
			$sql = "SELECT * FROM $table1, $table2 WHERE ".$table1.".".$table1key." = ".$table2.".".$table2key;
			return $this->db->query($sql);
			// echo $sql;
		}

		function ambil_article($id, $cat, $limit, $offset){
			$whereid = ($id!=0?'AND tb_article.id_article = '.$id:'');
			$wherecat = ($cat!=0?'AND tb_rubric.id_rubric = '.$cat:'');
			$o = ($offset!=0?$offset:0);
			$wherelim = ($limit!=0?" LIMIT ".$o.", ".$limit:'');
			$sql = "SELECT * FROM tb_article, tb_user, tb_article_category, tb_rubric WHERE tb_article.id_user = tb_user.id_user AND tb_article.id_article_category = tb_article_category.id_article_category AND tb_article_category.id_rubric = tb_rubric.id_rubric ".$whereid.$wherecat." AND tb_article.show = 1 ORDER BY tb_article.date_created DESC".$wherelim;
			return $this->db->query($sql);
		}
		
		function ambil_slider(){
			$sql = "SELECT *, count(*) FROM tb_article, tb_article_stats WHERE tb_article.id_article = tb_article_stats.id_article AND tb_article_stats.date_created > DATE_SUB(now(), INTERVAL 7 DAY) GROUP BY tb_article.id_article ORDER BY count(*) DESC LIMIT 4";
			return $this->db->query($sql);
		}

		function ambil_search($keyword){
			$sql = "SELECT * FROM tb_article, tb_user, tb_article_category WHERE tb_article.id_user = tb_user.id_user AND tb_article.id_article_category = tb_article_category.id_article_category AND tb_article.content LIKE '%".$keyword."%' ORDER BY tb_article.id_article DESC";
			return $this->db->query($sql);
		}

		function ambil_related($curr_id, $cat_id){
			$sql = "SELECT * FROM tb_article WHERE id_article_category = $cat_id AND id_article != $curr_id ORDER BY RAND() LIMIT 6";
			return $this->db->query($sql);
		}

		function ambil_popular(){
			$sql = "SELECT *, count(*) FROM tb_article, tb_article_stats WHERE tb_article.id_article = tb_article_stats.id_article AND tb_article.show = 1 AND tb_article_stats.date_created > DATE_SUB(now(), INTERVAL 6 MONTH) GROUP BY tb_article.id_article ORDER BY count(*) DESC LIMIT 10";	

			return $this->db->query($sql);
		}
		function ambil_random(){
			$sql = "SELECT * FROM tb_article WHERE tb_article.show = 1 ORDER BY RAND() LIMIT 5";	

			return $this->db->query($sql);
		}		

		function ambil_order_by_limit($table, $by, $sort,$limit){
			$this->db->from($table);
			$this->db->order_by($by, $sort);
			$this->db->limit(2);
			return $this->db->get();
		}


		function ambil_banner($pos){
			$where = array('position' => $pos);
			return $this->db->get_where("tb_banner", $where);
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