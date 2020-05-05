service apache2 start
chown -R www-data:www-data /home/ubuntu/voyarge #se debe cambiar
find /home/ubuntu/voyarge -type f -exec chmod 644 {} \; #se debe cambiar
find /home/ubuntu/voyarge -type d -exec chmod 755 {} \; #se debe cambiar
cp /home/ubuntu/.env /home/ubuntu/voyarge #se debe cambiar
