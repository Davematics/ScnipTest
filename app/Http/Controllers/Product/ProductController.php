<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ProductSortService;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    protected $productSortService;

    public function __construct(ProductSortService $productSortService)
    {
        $this->productSortService = $productSortService;
    }

    public function index(Request $request)
    {
        $sortBy = $request->query('sort_by');

        if (isset($sortBy)) {

            return response(
                [
                    'success' => true,
                    'message' => "sorted by $sortBy",
                    'data' => $this->productSortService->sort($sortBy, $this->products()),
                ],
                Response::HTTP_OK,
            );
        }

        return response(
            [
                'success' => true,
                'message' => 'data fetch but not sorted',
                'data' => $this->products(),
            ],
            Response::HTTP_OK,
        );
    }

    public function products()
    {
        $products = [
            [
                'id' => 1,
                'name' => 'Alabaster Table',
                'price' => 12.99,
                'created' => '2019-01-04',
                'sales_count' => 32,
                'views_count' => 730,
            ],
            [
                'id' => 2,
                'name' => 'Zebra Table',
                'price' => 44.49,
                'created' => '2012-01-04',
                'sales_count' => 301,
                'views_count' => 3279,
            ],
            [
                'id' => 3,
                'name' => 'Coffee Table',
                'price' => 10.0,
                'created' => '2014-05-28',
                'sales_count' => 1048,
                'views_count' => 20123,
            ],
        ];

        return $products;
    }
}
