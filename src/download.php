<?php
	$name = $_GET['name'] . ".mp3";
	$filepath = "../../../public/songs/" . $_GET['id'] . ".mp3";
	header("Content-type: octet/stream");
    header("Content-disposition: attachment; filename=\"" . $name . "\";");
	header("Content-Transfer-Encoding: Binary");
	header("Content-Length: " . filesize($filepath));
	readfile($filepath);
	exit();
?>