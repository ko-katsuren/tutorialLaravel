<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matter;

class MatterListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $query = Matter::query();

        if (isset($request->id)) {
            $query->where('id', 'like', "%$request->id%");
        }

        if (isset($request->name)) {
            $query->where('matter_name', 'like', "%$request->name%");
        }

        if (isset($request->price)) {
            $query->where('price', $request->price);
        }

        $matters = $query->get();

        return view('matterlist', compact('matters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $matters = Matter::create(
            [
                'matter_name' => $request->name,
                'price' => $request->price
            ]
        );

        $matters->save();
        return redirect(route('matterlist.index'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
