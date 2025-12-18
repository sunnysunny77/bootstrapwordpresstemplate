#!/bin/bash

set -e

source "${INIT_CWD}"/.env

php composer.phar install

vendor/bin/wp core download --path=site || true

(vendor/bin/wp config create \
  --dbname="${DBNAME}" \
  --dbuser="${DBUSER}" \
  --dbpass="${DBPASS}" \
  --path=site \
  --extra-php <<PHP
\$_SERVER['HTTPS'] = 'on';
PHP
) || true

vendor/bin/wp db create --path=site || true

vendor/bin/wp core install --url="${CN}:3000" --title="${TITLE}" --admin_user="${ADMINUSER}" --admin_password="${ADMINPASS}" --admin_email="${ADMINEMAIL}" --path=site || true

curl -L -o wptheme.zip https://github.com/sunnysunny77/wptheme/archive/refs/heads/main.zip || true

vendor/bin/wp theme install wptheme.zip --activate --path=site || true

vendor/bin/wp plugin install elementor --activate --path=site || true

vendor/bin/wp plugin install advanced-custom-fields --activate --path=site || true