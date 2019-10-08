<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);
require 'fuction.php';
$socket = fsockopen("localhost","5038",
	$errno, $errstr, 10); 
fputs($socket, "Action:Login\r\n");
fputs($socket, "UserName:iconnect\r\n"); 
fputs($socket, "Secret:)CT^G)N0ct6g0n\r\n\r\n"); 
fputs($socket, "Action: Command\r\n");
fputs($socket, "Command: pjsip reload\r\n");
fputs($socket, "Action: Logoff\r\n\r\n");
fgets($socket);
fclose($socket);
reloadPjsip();
?>
