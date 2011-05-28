<?php require_once('bootstrap.php');

// init the vars
$code = $id = null;
$pre = 1;

// sanitize inputs
$code = filter_input(INPUT_POST, 'code', FILTER_UNSAFE_RAW);		// large string of data - can be any size
$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);		// short identifier string - currently from uniqid()
$pre = filter_input(INPUT_POST, 'pre', FILTER_SANITIZE_NUMBER_INT); // whether to preformat the output, this should only be 0 or 1
if (!empty($code) && !empty($id)) {
	$filename = RENDER_PATH . $id;

	// we need to append <?php to the code so it include()'s successfully
	$code = '<' . '?' . 'php ' . $_POST['code'];

	// store it locally
	file_put_contents($filename, $code);

	// render the output and store it for now using output buffering
	ob_start();
	include($filename);
	$output = htmlentities(ob_get_contents());
	ob_end_clean();

	// display output, with preformatting if requested
	if ($pre == 1) {
		print "<pre>$output</pre>";
	} else {
		print $output;
	}
}
