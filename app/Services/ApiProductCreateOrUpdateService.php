<?php

namespace App\Services;


use App\Models\Product;
use App\Models\ProductPrice;
use App\Models\Region;
use Illuminate\Support\Facades\DB;

class ApiProductCreateOrUpdateService
{

    public static function handle($data)
    {
        try {

            $startTime = time();
            $upsertArray = [];
            $regions = [];
            $products = [];
            $productIds = [];
            $countData = count($data);

            foreach ($data as $dataProduct) {
                $products[$dataProduct->product_id] = [
                    'product_id' => $dataProduct->product_id,
                ];

                $productIds[] = $dataProduct->product_id;

                foreach ($dataProduct->prices as $region => $prices) {
                    $regions[$region] = [
                        'id' => $region,
                    ];
                    $upsertArray[] = [
                        'product_id'     => $dataProduct->product_id,
                        'region_id'      => $region,
                        'price_purchase' => $prices->price_purchase,
                        'price_selling'  => $prices->price_selling,
                        'price_discount' => $prices->price_discount,
                    ];
                }
            }

            $hasProducts = Product::whereIn('product_id', $productIds)->count();

            Product::upsert($products, ['product_id'], ['product_id']);

            Region::upsert($regions, ['id'], ['id']);

            $end = 0;
            $offset = 0;
            $length = 5000;
            while ($end === 0) {
                $slice = array_slice($upsertArray, $offset, $length);
                if (!empty($slice)) {
                    ProductPrice::upsert($slice, ['product_id', 'region_id'], ['price_purchase', 'price_selling', 'price_discount']);
                    $offset += $length;
                } else {
                    $end = 1;
                }
            }
            
            $endTime = time();

            return response()->json([
                'errors'  => false,
                'message' => 'Success',
                'data'    => [
                    'created' => $countData - $hasProducts,
                    'updated' => $countData - ($countData - $hasProducts),
                    'time'    => $endTime - $startTime . 'sec',
                ],
            ]);

        } catch (\Throwable $exeption) {
            return response()->json($exeption->getMessage());
        }
    }
}
