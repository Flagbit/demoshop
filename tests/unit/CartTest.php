<?php

use ProjectA\Shared\Library\TransferLoader;
use ProjectA\Deprecated\Cart\Business\CartFactory;
use ProjectA\Deprecated\DependencyInjectionContainer;
use ProjectA\Zed\Cart\Component\CartFacade;

class CartTest extends \Codeception\TestCase\Test
{
    /**
     * @var CartFacade
     */
    private $cartFacade;

    protected function setUp()
    {
        parent::setUp();
        $cartFactory = new CartFactory();
        $this->cartFacade = new CartFacade();
        $dependencyContainer = new DependencyInjectionContainer();
        $dependencyContainer->doInjection($this->cartFacade, $cartFactory);
    }

    public function testAddToCart()
    {
        $product = Generated_Zed_Catalog_Persistence_Propel_Om_BasePacCatalogProductQuery::create()
            ->findOne();


        $cartItem = (new \ProjectA\Shared\Kernel\TransferLocator())->locateCartItem();
        $cartItem->setSku($product->getSku());
        $cartItem->setQuantity(1);
        $cartItem->setUniqueIdentifier($product->getSku());

        $cartChange = (new \ProjectA\Shared\Kernel\TransferLocator())->locateCartChange();
        $cartChange->addChangedCartItem($cartItem);

        $result = $this->cartFacade->addItems($cartChange);
        $this->assertTrue($result->isSuccess());

        /** @var \ProjectA\Shared\Sales\Transfer\Order $order */
        $order = $result->getTransfer();

        $this->assertCount(1, $order->getItems());
    }
}
