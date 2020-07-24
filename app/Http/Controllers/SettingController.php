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
            'name' => 'required',
            'address' => 'required',
        ]);


        $imageSrc = $request->user()->image_src;
        $logoSrc = $request->user()->logo_src;

        if ($request->has('image_src') and $request->file('image_src') !== null) {
            $image = $request->file('image_src');
            $name = Str::slug($request->input('name')) . '_' . time();
            $folder = '/uploads/images/headers/';
            $filePath = $name . '.' . $image->getClientOriginalExtension();

            $this->uploadOne($image, $folder, 'public', $name);
            $imageSrc = $filePath;
        }
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
                'name' => $request['name'],
                'address' => $request['address'],
                'image_src' => $imageSrc,
                'logo_src' => $logoSrc,
                'password' => bcrypt($request['password']),
            ]);
        } else {
            $request->user()->update([
                'name' => $request['name'],
                'address' => $request['address'],
                'image_src' => $imageSrc,
                'logo_src' => $logoSrc,
            ]);
        }


        return response()->json( $request->user(), 201);
    }
}
