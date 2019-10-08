<?php
$tenant = "118";
for($i=1000; $i<=1049; $i++){

/*	
$pjsip = $i; 
	$str = "
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
 */

$str = "member => local/118".$i."@member,30";
	$fp = fopen("/etc/asterisk/iconnect/queues.conf", 'a');
	fwrite($fp,$str);

}


?>
