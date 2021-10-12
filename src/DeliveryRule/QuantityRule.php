<?php

namespace Acme\DeliveryRule;

use Acme\Product;

class QuantityRule implements DeliveryRuleInterface
{
    public function getCharge(float $amount): float
    {
        switch ($amount) {
            case $amount <= 50.0:
                return 4.95;
            case $amount < 90.0;
                return 2.95;
            case $amount >= 90.0:
                return 0.0;
        }
    }
}
