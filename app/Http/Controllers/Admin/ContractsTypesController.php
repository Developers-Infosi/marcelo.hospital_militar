<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactsType;
use Illuminate\Http\Request;

class ContractsTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response['contracts_types']= ContactsType::get();
        return view('admin.ContactsType.list.index',$response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ContactsType.create.index');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $ContactsType = ContactsType::create($request->all());
       // return redirect()->route('admin.contracts_types.create')->with('create',1);

        ContactsType::create($request->all());
        return redirect()->route('admin.contracts_types.create')->with('create',1);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $response['contracts_types']=ContactsType::find($id);
        return view('admin.ContactsType.detalis.index',$response)->with('create',1);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $response['contracts_types'] = ContactsType::find($id);
        return view('admin.ContactsType.edit.index',$response);
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

            ContactsType::find($id)->update([
            'name' => $request->name,

        ]);

        return redirect()->route('admin.contracts_types.index')->with('edit', '1');
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
