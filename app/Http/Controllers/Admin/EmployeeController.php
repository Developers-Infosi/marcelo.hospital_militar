<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Logger;
use App\Http\Controllers\Controller;
use App\Models\Departament;
use App\Models\Employee;
use App\Models\Position;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    private $Logger;

    public function __construct()
    {
        $this->Logger = new Logger;
    }

    public function index()
    {
        $response['employees'] = Employee::with('positions')->with('departaments')->get();;
        $this->Logger->log('info', 'Listou Funcionários');
        return view('admin.Employee.list.index',$response);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     $response['positions'] = Position::get();
     $response['departments'] = Departament::get();
     $this->Logger->log('info', 'Entrou em cadastrar Funcionários');
     return view('admin.Employee.create.index',$response);
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
            'birthDate' => 'required|',
            'bi' => 'required',
            'email' => 'required',
            'address' => 'required',
            'tel' => 'required',
            'nip' => 'required',
            'contratDate' => 'required',
            'ContractFile'=> 'required',
            'fk_departments_id' => 'required',
            'fk_positions_id' => 'required',
            'typeContract' => 'required',
            'employeeType' => 'required',
            'literaryQualification'=> 'required',  ]);

            if ($middle = $request->file('ContractFile')) {
                $file = $middle->storeAs('ContractFile', 'ContractFile-' . uniqid(rand(1, 5)) . "." . $middle->extension());
            } else {
                $file = null;
            }

        $Employee=Employee::create([
            'name' => $request->name,
            'father' => $request->father,
            'mother' => $request->mother,
            'birthDate' => $request->birthDate,
             'bi' => $request->bi,
            'email' => $request->email,
            'address' => $request->address,
            'nip' => $request->nip,
            'tel' => $request->tel,
            'contratDate' =>$request->contratDate,
            'ContractFile'=>$file,
            'fk_departments_id' => $request->fk_departments_id,
            'fk_positions_id' => $request->fk_positions_id,
            'typeContract' => $request->typeContract,
            'employeeType' => $request->employeeType,
            'literaryQualification' => $request->literaryQualification,]);

             $this->Logger->log('info', 'Cadastrou um  Funcionário com o identificador',$Employee->id);
             return redirect("admin/funcionario/show/$Employee->id")->with('create', '1');
 }


    public function show($id)
    {

     $response['employee'] = Employee::with('positions')->with('departaments')->find($id);
     $this->Logger->log( 'info','Visualizou um Funcionário com o identificador '.$id );
    return view('admin.Employee.detalis.index',$response);
    }


    public function edit($id)
    {
        $response['employee'] = Employee::with('positions')->with('departaments')->find($id);;
        $response['positions'] = Position::get();
        $response['departments'] = Departament::get();
        $this->Logger->log('info','Entrou em editar tipo de funcionário  com o identificador ' . $id );
        return view('admin.Employee.edit.index',$response);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'father' => 'required',
            'mother' => 'required',
            'birthDate' => 'required|',
            'bi' => 'required',
            'email' => 'required',
            'address' => 'required',
            'tel' => 'required',
            'nip' => 'required',
            'contratDate' => 'required',
            'ContractFile'=> 'required',
            'fk_departments_id' => 'required',
            'fk_positions_id' => 'required',
            'typeContract' => 'required',
            'employeeType' => 'required',
            'literaryQualification'=> 'required',  ]);

            if ($middle = $request->file('ContractFile')) {
                $file = $middle->storeAs('ContractFile', 'ContractFile-' . uniqid(rand(1, 5)) . "." . $middle->extension());
            } else {
                $file = Employee::find($id)->contratDate;
            }

        $Employee=Employee::find($id)->update([
            'name' => $request->name,
            'father' => $request->father,
            'mother' => $request->mother,
            'birthDate' => $request->birthDate,
             'bi' => $request->bi,
            'email' => $request->email,
            'address' => $request->address,
            'nip' => $request->nip,
            'tel' => $request->tel,
            'contratDate' =>$request->contratDate,
            'ContractFile'=>  $file,
            'fk_departments_id' => $request->fk_departments_id,
            'fk_positions_id' => $request->fk_positions_id,
            'typeContract' => $request->typeContract,
            'employeeType' => $request->employeeType,
            'literaryQualification' => $request->literaryQualification,]);

            $this->Logger->log('info','Editou um funcionário com o identificador ' . $id );
            return redirect()->route('admin.employees.index')->with('edit', '1');

    }

    public function  destroy(Request $request)
    {
        Employee::find($request->id)->delete();
       $this->Logger->log('info', 'Eliminou um funcionário com o Identificador',$request->i);
       return redirect()->route('admin.employees.index')->with('destroy', '1');
    }
}
