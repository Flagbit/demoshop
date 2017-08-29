# Spryker Demoshop

In order to install Spryker Demoshop on your machine, you can follow the instructions described in the link below:

* [Installation - spryker.github.io/getting-started/installation/guide/](https://spryker.github.io/getting-started/installation/guide/)

If you encounter any issues during or after installation, you can first check our Troubleshooting article:

* [Troubleshooting - spryker.github.io/getting-started/installation/troubleshooting/](https://spryker.github.io/getting-started/installation/troubleshooting/)

# Install Locally

Execute composer in order to install the magento core and all 3th party libraries

```
composer install --ignore-platform-reqs
```

Execute npm in order to bild the assets and provide basic css files.

```
npm install
```

Run docker containers

```
docker-compose up -d
```

Local conf

```
create a file /config/shared/config_local.php with the content of the file /config/share/config_local.php
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