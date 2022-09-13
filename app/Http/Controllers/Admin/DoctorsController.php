<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Classes\Logger;
use App\Models\Doctor;
use App\Models\DoctorSpecialtie;
use Dotenv\Store\File\Paths;
use Illuminate\Support\Facades\Auth;

class DoctorsController extends Controller
{
    private $Logger;

    public function __construct()
    {
        $this->Logger = new Logger;
    }

    public function index()
    {
        $response['doctors'] = Doctor::with('specialtie')->get();

        $this->Logger->log('info', 'Listou Doctores');
        return view('admin.Doctors.list.index', $response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $response['specialtie'] = DoctorSpecialtie::all();
        $this->Logger->log('info', 'Entrou em Cadastrar Doctores');
        return view('admin.Doctors.create.index', $response);
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
            'adress' => 'required',
            'tel' => 'required',
            'nip' => 'required',
            'doctorOrder' => 'required|max:15',
            'email' => 'required',
            'fk_doctorSpecialties_id' => 'required',
            'obs' => 'required']);
            
        $Doctor=Doctor::create([
            'name' => $request->name,
            'adress' => $request->adress,
            'tel' => $request->tel,
            'nip' => $request->nip,
            'doctorOrder' => $request->doctorOrder,
            'email' => $request->email,
            'obs' => $request->obs,
            'fk_doctorSpecialties_id' => $request->fk_doctorSpecialties_id,
        ]);
        $this->Logger->log('info', 'Cadastrou um  Doctor com o identificador',$Doctor->id);

        return redirect("admin/doctores/show/$Doctor->id")->with('create', '1');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $response['doctor'] = Doctor::with('specialtie')->find($id);

        $this->Logger->log( 'info','Visualizou um Doctor com o identificador '.$id );

        return view('admin.Doctors.detalis.index', $response)->with('create', '1');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $response['doctor'] = Doctor::with('specialtie')->find($id);
        $response['specialtie'] = DoctorSpecialtie::all();
        $this->Logger->log('info', 'Entrou em Editar Dotores');
        return view('admin.Doctors.edit.index', $response);

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
            'adress' => 'required',
            'tel' => 'required',
            'nip' => 'required',
            'doctorOrder' => 'required|max:15',
            'email' => 'required',
            'fk_doctorSpecialties_id' => 'required',
            'obs' => 'required'


        ]);

        Doctor::find($id)->update([
            'name' => $request->name,
            'adress' => $request->adress,
            'tel' => $request->tel,
            'nip' => $request->nip,
            'doctorOrder' => $request->doctorOrder,
            'email' => $request->email,
            'obs' => $request->obs,
            'fk_doctorSpecialties_id' => $request->fk_doctorSpecialties_id,
        ]);

        $this->Logger->log(
            'info','Editou um Doctor com o identificador ' . $id );
        return redirect()->route('admin.doctors.index')->with('edit', '1');

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
        Doctor::find($request->id)->delete();
        $this->Logger->log('info', 'Eliminou um Doctor');
        return redirect()->route('admin.doctors.index')->with('destroy', '1');
    }

}
