br = $'\n'
clear
echo -e "Do you agree installing apache2 and overwriting configs and updating your system? (Y/n)${br}"
read agreeApache2
if [ "$agreeApache2" != "" ] && [ "$agreeApache2" != "Y" ] && [ "$agreeApache2" != "y" ]; then
    clear
    echo "Exited Marf-PHP installer."
    exit 0
fi
apt-get update
apt-get install apache2
clear
echo -e "Do you accept installing zip, snapd, core, certbot, phpmyadmin, mysql, php-mbstring, php-zip, php-gd, php-json and php-curl?"