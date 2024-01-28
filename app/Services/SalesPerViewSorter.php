<?php

namespace App\Services;

class SalesPerViewSorter implements ProductSorter
{
    public function sort($products)
    {
        usort($products, function ($a, $b) {
            $ratioA = $a['sales_count'] / $a['views_count'];
            $ratioB = $b['sales_count'] / $b['views_count'];

            return $ratioA <=> $ratioB;
        });

        return $products;
    }
}
