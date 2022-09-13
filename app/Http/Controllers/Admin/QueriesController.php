<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Logger;
use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\ExamType;
use App\Models\Querie;
use App\Models\Querytype;
use App\Models\Screening;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QueriesController extends Controller
{
    private $Logger;

    public function __construct()
    {
        $this->Logger = new Logger;
    }
    public function index()
    {
        $response['queries']=  Querie::with('Doctors','Nurses','ExamTypes','Screenings','Patients')->get();
        $this->Logger->log('info','Listou consultas ');
        return view('admin.queries.list.index',$response);
    }



    public function search()
    {
        $this->Logger->log('info','Entrou em pesquisar consultas ');
        return view('admin.queries.search.index');
    }

    public function validadeSearch(Request $request){
      $screening = Screening::find($request->code);

if($screening !=null){

 return redirect("admin/consultas/create/$screening->id");
}
else{
    return redirect()->back()->with('errorValidade',1);
}

    }

    public function create($id)
    {
$response['exames']= ExamType::get();
        $response['Screening']= Screening::with('Patients','Nurses')->find($id);
        $this->Logger->log('info','Entrou em Criar Consultas com o Identificador'.$id);
        return view('admin.queries.create.index',$response);
    }

    public function queryType($id){

        echo json_encode(Screening::find($id));

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

            'obs' => 'required',  ]);
            
      $querie=  Querie::Create([

            'obs' => $request->obs,
            'fk_examTypes_id' => $request->fk_examTypes_id,
            'fk_schedules_id' => $request->fk_schedules_id,
            'fk_screenings_id' => $request->fk_screenings_id,
            'fk_nurses_id' => $request->fk_nurses_id,
            'fk_doctors_id' => Auth::user()->id,
            'fk_patients_id' => $request->fk_patients_id,]);


            $this->Logger->log('info', 'Cadastrou uma consulta com o identificador',$querie->id);
            return redirect("admin/consultas/show/$querie->id")->with('create', '1');
    }

    public function show($id)
    {
   $response['querie']=  Querie::with('Doctors','Nurses','ExamTypes','Screenings','Patients')->find($id);

return view('admin.queries.detalis.index',$response);
    }


    public function edit($id)
    {
        $response['querie']=  Querie::with('Doctors','Nurses','ExamTypes','Screenings','Patients')->find($id);
        $response['exames']= ExamType::get();
return view('admin.queries.edit.index',$response);
    }

    public function update(Request $request, $id)
    {  $request->validate([

        'obs' => 'required',  ]);
        Querie::find($id)->update([
            'fk_examTypes_id' => $request->fk_examTypes_id,
            'obs' => $request->obs,

        ]);
        $this->Logger->log(
            'info','Editou uma consulta com o identificador ' . $id );
        return redirect()->route('admin.queries.index')->with('edit', '1');
    }


    public function destroy(Request $request)
    {
        Querie::find($request->id)->delete();
        $this->Logger->log('info', 'Eliminou uma  consulta com o Identificador ',$request->id);
        return redirect()->route('admin.queries.index')->with('destroy', '1');
    }
}
