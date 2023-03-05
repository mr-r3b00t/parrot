# parrot
Like a canary but a parrot :P

Install quick bash:

sudo apt update -y
sudo apt upgrade -y
sudo apt install apache2 -y
sudo apt install php libapache2-mod-php
rm /var/www/html/index.html
sudo rm /var/www/html/index.html
wget https://raw.githubusercontent.com/mr-r3b00t/parrot/main/poc/poc.php
sudo cp poc.php /var/www/html/index.php
sudo apt install php7.4-curl
sudo service apache2 restart

#Remember to add the right webhook URL into the PHP
