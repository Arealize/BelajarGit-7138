<?php

require_once('lib/DBClass.php');
require_once('lib/m_siswa.php');

$id = $_GET['a'];

if(!is_numeric($id)){
	exit('Access Forbidden');
}

$siswa = new Siswa();
$data = $siswa->deleteSiswa($id);

if(empty($data)){
	exit('data berhasil dihapus');
}
//$dt = $data[0];
/*
print '<pre>';
print_r($data);
print '</pre>';
*/
?>

<br />
<a href= "siswa.php">Kembali</a>