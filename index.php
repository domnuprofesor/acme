<?php

use Acme\DeliveryRule\QuantityRule;
use Acme\OfferRule\RedPairRule;
use Acme\Catalog;
use Acme\Product;
use Acme\Basket;
use Acme\NumberUtils;

require __DIR__ . '/vendor/autoload.php';

// example 1 - start
$catalog = new Catalog();

$catalog->add(new Product('B01', 7.95));
$catalog->add(new Product('G01', 24.95));

$basket = new Basket($catalog, [new QuantityRule()], [new RedPairRule()]);
$basket->add('B01');
$basket->add('G01');

echo NumberUtils::prince_two_digits($basket->total()) . "\n\n";
// example 1 - end


// example 2 - start
$catalog2 = new Catalog();

$catalog2->add(new Product('R01', 32.95));
$catalog2->add(new Product('R01', 32.95));

$basket2 = new Basket($catalog2, [new QuantityRule()], [new RedPairRule()]);
$basket2->add('R01');
$basket2->add('R01');

echo NumberUtils::prince_two_digits($basket2->total()) . "\n\n";
// example 2 - end


// example 3 - start
$catalog3 = new Catalog();

$catalog3->add(new Product('R01', 32.95));
$catalog3->add(new Product('G01', 24.95));

$basket3 = new Basket($catalog3, [new QuantityRule()], [new RedPairRule()]);
$basket3->add('R01');
$basket3->add('G01');

echo NumberUtils::prince_two_digits($basket3->total()) . "\n\n";
// example 3 - end


// example 4 - start
$catalog4 = new Catalog();

$catalog4->add(new Product('B01', 7.95));
$catalog4->add(new Product('B01', 7.95));
$catalog4->add(new Product('R01', 32.95));
$catalog4->add(new Product('R01', 32.95));
$catalog4->add(new Product('R01', 32.95));

$basket4 = new Basket($catalog4, [new QuantityRule()], [new RedPairRule()]);
$basket4->add('B01');
$basket4->add('B01');
$basket4->add('R01');
$basket4->add('R01');
$basket4->add('R01');

echo NumberUtils::prince_two_digits($basket4->total()) . "\n\n";
// example 4 - end