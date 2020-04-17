<?php 
	defined("BASEPATH") OR exit('No direct script access allowed');

	function format_pendek($tgl){
		$tanggal = explode("-", $tgl);
		return $tanggal['2']."/".$tanggal['1']."/".$tanggal['0'];
	}

	function format_2tanggal($tgl1, $tgl2){
		$tanggal1 = explode("-", $tgl1);
		$tanggal2 = explode("-", $tgl2);

		$bulan = array(
			'01' => "Januari",
			'02' => "Februari",
			'03' => "Maret",
			'04' => "April",
			'05' => "Mei",
			'06' => "Juni",
			'07' => "Juli",
			'08' => "Agustus",
			'09' => "September",
			'10' => "Oktober",
			'11' => "November",
			'12' => "Desember"
		); 
		
		if ($tgl1 != $tgl2) {
			if ($tanggal1['1'] == $tanggal2['1']) {
				return $tanggal1['2']." - ".$tanggal2['2']." ".$bulan[$tanggal1['1']]." ".$tanggal1['0'];
			}else{
				return $tanggal1['2']." ".$bulan[$tanggal1['1']]." - ".$tanggal2['2']." ".$bulan[$tanggal2['1']]." ".$tanggal1['0'];
			}
		}else{
			return $tanggal1['2']." ".$bulan[$tanggal1['1']]." ".$tanggal1['0'];
		}

	}

	function format($tgl){
		$tanggal = explode("-", $tgl);
		$bulan = array(
			'01' => "Januari",
			'02' => "Februari",
			'03' => "Maret",
			'04' => "April",
			'05' => "Mei",
			'06' => "Juni",
			'07' => "Juli",
			'08' => "Agustus",
			'09' => "September",
			'10' => "Oktober",
			'11' => "November",
			'12' => "Desember"
		); 
		return $tanggal['2']." ".$bulan[$tanggal['1']]." ".$tanggal['0'];
	}
 ?>