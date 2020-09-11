<?php

namespace App\Http\Controllers\Resources;

use App\Product;
use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Util\Utils;
use App\Traits\UploadTrait;
use Illuminate\Support\Str;
use Response;

class CategoryController extends Controller
{
    use UploadTrait;

    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        return Category::where("menu_id", "=", $request->get("menu_id"))->get();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        //$category = new Category($request->all());
        $category = new Category();
        $category->user_id = $request->user()->id;
        $category->menu_id = $request->get("menu_id");
        $category->parent_id = $request->get("parent_id", 0);
        $category->name = $request->get("name");
        $category->description = $request->get("description", "");
        $category->image_src = null;

        if ($request->has('image_src') and $request->file('image_src') !== null) {
            $image = $request->file('image_src');
            $name = Str::slug($request->input('name')) . '_' . time();
            $folder = '/uploads/images/categories/';
            $filePath = $name . '.' . $image->getClientOriginalExtension();

            $this->uploadOne($image, $folder, 'public', $name);
            $category->image_src = $filePath;
        }

        $category->save();
        return response()->json($category, 201);
    }

    /**
     * @param Request $request
     * @param Category $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $category->parent_id = $request->get("parent_id", $category->parent_id);
        $category->name = $request->get("name", $category->name);
        $description = $request->get("description");

        if($description == "null"){
            $description = '';
        }
        $category->description = $description;

        if ($request->has('image_src') and $request->file('image_src') !== null) {
            $image = $request->file('image_src');
            $name = Str::slug($request->input('name')) . '_' . time();
            $folder = '/uploads/images/categories/';
            $filePath = $name . '.' . $image->getClientOriginalExtension();

            $this->uploadOne($image, $folder, 'public', $name);
            $category->image_src = $filePath;
        }

        $category->save();
        return response()->json($category, 201);
    }


    /**
     * @param Category $category
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return response()->json(null, 204);
    }


    public function withProducts(Request $request)
    {
        $user = User::find($request->get("id"));
        $categories = Category::where("user_id", "=", $user->id)->get();

        $i = 0;
        foreach ($categories as $category) {
            $categories[$i]['products'] = Product::where('category_id', '=', $category->id)->get();
            $categories[$i]['parent'] = Category::where('id', '=', $category->parent_id)->first();

            $i++;
        };

        return response()->json(
            [
                'user' => [
                    'name' => $user->name,
                    'address' => $user->address,
                    'image_src' => $user->image_src,
                    'logo_src' => $user->logo_src
                ],
                'categories' => $categories
            ], 201);
    }
}
