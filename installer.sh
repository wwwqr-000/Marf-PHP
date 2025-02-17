#!/bin/bash

installList=("apache2" "zip" "snapd" "core" "certbot" "phpmyadmin" "mysql" "php-mbstring" "php-zip" "php-gd" "php-json" "php-curl")
clear
for i in "${installList[@]}"; do
    echo -e "$i"
done
echo -e "Do you agree executing the following apt-get commands? (Y/n)${br}"
read agreeApache2
if [ "$agreeApache2" != "" ] && [ "$agreeApache2" != "Y" ] && [ "$agreeApache2" != "y" ]; then
    clear
    echo "Exited Marf-PHP installer."
    exit 0
fi
apt-get update
for i in "${installList[@]}"; do
    apt-get install ${i}
done
ln -s /usr/share/phpmyadmin /var/www/html/phpmyadmin
systemctl restart apache2