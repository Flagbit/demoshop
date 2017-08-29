FROM ubuntu:16.04

# Install tools
RUN apt-get update -y && apt-get install -y \
    software-properties-common \
    python-software-properties

# Add nginx mainline Repository
RUN add-apt-repository ppa:nginx/development

RUN apt-get update -y && apt-get -y upgrade

RUN apt-get install -y ca-certificates ssl-cert nginx

COPY config/fanshop.dev /etc/nginx/sites-available/

RUN make-ssl-cert generate-default-snakeoil --force-overwrite

RUN ln -s /etc/nginx/sites-available/fanshop.dev /etc/nginx/sites-enabled/fanshop.dev
RUN rm /etc/nginx/sites-enabled/default

RUN usermod -u 1000 www-data

EXPOSE 80
EXPOSE 443

CMD ["nginx", "-g", "daemon off;"]