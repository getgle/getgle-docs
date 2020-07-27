<?php
$pastes = json_decode(file_get_contents("list.json"));
$template = file_get_contents("templates/publicpastes.html");

function renderPastes($p){
	$displayPastes = "";
	foreach($p as $paste){
		$displayPaste = "<a href='display.php?paste=" . $paste->url . "'><div id='pasteitem'><span id='pastetitle'>" . $paste->name . "</span><br><span id='pastedate'><i>Uploaded on " . $paste->prettydate ."</i></span></div></a>";
		$displayPastes = $displayPaste . $displayPastes;
	}
	return $displayPastes;
}
echo str_replace("_PASTES_", renderPastes($pastes), $template);
?>
