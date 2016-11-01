<?php
date_default_timezone_set('Asia/Jakarta');
$cox = mysqli_connect('localhost','root','junandia98','pulsa');
if ($cox) {
	echo "<pre>Last Data Generated ".date('d-M-Y | H:i:s')."</pre>";
}
?>