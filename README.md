# Spryker Demoshop

In order to install Spryker Demoshop on your machine, you can follow the instructions described in the link below:

* [Installation - spryker.github.io/getting-started/installation/guide/](https://spryker.github.io/getting-started/installation/guide/)

If you encounter any issues during or after installation, you can first check our Troubleshooting article:

* [Troubleshooting - spryker.github.io/getting-started/installation/troubleshooting/](https://spryker.github.io/getting-started/installation/troubleshooting/)



#### Run docker containers

```
docker-compose up -d
```

## Configuration

#### Local conf

```
cp config/shared/config_local.dist.php config/share/config_local.php
```

```
create a file /deploy/setup/params_local.sh with this content

#!/bin/bash

SETUP='spryker'
DATABASE_NAME='DE_development_zed'
DATABASE_USER='development'
DATABASE_PASSWORD='mate20mg'
REDIS_PORT='6379'
REDIS_HOST=fanshop-redis
ELASTIC_SEARCH_PORT='9200'
ELASTIC_SEARCH_INDEX='de_search'
VERBOSITY='-v'
CONSOLE=vendor/bin/console

```

## Setup Jenkins

After your containers are running, you are prepared to config Jenkins.

1. Call in your browser localhost:8080
2. Insert the Admin-Password, you can find it the fanshop-jenkins container under:

    **/var/jenkins_home/secrets/initialAdminPassword**

3. Click on the option ***Install suggested plugins***
4. After the installation is completed, login as Admin (clicking on ***Continue as admin***).
5. We must to disable the **CSRF Protection** to allow POST request without "crumb" (CSRF protection token). This practice is not recommended in a real server.

    For this pourpose click on ***Jenkins verwalten*** -> ***Globale Sicherheit konfigurieren*** -> ***"Cross Site Request Forgery"-Angriffe verhindern***

    Apply your changes and the save.




## Creating Spryker Demoshop

#### In your php container
```
docker exec -u www-data -it fanshop-php bash
cd /var/www/html
./setup -i
```


## Data Access

#### Login in Backend
```
Login to Zed using: user admin@spryker.com and password change123.
```