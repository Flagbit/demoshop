<?php

use Pyz\Shared\Newsletter\NewsletterConstants;
use Spryker\Shared\Auth\AuthConstants;
use Spryker\Shared\Customer\CustomerConstants;
use Spryker\Shared\Payolution\PayolutionConstants;
use Spryker\Shared\ProductManagement\ProductManagementConstants;
use Spryker\Shared\Propel\PropelConstants;
use Spryker\Shared\Session\SessionConstants;
use Spryker\Shared\Setup\SetupConstants;
use Spryker\Shared\Application\ApplicationConstants;
use Spryker\Shared\Search\SearchConstants;
use Spryker\Shared\ZedRequest\ZedRequestConstants;

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
$jenkinsUser = 'admin';
$jenkinsPass = trim(file_get_contents('/var/jenkins_home/secrets/initialAdminPassword'));
$config[SetupConstants::JENKINS_BASE_URL] = sprintf('http://%s:%s@%s:8080/', $jenkinsUser, $jenkinsPass, gethostbyname('fanshop-jenkins'));
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
$config[ApplicationConstants::PORT_YVES] = ':443';
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

$config[ProductManagementConstants::BASE_URL_YVES] = $config[ApplicationConstants::BASE_URL_YVES];
$config[PayolutionConstants::BASE_URL_YVES] = $config[ApplicationConstants::BASE_URL_YVES];
$config[NewsletterConstants::BASE_URL_YVES] = $config[ApplicationConstants::BASE_URL_YVES];
$config[CustomerConstants::BASE_URL_YVES] = $config[ApplicationConstants::BASE_URL_YVES];

// ---------- Zed host
$config[ApplicationConstants::HOST_ZED] = 'backend.spryker-fanshop.dev';
$config[ZedRequestConstants::HOST_ZED_API] = $config[ApplicationConstants::HOST_ZED];
$config[SessionConstants::ZED_SESSION_COOKIE_NAME] = $config[ApplicationConstants::HOST_ZED];

$config[ApplicationConstants::BASE_URL_ZED] = sprintf(
    'http://%s%s',
    $config[ApplicationConstants::HOST_ZED],
    $config[ApplicationConstants::PORT_ZED]);

$config[ApplicationConstants::BASE_URL_SSL_ZED] = sprintf(
    'https://%s%s',
    $config[ApplicationConstants::HOST_ZED],
    $config[ApplicationConstants::PORT_SSL_ZED]
);
$config[ZedRequestConstants::HOST_ZED_API] = $config[ApplicationConstants::HOST_ZED];
$config[ZedRequestConstants::BASE_URL_ZED_API] = $config[ApplicationConstants::BASE_URL_ZED];
$config[ZedRequestConstants::BASE_URL_SSL_ZED_API] = $config[ApplicationConstants::BASE_URL_SSL_ZED];

// ---------- SSL
//$config[ApplicationConstants::YVES_SSL_ENABLED] = true;
//$config[SessionConstants::YVES_SSL_ENABLED] = true;
//
//$config[ApplicationConstants::ZED_SSL_ENABLED] = true;
//$config[ZedRequestConstants::ZED_API_SSL_ENABLED] = true;