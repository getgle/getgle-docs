<?php
// check if any pastes are expired
$files = scandir("pastes/");

foreach($files as $file){
	$filename = $file;
	$file = json_encode("pastes/" . $file);
	if($file->expiration != "never"){
		if(time() > $file->expiration * 10 + $file->date){
			rename($filename, "../exp/" . $filename)
			echo "deleted" . $filename . "<br>";
		}
	}
}

?>
