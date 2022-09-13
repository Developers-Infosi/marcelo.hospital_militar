<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Logger;
use App\Http\Controllers\Controller;
use App\Models\Patient;
use Dotenv\Store\File\Paths;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
class PatientsController extends Controller
{


    private $Logger;

    public function __construct()
    {
        $this->Logger = new Logger;
    }

    public function index()
    {
        $response['patients'] = Patient::with('useres')->get();
        $this->Logger->log('info', 'Listou Pacientes');
        return view('admin.Patients.list.index', $response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->Logger->log('info', 'Entrou em Cadastrar Paciente');
        return view('admin.Patients.create.index');
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
            'father' => 'required',
            'mother' => 'required',
            'age' => 'required|numeric',
            'address' => 'required',
            'nationality' => 'required',

            'profession' => 'required',
            'tel' => 'required',
            'from' => 'required',
            'occupation' => 'required',
            'email' => 'required',

        ]);



        $Patient=Patient::create([
            'fk_employees_id' => Auth::user()->id,
            'name' => $request->name,
            'father' => $request->father,
            'mother' => $request->mother,
            'age' => $request->age,

            'address' => $request->address,
            'nationality' => $request->nationality,
            'profession' => $request->profession,
            'tel' => $request->tel,
            'from' => $request->from,
            'occupation' => $request->occupation,

            'email' => $request->email,
            'obs' => $request->obs,
        ]);


        $this->Logger->log('info', 'Cadastrou um  Paciente com o identificador',$Patient->id);

        return redirect("admin/pacientes/show/$Patient->id")->with('create', '1');


    }

public function patientRecord($id){
    $response['patient'] = Patient::with('useres')->find($id);
    $pdf = PDF::loadview('Pdf.Patients.index', $response);

    //Logger
    $this->Logger->log('info', 'Imprimiu uma ficha do paciente com o Identificador ',$id);

    return $pdf->setPaper('a4')->stream('pdf');
}

    public function show($id)
    {
        $response['patient'] = Patient::with('useres')->find($id);
        $this->Logger->log(
            'info','Visualizou um Paciente com o identificador ' . $id );
        return view('admin.Patients.detalis.index', $response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $response['patient'] = Patient::with('useres')->find($id);
        $this->Logger->log('info', 'Entrou em Editar Pacientes');
        return view('admin.Patients.edit.index', $response);

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
            'father' => 'required',
            'mother' => 'required',
            'age' => 'required|numeric',
            'address' => 'required',
            'nationality' => 'required',

            'profession' => 'required',
            'tel' => 'required',
            'from' => 'required',
            'occupation' => 'required',
            'email' => 'required',

        ]);
        Patient::find($id)->update([
            'name' => $request->name,
            'father' => $request->father,
            'mother' => $request->mother,
            'age' => $request->age,
            'address' => $request->address,
            'nationality' => $request->nationality,
            'profession' => $request->profession,
            'tel' => $request->tel,
            'from' => $request->from,
            'occupation' => $request->occupation,
            'email' => $request->email,
            'obs' => $request->obs,
        ]);

        $this->Logger->log(
            'info','Editou um Paciente com o identificador ' . $id );
        return redirect()->route('admin.patients.index')->with('edit', '1');

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
        Patient::find($request->id)->delete();
        $this->Logger->log('info', 'Eliminou um Paciente');
        return redirect()->route('admin.patients.index')->with('destroy', '1');
    }
}
