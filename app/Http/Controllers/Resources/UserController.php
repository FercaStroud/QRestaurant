<?php

namespace App\Http\Controllers\Resources;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Util\Utils;
use Response;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validator($request);

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);

        $user = User::create($input);

        return response()->json($user, 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $input = $request->all();

        $this->validator($request, $user->id);

        if (!empty($input['password'])) {
            $input['password'] = bcrypt($input['password']);
        }

        $user->update($input);

        return $user;
    }

    public function updateUserByClient(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'phone' => 'required',
            'restaurant_name' => 'required',
        ]);

        $user = User::find(auth()->user()->id);
        $input = $request->all();

        $user->update($input);

        return response()->json($user, 200);

    }

    public function updateCover(Request $request)
    {
        $request->validate([
            'cover' => 'required',
        ]);

        $user = User::find(auth()->user()->id);
        $fileName = Str::random(68).'.'.$request->file('cover')->getClientOriginalExtension();
        $destinationPath = 'uploads/images/headers/';

        $request->file('cover')->move($destinationPath, $fileName);
        $user->cover = $fileName;

        $user->save();
        return response()->json($user, 201);
    }

    public function updateLogo(Request $request)
    {
        $request->validate([
            'logo' => 'required',
        ]);

        $user = User::find(auth()->user()->id);
        $fileName = Str::random(68).'.'.$request->file('logo')->getClientOriginalExtension();
        $destinationPath = 'uploads/images/logos/';

        $request->file('logo')->move($destinationPath, $fileName);
        $user->logo = $fileName;

        $user->save();
        return response()->json($user, 201);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return response()->json(null, 204);
    }

    private function validator(Request $request, $id = null)
    {
        $emailValidation = 'required|max:191|email|unique:users';

        if (!empty($id)) {
            $emailValidation .= ',email,'.$id;
        }

        $request->validate([
            'name' => 'required|max:25',
            'email' => $emailValidation,
            'type_id' => 'required|integer|between:1,2',
            'password' => 'sometimes|min:6|confirmed',
        ], [
            'type_id.*' => __('users.invalid_user_type'),
        ]);
    }
}
