#!/bin/bash

# Defined host mysql server

if [ $is_backend == 1 ]
then
    echo '<?php define("DB_HOST", "'$db_host_server'"); ?>' > /var/www/html/core/host.php
fi

# Starts php process in background

/usr/sbin/php-fpm -c /etc/php/fmp

# Starts nginx daemon

nginx -g 'daemon off;'

