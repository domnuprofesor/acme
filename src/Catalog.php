<?php

namespace Acme;

class Catalog implements CatalogInterface
{
    /**
     * @var Product[]
     */
    private array $products;

    public function add(Product $product): void
    {
        $this->products[] = $product;
    }

    public function get(string $code): Product
    {
        foreach ($this->products as $product) {
            if ($code === $product->getCode()) {
                return $product;
            }
        }

        throw new \RuntimeException(sprintf("Product with code [%s] not found", $code));
    }

    public function has(string $code): bool
    {
        foreach ($this->products as $product) {
            if ($code === $product->getCode()) {
                return true;
            }
        }

        return false;
    }
}
