<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Logger;
use App\Http\Controllers\Controller;
use App\Models\Departament;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    private $Logger;

    public function __construct()
    {
        $this->Logger = new Logger;
    }
    public function index()
    {

        $response['departments']= Departament::get();
        $this->Logger->log('info', 'Listou Departamento');
        return view('admin.Department.list.index',$response);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->Logger->log('info', 'Entrou em Cadastrar Departamento');
        return view('admin.Department.create.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',]);

   $Departament=Departament::create([
    'name' => $request->name,
    'description' => $request->description, ]);

        $this->Logger->log('info', 'Cadastrou um departamento  com o identificador',$Departament->id);
        return redirect("admin/departamneto/show/$Departament->id")->with('create', '1');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $response['departments']=Departament::find($id);
        $this->Logger->log( 'info','Visualizou um departamento  com o identificador '.$id );
        return view('admin.Department.detalis.index',$response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $response['departments'] = Departament::find($id);
        $this->Logger->log('info', 'Entrou em Editar Departamento ');
        return view('admin.Department.edit.index',$response);
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
            'description' => 'required',]);

        Departament::find($id)->update([
            'name' => $request->name,
            'description' => $request->description, ]);

        $this->Logger->log('info','Editou um departamento   com o identificador ' . $id );
        return redirect()->route('admin.departments.index')->with('edit', '1');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function  destroy(Request $request)
    {
        Departament::find($request->id)->delete();
       $this->Logger->log('info', 'Eliminou um departamento   com Identificador ',$request->id);
       return redirect()->route('admin.departments.index')->with('destroy', '1');
    }
}
