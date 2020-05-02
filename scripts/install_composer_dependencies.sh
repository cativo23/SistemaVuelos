#!/bin/bash
cd  /home/ubuntu/voyarge
apt install wget -y
wget https://getcomposer.org/composer.phar
php composer.phar install
chmod -R ubuntu:ubuntu node_modules
chmod -R a+x node_modules
npm install
npm run dev
