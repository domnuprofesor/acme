<?php

namespace Acme\OfferRule;

use Acme\Product;

class RedPairRule implements OfferRuleInterface
{
    /**
     * @param Product[] $order
     */
    public function getOffer(array $order): float
    {
        $redCount = 0;
        $redPrice = 0.0;
        foreach ($order as $product) {
            if ('R01' === $product->getCode()) {
                $redCount += 1;
                $redPrice = $product->getPrice();
            }
        }

        if ($redCount > 0) {
            return floor($redCount / 2) * $redPrice / 2;
        }

        return 0.0;
    }
}
