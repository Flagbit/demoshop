<?php

use Spryker\Shared\Propel\PropelConstants;
use Spryker\Shared\Setup\SetupConstants;
use Spryker\Shared\Application\ApplicationConstants;
use Spryker\Shared\Search\SearchConstants;

// ---------- Propel
$config[PropelConstants::PROPEL_DEBUG] = true;
$config[PropelConstants::PROPEL_SHOW_EXTENDED_EXCEPTION] = true;
$config[PropelConstants::ZED_DB_USERNAME] = 'development';
$config[PropelConstants::ZED_DB_PASSWORD] = 'mate20mg';
$config[PropelConstants::ZED_DB_DATABASE] = 'fanshop_db';
$config[PropelConstants::ZED_DB_HOST] = gethostbyname('fanshop-postgresql-db');
$config[PropelConstants::ZED_DB_PORT] = 5432;
$config[PropelConstants::USE_SUDO_TO_MANAGE_DATABASE] = true;

// ---------- Jenkins ----------
$config[SetupConstants::JENKINS_BASE_URL] = 'http://' . gethostbyname('fanshop-jenkins') . ':8080/';
$config[SetupConstants::JENKINS_DIRECTORY] = '/data/shop/development/shared/data/common/jenkins';

// ---------- Elasticsearch
$ELASTICA_HOST = gethostbyname('fanshop-elasticsearch');
$config[ApplicationConstants::ELASTICA_PARAMETER__HOST] = $ELASTICA_HOST;
$config[SearchConstants::ELASTICA_PARAMETER__HOST] = $ELASTICA_HOST;
$ELASTICA_TRANSPORT_PROTOCOL = 'http';
$config[ApplicationConstants::ELASTICA_PARAMETER__TRANSPORT] = $ELASTICA_TRANSPORT_PROTOCOL;
$config[SearchConstants::ELASTICA_PARAMETER__TRANSPORT] = $ELASTICA_TRANSPORT_PROTOCOL;
$ELASTICA_PORT = '9200';
$config[ApplicationConstants::ELASTICA_PARAMETER__PORT] = $ELASTICA_PORT;
$config[SearchConstants::ELASTICA_PARAMETER__PORT] = $ELASTICA_PORT;

// ---------- Yves host
$config[ApplicationConstants::HOST_YVES] = 'spryker-fanshop.dev';
$config[ApplicationConstants::PORT_YVES] = '443';
$config[ApplicationConstants::PORT_SSL_YVES] = '';
$config[ApplicationConstants::BASE_URL_YVES] = sprintf(
    'http://%s%s',
    $config[ApplicationConstants::HOST_YVES],
    $config[ApplicationConstants::PORT_YVES]
);
$config[ApplicationConstants::BASE_URL_SSL_YVES] = sprintf(
    'https://%s%s',
    $config[ApplicationConstants::HOST_YVES],
    $config[ApplicationConstants::PORT_SSL_YVES]
);