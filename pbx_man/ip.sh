#/usr/bin
echo 'OLD IP >>>>>'
read IP
echo 'NEW IP >>>>>'
read NEWIP
echo 'Change' $IP 'to'  $NEWIP
sed -i 's/'$IP'/'$NEWIP'/g' /etc/asterisk/sip.conf
sed -i 's/'$IP'/'$NEWIP'/g' /etc/asterisk/pjsip.conf
sed -i 's/'$IP'/'$NEWIP'/g' /etc/asterisk/http.conf
asterisk -rx "sip reload"
asterisk -rx "dialplan reload"
asterisk -rx "reload http"
