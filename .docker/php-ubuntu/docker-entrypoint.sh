#!/bin/sh

php-fpm -F &
/usr/sbin/sshd -D
