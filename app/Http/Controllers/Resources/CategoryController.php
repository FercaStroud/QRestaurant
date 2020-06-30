<?php

namespace App\Http\Controllers\Resources;

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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Category::where("user_id", "=", $request->user()->id)->paginate(5);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'profile_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        //$category = new Category($request->all());
        $category = new Category();
        $category->user_id = $request->user()->id;
        $category->parent_id = $request->get("parent_id", 0);
        $category->name = $request->get("name");
        $category->description = $request->get("description", "");
        $category->image_src = '/images/logo.svg';

        if ($request->has('image_src') and $request->file('image_src') !== null) {
            $image = $request->file('image_src');
            $name = Str::slug($request->input('name')) . '_' . time();
            $folder = '/uploads/images/categories/';
            $filePath = $folder . $name . '.' . $image->getClientOriginalExtension();

            $this->uploadOne($image, $folder, 'public', $name);
            $category->image_src = $filePath;
        }

        $category->save();
        return response()->json($category, 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
            'profile_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $category->parent_id = $request->get("parent_id", $category->parent_id);
        $category->name = $request->get("name", $category->name);
        $category->description = $request->get("description", $category->description);

        if ($request->has('image_src') and $request->file('image_src') !== null) {
            $image = $request->file('image_src');
            $name = Str::slug($request->input('name')) . '_' . time();
            $folder = '/uploads/images/categories/';
            $filePath = $folder . $name . '.' . $image->getClientOriginalExtension();

            $this->uploadOne($image, $folder, 'public', $name);
            $category->image_src = $filePath;
        }

        $category->save();
        return response()->json($category, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return response()->json(null, 204);
    }
}
