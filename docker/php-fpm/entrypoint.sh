#!/bin/sh

# Install symfony dependencies


if [ ! -d /var/www/var/ ]; then
	echo "Creating /var/www/var/"
	mkdir -p /var/www/var/
fi

php composer.phar install

# Init database


php bin/console c:c
php bin/console d:d:c --if-not-exists
php bin/console d:s:d --force

php bin/console doctrine:database:import src/Ressources/annonces.sql
php bin/console doctrine:database:import src/Ressources/mandataires.sql

chmod -R 777 /var/www/var/

exec "$@"
