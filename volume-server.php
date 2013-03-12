#!/usr/bin/php -q
<?
// volume-server.php - Speedy response w/IR Remotes.
// This service runs in background and watches pipe file for 
// u = volume up
// d = volume down
// m = mute toggle

$avrhost = "einstein-avr";
$avrport = "42042";

ob_implicit_flush(false);
error_reporting(0);

$pipe="/tmp/volume.pipe";
$mode=0600;
unlink($pipe);
if(!file_exists($pipe)) {
	// create the pipe
	umask(0);
	posix_mkfifo($pipe,$mode);
} 

$socket = fsockopen($avrhost, $avrport) or die('Could not connect to: '.$avrhost);

while (true) {
	$f = fopen($pipe,"r");
	$in = fread($f,1);
	if($in == "e") { break; } 			// Exit
	if($in == "u") { $reply = avrCommand("VU"); }	// Volume Up
	if($in == "d") { $reply = avrCommand("VD"); }	// Volume Down
	if($in == "m") { $reply = avrCommand("MZ"); }	// Toggle Mute
}

fclose($socket);
unlink($pipe);


// Functions

function avrCommand($command) {
	global $socket;
        fputs($socket, $command."\r\n");
//        return stream_get_line($socket,6, "\r\n");
}


?>
