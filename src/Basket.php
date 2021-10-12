<?php

namespace Acme;

use Acme\DeliveryRule\DeliveryRuleInterface;
use Acme\OfferRule\OfferRuleInterface;

class Basket
{
    private CatalogInterface $catalog;

    /**
     * @var DeliveryRuleInterface[]
     */
    private array $deliveryRules;

    /**
     * @var OfferRuleInterface[]
     */
    private array $offers;

    /**
     * @var Product[]
     */
    private array $order;

    /**
     * @param DeliveryRuleInterface[] $deliveryRules
     * @param OfferRuleInterface[] $offers
     */
    public function __construct(CatalogInterface $catalog, array $deliveryRules, array $offers)
    {
        $this->catalog = $catalog;
        $this->deliveryRules = $deliveryRules;
        $this->offers = $offers;
    }

    public function add(string $code): void
    {
        $this->order[] = $this->catalog->get($code);
    }

    public function total(): float
    {
        $total = 0.0;

        foreach ($this->offers as $offer) {
            $total -= $offer->getOffer($this->order);
        }

        foreach ($this->order as $product) {
            $total += $product->getPrice();
        }

        foreach ($this->deliveryRules as $rule) {
            $total += $rule->getCharge($total);
        }

        return $total;
    }
}
