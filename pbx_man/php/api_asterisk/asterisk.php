<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);
require 'fuction.php';


$tenant = $_POST["tenant"];
$pjsip = $_POST["sip"];
$data = $_POST["data"];
$token = $_POST["key"];
$command = $_POST["command"];
if($token != "wine!23"){
	echo "Some Wrong Key";
	exit();

}
switch($command){
case "add_member" :
	$config = "
[".$tenant.$pjsip."]
type = endpoint
context = ".$tenant."_exten
disallow = all
allow = ulaw
allow = alaw
auth = ".$tenant.$pjsip."
aors = ".$tenant.$pjsip."
callerid = ".$tenant.$pjsip." <".$tenant.$pjsip.">
force_rport=yes
ice_support=yes
rtp_symmetric=yes
direct_media=no
[".$tenant.$pjsip."]
type = auth
auth_type = userpass
password = ".$pjsip."
username = ".$tenant.$pjsip."
[".$tenant.$pjsip."]
type = aor
max_contacts = 1
remove_existing = yes
;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;";

	$pjsip = $tenant . $pjsip;
	$status = checkPjsip($pjsip);
	if($status == ""){
		echo "^0^ Add Success ";
		writeFiles($config,"/etc/asterisk/pbx_man/config/member_pjsip_api.conf");
		reloadPjsip();
	}else{
		echo "T-T Pjsip In Use";
	}
	break;



case "show_status" :
     break;
}
?>
