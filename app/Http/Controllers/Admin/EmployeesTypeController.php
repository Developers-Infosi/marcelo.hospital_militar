<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Logger;
use App\Http\Controllers\Controller;
use App\Models\EmployeesType;
use Illuminate\Http\Request;

class EmployeesTypeController extends Controller
{
    private $Logger;

    public function __construct()
    {
        $this->Logger = new Logger;
    }

    public function index()
    {

        $response['employees_types']= EmployeesType::get();
        return view('admin.EmployeesType.list.index',$response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        $this->Logger->log('info','Entrou em  cadastrar tipo de funcionário ');
        return view('admin.EmployeesType.create.index');
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
        $EmployeesType = EmployeesType::create($request->all());
        $this->Logger->log('info', 'Cadastrou um tipo de funcionário   com o identificador',$EmployeesType->id);
        return redirect("admin/tipo-funcionario/show/$EmployeesType->id")->with('create', '1');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $response['employees_types']=EmployeesType::find($id);
        $this->Logger->log('info','Visualizou um tipo de funcionário com o identificador ' . $id );
        return view('admin.EmployeesType.detalis.index',$response)->with('create',1);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $response['employees_types'] = EmployeesType::find($id);
        $this->Logger->log('info','Entrou em editar tipo de funcionário  com o identificador ' . $id );
        return view('admin.EmployeesType.edit.index',$response);
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

           EmployeesType::find($id)->update([
                    'name' => $request->name,
                    'description' => $request->description,

                ]);
                $this->Logger->log('info','Editou um tipo de funcionário   com o identificador ' . $id );
        return redirect()->route('admin.employees_types.index')->with('edit', '1');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function  destroy(Request $request)
    {
        EmployeesType::find($request->id)->delete();
       $this->Logger->log('info', 'Eliminou um tipo de funcionário  com Identificador ',$request->id);
       return redirect()->route('admin.employees_types.index')->with('destroy', '1');
    }
}
