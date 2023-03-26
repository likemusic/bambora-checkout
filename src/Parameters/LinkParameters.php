<?php

namespace Likemusic\BamboraCheckout\Parameters;

use Likemusic\BamboraCheckout\Parameters\Parts\AuthorizationParameters;
use Likemusic\BamboraCheckout\Parameters\Parts\BillingAddressParameters;
use Likemusic\BamboraCheckout\Parameters\Parts\HashExpiryParameters;
use Likemusic\BamboraCheckout\Parameters\Parts\OrderInfoParameters;
use Likemusic\BamboraCheckout\Parameters\Parts\RedirectsParameters;
use Likemusic\BamboraCheckout\Parameters\Parts\ReferencesInfoParameters;
use Likemusic\BamboraCheckout\Parameters\Parts\ShippingAddressParameters;
use ReflectionClass;

class LinkParameters implements
    AuthorizationParameters,
    OrderInfoParameters,
    BillingAddressParameters,
    ShippingAddressParameters,
    RedirectsParameters,
    HashExpiryParameters,
    ReferencesInfoParameters
{
    static public function getNames(): array
    {
        $reflectionClass = new ReflectionClass(__CLASS__);

        return array_values($reflectionClass->getConstants());
    }
}
