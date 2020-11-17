<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Models\Employers;
use App\Models\Vacancies;
class VacancyController extends Controller{

    public function index(){
        $vacs = Vacancies::where('employer_id',1)->get();
        $employer = Employers::findOrFail(1);
        $specialties = DB::table('specialties')->get();
       return view('vacancies.index',['vacancies'=>$vacs,'specialties'=>$specialties,'employer'=>$employer]);   
   }

   public function create(){
        $id=1;
     
        $employer = Employers::findOrFail(1);
        $specialties = DB::table('specialties')->orderBy('name','asc')->get();
        return view('vacancies.create',['emp'=>$employer,'specialties'=>$specialties]);   
   }

   public function store(){

        $vacancy=new Vacancies();
        $vacancy->name=request('name');
        $vacancy->surname=request('surname');
        $vacancy->email=request('email');
        $vacancy->phone_number=request('phone_number');
        $vacancy->description=request('description');
        $vacancy->spec_id=request('spec_id');
        $vacancy->salary=request('salary');
        $vacancy->view_count=0;
        $vacancy->employer_id=1;
        $ldate = date('Y-m-d H:i:s');
        $vacancy->created_at=$ldate;
        $vacancy->updated_at=$ldate;

        $vacancy->save();

        error_log($vacancy);

        return redirect('/vacancy');   
    }

    public function show($id){
        $vacancy =Vacancies::findOrFail($id);
        $employer = Employers::findOrFail(1);
        $specialties = DB::table('specialties')->get();
       return view('vacancies.show',['vacancy'=>$vacancy,'specialties'=>$specialties,'emp'=>$employer]);   
    }

    public function destroy($id){
        $vacancy = Vacancies::findOrFail($id);

        $vacancy->delete();
       return redirect('/vacancy');   
    }

    public function update(){

        $vacancy = Vacancies::find(request('id'));
        
        $vacancy->name=request('name');
        $vacancy->surname=request('surname');
        $vacancy->email=request('email');
        $vacancy->phone_number=request('phone_number');
        $vacancy->description=request('description');
        $vacancy->spec_id=request('spec_id');
        $vacancy->salary=request('salary');
        $vacancy->view_count=0;
        $vacancy->employer_id=1;
        $ldate = date('Y-m-d H:i:s');
        $vacancy->updated_at=$ldate;

        $vacancy->save();

        error_log($vacancy);

        return redirect('/vacancy');   
    }

}
