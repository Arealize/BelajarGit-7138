<?php

require_once('lib/DBClass.php');
require_once('lib/m_siswa.php');
require_once('lib/m_nationality.php');
/*
$id = (isset ($_GET['a'])) ? $_GET['a'] : $_POST['in_nis'];

if(!is_numeric($id) && !isset($_POST['in_nis'])){
	exit('Access Forbidden');
}
*/

$id= $_GET['a'];
if(!is_numeric($id)){
	exit('Access Forbiden');
}

$siswa = new Siswa();
$data = $siswa->readSiswa($id);

$nation = new Siswa();
$data_nation = $siswa->readAllNationality();


if(empty($data)){
	exit('siswa is not found');
}

$dt=$data[0];

?>
<h1> Edit Data Siswa </h1>
<form action="usiswa.php?a=<?php echo $id?>" method="post">
	NIS:<br />
	<input type="text" value = "<?php echo $dt['id_siswa']?>" 
		name = "in_nis" readonly="true"><br />
	Nama Lengkap:<br/>
	<input type="text" value = "<?php echo $dt['full_name']?>" name = "in_name"><br />
	Email:<br/>
	<input type = "text" name = "in_email" value = "<?php echo $dt['email']?>><br />
	Kewarganegaraan:<br/>
	<select name="in_nation">
		<option value=""> --pilih negara--</option>
		<?php foreach($data_nation as $n): ?>
		<?php $s=($dt['id_nationality']==$n['id_nationality'])?"selected":""?>
		<option value="<?php echo $n['id_nationality']?>" <?php echo $s?>>
			<?php echo $n['nationality']?>
		</option>
		<?php endforeach?>
	</select>
	<input  type="submit" name="kirim" value="simpan">
<form />