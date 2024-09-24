#!/bin/sh

# Start cron
service cron start

# Start Supervisor
exec /usr/bin/supervisord -c /etc/supervisor/supervisord.conf

# Switch to the specified user and start php-fpm
exec su -c "php-fpm" -s /bin/sh $user
