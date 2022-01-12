<?php

namespace App\Http\Controllers\Resources;

use App\Menu;
use App\Product;
use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Util\Utils;
use Illuminate\Support\Str;
use Response;

class CategoryController extends Controller
{

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

        $category = new Category($request->all());
        $category->user_id = $request->user()->id;
        $category->image_src = null;

        $category->save();
        return response()->json($category, 201);
    }

    public function addFile(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'image_src' => 'required',
        ]);


        $category = Category::find($request->get('id'));
        $fileName = Str::random(68).'.'.$request->file('image_src')->getClientOriginalExtension();
        $destinationPath = 'uploads/images/categories/';

        $request->file('image_src')->move($destinationPath, $fileName);
        $category->image_src = $fileName;

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

        if ($description == "null") {
            $description = '';
        }
        $category->description = $description;

        if ($request->has('image_src') and $request->file('image_src') !== null) {
            $fileName = Str::random(68).'.'.$request->file('image_src')->getClientOriginalExtension();
            $destinationPath = '/uploads/images/categories/';

            $request->file('image_src')->move($destinationPath, $fileName);
            $category->image_src = $fileName;
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
        $menu = Menu::find($request->get("id"));
        $user = User::find($menu->user_id);

        if ($menu->type === 'PDF') {
            return response()->json([
                'user' => [
                    'name' => $user->restaurant_name,
                    //'address' => $user->address,
                    //'image_src' => $user->image_src,
                    'logo_src' => $user->logo_src
                ],
                'settings' => $menu,
                'categories' => null,
            ], 201);
        } else {
            $categories = Category::where("menu_id", "=", $request->get("id"))->get();
            $i = 0;

            foreach ($categories as $category) {
                $categories[$i]['products'] = Product::where('category_id', '=', $category->id)->get();
                $categories[$i]['parent'] = Category::where('id', '=', $category->parent_id)->first();

                $i++;
            };
            return response()->json(
                [
                    'user' => [
                        'name' => $user->restaurant_name,
                        //'address' => $user->address,
                        //'image_src' => $user->image_src,
                        'logo_src' => $user->logo_src
                    ],
                    'settings' => $menu,
                    'categories' => $categories
                ], 201);
        }
    }
}
