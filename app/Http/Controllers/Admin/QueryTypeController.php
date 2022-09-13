<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Logger;
use App\Http\Controllers\Controller;
use App\Models\Querytype;
use App\Models\Screening;
use Illuminate\Http\Request;

class QueryTypeController extends Controller
{

    private $Logger;

    public function __construct()
    {
        $this->Logger = new Logger;
    }

    public function index()
    {
        $response['querytypes']=Querytype::get();
        $this->Logger->log('info','Listou Tipos de Consultas ');
        return view('admin.queryType.list.index',$response);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->Logger->log('info','Entrou em cadastrar tipos de Consultas ');
    return view('admin.queryType.create.index');
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
            'description' => 'required',
       ]);
   $querytype= Querytype::create([
'name'=>$request->name,
'description'=>$request->description,
 ] );
 $this->Logger->log('info', 'Cadastrou um Tipo de Consulta com o identificador',$querytype->id);

 return redirect("admin/tipo-de-consultas/show/$querytype->id")->with('create', '1');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

      $response['querytype']=Querytype::find($id);
      $this->Logger->log('info','Visualizou um tipo de consulta com o Identificador '.$id);
      return view('admin.queryType.detalis.index',$response)->with('create',1);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $response['querytype']=Querytype::find($id);
        $this->Logger->log('info','Entrou em editar um  tipo de consulta com o Identificador '.$id);
        return view('admin.queryType.edit.index',$response);
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
            'description' => 'required',  ]);

        Querytype::find($id)->update([
            'name'=>$request->name,
            'description'=>$request->description, ]);

        $this->Logger->log(
            'info','Editou um tipo de consulta com o identificador ' . $id );
        return redirect()->route('admin.queryType.index')->with('edit', '1');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        Querytype::find($request->id)->delete();
        $this->Logger->log('info', 'Eliminou um tipo de consulta com o Identificador ',$request->id);
        return redirect()->route('admin.queryType.index')->with('destroy', '1');
    }
}
