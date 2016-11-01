<?php
	$qsaldo0 = mysqli_query($cox,"SELECT sum(jumlah) FROM saldo WHERE type = '0'");
	$saldo0 = mysqli_fetch_array($qsaldo0);
	$qsaldo1 = mysqli_query($cox,"SELECT sum(jumlah) FROM saldo WHERE type = '1'");
	$saldo1 = mysqli_fetch_array($qsaldo1);
	$qsaldo2 = mysqli_query($cox,"SELECT sum(jumlah) FROM saldo WHERE type = '2'");
	$saldo2 = mysqli_fetch_array($qsaldo2);

	$pemasukan = $saldo1[0];
	$pengeluaran = $saldo0[0];
	$setor = $saldo2[0];

	$sal = $pemasukan-$pengeluaran;
	$salp = $pengeluaran-$setor; 
?>