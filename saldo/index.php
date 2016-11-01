<?php
//koneksi
	include '../koneksi.php';
	//saldo
	include '../saldo.php';
	$query = "SELECT * FROM saldo ORDER BY id DESC";
	$aksi  = mysqli_query($cox,$query);
	$cek = mysqli_num_rows($aksi);

	//deposit
	if (isset($_POST['depositok'])) {
		$depo = $_POST['depo'];
		$qwer = "INSERT INTO saldo VALUES (null,'$depo','1')";
		$hajr = mysqli_query($cox,$qwer);
		if ($hajr) {
			echo "<script>alert('Berhasil'); window.location='index.php';</script>";
		}else{
			echo "<script>alert('Eror'); window.location='index.php';</script>";
		}
	}
	//hapus
	if (isset($_GET['id'])) {
		if ($_GET['id'] == "hapus") {
			$trx = $_GET['trx'];
			$qwer = "DELETE FROM saldo WHERE id = '$trx'";
			$hajr = mysqli_query($cox,$qwer);
			if ($hajr) {
				echo "<script>alert('Berhasil'); window.location='index.php';</script>";
			}else{
			echo "<script>alert('Eror'); window.location='index.php';</script>";
		}
		}
	}

	//setor
	if (isset($_POST['setorok'])) {
		$depo = $_POST['setor'];
		$qwer = "INSERT INTO saldo VALUES (null,'$depo','2')";
		$hajr = mysqli_query($cox,$qwer);
		if ($hajr) {
			echo "<script>alert('Berhasil'); window.location='index.php';</script>";
		}else{
			echo "<script>alert('Eror'); window.location='index.php';</script>";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Saldo Pulsa</title>
</head>
<body>
<center>
<h1>Saldo Pulsa</h1>
<form method="POST">
<br/>Deposit <input type="number" name="depo" placeholder="Masukan Jumlah Deposit"> <input type="submit" name="depositok" value="Deposit">
</form>
<form method="POST">
<br/>Setor <input type="number" name="setor" placeholder="Masukan Jumlah Setor"> <input type="submit" name="setorok" value="setor">
</form>
</center>
<table width="70%" align="center" border="1">
	<tr>
		<th>Tanggal</th>
		<th>Rp.</th>
		<th>Tipe</th>
		<th>Aksi</th>
	</tr>
	<?php
		if ($cek == 0) {
			echo "<tr><td colspan='3'>Data Kosong</td></tr>";
		}else{
			while ($row = mysqli_fetch_object($aksi)) {
			$type = $row->type;
			if ($type == 0) {
				$tipe = "<font color='red'><b><i>Transaksi</i></b></font>";
			}elseif($type == 1){
				$tipe = "<font color='green'><b><i>Deposit</i></b></font>";
			}else{
				$tipe = "<font color='black'><b><i>Setor</i></b></font>";
			}
	?>
	<tr align="center">
		<td><?= $row->tangal; ?></td>
		<td><?= $row->jumlah ?></td>
		<td><?= $tipe ?></td>
		<td><a href="index.php?id=hapus&trx=<?=$row->id?>">Hapus</a></td>
	</tr>
	<?php 
	} 
	}


	?>
	<tr>
		<td colspan="4">
			<table>
	<tr>
		<td>Total Saldo Tersedia</td>
		<td><?= $sal ?></td>
	</tr>
	<tr>
		<td>Total Deposit</td>
		<td><?= $pemasukan ?></td>
	</tr>
	<tr>
		<td>Total Transaksi</td>
		<td><?= $pengeluaran ?></td>
	</tr>
	<tr>
		<td>Total Setor</td>
		<td><?= $setor ?></td>
	</tr>
	<tr>
		<td>Total Setelah Setor</td>
		<td><?= $salp ?></td>
	</tr>
</table>
		</td>
	</tr>
</table>

</body>
</html>