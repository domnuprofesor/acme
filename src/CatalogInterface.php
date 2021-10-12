<?php

namespace Acme;

interface CatalogInterface
{
    public function add(Product $product): void;

    /**
     * @throws \RuntimeException
     */
    public function get(string $code): Product;

    public function has(string $code): bool;
}
