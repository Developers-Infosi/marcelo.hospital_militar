<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Logger;
use App\Http\Controllers\Controller;
use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    private $Logger;

    public function __construct()
    {
        $this->Logger = new Logger;
    }

    public function index()
    {
        $response['positions']= Position::get();
        $this->Logger->log('info','Listou Cargos ');
        return view('admin.Position.list.index',$response);
    }


    public function create()
    {
        $this->Logger->log('info','Entrou em cadastrar  Cargos ');
        return view('admin.Position.create.index');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',]);

   $Position=Position::create([
    'name' => $request->name,
    'description' => $request->description, ]);

        $this->Logger->log('info', 'Cadastrou um Cargo   com o identificador',$Position->id);
        return redirect("admin/cargo/show/$Position->id")->with('create', '1');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $response['position']=Position::find($id);
        $this->Logger->log( 'info','Visualizou um Cargo  com o identificador ' . $id );
        return view('admin.Position.detalis.index',$response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $response['position'] = Position::find($id);
         $this->Logger->log('info','Entrou em editar Cargo  com o identificador ' . $id );
        return view('admin.Position.edit.index',$response);

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
            'name' => 'required|string|max:255',
            'description' => 'required',
   ]);

        Position::find($id)->update([
            'name' => $request->name,
            'description' => $request->description,

        ]);
        $this->Logger->log('info','Editou uma Cargo  com o identificador ' . $id );
        return redirect()->route('admin.positions.index')->with('edit', '1');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function  destroy(Request $request)
    {
        Position::find($request->id)->delete();
       $this->Logger->log('info', 'Eliminou um Cargo   com Identificador ',$request->id);
       return redirect()->route('admin.positions.index')->with('destroy', '1');
    }
}
