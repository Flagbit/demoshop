FROM ubuntu:16.04

ENV DEBIAN_FRONTEND noninteractive

# Install tools
RUN apt-get update -y && apt-get install -y \
    software-properties-common \
    python-software-properties \
    build-essential \
    language-pack-en-base \
    curl \
    vim \
    wget \
    openssh-server \
    msmtp \
    sudo \
    git-all

# Add nodejs repository
RUN curl -sL https://deb.nodesource.com/setup_6.x | bash -
RUN apt-get install -y nodejs

# Add ondrej's php repository
RUN LC_ALL=en_US.UTF-8 add-apt-repository ppa:ondrej/php

# Install php7 & extensions
RUN apt-get update -y && apt-get install -y --force-yes \
    php7.0 \
    php7.0-cli \
    php7.0-fpm \
    php7.0-bcmath \
    php7.0-curl \
    php7.0-gd \
    php7.0-intl \
    php7.0-mbstring \
    php7.0-mcrypt \
    php7.0-xml \
    php7.0-xsl \
    php7.0-soap \
    php7.0-zip \
    php7.0-mysql \
    php7.0-json \
    php7.0-iconv \
    php7.0-xdebug \
    php7.0-bcmath \
    php7.0-gd \
    php7.0-intl \
    php7.0-mcrypt \
    php7.0-gmp \
    php7.0-pgsql \
    php7.0-redis \
    php7.0-bz2 \
    redis-tools \
    postgresql \
    postgresql-contrib

# Install redis

# SSH config
RUN mkdir /var/run/sshd
RUN echo 'root:root' | chpasswd
RUN sed -i 's/PermitRootLogin prohibit-password/PermitRootLogin yes/' /etc/ssh/sshd_config
RUN sed -i 's/PermitRootLogin without-password/PermitRootLogin yes/' /etc/ssh/sshd_config

# SSH login fix. Otherwise user is kicked off after login
RUN sed 's@session\s*required\s*pam_loginuid.so@session optional pam_loginuid.so@g' -i /etc/pam.d/sshd
ENV NOTVISIBLE "in users profile"
RUN echo "export VISIBLE=now" >> /etc/profile

# Configure php-fpm
RUN mkdir /run/php && \
    ln -s /usr/sbin/php-fpm7.0 /usr/sbin/php-fpm

# Install php-fpm pool
COPY config/www.conf /etc/php/7.0/fpm/pool.d/
COPY config/xdebug.ini /etc/php/7.0/mods-available/xdebug.ini
COPY config/mbstring.ini /etc/php/7.0/mods-available/mbstring.ini

RUN usermod -u 1000 www-data

COPY docker-entrypoint.sh /

CMD ["/bin/sh", "/docker-entrypoint.sh"]

EXPOSE 9000
