#!/bin/sh

if [ 1 -eq 1 ]; then
 until nslookup fanshop-nginx | grep "Non-authoritative"
 do
   echo "Waiting...";
 done
   echo $(nslookup fanshop-nginx | grep Address | tail -1 | grep -o "[0-9.]*" | perl -ne 'print "$_ backend.spryker-fanshop.dev"') >> /etc/hosts

fi

php-fpm -F &
/usr/sbin/sshd -D
