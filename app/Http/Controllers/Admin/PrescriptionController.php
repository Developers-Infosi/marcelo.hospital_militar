<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Logger;
use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\Prescription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class PrescriptionController extends Controller
{

    private $Logger;

    public function __construct()
    {
        $this->Logger = new Logger;
    }

    public function index()
    {
        $response['prescription']=   Prescription::with('Doctors','Patients')->get();
        $this->Logger->log('info','Listou Receitas ');
        return view('admin.Prescription.list.index', $response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $response['Exam']=   Exam::with('Doctors','Nurses','ExamTypes','Patients')->find($id);
        $this->Logger->log('info','Entrou em cadastrar  Receitas com Identificador '.$id);
        return view('admin.Prescription.create.index',$response);
    }



    public function search()

    {    $this->Logger->log('info','Entrou em pesquisar Receita ');

        return view('admin.Prescription.search.index');
    }

    public function validadeSearch(Request $request){
      $Exam = Exam::find($request->code);

if($Exam !=null){

 return redirect("admin/receitas/create/$Exam->id");
}
else{
    return redirect()->back()->with('errorValidade',1);
}
  }


    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',]);

        $Prescription=Prescription::create([
            'description' => $request->description,
            'fk_doctors_id' => Auth::user()->id,
            'fk_patients_id' => $request->fk_patients_id, ]);
        $this->Logger->log('info', 'Cadastrou uma receita  com o identificador',$Prescription->id);
        return redirect("admin/receitas/show/$Prescription->id")->with('create', '1');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $response['prescription']=   Prescription::with('Doctors','Patients')->find($id);
       $this->Logger->log(
        'info','Visualizou uma receita com o identificador ' . $id );
    return view('admin.Prescription.detalis.index', $response);
    }

   public function revenue($id){
    $response['prescription']=   Prescription::with('Doctors','Patients')->find($id);

    $pdf = PDF::loadview('Pdf.revenue.index', $response);

    //Logger
    $this->Logger->log('info', 'Imprimiu uma receita  com o Identificador ',$id);

    return $pdf->setPaper('a4')->stream('pdf');
   }

    public function edit($id)
    {
        $response['prescription']=   Prescription::with('Doctors','Patients')->find($id);
       $this->Logger->log('info','Entrou em editar uma receita com o identificador ' . $id );
    return view('admin.Prescription.edit.index', $response);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'description' => 'required',]);

   Prescription::find($id)->update([
                'description' => $request->description,
  ]);

        $this->Logger->log('info','Editou uma receita  com o identificador ' . $id );
        return redirect()->route('admin.prescriptions.index')->with('edit', '1');
    }


    public function  destroy(Request $request)
    {
       Prescription::find($request->id)->delete();
       $this->Logger->log('info', 'Eliminou uma receita  com Identificador ',$request->id);
       return redirect()->route('admin.prescriptions.index')->with('destroy', '1');
    }
}
