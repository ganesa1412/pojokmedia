<?php 
	defined("BASEPATH") OR exit('No direct script access allowed');

	function set_permalink($content)
	{
		$karakter = array ('{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+','/','\\',',','.','#',':',';','\'','"','[',']');
		$hapus_karakter_aneh = strtolower(str_replace($karakter,"",$content));
		return strtolower(str_replace(' ', '-', $hapus_karakter_aneh));
	}
 ?>