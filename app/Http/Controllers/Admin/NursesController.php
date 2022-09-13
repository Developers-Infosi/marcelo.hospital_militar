<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Classes\Logger;
use App\Models\Nurse;
use Dotenv\Store\File\Paths;
use Illuminate\Support\Facades\Auth;

class NursesController extends Controller
{

    private $Logger;

    public function __construct()
    {
        $this->Logger = new Logger;
    }

    public function index()
    {
        $response['nurses'] = Nurse::all();
        $this->Logger->log('info', 'Listou Enfermeiras/os');
        return view('admin.Nurses.list.index', $response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->Logger->log('info', 'Entrou em Cadastrar Enfermeiros');
        return view('admin.Nurses.create.index');
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
            'address' => 'required',
            'position' => 'required',
            'tel' => 'required',
            'nip' => 'required',
            'email' => 'required',
            'nurseOrder' => 'required',
            'email' => 'required',
        'obs' => 'required']);


        $Nurse=Nurse::create([
            'name' => $request->name,
            'address' => $request->address,
            'position' => $request->position,
            'tel' => $request->tel,
            'nip' => $request->nip,
            'nurseOrder' => $request->nurseOrder,
            'email' => $request->email,
            'obs' => $request->obs,
        ]);


        $this->Logger->log('info', 'Cadastrou um  Enfermeiro com o identificador',$Nurse->id);

        return redirect("admin/enfermeiros/show/$Nurse->id")->with('create', '1');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $response['nurse'] = Nurse::find($id);
        $this->Logger->log( 'info','Visualizou um Enfermeiro com o identificador ' . $id );

        return view('admin.Nurses.detalis.index', $response)->with('create', '1');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $response['nurse'] = Nurse::find($id);
        $this->Logger->log('info', 'Entrou em Editar Enfermeiros com Identificador '.$id);

        return view('admin.Nurses.edit.index', $response);

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
            'address' => 'required',
            'position' => 'required',
            'tel' => 'required',
            'nip' => 'required',
            'nurseOrder' => 'required',
            'email' => 'required',  ]);

        Nurse::find($id)->update([
            'fk_employees_id' => Auth::user()->id,
            'name' => $request->name,
            'address' => $request->address,
            'position' => $request->position,
            'tel' => $request->tel,
            'nip' => $request->nip,
            'nurseOrder' => $request->nurseOrder,
            'email' => $request->email,
            'obs' => $request->obs,
        ]);

        $this->Logger->log(
            'info','Editou um Enfermeiro com o identificador '.$id );
        return redirect()->route('admin.nurses.index')->with('edit', '1');

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
        Nurse::find($request->id)->delete();
        $this->Logger->log('info', 'Eliminou um Enfermeiro Com Identifacor '.$request->id);
        return redirect()->route('admin.nurses.index')->with('destroy', '1');
    }
}
