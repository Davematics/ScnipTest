<?php

namespace App\Services;

class PriceSorter implements ProductSorter
{
    public function sort($products)
    {
        usort($products, function ($a, $b) {
            return $a['price'] <=> $b['price'];
        });

        return $products;
    }
}
