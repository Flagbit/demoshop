<?php

/**
 * This is the global runtime configuration for Yves and Generated_Yves_Zed in a development environment.
 */

use Spryker\Shared\Acl\AclConstants;
use Spryker\Shared\Application\ApplicationConstants;
use Spryker\Shared\ErrorHandler\ErrorHandlerConstants;
use Spryker\Shared\EventJournal\EventJournalConstants;
use Spryker\Shared\Kernel\KernelConstants;
use Spryker\Shared\Log\LogConstants;
use Spryker\Shared\Propel\PropelConstants;
use Spryker\Shared\Search\SearchConstants;
use Spryker\Shared\Session\SessionConstants;
use Spryker\Shared\Setup\SetupConstants;
use Spryker\Shared\Storage\StorageConstants;
use Spryker\Shared\ZedNavigation\ZedNavigationConstants;
use Spryker\Shared\ZedRequest\ZedRequestConstants;
use SprykerEco\Shared\Payone\PayoneConstants;
use Pyz\Yves\Cart\Plugin\Provider\CartControllerProvider;
use Spryker\Shared\Oms\OmsConstants;
use Spryker\Zed\Oms\OmsConfig;
use Spryker\Shared\Sales\SalesConstants;
use SprykerEco\Zed\Payone\PayoneConfig;

// ---------- General
$config[KernelConstants::SPRYKER_ROOT] = APPLICATION_ROOT_DIR . '/vendor/spryker';
$config[ApplicationConstants::ENABLE_APPLICATION_DEBUG] = false;
$config[ZedRequestConstants::SET_REPEAT_DATA] = false;
$config[ApplicationConstants::ENABLE_WEB_PROFILER] = false;
$config[ApplicationConstants::SHOW_SYMFONY_TOOLBAR] = false;
$config[KernelConstants::STORE_PREFIX] = 'DEV';

// ---------- Propel
$config[PropelConstants::PROPEL_DEBUG] = false;
$config[PropelConstants::PROPEL_SHOW_EXTENDED_EXCEPTION] = false;
$config[PropelConstants::USE_SUDO_TO_MANAGE_DATABASE] = false;
$ENV_DB_CONNECTION_DATA = parse_url(getenv(getenv('DATABASE_URL_NAME') ?: 'DATABASE_URL'));
$config[PropelConstants::ZED_DB_ENGINE] = $config[PropelConstants::ZED_DB_ENGINE_PGSQL];
$config[PropelConstants::ZED_DB_USERNAME] = $ENV_DB_CONNECTION_DATA['user'];
$config[PropelConstants::ZED_DB_PASSWORD] = $ENV_DB_CONNECTION_DATA['pass'];
$config[PropelConstants::ZED_DB_DATABASE] = ltrim($ENV_DB_CONNECTION_DATA['path'], '/');
$config[PropelConstants::ZED_DB_HOST] = $ENV_DB_CONNECTION_DATA['host'];
$config[PropelConstants::ZED_DB_PORT] = isset($ENV_DB_CONNECTION_DATA['port']) ? $ENV_DB_CONNECTION_DATA['port'] : 5432;

// ---------- Redis
$ENV_REDIS_CONNECTION_DATA = parse_url(getenv(getenv('REDIS_URL_NAME') ?: 'REDIS_URL'));
$config[StorageConstants::STORAGE_REDIS_PROTOCOL] = $ENV_REDIS_CONNECTION_DATA['scheme'];
$config[StorageConstants::STORAGE_REDIS_HOST] = $ENV_REDIS_CONNECTION_DATA['host'];
$config[StorageConstants::STORAGE_REDIS_PORT] = $ENV_REDIS_CONNECTION_DATA['port'];
$config[StorageConstants::STORAGE_REDIS_PASSWORD] = $ENV_REDIS_CONNECTION_DATA['pass'];

// ---------- RabbitMQ
$config[ApplicationConstants::ZED_RABBITMQ_HOST] = 'localhost';
$config[ApplicationConstants::ZED_RABBITMQ_PORT] = '5672';

// ---------- Session
$config[SessionConstants::YVES_SESSION_COOKIE_SECURE] = false;
$config[SessionConstants::YVES_SESSION_SAVE_HANDLER] = SessionConstants::SESSION_HANDLER_REDIS_LOCKING;
$config[SessionConstants::YVES_SESSION_REDIS_PROTOCOL] = $config[StorageConstants::STORAGE_REDIS_PROTOCOL];
$config[SessionConstants::YVES_SESSION_REDIS_HOST] = $config[StorageConstants::STORAGE_REDIS_HOST];
$config[SessionConstants::YVES_SESSION_REDIS_PORT] = $config[StorageConstants::STORAGE_REDIS_PORT];
$config[SessionConstants::YVES_SESSION_REDIS_PASSWORD] = $config[StorageConstants::STORAGE_REDIS_PASSWORD];
$config[SessionConstants::ZED_SESSION_COOKIE_SECURE] = false;
$config[SessionConstants::ZED_SESSION_SAVE_HANDLER] = SessionConstants::SESSION_HANDLER_REDIS;
$config[SessionConstants::ZED_SESSION_REDIS_PROTOCOL] = $config[SessionConstants::YVES_SESSION_REDIS_PROTOCOL];
$config[SessionConstants::ZED_SESSION_REDIS_HOST] = $config[SessionConstants::YVES_SESSION_REDIS_HOST];
$config[SessionConstants::ZED_SESSION_REDIS_PORT] = $config[SessionConstants::YVES_SESSION_REDIS_PORT];
$config[SessionConstants::ZED_SESSION_REDIS_PASSWORD] = $config[SessionConstants::YVES_SESSION_REDIS_PASSWORD];

// ---------- Elasticsearch
$ENV_ELASTICA_CONNECTION_DATA = parse_url(getenv(getenv('ELASTIC_SEARCH_URL_NAME') ?: 'ELASTIC_SEARCH_URL'));
$ELASTICA_BASIC_AUTH = base64_encode($ENV_ELASTICA_CONNECTION_DATA['user'] . ':' . $ENV_ELASTICA_CONNECTION_DATA['pass']);
$ELASTICA_AUTH_HEADER = str_pad(
    $ELASTICA_BASIC_AUTH,
    strlen($ELASTICA_BASIC_AUTH) + strlen($ELASTICA_BASIC_AUTH) % 4,
    '=',
    STR_PAD_RIGHT
);
$ELASTICA_PORT = ($ENV_ELASTICA_CONNECTION_DATA['scheme'] == 'https' ? 443 : 80);
$config[ApplicationConstants::ELASTICA_PARAMETER__AUTH_HEADER] = $ELASTICA_AUTH_HEADER;
$config[SearchConstants::ELASTICA_PARAMETER__AUTH_HEADER] = $ELASTICA_AUTH_HEADER;
$config[ApplicationConstants::ELASTICA_PARAMETER__HOST] = $ENV_ELASTICA_CONNECTION_DATA['host'];
$config[SearchConstants::ELASTICA_PARAMETER__HOST] = $ENV_ELASTICA_CONNECTION_DATA['host'];
$config[ApplicationConstants::ELASTICA_PARAMETER__TRANSPORT] = $ENV_ELASTICA_CONNECTION_DATA['scheme'];
$config[SearchConstants::ELASTICA_PARAMETER__TRANSPORT] = $ENV_ELASTICA_CONNECTION_DATA['scheme'];
$config[ApplicationConstants::ELASTICA_PARAMETER__PORT] = $ELASTICA_PORT;
$config[SearchConstants::ELASTICA_PARAMETER__PORT] = $ELASTICA_PORT;

// ---------- Jenkins
$config[SetupConstants::JENKINS_DIRECTORY] = '/data/shop/development/shared/data/common/jenkins';

// ---------- Zed request
$config[ZedRequestConstants::TRANSFER_DEBUG_SESSION_FORWARD_ENABLED] = false;

// ---------- Payone
$config[PayoneConstants::PAYONE] = [
    PayoneConstants::PAYONE_CREDENTIALS_ENCODING => 'UTF-8',
    PayoneConstants::PAYONE_CREDENTIALS_KEY => '2z4le6DIGprGmwV6',
    PayoneConstants::PAYONE_CREDENTIALS_MID => '32481',
    PayoneConstants::PAYONE_CREDENTIALS_AID => '32893',
    PayoneConstants::PAYONE_CREDENTIALS_PORTAL_ID => '3251',
    PayoneConstants::PAYONE_PAYMENT_GATEWAY_URL => 'https://api.pay1.de/post-gateway/',
    PayoneConstants::PAYONE_REDIRECT_SUCCESS_URL => '',
    PayoneConstants::PAYONE_REDIRECT_ERROR_URL => '',
    PayoneConstants::PAYONE_REDIRECT_BACK_URL => '',
    PayoneConstants::PAYONE_MODE => 'test',
    PayoneConstants::PAYONE_EMPTY_SEQUENCE_NUMBER => 0,
    PayoneConstants::ROUTE_CART => CartControllerProvider::ROUTE_CART
];

$config[PayoneConstants::PAYONE][PayoneConstants::PAYONE_REDIRECT_SUCCESS_URL] = sprintf(
    '%s/checkout/success',
    $config[ApplicationConstants::BASE_URL_YVES]
);
$config[PayoneConstants::PAYONE][PayoneConstants::PAYONE_REDIRECT_ERROR_URL] = sprintf(
    '%s/checkout/index/',
    $config[ApplicationConstants::BASE_URL_YVES]
);
$config[PayoneConstants::PAYONE][PayoneConstants::PAYONE_REDIRECT_BACK_URL] = sprintf(
    '%s/checkout/regular-redirect-payment-cancellation/',
    $config[ApplicationConstants::BASE_URL_YVES]
);

$config[PayoneConstants::PAYONE][PayoneConstants::PAYONE_REDIRECT_EXPRESS_CHECKOUT_SUCCESS_URL] = sprintf(
    '%s/payone/expresscheckout/success',
    $config[ApplicationConstants::BASE_URL_YVES]
);

$config[PayoneConstants::PAYONE][PayoneConstants::PAYONE_REDIRECT_EXPRESS_CHECKOUT_FAILURE_URL] = sprintf(
    '%s/payone/expresscheckout/error',
    $config[ApplicationConstants::BASE_URL_YVES]
);

$config[PayoneConstants::PAYONE][PayoneConstants::PAYONE_REDIRECT_EXPRESS_CHECKOUT_BACK_URL] = sprintf(
    '%s/payone/expresscheckout/back',
    $config[ApplicationConstants::BASE_URL_YVES]
);

$config[KernelConstants::DEPENDENCY_INJECTOR_YVES] = [
    'Checkout' => [
        'Payone'
    ]
];

$config[KernelConstants::DEPENDENCY_INJECTOR_ZED] = [
    'Payment' => [
        'Payone'
    ],
    'Oms' => [
        'Payone'
    ]
];

$config[OmsConstants::PROCESS_LOCATION] = [
    OmsConfig::DEFAULT_PROCESS_LOCATION,
    APPLICATION_VENDOR_DIR . '/spryker-eco/payone/config/Zed/Oms',
];

$config[SalesConstants::PAYMENT_METHOD_STATEMACHINE_MAPPING] = [
    PayoneConfig::PAYMENT_METHOD_CREDIT_CARD => 'PayoneCreditCard',
    PayoneConfig::PAYMENT_METHOD_E_WALLET => 'PayoneEWallet',
    PayoneConfig::PAYMENT_METHOD_DIRECT_DEBIT => 'PayoneDirectDebit',
    PayoneConfig::PAYMENT_METHOD_EPS_ONLINE_TRANSFER => 'PayoneOnlineTransfer',
    PayoneConfig::PAYMENT_METHOD_INSTANT_ONLINE_TRANSFER => 'PayoneOnlineTransfer',
    PayoneConfig::PAYMENT_METHOD_GIROPAY_ONLINE_TRANSFER => 'PayoneOnlineTransfer',
    PayoneConfig::PAYMENT_METHOD_IDEAL_ONLINE_TRANSFER => 'PayoneOnlineTransfer',
    PayoneConfig::PAYMENT_METHOD_POSTFINANCE_CARD_ONLINE_TRANSFER => 'PayoneOnlineTransfer',
    PayoneConfig::PAYMENT_METHOD_POSTFINANCE_EFINANCE_ONLINE_TRANSFER => 'PayoneOnlineTransfer',
    PayoneConfig::PAYMENT_METHOD_PRZELEWY24_ONLINE_TRANSFER => 'PayoneOnlineTransfer',
    PayoneConfig::PAYMENT_METHOD_PRE_PAYMENT => 'PayonePrePayment',
    PayoneConfig::PAYMENT_METHOD_INVOICE => 'PayoneInvoice',
    PayoneConfig::PAYMENT_METHOD_PAYPAL_EXPRESS_CHECKOUT => 'PayonePaypalExpressCheckout'
];

$config[OmsConstants::ACTIVE_PROCESSES] = [
    'PayoneCreditCard',
    'PayoneEWallet',
    'PayoneDirectDebit',
    'PayoneOnlineTransfer',
    'PayonePrePayment',
    'PayoneInvoice',
    'PayonePaypalExpressCheckout'
];

$config[\Spryker\Shared\SequenceNumber\SequenceNumberConstants::ENVIRONMENT_PREFIX]
    = $config[SalesConstants::ENVIRONMENT_PREFIX]
    = 'HEROKU';

// ---------- Navigation
$config[ZedNavigationConstants::ZED_NAVIGATION_CACHE_ENABLED] = true;

// ---------- ACL
$config[AclConstants::ACL_USER_RULE_WHITELIST][] = [
    'bundle' => 'wdt',
    'controller' => '*',
    'action' => '*',
    'type' => 'allow',
];

// ---------- Error handling
$config[ErrorHandlerConstants::DISPLAY_ERRORS] = true;

// ---------- Logging
$config[LogConstants::LOG_LEVEL] = 0;

// ---------- Event journal
$config[EventJournalConstants::WRITERS]['YVES'] = [];
$config[EventJournalConstants::WRITERS]['ZED'] = [];
