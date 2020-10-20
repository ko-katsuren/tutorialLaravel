<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use SebastianBergmann\Environment\Console;

class UserListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $query = User::query();

        if (isset($request->id)) {
            $query->where('id', 'like', "%$request->id%");
        }

        if (isset($request->name)) {
            $query->where('name', 'like', "%$request->name%");
        }

        if (isset($request->belong)) {
            $query->whereHas('profile', function ($q) use ($request) {
                $q->where('belong', 'like', "%$request->belong%");
            });
        }

        $users = $query->get();

        Log::info(compact('users'));
        return view('userlist', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // 本来であればリレーション設定しているので、user->prfileで可能だが、
        // テーブル設計ミスっているので、とりあえず下記の処理で実装
        $user = User::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]
        );

        $profile = Profile::create(
            [
                'age' => $request->age,
                'address' => $request->address,
                'belong' => $request->belong
            ]
        );

        $user->save();
        $profile->save();

        return redirect(route('userlist.index'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
        $query = User::query();
        if (isset($request->id)) {
            $query->where('id', $request->id);
        }

        if (isset($request->name)) {
            $query->where('name', $request->name);
        }

        if (isset($request->belong)) {
            $query->profile->where('belong', $request->belong);
        }

        $users = $query->get();

        return redirect(route('userlist.index'), compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
