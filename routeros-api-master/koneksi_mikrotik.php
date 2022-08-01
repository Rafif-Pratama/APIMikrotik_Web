<?php
require('routeros_api.php');
$API = new routeros_api();
$API->debug = false;
if ($API->connect('192.168.13.3', 'userAPI', 'conn'))
{
	echo "Koneksi Sukses";
	$API->disconnect();
}
else
{	
	echo "Koneksi Gagal";
}
?>