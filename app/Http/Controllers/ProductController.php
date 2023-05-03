<?php

namespace App\Http\Controllers;

use App\Http\Requests\API\ProductCreateOrUpdateRequest;
use App\Models\Product;
use App\Services\ApiProductCreateOrUpdateService;

class ProductController extends Controller
{
    public function createOrUpdate(ProductCreateOrUpdateRequest $request)
    {
        try {
            $data = json_decode($request->data);
            return ApiProductCreateOrUpdateService::handle($data);
        } catch (\Throwable $exeption) {
            return response()->json($exeption->getMessage());
        }
    }
}
