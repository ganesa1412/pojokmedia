<?php 
	class Mylib{
		
		function show_notification($status){
				switch ($status) {
					case 'add_success':
						$text = "Data Berhasil Ditambahkan";
						$icon = "fa-check";
						$class = "success";
						break;
					case 'edit_success':
						$text = "Data Berhasil Disunting";
						$icon = "fa-edit";
						$class = "warning";
						break;
					case 'del_success':
						$text = "Data Berhasil Dihapus";
						$icon = "fa-trash";
						$class = "danger";
						break;
					case 'wrong_password':
						$text = "Password lama yang anda masukkan salah";
						$icon = "fa-lock";
						$class = "danger";
						break;
					case 'unmatch_password':
						$text = "Password baru yang anda masukkan tidak cocok";
						$icon = "fa-lock";
						$class = "danger";
						break;
					default:
						$text = $status;
						$icon = "fa-remove";
						$class = "danger";
						break;
				}

				$notification = array(
					'text' => $text,
					'icon' => $icon,
					'class' => $class
				);

				return $notification;
		}

	}
 ?>