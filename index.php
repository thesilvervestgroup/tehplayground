<?php session_start(); $_SESSION['haxor'] = "Nothing useful here, stop trying to hax me, bro!";
$example = "// example code\n\nfor (\$i = 0; \$i < 10; ++\$i) {\n\tprint \"i: \$i\\n\";\n}";
?>
<!doctype html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"> <![endif]--><!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]--><!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]--><!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]--><!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]--><head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	
	<title>Teh Playground!</title>
	<meta name="description" content="Teh Playgound is a PHP testbed, where you can do rapid PHP prototyping without the need to build your own LAMP stack or bother with saving files and the like. It allows you to slap together a quick block of code and render it straight in your browser, and even proceed to send that data over to a friend or colleague for collaboration.">
	<meta name="author" content="http://www.silvervest.net/">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link href='http://fonts.googleapis.com/css?family=Permanent+Marker' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/style.css?v=2">

	<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]--></head>
<body>
	<header>
		<h1><a href="/">Welcome to Teh Playground!</a></h1>
		<span id="theme-selector">
			<select id="theme">
				<option value="clouds">Clouds</option>
				<option value="clouds_midnight">Clouds Midnight</option>
				<option value="cobalt">Cobalt</option>
				<option value="dawn">Dawn</option>
				<option value="eclipse" selected>Eclipse</option>
				<option value="idle_fingers">Idle Fingers</option>
				<option value="kr_theme">KR Theme</option>
				<option value="mono_industrial">Mono Industrial</option>
				<option value="monokai">Monokai</option>
				<option value="pastel_on_dark">Pastel On Dark</option>
				<option value="twilight">Twilight</option>
			</select>
		</span>
		<span id="pre-selector">
			<p>Wrap output in &lt;pre&gt;<input type="checkbox" name="pre" id="pre" checked /></p>
		</span>
	</header>
	<div id="container">
		<div id="main" role="main">
			<table>
				<tr>
					<td><div id="loading">Loading...</div><pre id="editor" name="editor"><?php echo $example; ?></pre></td>
					<td><div id="rendering">Rendering...</div><div id="output"><div id="output-content">
<pre><h2>About</h2>
Teh Playgound is a PHP testbed, where you can do rapid PHP prototyping without the need to build your own LAMP stack or bother with saving files and the like.
It allows you to slap together a quick block of code and render it straight in your browser, and even proceed to send that data over to a friend or colleague for collaboration.

<h2>Usage</h2>
Just type your PHP code in the left hand side there, and when you're ready to run it, just hit CTRL+Enter - that's it. It'll render and the output will be shown over here, errors and all. 
Your code is saved on the server, so you can keep the URL handy and come back to it at a later point, or even send it off to a friend for them to check it out and run it as well.
It does need Javascript enabled to run, since it does AJAX stuff, and does not fail gracefully if it's missing, so wah-wah to you if you don't like that.
<?php if (empty($code)): ?>We've even started you off with some example code to the left - hit CTRL+Enter to see it run!
<?php endif; ?>

<h2>Haxors</h2>
The only thing we ask is that you try not to break it.
This is provided free of charge to the public, and attacks or misuse will only get it shut down, and that's never a good thing.
We have locked some things down for security reasons, and the entire web server runs as an unprivileged user in an almost empty chroot jail, so even if you're looking around, there's not much you can get access to. Either way, we understand that people are that way inclined and hope that if you do choose to dig deep and you do find some things open that probably shouldn't be for a public service, feel free to <a href="mailto:bugs@tehplayground.com?subjet=Danger+Will+Robinson,+Danger!">shoot us an email</a> and we'll fix it up and thank you gratiously!

<h2>Open Sores</h2>
The source for this site is open source and released under a GPL license. You can <a href="https://github.com/thesilvervestgroup/tehplayground/">browse the repository over at GitHub</a>. If you have any improvements to make or find some bugs, you can either <a href="mailto:bugs@tehplayground.com">email us</a> or just fork the repo and send us a pull request!

<h2>Credits</h2>
 * This app was built by the lovely team of gents at <a href="http://www.silvervest.net/">The Silvervest Group</a>.
 * It's using the <a href="http://ace.ajax.org">Ace Cloud9 Editor</a> from the <a href="http://ajax.org/">ajax.org</a> team.
 * It's got a base built on the <a href="http://www.html5boilerplate.com/">HTML5 Boilerplate</a>.
 * It's running on the <a href="http://aws.amazon.com/ec2">Amazon AWS EC2</a> stack.
 * It's running <a href="http://www.php.net/">PHP 5.3.4</a>.
 * It's served by <a href="http://www.lighttpd.net/">Lighttpd 1.4.28</a>.
</pre>
					</div></div></td>
				</tr>
			</table>
		</div>
	</div>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
	<script>!window.jQuery && document.write(unescape('%3Cscript src="js/libs/jquery-1.5.1.min.js"%3E%3C/script%3E'))</script>
	<script src="js/plugins.js" charset="utf-8"></script>
	<script src="js/script.js"></script>
	<script>var id = '<?php echo uniqid(); ?>';</script>

</html>