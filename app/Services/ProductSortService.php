<?php


namespace App\Services;

class ProductSortService
{
    protected $sorters = [];

    public function addSorter(string $name, ProductSorter $sorter)
    {
        $this->sorters[$name] = $sorter;
    }

    public function sort(string $sorterName, $products)
    {
        if (isset($this->sorters[$sorterName])) {
            return $this->sorters[$sorterName]->sort($products);
        }

        throw new \InvalidArgumentException("Sorter '{$sorterName}' not found.");
    }
}
