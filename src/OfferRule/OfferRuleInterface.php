<?php

namespace Acme\OfferRule;

use Acme\Product;

interface OfferRuleInterface
{
    /**
     * @param Product[] $order
     */
    public function getOffer(array $order): float;
}
