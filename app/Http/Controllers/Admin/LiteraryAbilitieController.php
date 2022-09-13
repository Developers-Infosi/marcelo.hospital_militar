<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LiteraryAbilitie;
use Illuminate\Http\Request;

class LiteraryAbilitieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response['literary_abilities']= LiteraryAbilitie::get();
        return view('admin.LiteraryAbilitie.list.index',$response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.LiteraryAbilitie.create.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $LiteraryAbilitie = LiteraryAbilitie::create($request->all());
        return redirect()->route('admin.literary_abilities.create')->with('create',1);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $response['literary_abilities']=LiteraryAbilitie::find($id);
        return view('admin.LiteraryAbilitie.detalis.index',$response)->with('create',1);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $response['literary_abilities'] = LiteraryAbilitie::find($id);
        return view('admin.LiteraryAbilitie.edit.index',$response);
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
        $request->validate([
            'name' => 'required|string|max:255', ]);

            LiteraryAbilitie::find($id)->update([
            'name' => $request->name,

        ]);

        return redirect()->route('admin.literary_abilities.index')->with('edit', '1');
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
