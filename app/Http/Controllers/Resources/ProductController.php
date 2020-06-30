<?php

namespace App\Http\Controllers\Resources;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Util\Utils;
use App\Traits\UploadTrait;
use Illuminate\Support\Str;
use Response;

class ProductController extends Controller
{
    use UploadTrait;

    public function index(Request $request)
    {
        return Product::paginate(5);
    }

    public function store(Request $request)
    {
        return response()->json([], 201);
    }

    public function update(Request $request, Product $product)
    {
        return response()->json([], 201);
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json(null, 204);
    }
}
