<?php
	$file = "../../../public/" . $_GET['file'];
	header("Content-type: octet/stream");
    header("Content-disposition: attachment; filename=" . basename($file) . ";");
	header("Content-Transfer-Encoding: Binary");
	header("Content-Length: " . filesize($file));
	readfile($file);
	exit();
?>
