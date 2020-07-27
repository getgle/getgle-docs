<?php

$pi = $_POST; // shorthand for Post Input
if($pi["name"] == ""){
	$pi["name"] = "Untitled";
}
$pi["name"] = htmlspecialchars(substr($pi["name"], 0, 120));
$pi["date"] = time();
$pi["prettydate"] = date("Y/m/d g:i:s");

$postAllowed = true;

if($pi["privacy"] == "Private"){
	$pi["paste"] = openssl_encrypt($pi["paste"], "AES-256-OFB", $pi["password"]);
	$pi["name"] = openssl_encrypt($pi["name"], "AES-256-OFB", $pi["password"]);
}

if($postAllowed == true){
	$url = uniqid();
	file_put_contents("pastes/" . $url, json_encode($pi));
	if($pi["privacy"] == "Public"){
		$listfile = json_decode(file_get_contents("list.json"));
		$list = Array(
		"name" => $pi["name"],
		"url" => $url,
		"date" => $pi["date"],
		"prettydate" => $pi["prettydate"]
		);
		array_push($listfile, $list);
		file_put_contents("list.json", json_encode($listfile));
	}
	header("Location: display.php?paste=" . $url);
}

?>
