<?php
	$dir = 'http://'.$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"].'files';
	$content = file_get_contents(str_replace("index.php", "", $dir));
	preg_match_all('~href="(.*\\.?.*)$"~', $content, $ul);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Documents</title>
    <link href="css/index.css" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Squada+One" rel="stylesheet">
</head>
<body>
<div id="wrapper">
    <div id="content">
        <div id="description">
            <h2>[My Documents]$ ls</h2>
	        	<ul id="doc_list">
	        		<?php 
	        			print_r($ul);
	        		?>
	        	</ul>
            <h2>[My Documents]$ <span id="cursor">|</span></h2>
        </div>
    </div>
</div>
<script type="text/javascript">
	var ul = document.getElementById("doc_list");
	// ul.removeChild(ul.getElementsByTagName("li")[0]);

	var lis = document.getElementById("doc_list").getElementsByTagName("li");
	var i = 0;
	for (i = 0; i < lis.length; i++) {
		var temp = lis[i].getElementsByTagName("a")[0].href.split("/");
		temp[temp.length-1] = "./" + temp[temp.length-1];
		lis[i].getElementsByTagName("a")[0].href = temp.join("/");
	}

	var link = lis[i-1].getElementsByTagName("a")[0].href;
	document.getElementsByClassName("spotlight")[0].getElementsByTagName("a")[0].href = link;
	ul.removeChild(ul.getElementsByTagName("li")[i-1]);
	
</script>
<div id="bubbles">
    <ul>
        <li>H</li>
        <li>E</li>
        <li>L</li>
        <li>L</li>
        <li>O</li>
        <li>WORLD</li>
    </ul>
</div>
</body>
</html>