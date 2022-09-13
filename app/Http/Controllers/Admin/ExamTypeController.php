<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Classes\Logger;
use App\Models\ExamType;
use Dotenv\Store\File\Paths;
use Illuminate\Support\Facades\Auth;

class ExamTypeController extends Controller
{
    private $Logger;

    public function __construct()
    {
        $this->Logger = new Logger;
    }

    public function index()
    {
        $response['examtypes'] = ExamType::all();
        $this->Logger->log('info', 'Listou Tipos de Exames');
        return view('admin.ExamTypes.list.index', $response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->Logger->log('info', 'Entrou em Cadastrar Tipos de exames');
        return view('admin.ExamTypes.create.index');
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
            'examesNames' => 'required|string|max:255',
            'description' => 'required|',
   ]);
        $Examtype=ExamType::create([
            'examesNames' => $request->examesNames,
            'description'=> $request->description,

        ]);
        $this->Logger->log('info', 'Cadastrou um  Tipo de exame com o identificador',$Examtype->id);

        return redirect("admin/tipo-de-exames/show/$Examtype->id")->with('create', '1');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $response['examtypes'] = ExamType::find($id);
        $this->Logger->log( 'info','Visualizou um tipo  Exame  com o identificador ' . $id );

        return view('admin.ExamTypes.detalis.index', $response)->with('create', '1');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $response['examtypes'] = ExamType::find($id);
        $this->Logger->log('info', 'Entrou em Editar Tipo de Exames com Identificador '.$id);

        return view('admin.ExamTypes.edit.index', $response);

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
            'examesNames' => 'required|string|max:255',
            'description' => 'required|',
        ]);

        ExamType::find($id)->update([
            'examesNames' => $request->examesNames,
            'description'=> $request->description,
        ]);

        $this->Logger->log(
            'info','Editou um Tipo de Exame com o identificador ' . $id );
        return redirect()->route('admin.examtypes.index')->with('edit', '1');

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
        ExamType::find($request->id)->delete();
        $this->Logger->log('info', 'Eliminou um Tipo de Exame com Identificador '.$request->id);
        return redirect()->route('admin.examtypes.index')->with('destroy', '1');
    }
}
