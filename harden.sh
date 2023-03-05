#!/bin/bash

# This script hardens Ubuntu to Cyber Essentials standards

# Remove unnecessary software
sudo apt-get remove -y nmap netcat telnet

# Install and enable a firewall
sudo apt-get install -y ufw
sudo ufw enable

# Configure the firewall
sudo ufw default deny incoming
sudo ufw default allow outgoing
sudo ufw allow ssh
sudo ufw allow http
sudo ufw allow https

# Install and configure antivirus software
sudo apt-get install -y clamav
sudo freshclam
sudo systemctl enable clamav-freshclam.service
sudo systemctl start clamav-freshclam.service
sudo systemctl enable clamav-daemon.service
sudo systemctl start clamav-daemon.service

# Disable root login and password authentication
# sudo sed -i 's/PermitRootLogin yes/PermitRootLogin no/g' /etc/ssh/sshd_config
# sudo sed -i 's/#PasswordAuthentication yes/PasswordAuthentication no/g' /etc/ssh/sshd_config
# sudo systemctl restart sshd.service

# Update the system and install security patches
sudo apt-get update
sudo apt-get upgrade -y
sudo apt-get dist-upgrade -y

# Configure automatic security updates
sudo apt-get install -y unattended-upgrades
sudo dpkg-reconfigure -plow unattended-upgrades
