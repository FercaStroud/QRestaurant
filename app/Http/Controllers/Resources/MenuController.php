<?php

namespace App\Http\Controllers\Resources;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Menu;
use App\Util\Utils;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Response;

class MenuController extends Controller
{
    use UploadTrait;

    public function index(Request $request)
    {
        return Menu::where("user_id", "=", $request->user()->id)->orderBy('id', 'ASC')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $menu = new Menu($request->all());
        $menu->user_id = $request->user()->id;
        $menu->save();

        return response()->json($menu, 201);
    }

    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $menu->name = $request->get("name", $menu->name);
        $menu->save();
        return response()->json($menu, 201);
    }

    public function destroy(Menu $menu)
    {
        $menu->delete();
        return response()->json(null, 204);
    }
}
