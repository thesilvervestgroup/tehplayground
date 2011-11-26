var loading = true;
var last_hash = null;
var editor;
var id;

$(function(){
	amloading(false);

	// setup the height of the editor and output
	// and bind to automatically resize
	var height = $(window).height() - 48;
	$('#output').height(height);
	$('#editor').height(height);
	$(window).resize(function() {
		var height = $(window).height() - 48;
		$('#output').height(height);
		$('#editor').height(height);
	});

	// enable that preformated button action
    $('a#pre').click(function(){
        $(this).toggleClass("down");
    });

	// initialize the editor
	init_editor();

	// check if we've got a hash and load the code
	if (window.location.hash.length > 1) {
		id = window.location.hash.substr(1);
		last_hash = id;
		load_code(id);
	}
	
	// setup timers to monitor the hash and load code
	$.timer(250, function (t) {
		if (loading) { return; }
		if (window.location.hash.length > 1) {
			id = window.location.hash.substr(1);
			if (id.length > 4 && id != last_hash) {
				last_hash = id;
				load_code(id);
			}
		}
	});

	// handle the theme selector changing
	$('#theme').change(function(e) {
		editor.setTheme("ace/theme/" + $(this).val());
	});
});

// does a quick jQuery AJAX GET and puts the output into the editor
function load_code(new_id) {
	amloading(true);
	$.get('load.php', {id: id}, function (data) {
		editor.getSession().setValue(data);
		amloading(false);
	});
}

// initializes the editor and sets up the ctrl+enter handler
function init_editor() {
    editor = ace.edit("editor");
    editor.setTheme("ace/theme/eclipse"); // default theme
    
    var PHPMode = require("ace/mode/php").Mode; // only php highlighting included
    editor.getSession().setMode(new PHPMode());
	editor.getSession().setUseWrapMode(true); // perform word wrapping

	// catch on document so the editor doesn't need focus to render
	$(document).keypress(function (e) {
		// catch ctrl+enter
		// in testing, windows 7 is showing 10 for enter, os x is showing 13
		// if you know why and can fix this, please do so!
		if (e.ctrlKey && ((e.keyCode == 10 || e.charCode == 10) || (e.keyCode == 13 || e.charCode == 13))) {
			e.preventDefault(); // otherwise we get extra spaces in the code
			amrendering(true);
			var pre = ($('#pre:checked').val() != undefined) + 0; // hate doing this
			var code = editor.getSession().getValue(); // pull the code from the editor
			id = genid(); // generate a new ID for each render, paste-bin style
			window.location.hash = '#' + id;
			$.post('render.php', {id: id, pre: pre, code: code}, function (data) {
				$('#output-content').html(data);
				amrendering(false);
			});
		}
	});
}

// shows 'loading...' when loading code
function amloading(val) {
	loading = val;
	if (val) { $('#loading').show(); } else { $('#loading').hide(); }
}

// shows 'rendering...' when rendering code
function amrendering(val) {
	if (val) { $('#rendering').show(); } else { $('#rendering').hide(); }
}

// generate a new ID
function genid() {
    var text = '';
    var chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    for (var i = 0; i < 9; i++) text += chars.charAt(Math.floor(Math.random() * chars.length));
    return text;
}
