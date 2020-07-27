<?php
$paste = file_get_contents("pastes/" . $_GET["paste"]);
$displayPaste = true;  // display the paste?
$pasteJSON = json_decode($paste);

function displayPaste($paste){
	echo str_replace(
					["_NAME_", "_PASTE_", "_DATE_", "_STATUS_"],
					[$paste->name, $paste->paste, $paste->prettydate, ""],
					file_get_contents("templates/displayPaste.html"));
}

function displayEncryptedPaste($paste, $password){
	echo str_replace(
					["_NAME_", "_PASTE_", "_DATE_", "_STATUS_"],
					[
						openssl_decrypt($paste->name, "AES-256-OFB", $password), 
						openssl_decrypt($paste->paste, "AES-256-OFB", $password), 
						$paste->prettydate,
						"<span id='status'>This is an encrypted paste.  If it is displaying as gibberish or random symbols then that means you entered the wrong password and need to <a id='statuslink' href='display.php?paste=" . $_GET["paste"] . "'>try again</a></span>.",
					],
					file_get_contents("templates/displayPaste.html"));
}


if($_POST["password"]){
	displayEncryptedPaste($pasteJSON, $_POST["password"]);
}

if($paste == false){
	echo "Paste not found.";
	$displayPaste = false;
} 
else {
	$paste = json_decode($paste);
	if($paste->privacy != "Private"){
		displayPaste($paste);
	}
	if($paste->privacy == "Private"){
		$passPage = str_replace("_id_", $_GET["paste"], file_get_contents("templates/password.html"));
		echo $passPage;
	}
}


?>
