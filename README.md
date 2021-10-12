## Acme Widgets

### Fun stuff
The name of the proposed simulation reminded me about the cartoons from childhood with Wile E. Coyote and the Road Runner :) 

### How to run the project
In project main dir ```run composer dump-autoload``` and then ```php index.php```

### Observations
- I would have not integrated the product catalog with the basket. The product catalog is application specific and the basket is
user specific, so I would have kept the two decoupled. But since it was a requirement I followed the specifications.
  
### API
- ```DeliveryRuleInterface``` with concrete implementation ```QuantityRule```
- ```OfferRuleInterface``` with concrete implementation ```RedPairRule```
- ```CatalogInterface``` with concrete implementation ```Catalog```
- ```Product```
- ```Basket```
- ```NumberUtils```

### Code usage example
```php
$catalog = new Catalog();

$catalog->add(new Product('B01', 7.95));
$catalog->add(new Product('G01', 24.95));

$basket = new Basket($catalog, [new QuantityRule()], [new RedPairRule()]);
$basket->add('B01');
$basket->add('G01');

echo NumberUtils::prince_two_digits($basket->total());
```

### How it works
- the basket through its ```add()``` method will create internally an ```order``` 
  which is basically a list of ```Products``` copied by ```code``` from the catalog
- the ```Catalog``` is only ```read``` by the ```Basket```. To prevent accidental ```writes``` of the ```Catalog``` from the ```Basket```
  we could use an ```immutable``` Catalog but I think it is beyond the scope of the simulation but still worth mentioning
- the ```Basket::total()``` method first applies the offers which can result in a negative intermediate total. The product prices
are not altered in any way during or before total() calculations which I think is a neat feature.
  
