#!/bin/bash
cd  /home/ubuntu/voyarge
apt install wget -y
wget https://getcomposer.org/composer.phar
composer install
npm install && npm run dev
