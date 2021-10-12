<?php

namespace Acme\DeliveryRule;

use Acme\Product;

interface DeliveryRuleInterface
{
    function getCharge(float $amount): float;
}
