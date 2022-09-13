<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Logger;
use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\Querie;
use App\Models\Screening;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    private $Logger;

    public function __construct()
    {
        $this->Logger = new Logger;
    }
    public function index()
    {
        $response['Exams']=   Exam::with('Doctors','Nurses','ExamTypes','Patients')->get();
        $this->Logger->log('info', 'Listou Exames');
        return view('admin.exams.list.index',$response);
    }



    public function search()
    {
        $this->Logger->log('info', 'Entrou em Pesquisar Exame');
        return view('admin.exams.search.index');
    }

    public function validadeSearch(Request $request){
      $Querie =Querie::with('Doctors','Nurses','ExamTypes','Screenings','Patients')->find($request->code)  ;

if($Querie !=null){

 return redirect("admin/exames/create/$Querie->id");
}
else{
    return redirect()->back()->with('errorValidade',1);
}
  }

    public function create($id)
    {
        $this->Logger->log('info', 'Entrou em Cadastrar Exames');

        $response['Exam']= Querie::with('Doctors','Nurses','ExamTypes','Screenings','Patients')->find($id);
        return view('admin.exams.create.index',$response);
    }


    public function store(Request $request)
    {
        $request->validate([
            'examResult' => 'required|string|max:255',
   ]);
        $Exam=Exam::create([
            'examResult' => $request->examResult,
            'fk_examTypes_id' => $request->fk_examTypes_id,
            'fk_nurses_id' => $request->fk_nurses_id,
            'fk_doctors_id' => $request->fk_doctors_id,
            'fk_patients_id' => $request->fk_patients_id,


        ]);
        $this->Logger->log('info', 'Cadastrou um exame com o identificador',$Exam->id);

        return redirect("admin/exames/show/$Exam->id")->with('create', '1');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    $response['Exam']=   Exam::with('Doctors','Nurses','ExamTypes','Patients')->find($id);
        $this->Logger->log('info', 'Entrou em Pesquisar Exame');
    return view('admin.exams.detalis.index',$response);

}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $response['Exam']=   Exam::with('Doctors','Nurses','ExamTypes','Patients')->find($id);
        return view('admin.exams.edit.index',$response);
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
            'examResult' => 'required|string|max:255',
   ]);

            Exam::find($id)->update([
                'examResult' => $request->examResult,
                'fk_examTypes_id' => $request->fk_examTypes_id,
                'fk_nurses_id' => $request->fk_nurses_id,
                'fk_doctors_id' => $request->fk_doctors_id,
                'fk_patients_id' => $request->fk_patients_id,]);

        $this->Logger->log('info','Editou um  Exame com o identificador ' . $id );
        return redirect()->route('admin.exams.index')->with('edit', '1');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function  destroy(Request $request)
    {
       //
       Exam::find($request->id)->delete();
       $this->Logger->log('info', 'Eliminou um  Exame com Identificador ',$request->id);
       return redirect()->route('admin.exams.index')->with('destroy', '1');
    }
}
