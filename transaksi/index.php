<?php
include '../koneksi.php';
//hitung jumlah saldo
include '../saldo.php';
//trx ok
if (isset($_POST['trx_ok'])) {
	$jm = $_POST['jumlah'];
	$nm = $_POST['nama'];
	$qw = "INSERT INTO transaksi values(null,'$jm','$nm',CURRENT_DATE)";
	$ak = mysqli_query($cox,$qw);
	if ($ak) {
		$qw2 = mysqli_query($cox,"INSERT INTO saldo VALUES (null,'$jm','0')");
		if ($qw2) {
			echo "<script>window.location='index.php';</script>";
		}
	}
}
//list transaksi
$litx = mysqli_query($cox,"SELECT * FROM transaksi ORDER BY id DESC");
?>
<html>
<head>
	<title>RJ Pulsa</title>
	<style type="text/css">
		a{
			text-decoration-style: none;
			color: black;
			text-decoration: none;
			font-size: 25;
		}a#active{
			text-decoration-style: none;
			color: black;
			text-decoration: none;
			font-size: 25;
		}a#hover{
			text-decoration-style: none;
			color: black;
			text-decoration: none;
			font-size: 25;
		}
	</style>
</head>
<body>
<center>
	<h1>HALAMAN TRANSAKSI PULSA</h1>
	<hr>
	<table>
		<tr>
			<td>| <a href="#">SELAMAT DATANG & MOHON GUNAKAN DENGAN BIJAK</blink></a> |</td>
		</tr>
</table>
<hr/>
<form method="POST">
<table>
	<tr align="center">
		<td>Sisa Saldo</td>
		<td><?= $sal ?></td>
	</tr>
	<tr>
		<td>Rp. </td>
		<td><input type="number" name="jumlah"></td>
	</tr>
	<tr>
		<td>Nama </td>
		<td><input type="text" name="nama"></td>
	</tr>
	<tr align="center">
		<td colspan="2"><input type="submit" name="trx_ok"></td>
	</tr>
</table>
</form>
<hr>
<table width="25%" border="1">
	<tr>
		<th colspan="3">Tansaksi</th>
	</tr>
	<tr>
		<td>Tanggal</td>
		<td>Nama</td>
		<td>Rp.</td>
	</tr>
	<?php
		while ($r = mysqli_fetch_object($litx)) {
	?>
	<tr>
		<td><?= $r->tanggal; ?></td>
		<td><?= $r->nama; ?></td>
		<td><?= $r->jumlah; ?></td>
	</tr>
	<?php
		}
	?>
</table>
<hr/>
<pre>RJun Technology 2016</pre>
<hr/>
</center>
</body>
</html>