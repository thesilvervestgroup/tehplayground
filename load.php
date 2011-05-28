<?php require_once('bootstrap.php');

// we don't want to show any errors when loading scripts
error_reporting(0);

// get the id and sanitize it
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
if (!empty($id)) {
	$filename = RENDER_PATH . $id;
	// we need to strip <?php from the code so we can edit it successfully
	$code = substr(file_get_contents($filename), 6);

	print $code;
}
