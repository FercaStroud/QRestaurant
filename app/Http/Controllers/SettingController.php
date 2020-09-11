<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Util\Errors;
use App\Util\Utils;
use Illuminate\Support\Str;
use App\Traits\UploadTrait;


class SettingController extends Controller
{
    use UploadTrait;

    public function saveSettings(Request $request)
    {
        $request->validate([
            'password' => 'nullable|string|min:6|confirmed',
            'user_name' => 'required',
            'restaurant_name' => 'required',
        ]);

        $logoSrc = $request->user()->logo_src;

        if ($request->has('logo_src') and $request->file('logo_src') !== null) {
            $image = $request->file('logo_src');
            $name = Str::slug($request->input('name')) . '_' . time();
            $folder = '/uploads/images/logos/';
            $filePath = $name . '.' . $image->getClientOriginalExtension();

            $this->uploadOne($image, $folder, 'public', $name);
            $logoSrc = $filePath;
        }

        if($request['password'] !== "undefined"){
            $request->user()->update([
                'user_name' => $request->input('user_name'),
                'restaurant_name' => $request->input('restaurant_name'),
                'phone' => $request->input('phone'),
                'city' => $request->input('city'),
                'state' => $request->input('state'),
                'logo_src' => $logoSrc,
                'password' => bcrypt($request['password']),
            ]);
        } else {
            $request->user()->update([
                'user_name' => $request->input('user_name'),
                'restaurant_name' => $request->input('restaurant_name'),
                'phone' => $request->input('phone'),
                'city' => $request->input('city'),
                'state' => $request->input('state'),
                'logo_src' => $logoSrc,
            ]);
        }


        return response()->json( $request->user(), 201);
    }
}
