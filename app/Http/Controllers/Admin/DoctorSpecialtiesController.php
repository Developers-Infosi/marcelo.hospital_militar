<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Classes\Logger;
use App\Models\DoctorSpecialtie;
use Dotenv\Store\File\Paths;
use Illuminate\Support\Facades\Auth;

class DoctorSpecialtiesController extends Controller
{

    private $Logger;

    public function __construct()
    {
        $this->Logger = new Logger;
    }

    public function index()
    {
        $response['specialtie'] = DoctorSpecialtie::all();
        $this->Logger->log('info', 'Listou Especialidades');
        return view('admin.DoctorSpecialties.list.index', $response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->Logger->log('info', 'Entrou em Cadastrar Especialidades');
        return view('admin.DoctorSpecialties.create.index');
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

        ]);
        $Specialtie=DoctorSpecialtie::create([
            'name' => $request->name,
        ]);
        $this->Logger->log('info', 'Cadastrou uma Especialidade com o identificador',$Specialtie->id);

        return redirect("admin/doctores-especialidade/show/$Specialtie->id")->with('create', '1');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $response['specialtie'] = DoctorSpecialtie::find($id);
        $this->Logger->log( 'info','Visualizou uma Especialidade com o identificador ' . $id );

        return view('admin.DoctorSpecialties.detalis.index', $response)->with('create', '1');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $response['specialtie'] = DoctorSpecialtie::find($id);
        $this->Logger->log('info', 'Entrou em Editar Especialidades');

        return view('admin.DoctorSpecialties.edit.index', $response);

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
            'name' => 'required|string|max:255',]);

        DoctorSpecialtie::find($id)->update([
             'name' => $request->name, ]);

        $this->Logger->log(
            'info','Editou uma Especialidade com o identificador ' . $id );
        return redirect()->route('admin.doctorspecialties.index')->with('edit', '1');

    }


    public function destroy(Request $request)
    {
        //
        DoctorSpecialtie::find($request->id)->delete();
        $this->Logger->log('info', 'Eliminou uma Especialidade com Identificador '.$request->id);
        return redirect()->route('admin.doctorspecialties.index')->with('destroy', '1');
    }
}
