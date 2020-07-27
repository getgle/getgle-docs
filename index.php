<html>
<head>
<title>Getgle Docs: Military-Grade Hardened Texthost</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div id="menu">
<table id="menu-items">
<tr>
<td><a href="../"><img src="logo.png" height="30px" id="logo"></a></td>
<td><a href="index.php"><span id="menu-item">Upload</span></a></td>
<td><a href="list.php"><span id="menu-item">Public Pastes</span></a></td>
<td><a href="about.html"><span id="menu-item">About</span></a></td>
</tr>
</table>
</div>
<div id="main">
<div id="newPaste">
	<?php
if (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] != 'on') {
    echo "<span id='status'>WARNING! You are accessing this site without SSL. Please <a id='statuslink' href='https://docs.getgle.org'>click here to use SSL</a></span>";
}
?>
<form action="upload.php" method="POST" autocomplete="off">
<h3>New paste</h3>
<textarea name="paste" id="paste"></textarea>
<h3>Paste options</h3>
Paste Name: 
<input type="text" name="name" maxlength="120"><br>	
Paste Privacy:
<select name="privacy" onchange="if(this.value == 'Private'){this.form['password'].style.visibility='visible'}else{this.form['password'].style.visibility='hidden'}">
<option value="Public" selected="selected">Public</option>
<option value="Unlisted">Unlisted</option>
<option value="Private">Military Grade (AES-256)</option>
</select>
<br>
Password: 
<input type="text" name="password" style="visibility:hidden;"><br>
</select><br>
<input type="submit" value="Submit New Paste">
</form>
</div>
</div>
</body>
</html>
