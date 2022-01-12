<?php

namespace App\Http\Controllers\Resources;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Util\Utils;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Response;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        return Product::select(
            'products.id',
            'products.category_id',
            'products.created_at',
            'products.updated_at',
            'products.description',
            'products.image_src',
            'products.name',
            'products.price',
            'categories.name as category_name'
        )->leftJoin('categories', 'categories.id', '=', 'products.category_id')
            ->where("categories.menu_id", "=", $request->get("menu_id"))->get();

    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
        ]);

        $product = new Product($request->all());
        $product->image_src = null;

        $product->save();
        return response()->json($product, 201);
    }


    public function addFile(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'image_src' => 'required',
        ]);


        $product = Product::find($request->get('id'));
        $fileName = Str::random(68).'.'.$request->file('image_src')->getClientOriginalExtension();
        $destinationPath = 'uploads/images/products/';

        $request->file('image_src')->move($destinationPath, $fileName);
        $product->image_src = $fileName;

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

        if ($description == "null") {
            $description = '';
        }

        $product->description = $description;

        $product->save();
        return response()->json($product, 201);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json(null, 204);
    }
}
