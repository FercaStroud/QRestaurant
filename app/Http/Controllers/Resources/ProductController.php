<?php

namespace App\Http\Controllers\Resources;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Util\Utils;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Response;

class ProductController extends Controller
{
    use UploadTrait;

    public function index(Request $request)
    {
        return Product::select(
            'products.id',
            'products.category_id',
            'products.deleted_at',
            'products.description',
            'products.image_src',
            'products.name',
            'products.price'
        )->leftJoin('categories', 'categories.id', '=', 'products.category_id')
            ->where("categories.user_id", "=", $request->user()->id)
            ->paginate(5);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
        ]);

        $product = new Product($request->all());
        $product->image_src = null;

        if ($request->has('image_src') and $request->file('image_src') !== null) {
            $image = $request->file('image_src');
            $name = Str::slug($request->input('name')) . '_' . time();
            $folder = '/uploads/images/products/';
            $filePath = $name . '.' . $image->getClientOriginalExtension();

            $this->uploadOne($image, $folder, 'public', $name);
            $product->image_src = $filePath;
        }

        $product->save();
        return response()->json($product, 201);
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
        ]);
        $product->category_id = $request->get("category_id", $product->category_id);
        $product->name = $request->get("name", $product->name);
        $product->price = $request->get("price", $product->price);

        $description = $request->get("description");

        if($description == "null"){
            $description = '';
        }
        $product->description = $description;

        if ($request->has('image_src') and $request->file('image_src') !== null) {
            $image = $request->file('image_src');
            $name = Str::slug($request->input('name')) . '_' . time();
            $folder = '/uploads/images/products/';
            $filePath = $name . '.' . $image->getClientOriginalExtension();

            $this->uploadOne($image, $folder, 'public', $name);
            $product->image_src = $filePath;
        }

        $product->save();
        return response()->json($product, 201);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json(null, 204);
    }
}
