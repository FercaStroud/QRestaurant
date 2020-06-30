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
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'profile_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $product = new Product($request->all());
        $product->image_src = null;

        if ($request->has('image_src') and $request->file('image_src') !== null) {
            $image = $request->file('image_src');
            $name = Str::slug($request->input('name')) . '_' . time();
            $folder = '/uploads/images/categories/';
            $filePath = $folder . $name . '.' . $image->getClientOriginalExtension();

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
            'profile_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $product->category_id = $request->get("category_id", $product->category_id);
        $product->name = $request->get("name", $product->name);
        $product->description = $request->get("description", $product->description);
        $product->price = $request->get("price", $product->price);

        if ($request->has('image_src') and $request->file('image_src') !== null) {
            $image = $request->file('image_src');
            $name = Str::slug($request->input('name')) . '_' . time();
            $folder = '/uploads/images/categories/';
            $filePath = $folder . $name . '.' . $image->getClientOriginalExtension();

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
