<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Checkout;

use Pyz\Zed\Lottery\Communication\Plugin\OrderLotterySavePlugin;
use Spryker\Zed\Availability\Communication\Plugin\ProductsAvailableCheckoutPreConditionPlugin;
use Spryker\Zed\Checkout\CheckoutDependencyProvider as SprykerCheckoutDependencyProvider;

use Spryker\Zed\Customer\Communication\Plugin\CustomerPreConditionCheckerPlugin;
use Spryker\Zed\Customer\Communication\Plugin\OrderCustomerSavePlugin;
use Spryker\Zed\Discount\Communication\Plugin\Sales\DiscountOrderSavePlugin;
use Spryker\Zed\Kernel\Container;
use Spryker\Zed\Payment\Communication\Plugin\Checkout\PaymentPostCheckPlugin;
use Spryker\Zed\Payment\Communication\Plugin\Checkout\PaymentPreCheckPlugin;
use Spryker\Zed\Payment\Communication\Plugin\Checkout\PaymentSaverPlugin;
use Spryker\Zed\ProductOption\Communication\Plugin\ProductOptionOrderSaverPlugin;
use Spryker\Zed\Sales\Communication\Plugin\SalesOrderSaverPlugin;
use Spryker\Zed\Shipment\Communication\Plugin\OrderShipmentSavePlugin;

class CheckoutDependencyProvider extends SprykerCheckoutDependencyProvider
{

    /**
     * @param \Spryker\Zed\Kernel\Container $container ’
     *
     * @return \Spryker\Zed\Checkout\Dependency\Plugin\CheckoutPreConditionInterface[]
     */
    protected function getCheckoutPreConditions(Container $container)
    {
        return [
            new CustomerPreConditionCheckerPlugin(),
            new ProductsAvailableCheckoutPreConditionPlugin(),
            new PaymentPreCheckPlugin(),
        ];
    }


    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Checkout\Dependency\Plugin\CheckoutSaveOrderInterface[]
     */
    protected function getCheckoutOrderSavers(Container $container)
    {
        return [
            new OrderCustomerSavePlugin(),
            new SalesOrderSaverPlugin(),
            new ProductOptionOrderSaverPlugin(),
            new OrderLotterySavePlugin(),
            new OrderShipmentSavePlugin(),
            new DiscountOrderSavePlugin(),
            new PaymentSaverPlugin(),
        ];
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Checkout\Dependency\Plugin\CheckoutPostSaveHookInterface[]
     */
    protected function getCheckoutPostHooks(Container $container)
    {
        return [
            new PaymentPostCheckPlugin(),
        ];
    }

}
