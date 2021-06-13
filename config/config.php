<?php 
	function base_url($url = null){
		$base_url = "http://localhost/monitoring-uppd";
		if ($url != null) {
			return $base_url."/".$url;
		}else{
			return $base_url;
		}
	}
	session_start();

	function tgl_indo($tanggal){
		$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
		);
		$pecahkan = explode('-', $tanggal);
		
	  // variabel pecahkan 0 = tanggal
	  // variabel pecahkan 1 = bulan
	  // variabel pecahkan 2 = tahun
		
		return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
	}

	date_default_timezone_set('Asia/Makassar');

 ?>