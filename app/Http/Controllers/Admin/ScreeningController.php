<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Logger;
use App\Http\Controllers\Controller;
use App\Models\Nurse;
use App\Models\Patient;
use App\Models\Screening;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
class ScreeningController extends Controller
{
    private $Logger;

    public function __construct()
    {
        $this->Logger = new Logger();
    }

    public function index()
    {
        $response['screenings'] = Screening::with('Patients', 'Nurses')->get();
        $this->Logger->log('info', 'Listou Triagem de Pacientes');
        return view('admin.screenings.list.index', $response);
    }

    public function create($id)
    {
        $response['patient'] = Patient::find($id);
        $response['nurses'] = Nurse::get();
        $this->Logger->log('info', 'Entrou em Cadastrar Pacientes na  Triagem');
        return view('admin.screenings.create.index', $response);
    }

    public function GetSubCatAgainstMainCatEdit($id)
    {
        echo json_encode(Patient::find($id));
    }

    public function screeningRecord($id)
    {
        $response['screening'] = Screening::with('Patients', 'Nurses')->find(
            $id
        );
        $pdf = PDF::loadview('Pdf.screening.index', $response);

        //Logger
        $this->Logger->log(
            'info',
            'Imprimiu uma ficha do paciente com o Identificador ',
            $id
        );

        return $pdf->setPaper('a4')->stream('pdf');
    }

    public function search()
    {
        $this->Logger->log('info', 'Entrou em pesquisar Triagem  ');
        return view('admin.screenings.search.index');
    }

    public function validadeSearch(Request $request)
    {
        $screening = Patient::find($request->code);

        if ($screening != null) {
            return redirect("admin/triagem/create/$screening->id");
        } else {
            return redirect()
                ->back()
                ->with('errorValidade', 1);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'height' => 'required|string|max:255',
            'weight' => 'required',
            'temperature' => 'required',
            'heartRate' => 'required',
            'respiratoryFrequency' => 'required',
            'bloodPressure' => 'required',
            'pulse' => 'required',
            'obs' => 'required',
        ]);

        $Screening = Screening::create([
            'height' => $request->height,
            'weight' => $request->weight,
            'temperature' => $request->temperature,
            'heartRate' => $request->heartRate,
            'respiratoryFrequency' => $request->respiratoryFrequency,
            'bloodPressure' => $request->bloodPressure,
            'pulse' => $request->pulse,
            'fk_patients_id' => $request->fk_patients_id,
            'fk_nurses_id' => Auth::user()->id,
            'obs' => $request->obs,
        ]);
        $this->Logger->log(
            'info',
            'Cadastrou uma triagem de um pacinete com o identificador',
            $Screening->fk_patients_id
        );
        return redirect()
            ->route('admin.screenings.show', $Screening->id)
            ->with('create', '1');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $response['screening'] = Screening::with('Patients', 'Nurses')->find(
            $id
        );
        $this->Logger->log(
     'info', 'Visualizou um Paciente na Triagem com o identificador ' . $id
        );

        return view('admin.screenings.details.index', $response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $response['patients'] = Patient::get();
        $response['nurses'] = Nurse::get();
        $response['screening'] = Screening::with('Patients', 'Nurses')->find(
            $id
        );
        $this->Logger->log('info', 'Entrou em Editar Pacientes na Triagem');

        return view('admin.screenings.edit.index', $response);
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
            'height' => 'required|string|max:255',
            'weight' => 'required',
            'temperature' => 'required',
            'heartRate' => 'required',
            'respiratoryFrequency' => 'required',
            'bloodPressure' => 'required',
            'pulse' => 'required',
            'obs' => 'required',
        ]);

        Screening::find($id)->update([
            'height' => $request->height,
            'weight' => $request->weight,
            'temperature' => $request->temperature,
            'heartRate' => $request->heartRate,
            'respiratoryFrequency' => $request->respiratoryFrequency,
            'bloodPressure' => $request->bloodPressure,
            'pulse' => $request->pulse,
        ]);
        $this->Logger->log(
            'info',
            'Editou triagem de Paciente com  o identificador ' . $id
        );
        return redirect()
            ->route('admin.screenings.index')
            ->with('edit', '1');
    }



    public function  destroy(Request $request)
    {
        $this->Logger->log('info', 'Eliminou um Paciente na triagem');
        Screening::find($request->id)->delete();
        return redirect()
            ->route('admin.screenings.index')
            ->with('destroy', '1');
    }
}
